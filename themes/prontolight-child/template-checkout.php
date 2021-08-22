<?php

/**
 * Template name: Woocommerce checkout
 */
get_header('checkout');

if (have_posts()){
    the_post();

    the_content();
}

get_footer();
