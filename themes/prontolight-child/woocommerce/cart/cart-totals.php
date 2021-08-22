<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
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
 * @version     2.3.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>

  <h2><?php _e( 'Cart totals', 'woocommerce' ); ?></h2>

  <form class="" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
    <?php if ( wc_coupons_enabled() ) { ?>
      <div class="coupon">
        <input type="text"
          name="coupon_code"
          class="input-text"
          id="coupon_code"
          value=""
          placeholder="Insira aqui seu cupom"
        />

        <button type="submit"
          class="button"
          name="apply_coupon"
          value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>">
            <?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>
        </button>

        <?php do_action( 'woocommerce_cart_coupon' ); ?>
      </div>
    <?php } ?>

    <?php do_action( 'woocommerce_cart_actions' ); ?>

    <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
  </form>

  <form class="woocommerce-shipping-calculator" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
    <!-- <p><a href="#" class="shipping-calculator-button"><?php esc_html_e( 'Calculate shipping', 'woocommerce' ); ?></a></p> -->

    <section class="shipping-calculator-form">

      <p class="form-row form-row-wide" id="calc_shipping_country_field">
        <select name="calc_shipping_country" id="calc_shipping_country" class="country_to_state country_select" rel="calc_shipping_state">
          <option value=""><?php esc_html_e( 'Select a country&hellip;', 'woocommerce' ); ?></option>
          <?php
            foreach ( WC()->countries->get_shipping_countries() as $key => $value ) {
              echo '<option value="' . esc_attr( $key ) . '"' . selected( WC()->customer->get_shipping_country(), esc_attr( $key ), false ) . '>' . esc_html( $value ) . '</option>';
            }
          ?>
        </select>
      </p>

      <?php if ( apply_filters( 'woocommerce_shipping_calculator_enable_state', true ) ) : ?>

        <p class="form-row form-row-wide" id="calc_shipping_state_field">
          <?php
          $current_cc = WC()->customer->get_shipping_country();
          $current_r  = WC()->customer->get_shipping_state();
          $states     = WC()->countries->get_states( $current_cc );

          if ( is_array( $states ) && empty( $states ) ) {
            ?>
            <input type="hidden" name="calc_shipping_state" id="calc_shipping_state" placeholder="<?php esc_attr_e( 'State / County', 'woocommerce' ); ?>" />
            <?php
          } elseif ( is_array( $states ) ) {
            ?>
            <span>
              <select name="calc_shipping_state" class="state_select" id="calc_shipping_state" placeholder="<?php esc_attr_e( 'State / County', 'woocommerce' ); ?>">
                <option value=""><?php esc_html_e( 'Select a state&hellip;', 'woocommerce' ); ?></option>
                <?php
                foreach ( $states as $ckey => $cvalue ) {
                  echo '<option value="' . esc_attr( $ckey ) . '" ' . selected( $current_r, $ckey, false ) . '>' . esc_html( $cvalue ) . '</option>';
                }
                ?>
              </select>
            </span>
            <?php
          } else {
            ?>
            <input type="text" class="input-text" value="<?php echo esc_attr( $current_r ); ?>" placeholder="<?php esc_attr_e( 'State / County', 'woocommerce' ); ?>" name="calc_shipping_state" id="calc_shipping_state" />
            <?php
          }
          ?>
        </p>

      <?php endif; ?>

      <?php if ( apply_filters( 'woocommerce_shipping_calculator_enable_city', true ) ) : ?>

        <p class="form-row form-row-wide" id="calc_shipping_city_field">
          <input type="text" class="input-text" value="<?php echo esc_attr( WC()->customer->get_shipping_city() ); ?>" placeholder="<?php esc_attr_e( 'City', 'woocommerce' ); ?>" name="calc_shipping_city" id="calc_shipping_city" />
        </p>

      <?php endif; ?>

      <?php if ( apply_filters( 'woocommerce_shipping_calculator_enable_postcode', true ) ) : ?>

        <p class="form-row form-row-wide" id="calc_shipping_postcode_field">
          <input type="text" class="input-text" value="<?php echo esc_attr( WC()->customer->get_shipping_postcode() ); ?>" placeholder="<?php esc_attr_e( 'Postcode / ZIP', 'woocommerce' ); ?>" name="calc_shipping_postcode" id="calc_shipping_postcode" />
        </p>

      <?php endif; ?>

      <p><button type="submit" name="calc_shipping" value="1" class="button"><?php esc_html_e( 'Update totals', 'woocommerce' ); ?></button></p>

      <?php wp_nonce_field( 'woocommerce-shipping-calculator', 'woocommerce-shipping-calculator-nonce' ); ?>
    </section>
  </form>

	<table cellspacing="0" class="shop_table shop_table_responsive">
		<tr class="cart-subtotal">
			<th><?php _e( 'Subtotal', 'woocommerce' ); ?></th>
			<td data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>"><?php wc_cart_totals_subtotal_html(); ?></td>
    </tr>

		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
				<th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
				<td data-title="<?php echo esc_attr( wc_cart_totals_coupon_label( $coupon, false ) ); ?>"><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

			<?php wc_cart_totals_shipping_html(); ?>

			<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

		<?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>

			<tr class="shipping">
				<th><?php _e( 'Shipping', 'woocommerce' ); ?></th>
				<td data-title="<?php esc_attr_e( 'Shipping', 'woocommerce' ); ?>"><?php //woocommerce_shipping_calculator(); ?></td>
			</tr>

		<?php endif; ?>

		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<tr class="fee">
				<th><?php echo esc_html( $fee->name ); ?></th>
				<td data-title="<?php echo esc_attr( $fee->name ); ?>"><?php wc_cart_totals_fee_html( $fee ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) :
			$taxable_address = WC()->customer->get_taxable_address();
			$estimated_text  = WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping()
					? sprintf( ' <small>' . __( '(estimated for %s)', 'woocommerce' ) . '</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] )
					: '';

			if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
				<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
					<tr class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
						<th><?php echo esc_html( $tax->label ) . $estimated_text; ?></th>
						<td data-title="<?php echo esc_attr( $tax->label ); ?>"><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
					</tr>
				<?php endforeach; ?>
			<?php else : ?>
				<tr class="tax-total">
					<th><?php echo esc_html( WC()->countries->tax_or_vat() ) . $estimated_text; ?></th>
					<td data-title="<?php echo esc_attr( WC()->countries->tax_or_vat() ); ?>"><?php wc_cart_totals_taxes_total_html(); ?></td>
				</tr>
			<?php endif; ?>
		<?php endif; ?>

		<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

		<tr class="order-total">
			<th><?php _e( 'Total', 'woocommerce' ); ?></th>
			<td data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>"><?php wc_cart_totals_order_total_html(); ?></td>
    </tr>

    <?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>
  </table>

  <a href="<?php echo esc_url( wc_get_checkout_url() );?>" class="button cart-finish">
    <?php esc_html_e( 'Proceed to checkout', 'woocommerce' ); ?>

    <span class="cart-finish__totals">
      <?php wc_cart_totals_order_total_html(); ?>
    </span>
  </a>

</div>


<!-- <div class="wc-proceed-to-checkout">
  <?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
</div> -->

<?php do_action( 'woocommerce_after_cart_totals' ); ?>
