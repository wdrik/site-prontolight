<?php

function prontolight_get_checkout_login_page_id(){
    $page = get_page_by_title('Checkout login');

    if($page){
         return $page->ID;
    }

    return false;

}

function prontolight_get_checkout_url(){
    return get_the_permalink(wc_get_page_id('checkout'));
}

function prontolight_checkout_field($args){
    ?>
    <label class="checkout-form__field <?php echo isset($args['mod']) ? $args['mod']:''; ?>" data-checkout-field-scope>
        <span class="checkout-form__field-title">
            <?php echo esc_html($args['label']); ?>
        </span>
        <input class="checkout-form__field-input"
               data-checkout-field-control
               type="<?php echo esc_attr($args['type']); ?>"
               placeholder="<?php echo esc_attr($args['placeholder']); ?>"
               name="<?php echo esc_attr($args['name']); ?>"
               value="<?php echo esc_attr($args['value']); ?>"

               <?php if($args['inputmode']): ?>
                   inputmode="<?php echo esc_attr($args['inputmode']); ?>"
               <?php endif;?>

               <?php echo !empty($args['id']) ? "id='$args[id]'" :''; ?>
        >
    </label>
    <?php
}

function prontolight_render_print_order($order){

    $codboleto = 'ipag-gateway_boleto';
    $order_id = is_callable(array($order, 'get_id')) ? $order->get_id() : $order->id;
    $method = is_callable(array($order, 'get_payment_method')) ? $order->get_payment_method() : $order->payment_method;
    $status = $order->get_status();
    if ('on-hold' === $status && $method == $codboleto) {
        $url = get_post_meta($order_id, '_billet_url', true);
        ?>

        <div class="thankyou-page__btn-row">
            <a class="thankyou-page__btn-primary"
               href="<?php echo esc_url($url); ?>">
                <?php esc_html_e('Imprimir Boleto'); ?>
            </a>
        </div>
        <?php
    }
}

/**
 * Get a shipping methods full label including price.
 *
 * @param  WC_Shipping_Rate $method Shipping method rate data.
 * @return string
 */
function prontolight_cart_totals_shipping_method_label( $method ) {
    $label = $method->get_label();

    if ( $method->cost >= 0 && $method->get_method_id() !== 'free_shipping' ) {
        if ( WC()->cart->display_prices_including_tax() ) {
            $label .= ': ' . wc_price( $method->cost + $method->get_shipping_tax() );
            if ( $method->get_shipping_tax() > 0 && ! wc_prices_include_tax() ) {
                $label .= ' <small class="tax_label">' . WC()->countries->inc_tax_or_vat() . '</small>';
            }
        } else {
            $label .= ': ' . wc_price( $method->cost );
            if ( $method->get_shipping_tax() > 0 && wc_prices_include_tax() ) {
                $label .= ' <small class="tax_label">' . WC()->countries->ex_tax_or_vat() . '</small>';
            }
        }
    }

    return apply_filters( 'woocommerce_cart_shipping_method_full_label', $label, $method );
}