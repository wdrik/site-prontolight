<?php

/**
 *
 */
load_theme_textdomain( 'prontolight', get_stylesheet_directory() . '/languages' );

$theme_functions_dir = get_stylesheet_directory() . "/functions/";

require $theme_functions_dir . "helpers.php";
require $theme_functions_dir . "assets.php";
require $theme_functions_dir . "ajax.php";
require $theme_functions_dir . "filters.php";
require $theme_functions_dir . "hooks.php";
require $theme_functions_dir . "user-shipping-adresses.php";


/*
* Adiciona kits com produto pertencente - Kits pertencentes
*/
function share_products_on_kits() {
    $product_id = $_GET['post'];
    $action     = $_GET['action'];

    if ( (string) $action === 'edit' ) {
        $args = array(
            'post_type' 	  => 'product',
            'posts_per_page'  => -1,
            'orderby' 		  => 'meta_value_num',
            'order'			  => 'asc',
            'meta_key'		  => 'total_sales'
        );

        $loop = new WP_Query($args);

        $all_kits = [];
        $response = '';

        while($loop->have_posts()) {
			$loop->the_post();
            global $product;

            if ($product->get_type() === 'menu_product') {

                $days = get_field('field_5b10f177525ce', $product->id);

                foreach ($days['days'] as &$day) {
                    foreach ($day['breakfast'] as &$breakfast) {
                      if ( (int)$product_id === (int)$breakfast) {
                        array_push($all_kits, '<a href="https://prontolight.com/wp-admin/post.php?post='.$product->id.'&action=edit" target="_blank">'.$product->name.'</a>');
                      }
                    }

                    foreach ($day['brunch'] as &$brunch) {
                      if ( (int)$product_id === (int)$brunch) {
                        array_push($all_kits, '<a href="https://prontolight.com/wp-admin/post.php?post='.$product->id.'&action=edit" target="_blank">'.$product->name.'</a>');
                      }
                    }

                    foreach ($day['lunch'] as &$lunch) {
                      if ( (int)$product_id === (int)$lunch) {
                        array_push($all_kits, '<a href="https://prontolight.com/wp-admin/post.php?post='.$product->id.'&action=edit" target="_blank">'.$product->name.'</a>');
                      }
                    }

                    foreach ($day['snack_dinner'] as &$snack_dinner) {
                      if ( (int)$product_id === (int)$snack_dinner) {
                        array_push($all_kits, '<a href="https://prontolight.com/wp-admin/post.php?post='.$product->id.'&action=edit" target="_blank">'.$product->name.'</a>');
                      }
                    }

                    foreach ($day['dinner'] as &$dinner) {
                      if ( (int)$product_id === (int)$dinner) {
                        array_push($all_kits, '<a href="https://prontolight.com/wp-admin/post.php?post='.$product->id.'&action=edit" target="_blank">'.$product->name.'</a>');
                      }
                    }

                    foreach ($day['supper'] as &$supper) {
                      if ( (int)$product_id === (int)$supper) {
                        array_push($all_kits, '<a href="https://prontolight.com/wp-admin/post.php?post='.$product->id.'&action=edit" target="_blank">'.$product->name.'</a>');
                      }
                    }
                }
            }
        }

        $all_data = array_unique($all_kits, SORT_STRING);

        foreach ($all_data as &$data) {
            $response .= $data.' <br> ';
        }

        update_field( 'field_5bbf8e02bc167', $response, (int)$product_id );
        update_field( 'kits_pertencentes', $response, (int)$product_id );
    }
}

//add_action( 'admin_init', 'share_products_on_kits' );

/* on click btn clear cart */
add_action('init', 'woocommerce_clear_cart_url');
function woocommerce_clear_cart_url() {
  global $woocommerce;
  if( isset($_REQUEST['clear-cart']) ) {
      $woocommerce->cart->empty_cart();
  }
}


// --> On Update POST
function on_product_updated($post_ID, $post_type) {
  update_field('field_5ca6ae6846444', 0, $post_ID);
}

add_action( 'save_post', 'on_product_updated', 10, 3 );
add_action( 'post_updated', 'on_product_updated', 10, 3 );

function gens_raf_change_status( $status ) {
  $status = "processing";
  return $status;
}
add_filter('wpgens_raf_order_status', 'gens_raf_change_status');

function custom_address_formats( $formats ) {
  $formats[ 'default' ]  = "{name}\n{address_1}, {number},\n {address_2}\n{neighborhood}\n{city} \n {state}\n{postcode}";
  return $formats;
}
add_filter('woocommerce_localisation_address_formats', 'custom_address_formats');


