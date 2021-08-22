<?php

add_filter( 'woocommerce_product_tabs', function ( $tabs ) {

    unset( $tabs['additional_information'] );        // Remove the description tab

    return $tabs;

}, 98 );


/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', function ( $cols ) {
    $cols = 84;
    return $cols;
});

function mode_theme_update_mini_cart() {
    echo wc_get_template( 'cart/mini-cart.php' );
    die();
}
add_filter( 'wp_ajax_nopriv_mode_theme_update_mini_cart', 'mode_theme_update_mini_cart' );
add_filter( 'wp_ajax_mode_theme_update_mini_cart', 'mode_theme_update_mini_cart' );

//--> remove Order Notes from checkout field in Woocommerce
add_filter( 'woocommerce_checkout_fields' , 'alter_woocommerce_checkout_fields' );
function alter_woocommerce_checkout_fields( $fields ) {
    unset($fields['order']['order_comments']);
    return $fields;
}

add_filter('woocommerce_get_checkout_url', function($url){

    $pageId = prontolight_get_checkout_login_page_id();

    if(!is_user_logged_in() && $pageId){
        $url = get_the_permalink($pageId);
        return $url;
    }

    return $url;
});


add_filter('woocommerce_checkout_fields', function($fields){

    unset($fields['shipping']['shipping_company']);
    unset($fields['shipping']['shipping_country']);

    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_birthdate']);
    unset($fields['billing']['billing_sex']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_cellphone']);

    return $fields;

});

add_filter( 'woocommerce_package_rates', function ( $available_methods ) {
    if ( ! empty( $available_methods ) ) {
        uasort( $available_methods, function ( WC_Shipping_Rate $method1, WC_Shipping_Rate $method2 ) {
            return $method1->get_cost() > $method2->get_cost();
        } );
        $availableMethodsIterator = new ArrayIterator( $available_methods );
        $methods[ $availableMethodsIterator->key() ] = $availableMethodsIterator->current();
        $availableMethodsIterator->next();
        while ( $availableMethodsIterator->valid() ) {
            if ( $availableMethodsIterator->current()->get_cost() <= array_values( $methods )[0]->get_cost() ) {
                $methods[ $availableMethodsIterator->key() ] = $availableMethodsIterator->current();
                $availableMethodsIterator->next();
                continue;
            }
            break;
        }
        return $methods;
    }
    return $available_methods;
}, 10, 2 );


add_filter('woocommerce_cart_shipping_method_full_label', function ($label, $method){

    if($method->cost > 0){
        $label = '';
    } else {
        $label = $method->get_label();
    }

    if ( $method->cost >= 0 && $method->get_method_id() !== 'free_shipping' ) {
        if ( WC()->cart->display_prices_including_tax() ) {
            $label .= wc_price( $method->cost + $method->get_shipping_tax() );
            if ( $method->get_shipping_tax() > 0 && ! wc_prices_include_tax() ) {
                $label .= ' <small class="tax_label">' . WC()->countries->inc_tax_or_vat() . '</small>';
            }
        } else {
            $label .= wc_price( $method->cost );
            if ( $method->get_shipping_tax() > 0 && wc_prices_include_tax() ) {
                $label .= ' <small class="tax_label">' . WC()->countries->ex_tax_or_vat() . '</small>';
            }
        }
    }

    return $label;
}, 10, 2);