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


add_action( 'product_cat_add_form_fields', 'bbloomer_wp_editor_add', 10, 2 );
 
function bbloomer_wp_editor_add() {
    ?>
    <div class="form-field">
        <label for="seconddesc"><?php echo __( 'Second Description', 'woocommerce' ); ?></label>
       
      <?php
      $settings = array(
         'textarea_name' => 'seconddesc',
         'quicktags' => array( 'buttons' => 'em,strong,link' ),
         'tinymce' => array(
            'theme_advanced_buttons1' => 'bold,italic,strikethrough,separator,bullist,numlist,separator,blockquote,separator,justifyleft,justifycenter,justifyright,separator,link,unlink,separator,undo,redo,separator',
            'theme_advanced_buttons2' => '',
         ),
         'editor_css' => '<style>#wp-excerpt-editor-container .wp-editor-area{height:175px; width:100%;}</style>',
      );
 
      wp_editor( '', 'seconddesc', $settings );
      ?>
       
        <p class="description"><?php echo __( 'This is the description that goes BELOW products on the category page', 'woocommerce' ); ?></p>
    </div>
    <?php
}
 
// ---------------
// 2. Display field on "Edit product category" admin page
 
add_action( 'product_cat_edit_form_fields', 'bbloomer_wp_editor_edit', 10, 2 );
 
function bbloomer_wp_editor_edit( $term ) {
    $second_desc = htmlspecialchars_decode( get_woocommerce_term_meta( $term->term_id, 'seconddesc', true ) );
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="second-desc"><?php echo __( 'Second Description', 'woocommerce' ); ?></label></th>
        <td>
            <?php
          
         $settings = array(
            'textarea_name' => 'seconddesc',
            'quicktags' => array( 'buttons' => 'em,strong,link' ),
            'tinymce' => array(
               'theme_advanced_buttons1' => 'bold,italic,strikethrough,separator,bullist,numlist,separator,blockquote,separator,justifyleft,justifycenter,justifyright,separator,link,unlink,separator,undo,redo,separator',
               'theme_advanced_buttons2' => '',
            ),
            'editor_css' => '<style>#wp-excerpt-editor-container .wp-editor-area{height:175px; width:100%;}</style>',
         );
 
         wp_editor( $second_desc, 'seconddesc', $settings );
         ?>
       
            <p class="description"><?php echo __( 'This is the description that goes BELOW products on the category page', 'woocommerce' ); ?></p>
        </td>
    </tr>
    <?php
}
 
// ---------------
// 3. Save field @ admin page
 
add_action( 'edit_term', 'bbloomer_save_wp_editor', 10, 3 );
add_action( 'created_term', 'bbloomer_save_wp_editor', 10, 3 );
 
function bbloomer_save_wp_editor( $term_id, $tt_id = '', $taxonomy = '' ) {
   if ( isset( $_POST['seconddesc'] ) && 'product_cat' === $taxonomy ) {
      update_woocommerce_term_meta( $term_id, 'seconddesc', esc_attr( $_POST['seconddesc'] ) );
   }
}
 
// ---------------
// 4. Display field under products @ Product Category pages 
 
add_action( 'woocommerce_after_shop_loop', 'bbloomer_display_wp_editor_content', 5 );
 
function bbloomer_display_wp_editor_content() {
   if ( is_product_taxonomy() ) {
      $term = get_queried_object();
      if ( $term && ! empty( get_woocommerce_term_meta( $term->term_id, 'seconddesc', true ) ) ) {
         echo '<p class="term-description">' . wc_format_content( htmlspecialchars_decode( get_woocommerce_term_meta( $term->term_id, 'seconddesc', true ) ) ) . '</p>';
      }
   }
}