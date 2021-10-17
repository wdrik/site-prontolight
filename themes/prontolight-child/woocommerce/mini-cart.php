<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_mini_cart' ); ?>

<?php if ( ! WC()->cart->is_empty() ) : ?>

	<ul class="woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr( $args['list_class'] ); ?>">
		<?php
			do_action( 'woocommerce_before_mini_cart_contents' );

			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
					$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
					$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<li class="woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">

            <div class="mini-cart--item-top">
              <?php if ( empty( $product_permalink ) ) : ?>
                <?php echo $thumbnail . $product_name . '&nbsp;'; ?>
              <?php else : ?>
                <a href="<?php echo esc_url( $product_permalink ); ?>">
                  <?php echo $thumbnail . $product_name . '&nbsp;'; ?>
                </a>
              <?php endif; ?>

              <?php
                echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                  '<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">&times;</a>',
                  esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                  __( 'Remove this item', 'woocommerce' ),
                  esc_attr( $product_id ),
                  esc_attr( $cart_item_key ),
                  esc_attr( $_product->get_sku() )
                ), $cart_item_key );
              ?>

						  <?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>
            </div>

						<?php //echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>

            <div class="mini-cart--item-quantity">
              <div class="mini-cart--item-price">
                <?= $product_price; ?>
              </div>

              <div class="wrapper-product-counter wrapper-product-counter--minicart">
                <a data-tag-id="<?= $product_id; ?>" class="minicart-remove-item cursor-pointer">-</a>

                <input
                  type="number"
                  value="<?= $cart_item['quantity']; ?>"
                  class="<?= $product_id; ?> counter-input no-clicks"
                  min="1"
                  max="200"
                />

                <a data-tag-id="<?= $product_id; ?>" class="minicart-add-item cursor-pointer">+</a>
              </div>
            </div>
					</li>
					<?php
				}
			}

			do_action( 'woocommerce_mini_cart_contents' );
		?>
	</ul>

  <script>
    var baseURL = "https://prontolight.com";

    function handleUpdateMiniCard() {
      jQuery.ajax({
        type: "POST",
        data: {
          action: 'mode_theme_update_mini_cart',
        },
        url: baseURL + '/wp-admin/admin-ajax.php',
      }).then(function(data) {
        jQuery('.widget_shopping_cart_content').html(data);
      })
    }

    jQuery('.minicart-add-item').on('click', function(e) {
      e.preventDefault();

      let btn = jQuery(this);

      btn.css({ 'pointer-events': 'none' });

      // let productId = e.target.href.split('/').pop();
      let productId = e.target.getAttribute('data-tag-id');
      let currentQuantity  = jQuery('input.'+productId).val();

      if (jQuery('input.'+productId).val() >= 99) return;

      jQuery('input.'+productId).val(parseInt(jQuery('input.'+productId).val()) + 1);

      currentQuantity = parseInt(currentQuantity) + 1;

      let form = { productId, currentQuantity }

      jQuery.ajax({
        type: "POST",
        data: {
          action: 'handle_products_on_cart',
          form: form
        },
        url: baseURL + '/wp-admin/admin-ajax.php',
      }).then(function(data) {
        let response = JSON.parse(data);
        jQuery('.woocommerce-cart-tab__contents').text(response.count);
        jQuery('a.footer-cart-contents span.count').text(response.count);

        jQuery('.widget_shopping_cart_content').html(data);
      })

      setTimeout(function() {
        handleUpdateMiniCard();
        jQuery('.widget_shopping_cart_content').addClass('loading');

        setTimeout(function() {
          jQuery('.widget_shopping_cart_content').removeClass('loading');

          jQuery('.img-custom--overlay.this--white.'+productId).css({ 'opacity': '1', 'visibility': 'visible' });
          jQuery('.img-custom--overlay.this--orange.'+productId).css({ 'opacity': '0', 'visibility': 'hidden' });

          btn.css({ 'pointer-events': 'all' });
        }, 600);
      }, 1000);
    });

    jQuery('.minicart-remove-item').on('click', function(e) {
      e.preventDefault();

      let btn = jQuery(this);

      btn.css({ 'pointer-events': 'none' });

      // let productId = e.target.href.split('/').pop();
      let productId = e.target.getAttribute('data-tag-id');
      let currentQuantity  = jQuery('input.'+productId).val();

      if (jQuery('input.'+productId).val() <= 1) return;

      jQuery('input.'+productId).val(parseInt(jQuery('input.'+productId).val()) - 1);

      currentQuantity = parseInt(currentQuantity) - 1;

      let form = {
        productId,
        currentQuantity
      }

      jQuery.ajax({
        type: "POST",
        data: {
          action: 'handle_products_on_cart',
          form: form
        },
        url: baseURL + '/wp-admin/admin-ajax.php',
      }).then(function(data) {
        let response = JSON.parse(data);
        jQuery('.woocommerce-cart-tab__contents').text(response.count);
        jQuery('a.footer-cart-contents span.count').text(response.count);

        jQuery('.widget_shopping_cart_content').html(data);
      })

      setTimeout(function() {
        handleUpdateMiniCard();
        jQuery('.widget_shopping_cart_content').addClass('loading');

        setTimeout(function() {
          jQuery('.widget_shopping_cart_content').removeClass('loading');

          btn.css({ 'pointer-events': 'all' });
        }, 600);
      }, 1000);
    });

    jQuery('.remove.remove_from_cart_button').on('click', function(){
      var productId = jQuery(this).context.dataset.product_id;

      jQuery('.wrapper-product-counter.'+productId).addClass('not-show');
      jQuery('.counter-input.'+productId).val(1);
      jQuery('.button[data-product_id="'+productId+'"]').css({ 'display': 'flex' });

      jQuery('.img-custom--overlay.this--white.'+productId).css({ 'opacity': '0', 'visibility': 'hidden' });
    });

  </script>

	<p class="woocommerce-mini-cart__total total"><strong><?php _e( 'Subtotal', 'woocommerce' ); ?>:</strong> <?php echo WC()->cart->get_cart_subtotal(); ?></p>

	<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

	<p class="woocommerce-mini-cart__buttons buttons"><?php do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?></p>

<?php else : ?>

	<p class="woocommerce-mini-cart__empty-message"><?php _e( 'Nenhum produto no carrinho.', 'woocommerce' ); ?></p>

<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>
