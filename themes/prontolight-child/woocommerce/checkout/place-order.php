<div class="form-row place-order">
    <noscript>
        <?php esc_html_e( 'Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce' ); ?>
        <br/><button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="<?php esc_attr_e( 'Update totals', 'woocommerce' ); ?>"><?php esc_html_e( 'Update totals', 'woocommerce' ); ?></button>
    </noscript>

    <?php $order_button_text = apply_filters( 'woocommerce_order_button_text', __( 'Place order', 'woocommerce' ) );

    echo apply_filters( 'woocommerce_order_button_html', '<button type="submit" class="woocommerce-checkout-place-order-btn button alt"  data-placeorder-btn name="woocommerce_checkout_place_order" id="place_order" disabled value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '">' . esc_html( $order_button_text ) . '</button>' );  ?>

    <div class="place-order__checkout-valid">

        <div class="place-order__checkout-valid-text">
            <?php esc_html_e('All data is complete','prontolight'); ?>
        </div>
        <div class="place-order__checkout-valid-icon">
            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/smile-icon.png'); ?>" alt="<?php esc_html_e('Smile','prontolight'); ?>">
        </div>

    </div>

    <?php do_action( 'woocommerce_review_order_before_submit' ); ?>

    <?php do_action( 'woocommerce_review_order_after_submit' ); ?>

    <?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>
</div>

