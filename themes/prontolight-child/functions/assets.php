<?php

add_action('wp_enqueue_scripts', function(){

    wp_enqueue_script('owl-carousel-script', get_stylesheet_directory_uri() . '/assets/js/vendor/owl.carousel.min.js', array(), '1.0.0', true);

    wp_enqueue_script('magnific-popup', get_stylesheet_directory_uri() . '/assets/js/vendor/jquery.magnific-popup.min.js', array(), '1.0.0', true);

    wp_enqueue_style('magnific-popup', get_stylesheet_directory_uri() . '/assets/css/vendor/magnific-popup.css');

    wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/assets/js/custom.js', array(), '1.0.0', true);

    wp_enqueue_script('custom-script-child', get_stylesheet_directory_uri() . '/assets/js/custom-child.js', array(), '1.0.0', true);

    wp_register_script('socauth', get_stylesheet_directory_uri() . '/assets/js/socauth.js', array(), '1.0.0', true);

    if(is_checkout()){
        wp_enqueue_script('sticky-kit', get_stylesheet_directory_uri() . '/assets/js/vendor/jquery.sticky-kit.min.js', array('jquery'), '1.0.0', true);

        wp_enqueue_script('inputmask', get_stylesheet_directory_uri() . '/assets/js/vendor/inputmask.js', array(), '1.0.0', true);
        wp_localize_script('inputmask', 'inputmaskConfig', array(
            'zipMask' => '99999-999',
            'cpfMask' => '999.999.999-99',
            'phoneMask' => '(99) 9999-9999[9]',
            'shippingPhoneMask' => '(99) 9999-99999',
        ));

        // Override woocommerce script checkout.js
        wp_deregister_script('wc-checkout');
        wp_enqueue_script('wc-checkout', get_stylesheet_directory_uri() . '/assets/js/woocommerce-checkout.js', array( 'jquery', 'woocommerce', 'wc-country-select', 'wc-address-i18n' ), WC_VERSION, true);

        wp_enqueue_script('checkout-validation', get_stylesheet_directory_uri() . '/assets/js/checkout-validation.js', array('inputmask'), '1.0.0', true);
        wp_enqueue_script('delivery-points', get_stylesheet_directory_uri() . '/assets/js/delivery-points.js', array('inputmask'), '1.0.0', true);

        wp_enqueue_script('checkout-script', get_stylesheet_directory_uri() . '/assets/js/checkout.js', array('jquery', 'sticky-kit'), '1.0.0', true);
    }

});