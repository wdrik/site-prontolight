<?php


/*
* Get CEP auto
*/
function get_current_user_cep() {
    $user = wp_get_current_user();

    if( (int)$user->ID !== 0 ) {
        $cep = get_user_meta( $user->ID, "billing_postcode" );
        echo $cep[0];

        exit;
    } else {
        return false;
    }
}
add_action( 'wp_ajax_get_current_user_cep', 'get_current_user_cep' );
add_action( 'wp_ajax_nopriv_get_current_user_cep', 'get_current_user_cep' );


function handle_products_on_cart() {
    $product_id = (int) $_POST['form']['productId'];
    $qty = (int) $_POST['form']['currentQuantity'];

    global $woocommerce;
    $items = $woocommerce->cart->get_cart();

    foreach($items as $item => $values) {
        $_product_id    = (int) $values['data']->get_id();

        if ( $_product_id === $product_id ) {
            $woocommerce->cart->set_quantity( $item, $qty, true );

            $response =  array(
                "item" => $item,
                "count" => WC()->cart->get_cart_contents_count()
            );

            echo json_encode( $response ); exit; break;
        }
    }

    if(WC()->cart->add_to_cart( $product_id, $qty )) {
        $response =  array("count" => WC()->cart->get_cart_contents_count());

        echo json_encode( $response ); exit;
    }

    $response = array( "result" => false );
    echo json_encode( $response ); exit;
}
add_action( 'wp_ajax_handle_products_on_cart', 'handle_products_on_cart' );
add_action( 'wp_ajax_nopriv_handle_products_on_cart', 'handle_products_on_cart' );