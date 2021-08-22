<?php
/**
 * Checkout coupon form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-coupon.php.
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

if ( ! wc_coupons_enabled() ) { // @codingStandardsIgnoreLine.
	return;
}

?>

<div id="coupon-popup" class="coupone-popup mfp-hide">
    <div class="form-coupon">
        <form class="checkout_coupon woocommerce-form-coupon"
              method="post"
              >

            <p class="form-coupon__title">
                <?php esc_html_e( 'If you have a coupon code, please apply it below.', 'woocommerce' ); ?>
            </p>

            <p class="form-coupon__row">
                <input type="text" name="coupon_code" class="form-coupon__field" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" id="coupon_code" value="" />
            </p>

            <p class="form-coupon__row">
                <button type="submit" class="form-coupon__button button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_html_e( 'Apply coupon', 'woocommerce' ); ?></button>
            </p>

            <div class="clear"></div>
        </form>
    </div>
</div>