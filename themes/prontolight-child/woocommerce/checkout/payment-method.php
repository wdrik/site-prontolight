<?php
/**
 * Output a single payment method
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/payment-method.php.
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
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<li class="wc_payment_method payment_method_<?php echo $gateway->id; ?>">
	<input id="payment_method_<?php echo $gateway->id; ?>" type="radio" class="input-radio" name="payment_method" value="<?php echo esc_attr( $gateway->id ); ?>" <?php checked( $gateway->chosen, true ); ?> data-order_button_text="<?php echo esc_attr( $gateway->order_button_text ); ?>" />

  <?php if($gateway->id != 'cod'):  ?>
    <label for="payment_method_<?php echo $gateway->id; ?>">
      <?php echo $gateway->get_title(); ?> <?php echo $gateway->get_icon(); ?>
    </label>
  <?php endif; ?>

  <?php if($gateway->id === 'cod'):  ?>
    <label for="payment_method_<?php echo $gateway->id; ?>">
      <div class="order-payment-after"><?php echo $gateway->get_title(); ?></div>

      <div class="order-payment-img">
        <img src="https://prontolight.com/wp-content/uploads/2018/10/vr-logo.png" style="width: 32px;height: 32px;max-height: 100%">
        <img src="https://prontolight.com/wp-content/uploads/2018/10/alelo-logo.png" style="width: 50px;height: 32px;max-height: 100%">
        <img src="https://prontolight.com/wp-content/uploads/2018/10/sodexo-logo.png" style="width: 50px;height: 28px;max-height: 100%;margin-top: -2px">
        <img src="https://prontolight.com/wp-content/uploads/2018/11/ticket-logo-new.png" style="width: 70px;height: 23px;max-height: 100%;margin-top: 2px">
      </div>
    </label>
  <?php endif; ?>

	<?php if ( $gateway->has_fields() || $gateway->get_description() ) : ?>
		<div class="payment_box payment_method_<?php echo $gateway->id; ?>" <?php if ( ! $gateway->chosen ) : ?>style="display:none;"<?php endif; ?>>
			<?php $gateway->payment_fields(); ?>
		</div>
	<?php endif; ?>
</li>
