<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="cart-summary woocommerce-checkout-review-order-table">

    <div class="cart-summary__header">
        <?php esc_html_e( 'Summary', 'prontolight' ); ?>
    </div>

    <!-- Products -->
    <?php do_action( 'woocommerce_review_order_before_cart_contents' ); ?>

    <div class="cart-summary__items <?php echo count(WC()->cart->get_cart()) > 3 ? 'cart-summary__items--scroll':''; ?>">

        <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ):?>

            <?php $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key ); ?>
            <?php if($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ): ?>

                <?php
                $product_name = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);
                $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                $thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                ?>

                <div class="cart-summary__item">
                    <div class="cart-product">
                        <div class="cart-product__row">
                            <div class="cart-product__aside">
                                <div class="product-photo">
                                    <a class="product-photo__item product-photo__item--xs" href="<?php echo esc_url($product_permalink); ?>">
                                        <?php echo $thumbnail; ?>
                                    </a>
                                </div>
                            </div>
                            <div class="cart-product__main">
                                <?php do_action('premmerce_cart_product_info_start', $product); ?>

                                <div class="cart-product__title">
                                    <a class="cart-product__link" href="<?php echo esc_url($product_permalink); ?>">
                                        <?php echo wp_kses_post($product_name); ?>
                                    </a>
                                </div>

                                <?php do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key ); ?>

                                <div class="cart-product__footer">
                                    <div class="cart-product__price">
                                        <?php echo WC()->cart->get_product_subtotal($_product, $cart_item['quantity']); ?>
                                    </div>
                                    <div class="cart-product__qty">
                                        <div class="cart-product__qty-prop">
                                            <?php esc_html_e( 'Qtd.', 'prontolight' ); ?>:
                                        </div>
                                        <div class="cart-product__qty-val">
                                            x<?php echo wp_kses_post(apply_filters('woocommerce_widget_cart_item_quantity', $cart_item['quantity'], $cart_item, $cart_item_key)); ?>
                                        </div>
                                    </div>
                                </div>

                                <?php do_action('premmerce_cart_product_info_end', $product); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <div class="cart-summary__footer">
        <?php do_action( 'woocommerce_review_order_after_cart_contents' ); ?>

        <!-- cart summary subtotal -->
        <div class="cart-summary__subtotal cart-totals">

            <div class="cart-totals__list">

                <!-- Subtotal -->
                <div class="cart-totals__item">
                    <div class="cart-totals__label">
                        <?php esc_html_e( 'Subtotal', 'prontolight' ); ?>
                    </div>
                    <div class="cart-totals__value cart-price cart-price__main cart-price__main--small">
                        <?php wc_cart_totals_subtotal_html(); ?>
                    </div>
                </div>

                <!-- coupons -->
                <?php $coupons = WC()->cart->get_coupons() ?>
                <?php if (count($coupons) > 0): ?>
                        <?php foreach ( $coupons as $code => $coupon ) : ?>
                            <div class="cart-totals__item cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
                                <div class="cart-totals__label"><?php wc_cart_totals_coupon_label( $coupon ); ?></div>
                                <div class="cart-totals__value"><?php wc_cart_totals_coupon_html( $coupon ); ?></div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>

                    <div class="cart-totals__item">
                        <div class="cart-totals__label">
                            <?php _e( 'Have a coupon?', 'woocommerce' ); ?>
                        </div>
                        <div class="cart-totals__value">
                            <a href="#" data-mfp-src="#coupon-popup" class="open-popup-link">
                                Clique aqui e informe o seu voucher.
                            </a>
                        </div>
                    </div>

                <?php endif; ?>

                <!-- fees -->
                <?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
                    <div class="cart-totals__item fee">
                        <div class="cart-totals__label"><?php echo esc_html( $fee->name ); ?></div>
                        <div class="cart-totals__value"><?php wc_cart_totals_fee_html( $fee ); ?></div>
                    </div>
                <?php endforeach; ?>
                <!-- tax -->
                <?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
                    <?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
                        <?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
                            <div class="cart-totals__item tax-rate-<?php echo esc_attr(sanitize_title( $code )); ?>">
                                <div class="cart-totals__label"><?php echo esc_html( $tax->label ); ?></div>
                                <div class="cart-totals__value"><?php echo wp_kses_post( $tax->formatted_amount ); ?></div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="cart-totals__item">
                            <div class="cart-totals__label"><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></div>
                            <div class="cart-totals__value"><?php wc_cart_totals_taxes_total_html(); ?></div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div><!-- ./cart-totals__list -->

            <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
                <table class="wc_cart_totals_shipping_html">
                    <?php wc_cart_totals_shipping_html(); ?>
                </table>
            <?php endif; ?>

        </div><!-- ./cart summary subtotal -->

        <?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

        <!-- Order total -->
        <div class="cart-summary__total-price cart-summary__total-price--order">
            <div class="cart-summary__total-label">
                <?php esc_html_e( 'Total', 'prontolight' ); ?>
            </div>
            <div class="cart-summary__total-value">
                <div class="cart-price">
                    <div class="cart-price__main cart-price__main--lg">
                        <?php wc_cart_totals_order_total_html(); ?>
                    </div>
                </div>
            </div>
        </div>

        <?php do_action( 'woocommerce_review_order_after_order_total' ); ?>
    </div>
</div>
