<?php
/**
 * Storefront engine room
 *
 * @package storefront
 */

/**
 * Assign the Storefront version to a var
 */
$theme              = wp_get_theme( 'storefront' );
$storefront_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$storefront = (object) array(
	'version' => $storefront_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-storefront.php',
	'customizer' => require 'inc/customizer/class-storefront-customizer.php',
);

require 'inc/storefront-functions.php';
require 'inc/storefront-template-hooks.php';
require 'inc/storefront-template-functions.php';

if ( class_exists( 'Jetpack' ) ) {
	$storefront->jetpack = require 'inc/jetpack/class-storefront-jetpack.php';
}

if ( storefront_is_woocommerce_activated() ) {
	$storefront->woocommerce = require 'inc/woocommerce/class-storefront-woocommerce.php';

	require 'inc/woocommerce/storefront-woocommerce-template-hooks.php';
	require 'inc/woocommerce/storefront-woocommerce-template-functions.php';
}

if ( is_admin() ) {
	$storefront->admin = require 'inc/admin/class-storefront-admin.php';

	require 'inc/admin/class-storefront-plugin-install.php';
}

/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
if ( version_compare( get_bloginfo( 'version' ), '4.7.3', '>=' ) && ( is_admin() || is_customize_preview() ) ) {
	require 'inc/nux/class-storefront-nux-admin.php';
	require 'inc/nux/class-storefront-nux-guided-tour.php';

	if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.0.0', '>=' ) ) {
		require 'inc/nux/class-storefront-nux-starter-content.php';
	}
}

/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 * https://github.com/woocommerce/theme-customisations
 */



add_filter( 'woocommerce_package_rates', 'wc_restrict_sales_by_postcode', 10, 2 );
function wc_restrict_sales_by_postcode( $rates, $package ) {
  $cep = WC()->customer->get_shipping_postcode();
  $cep = preg_replace( "/[^0-9]/", "",$cep );

  $blockCep = array('07629770','08180250','07851040','08290220','08270530','08295550','08030440','08270530','08295550');

if (in_array($cep,$blockCep)) {
  $rates = array();
}
    return $rates;

}


function add_last_nav_item($items) {
  return $items .= '
    <li
      class="mega-menu-item mega-menu-item--the-new mega-menu-item-type-custom mega-menu-item-object-custom mega-align-bottom-left mega-menu-flyout mega-menu-item-to-right"
    >
      <a class="mega-menu-link--the-new" href="https://site.prontolight.com/prontocash/" tabindex="0">
        <img src="'.esc_url(get_stylesheet_directory_uri() . '/assets/images/prontocash_menu.png').'" class="mega-menu-item--the-new-img">
      </a>
    </li>';
}
add_filter('wp_nav_menu_items','add_last_nav_item');


/**
 * Frontend validate new customer only coupon code
 * hook: woocommerce_after_checkout_validation
 */

add_action('woocommerce_applied_coupon','check_new_customer_coupon', 0);



function check_new_customer_coupon(){
    global $woocommerce;
    // you might change the firstlove to your coupon
    $new_cust_coupon_code = 'testeprimeiracompra';
    
    $has_apply_coupon = false;

    foreach ( WC()->cart->get_coupons() as $code => $coupon ) {
        if($code == $new_cust_coupon_code) {
            $has_apply_coupon = true;
        }
    }

    if($has_apply_coupon) {
            
        if(is_user_logged_in()) {
            $user_id = get_current_user_id();

            // retrieve all orders
               $customer_orders = get_posts( array(
'numberposts' => -1,
'meta_key' => '_customer_user',
'meta_value' => get_current_user_id(),
'post_type' => wc_get_order_types(),
'post_status' => array_keys( wc_get_order_statuses() ),
) );

            if(count($customer_orders) > 0) {
                $has_ordered = false;
                    
                $statuses = array('wc-failed', 'wc-cancelled', 'wc-refunded');
                    
                // loop thru orders, if the order is not falled into failed, cancelled or refund then it consider valid
                foreach($customer_orders as $tmp_order) {

                    $order = wc_get_order($tmp_order->ID);
                    if(!in_array($order->get_status(), $statuses)) {
                        $has_ordered = true;
                    }
                }
                    
                // if this customer already ordered, we remove the coupon
                if($has_ordered == true) {
                    WC()->cart->remove_coupon( $new_cust_coupon_code );
                    wc_add_notice( sprintf( "Coupon code: %s is only applicable for new customer." , $new_cust_coupon_code), 'error' );
                    return false;
                }
            } else {
                // customer has no order, so valid to use this coupon
                return true;
            }

        } else {
            // new user is valid
            return true;
        }
    }

}