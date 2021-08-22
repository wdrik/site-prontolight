<?php


function sd_move_product_sharing() {

    if ( class_exists( 'Storefront_Product_Sharing' ) ) {
        remove_action( 'woocommerce_after_single_product_summary', array( Storefront_Product_Sharing(), 'sps_product_sharing' ), 5 );
        add_action( 'woocommerce_after_single_product_summary', array( Storefront_Product_Sharing(), 'sps_product_sharing' ), 10 );
    }

}
add_action( 'init', 'sd_move_product_sharing' );


/*
* Remove a Verificação de Força
*/
function iconic_remove_password_strength() {
    wp_dequeue_script( 'wc-password-strength-meter' );
}

add_action( 'wp_print_scripts', 'iconic_remove_password_strength', 10 );

//--> importado = 0, on update account details
add_action( 'woocommerce_save_account_details', 'after_edit_account_form' );
function after_edit_account_form( $user ){
    $user_id = get_current_user_id();

    update_user_meta( (int) $user_id, "importado", 0, 0 );
}

//--> importado = 0, on update address details
add_action( 'woocommerce_customer_save_address', 'customer_save_address' );
function customer_save_address( $user ) {
    $user_id = get_current_user_id();

    update_user_meta( (int) $user_id, "importado", 0, 0 );
}

//--> On update order status
add_action('woocommerce_order_status_changed', 'woo_order_status_change_custom', 10, 4);
function woo_order_status_change_custom($order_id, $old_status, $new_status) {

    if (
        $old_status === 'on-hold' && $new_status === 'processing' ||
        $old_status === 'on-hold' && $new_status === 'cancelled' ||
        $old_status === 'pending' && $new_status === 'processing' ||
        $old_status === 'pending' && $new_status === 'cancelled' ||
        $old_status === 'pending' && $new_status === 'on-hold'
    ) {
        update_field('field_5bbb526514927', 0, $order_id);

        if ( is_admin() ) {
            header("location: ".get_site_url()."/wp-admin/post.php?post=".$order_id."&action=edit"); exit;
        }
    }
}

//--> On create order update importado = 0
add_action( 'woocommerce_new_order', 'create_invoice_for_wc_order',  10, 1 );
function create_invoice_for_wc_order( $order_id ) {
    update_field('field_5bbb526514927', 0, $order_id);
}


//--> On create customer update importado = 0
add_action('woocommerce_created_customer', 'update_customer_on_registration', 10 , 3);
function update_customer_on_registration( $customer_id) {
    update_user_meta( $customer_id, "importado", 0 );
}


add_action('wp_head', function(){
    ?>



    <?php
});

add_action('storefront_before_site', function(){
    ?>



    <?php
});


function remove_query_strings() {
    if(!is_admin()) {
        add_filter('script_loader_src', 'remove_query_strings_split', 15);
        add_filter('style_loader_src', 'remove_query_strings_split', 15);
    }
}

function remove_query_strings_split($src){
    $output = preg_split("/(&ver|\?ver)/", $src);
    return $output[0];
}
add_action('init', 'remove_query_strings');

/**
 * Remove coupon and login form from checkout page
 */
//remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10 );

remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20);

add_action( 'woocommerce_checkout_update_order_meta', function($order_id){
    if ( ! empty( $_POST['shipping_phone'] ) ) {
        update_post_meta( $order_id, 'shipping_phone', sanitize_text_field( $_POST['shipping_phone'] ) );
    }
} );

add_action( 'woocommerce_admin_order_data_after_shipping_address', function($order){

    if($shipping_phone = get_post_meta( $order->get_id(), 'shipping_phone', true )){
        ?>

        <p style="clear: both;">
            <strong>
                <?php esc_html_e('Shipping phone','prontolight'); ?>
            </strong>
            <?php echo esc_html($shipping_phone); ?>
        </p>

        <?php
    }
}, 10, 1 );

add_action( 'woocommerce_checkout_update_order_meta', function($order_id){
    if ( ! empty( $_POST['privacy'] ) ) {
        update_post_meta( $order_id, 'accept_privacy', sanitize_text_field( $_POST['privacy'] ) );
    }
} );

add_action('woocommerce_admin_order_data_after_order_details', function ($order){
    $accept_privacy = get_post_meta($order->get_id(), 'accept_privacy', true);

    ?>

    <p style="clear: both; padding-top: 30px!important;">
        <strong>
            <?php esc_html_e('User read and accept the privacy policy','prontolight'); ?>:
        </strong>
        <?php echo $accept_privacy ? 'true': 'false'; ?>
    </p>

    <?php
});

// define the woocommerce_after_single_product_summary callback function

function add_custom_text_to_product($product_id) {
  global $product;
  $custom_text = get_post_meta($product->get_id(), 'texto', TRUE);

  echo $custom_text;
};
add_action( 'woocommerce_after_single_product_summary', 'add_custom_text_to_product', 10 );
