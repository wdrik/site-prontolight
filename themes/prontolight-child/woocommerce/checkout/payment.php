<?php
/**
 * Checkout Payment Section
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/payment.php.
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

if ( ! is_ajax() ) {
	do_action( 'woocommerce_review_order_before_payment' );
}
?>
<div id="payment" class="woocommerce-checkout-payment">
	<?php if ( WC()->cart->needs_payment() ) : ?>

        <?php if(! empty( $available_gateways )): ?>

        <div class="payment-methods" data-payments-tab>

            <ul class="payment-methods__header">
                <?php foreach ( $available_gateways as $gateway ): ?>
                    <?php
                    if($gateway->chosen){
                        define('PAYMENT_SELECTED', true);
                    }
                    ?>
                    <li class="payment-methods__header-item">
                        <input class="input-radio hidden"
                               id="payment_method_<?php echo $gateway->id; ?>"
                               type="radio"
                               name="payment_method"
                               <?php echo $gateway->chosen ? 'checked':''; ?>
                               value="<?php echo esc_attr( $gateway->id ); ?>"
                               data-order_button_text="<?php echo esc_attr( $gateway->order_button_text ); ?>"
                               data-payment-title="<?php echo $gateway->get_title(); ?>"
                        />
                        <label class="payment-methods__header-label"
                               for="payment_method_<?php echo $gateway->id; ?>">
                            <span class="payment-methods__header-icon">
                                <?php echo $gateway->get_icon(); ?>
                            </span>
                            <span class="payment-methods__header-title">
                                <?php echo $gateway->get_title(); ?>
                            </span>
                        </label>
                    </li>
                <?php endforeach; ?>
            </ul>

            <?php foreach ( $available_gateways as $gateway ): ?>

                <?php if ( $gateway->has_fields() || $gateway->get_description() ) : ?>
                    <div class="payment_box payment_method_<?php echo $gateway->id; ?> <?php echo $gateway->chosen ? '':'hidden'; ?>">

                        <?php $gateway->payment_fields(); ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

        <?php else: ?>
            <?php echo '<li class="woocommerce-notice woocommerce-notice--info woocommerce-info">' . apply_filters( 'woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? esc_html__( 'Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' ) : esc_html__( 'Please fill in your details above to see available payment methods.', 'woocommerce' ) ) . '</li>'; // @codingStandardsIgnoreLine ?>
        <?php endif; ?>

		</div>
	<?php endif; ?>
</div>
<?php
if ( ! is_ajax() ) {
	do_action( 'woocommerce_review_order_after_payment' );
}
