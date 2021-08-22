<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

global $woocommerce;
$items_cart = $woocommerce->cart->get_cart();

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product ); // WPCS: XSS ok.

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

    <?php
      echo '
        <a data-tag-id="'.$product->id.'"
          class="button button--single add-itens-on-cart product_type_simple cursor-pointer"
          data-product_id="'.$product->id.'">
          Eu Quero
        </a>
      ';

      echo '
        <div class="wrapper-product-counter wrapper-product-counter--single not-show '.$product->id.'">
          <a data-tag-id="'.$product->id.'" class="remove-item ajax_add_to_cart cursor-pointer">-</a>';

          $qty = 1;

          foreach($items_cart as $item => $values) {
            $_product_id = (int) $values['data']->get_id();

            if ( $_product_id === $product->id ) {
              $qty = (int) $values['quantity'];
              echo
                "<script>
                  jQuery('.wrapper-product-counter.".$product->id."').removeClass('not-show');
                  jQuery('.button[data-product_id=".$product->id."]').css({ 'display': 'none' });
                </script>";

              break;
            } else {
              echo
                "<script>
                  jQuery('.wrapper-product-counter.".$product->id."').addClass('not-show');
                  jQuery('.button[data-product_id=".$product->id."]').css({ 'display': 'flex' });
                </script>";
            }
          }

      echo '
          <input type="number" value="'.$qty.'" class="'.$product->id.' counter-input">
          <a data-tag-id="'.$product->id.'" class="add-item cursor-pointer">+</a>
        </div>
      ';
    ?>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
<?php endif; ?>
