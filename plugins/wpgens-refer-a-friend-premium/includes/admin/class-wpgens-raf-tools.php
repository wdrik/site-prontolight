<?php
/**
 * Hook to Woo Tools to add buttons for missing rafs.
 * @author    WPGens
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPGENS_RAF_Tools {

	public function __construct() {
		// Hook in WooCommerce debug tools.
		add_filter( 'woocommerce_debug_tools', array($this, 'gens_tools') );
	}

	/**
	 * Woocommerce tools button to add missing referrals.
	 *
	 * @since 2.0.0
	 */
	public function gens_tools($old) {
		$new = array(
			'gens_add_missing_referrals' => array(
				'name'    => __( 'Refer a friend - Create missing referral links.', 'gens-raf' ),
				'button'  => __( 'Create referrals', 'gens-raf' ),
				'desc'    => __( '<strong class="red">Note:</strong> This tool will add missing referrals to your site prior to users clicking on my account page. Useful if you want to inform users about their referral link, before it was autogenerated by them visiting page with referral link. ', 'gens-raf' ),
				'callback' => array($this,'gens_add_missing_referrals')
			),
			'gens_reset_referral_data' => array(
				'name'    => __( 'Refer a friend - Reset referral data.', 'gens-raf' ),
				'button'  => __( 'Reset referrals', 'gens-raf' ),
				'desc'    => __( '<strong class="red">Note:</strong> This tool will remove all referral data from orders and will reset number of referrals for each user. Use with caution! Coupons will be kept by users, but if some referrals are pending, they wont award coupons after this. Backup your store before clicking!', 'gens-raf' ),
				'callback' => array($this,'gens_reset_referral_data')
			),
			'gens_raf_generate_logs' => array(
				'name'    => __( 'Refer a friend - Generate missing logs.', 'gens-raf' ),
				'button'  => __( 'Generate missing logs', 'gens-raf' ),
				'desc'    => __( '<strong class="red">Note:</strong> Depending on how many referral orders you have, this might take a while.', 'gens-raf' ),
				'callback' => array($this,'gens_raf_generate_logs')
			),
		);
		$tools = array_merge( $old, $new );
		return $tools;
	}
	
	/**
	 * Callback function for Woocommerce tools button to generate missing log files from orders and coupons
	 *
	 * @since 2.3.0
	 */
	function gens_raf_generate_logs() {

        // Generate Logs for Referral Orders
        $args = array(
		    'meta_query'  => array(
		    	array(
		    		'key' => '_raf_id',
		    		'compare' => 'EXISTS',
		    	)
		    ),
		    'post_type'   => wc_get_order_types(),
		    'post_status' => array_keys( wc_get_order_statuses() ),
		    'posts_per_page' => 99999
		);

        $getOrders = new WP_Query($args);
        $orders = $getOrders->get_posts();
        $db = new WPGens_RAF_DB();

        foreach($orders as $order) {
            $order = wc_get_order( $order->ID );
            $order_id = ( version_compare( WC_VERSION, '2.7', '<' ) ) ? $order->id : $order->get_id();  
            $raf_meta    = get_post_meta($order_id,'_raf_meta',true);
            $referrer_code = get_post_meta($order_id,'_raf_id',true); 
            $referral = get_users( array('meta_key' => 'gens_referral_id','meta_value' => $referrer_code,'number' => 1,'count_total' => false, 'fields' => 'ids') );
            $referral_id = $referral ? $referral[0] : 0;
            $user_id = ( version_compare( WC_VERSION, '2.7', '<' ) ) ? get_post_meta($order_id, '_customer_user', true) : $order->get_user_id(); 
            $order_date = ( version_compare( WC_VERSION, '2.7', '<' ) ) ? strtotime($order->order_date) : strtotime($order->get_date_created()); 
            $meta = array_merge(array('user' => $user_id, 'referral' => $referral_id, 'order' => $order_id), $raf_meta != '' ? $raf_meta : []);
            
            // If exists, return.
            $order = $db->get_by_meta_key_value('order', $order_id);
            
            if($order > 0) {
                continue;
            }

            // Else
            $id = $db->insert(array('time'=> date("Y-m-d H:i:s", $order_date),'type' => 'new_order'));
            if($id) {
                foreach ($meta as $meta_key => $meta_value) {
                    $db->add_meta($id, $meta_key, $meta_value);
                }
            }
        }

         // Generate Logs for Created Coupons
         $args = array(
            'posts_per_page'   => -1,
            'post_type'        => 'shop_coupon',
            'post_status'      => 'publish'
        );
        $raf_coupons = array();
        $coupons = get_posts( $args );
        $user_id = 0;
        if($coupons) {
            $i = 0;
            foreach ( $coupons as $coupon ) {
                $coupon_id = $coupon->ID;
                if(substr( $coupon->post_title, 0, 3 ) != "RAF") {
                    continue;
                }
                $coupon_date = get_the_date("Y-m-d H:i:s", $coupon_id);

                // If exists, return.
                $couponExists = $db->get_by_meta_key_value('coupon_id', $coupon_id);
                if($couponExists > 0) {
                    continue;
                }

                // Prepare
                $order_id = get_post_meta( $coupon_id, '_raf_order_id', true );
                $customer_email = get_post_meta( $coupon_id, 'customer_email', true );
                
                if($customer_email) {
                    $user = get_user_by('email',$customer_email);
                    if($user){
                        $user_id = $user->ID;
                    }
                }


                // Else, save
                $meta = array('user' => $user_id, 'order' => $order_id, 'coupon_id' => $coupon_id);
                $id = $db->insert(array('time'=> $coupon_date,'type' => 'new_coupon'));
                if($id) {
                    foreach ($meta as $meta_key => $meta_value) {
                        $db->add_meta($id, $meta_key, $meta_value);
                    }
                }

            }
        }

	}
	
	/**
	 * Callback function for Woocommerce tools button to reset referral data. 
	 * This will remove all metas on orders.
	 *
	 * @since 2.0.0
	 */
	function gens_reset_referral_data() {

		$return = delete_post_meta_by_key('_raf_id');
		delete_post_meta_by_key('_raf_meta');
		$users = get_users();
	    foreach ($users as $user) {
	        delete_user_meta($user->ID, 'gens_num_friends');
	    }
		if($return === true) {
			echo '<div class="updated inline"><p>Removed all referral data for orders.</p></div>';
		} else {
			echo '<div class="updated inline"><p>Nothing to remove.</p></div>';
		}

	}

	/**
	 * Callback function for Woocommerce tools button to add missing referrals.
	 *
	 * @since 2.0.0
	 */
	function gens_add_missing_referrals() {
		$gens_user_query = new WP_User_Query(array( 'meta_key' => 'gens_referral_id', 'meta_compare' => 'NOT EXISTS' ));
		$users = $gens_user_query->get_results();
		foreach ($users as $user) {
			WPGens_RAF_User::new_user_add_referral_id($user->ID);
		}
		echo '<div class="updated inline"><p>' . count($users) . __( ' missing referral codes have been created', 'gens-raf' ) . '</p></div>';
	}

}

new WPGENS_RAF_Tools();