<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
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
 * @version     3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>



<div class="woocommerce-order">


	<?php if ( $order ) : ?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

		  <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed">Infelizmente o seu pedido não pode ser processado, seu banco (ou operadora) não aprovou seu pagamento. Entre em contato com nosso suporte pelo WhatsApp ou Chat. Vamos te ajudar :)
            </p>

		<?php else : ?>

            <div class="thankyou-page">
                <div class="thankyou-page__container">

                    <div class="thankyou-page__row-thankyou" data-thankyou-preview>
                        <div class="thankyou-page__details-promo">

                            <div class="thankyou-page__section-heading">
                               Informações sobre métodos de pagamentos:
                            </div>


                            <div class="thankyou-page__order-status">
                                <strong>Cartão de crédito:</strong> Estamos processando a transação. Você receberá um e-mail com a confirmação do pagamento.
                            </div>

                            <div class="thankyou-page__purchase-successful">
                                <strong> Boleto:</strong>  Assim que o pagamento for confirmado, você receberá um e-mail para agendar a sua entrega.
                            </div>

                            <div class="thankyou-page__purchase-successful">
                                <strong>Pagamento na Entrega:</strong> Nosso portador levará a maquininha no momento da entrega.
                            </div>


                             <div class="thankyou-page__purchase-successful">
                                <strong>Vale Alimentação / Refeição:</strong> Estamos processando a transação. Você receberá um e-mail com a confirmação do pagamento.
                            </div>

                             <div class="thankyou-page__purchase-successful-description">
                                <strong>PicPay:</strong> Estamos processando a transação. Você receberá um e-mail com a confirmação do pagamento.
                            </div>

                            <?php prontolight_render_print_order($order); ?>

                            <?php //do_action( 'woocommerce_order_details_after_order_table', $order ); ?>

                            <div class="thankyou-page__btn-row">
                                <a class="thankyou-page__btn-primary"
                                   href="<?php echo esc_url(home_url()); ?>">
                                    <?php esc_html_e('Back to site','prontolight'); ?>
                                </a>
                            </div>



  <?php $subtotal = (float)$order->total - (float)$order->shipping_total;




   ?>




  <div class="facecompra">
<script>
fbq('track', 'Purchase', {
currency: 'BRL',
value: '<?= (float)$subtotal; ?>'

});
</script>

</div>



  <!-- Pixel Integration ClickWise -->
    <img
      src='https://r.clickwise.net/t/82418722/sale/<?= $order->id ?>?total-cost=<?= (float)$subtotal; ?>&currency=BRL'
      width='1'
      height='1'
    />

  <!--    <img
      src='https://my.pampanetwork.com/scripts/sale.php?TotalCost=<?= (float)$subtotal; ?>&AccountId=d0efaddf&OrderID=<?= $order->id ?>&ActionCode=sale&CampaignID=82418722&Currency=BRL'
      width='1'
      height='1'
    />
 End Pixel Integration ClickWise -->

                        </div>
                        <div class="thankyou-page__short-details">
                            <div class="thankyou-page__section-heading">
                                <?php esc_html_e('Purchase details','prontolight'); ?>
                            </div>

                            <?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>

                            <?php
                              $items = $order->get_items();

                              foreach ( $items as $item ) {
                                $product_id = $item->get_product_id();

                                if ( has_term( array('Pronto Shop'), 'product_cat', $product_id ) ) {
                                  update_post_meta( $order->get_id(), 'flag_pronto_express', true );

                                  break;
                                }
                              }
                            ?>

                            <?php //do_action( 'woocommerce_thankyou', $order->get_id() ); ?>


                            <div class="thankyou-page__order-details-short">
                                <div class="order-details">
                                    <div class="order-details__section">
                                        <div class="order-details__row">
                                            <div class="order-details__col">
                                                <div class="order-details__title">
                                                    <?php esc_html_e('Payment method','prontolight'); ?>
                                                </div>
                                                <div class="order-details__value">
                                                    <?php echo wp_kses_post( $order->get_payment_method_title() ); ?>
                                                </div>
                                            </div>

                                            <div class="order-details__col">
                                                <div class="order-details__title">
                                                    <?php esc_html_e('Order number','prontolight'); ?>
                                                </div>
                                                <div class="order-details__value">
                                                    <?php echo esc_html($order->get_order_number()); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-details__section">
                                        <div class="order-details__row">
                                            <?php if(!empty($order->get_address()['address_1'])): ?>
                                                <div class="order-details__col">
                                                    <div class="order-details__title">
                                                        <?php esc_html_e('Address','prontolight'); ?>
                                                    </div>
                                                    <div class="order-details__value">
                                                        <?php echo $order->get_address()['address_1'] ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <?php if($deliveryDate = get_post_meta($order->get_id(),'Data de entrega', true) ): ?>
                                                <div class="order-details__col">
                                                    <div class="order-details__title">
                                                        <?php esc_html_e('Delivery date','prontolight'); ?>
                                                    </div>
                                                    <div class="order-details__value">
                                                        <?php echo $deliveryDate; ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="order-details__section">
                                        <div class="order-details__row order-details__row--middle">
                                            <div class="order-details__col order-details__total-label">
                                                <?php esc_html_e('Total','prontolight'); ?>
                                            </div>
                                            <div class="order-details__col order-details__total-price">
                                                <?php echo $order->get_formatted_order_total(); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <button class="thankyou-page__btn-white" data-thankyou-toggle>
                                <?php esc_html_e('Show full details','prontolight'); ?>
                            </button>


                        </div>
                    </div>

                    <div class="thankyou-page__row-order-details" data-thankyou-full style="display: none;">
                        <div class="thankyou-page__details-full">
                            <div class="thankyou-page__section-heading">
                                <?php esc_html_e('Purchase details','prontolight'); ?>
                            </div>

                            <div class="thankyou-page__order-details-full">
                                <div class="order-details">
                                    <div class="order-details__section">
                                        <div class="order-details__row">
                                            <div class="order-details__col">
                                                <div class="order-details__title">
                                                    <?php esc_html_e('Payment method','prontolight'); ?>
                                                </div>
                                                <div class="order-details__value">
                                                    <?php echo wp_kses_post( $order->get_payment_method_title() ); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-details__section">
                                        <div class="order-details__row">
                                            <div class="order-details__col">
                                                <div class="order-details__title">
                                                    <?php esc_html_e('Order number','prontolight'); ?>
                                                </div>
                                                <div class="order-details__value">
                                                    <?php echo esc_html($order->get_order_number()); ?>
                                                </div>
                                            </div>
                                            <div class="order-details__col">
                                                <div class="order-details__title">
                                                    <?php esc_html_e('Purchase date','prontolight'); ?>
                                                </div>
                                                <div class="order-details__value">
                                                    <?php echo esc_html(wc_format_datetime( $order->get_date_created())); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-details__section">
                                        <div class="order-details__row">
                                            <?php if($deliveryDate = get_post_meta($order->get_id(),'Data de entrega', true) ): ?>
                                                <div class="order-details__col">
                                                    <div class="order-details__title">
                                                        <?php esc_html_e('Delivery date','prontolight'); ?>
                                                    </div>
                                                    <div class="order-details__value">
                                                        <?php echo $deliveryDate; ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <?php if($deliveryPeriod = get_post_meta($order->get_id(),'Horário', true) ): ?>
                                                <div class="order-details__col">
                                                    <div class="order-details__title">
                                                        <?php esc_html_e('Delivery period','prontolight'); ?>
                                                    </div>
                                                    <div class="order-details__value">
                                                        <?php echo $deliveryPeriod; ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="order-details__section">
                                        <div class="order-details__row">
                                            <?php if(!empty($order->get_address()['address_1'])): ?>
                                            <div class="order-details__col">
                                                <div class="order-details__title">
                                                    <?php esc_html_e('Address','prontolight'); ?>
                                                </div>
                                                <div class="order-details__value">
                                                    <?php echo !empty($order->get_address()['city']) ? $order->get_address()['city'] : ''; ?>,
                                                    <?php echo $order->get_address()['address_1'] ?>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="order-details__section">

                                        <?php foreach ($order->get_order_item_totals() as $key => $total) : ?>
                                            <?php if ($key != 'order_total' && $key != 'payment_method') : ?>
                                                <div class="order-details__row">
                                                    <div class="order-details__col order-details__subtotal">
                                                        <?php echo $total['label']; ?>
                                                    </div>
                                                    <div class="order-details__col order-details__subtotal order-details__subtotal--val">
                                                        <?php echo $total['value']; ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                    </div>

                                    <div class="order-details__section">
                                        <div class="order-details__row order-details__row--middle">
                                            <div class="order-details__col order-details__total-label">
                                                <?php esc_html_e('Total','prontolight'); ?>
                                            </div>
                                            <div class="order-details__col order-details__total-price">
                                                <?php echo $order->get_formatted_order_total(); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php prontolight_render_print_order($order); ?>

                            <?php //do_action( 'woocommerce_order_details_after_order_table', $order ); ?>

                            <div class="thankyou-page__btn-row">
                                <a class="thankyou-page__btn-primary"
                                   href="<?php echo esc_url(home_url()); ?>">
                                    <?php esc_html_e('Back to site','prontolight'); ?>
                                </a>
                            </div>

                        </div>
                        <div class="thankyou-page__cart-summary">
                            <div class="cart-summary">
                                <div class="cart-summary__header">
                                    <?php esc_html_e( 'Order items', 'prontolight' ); ?>
                                </div>
                                <div class="cart-summary__items">
                                    <?php $order_items = $order->get_items( apply_filters( 'woocommerce_purchase_order_item_types', 'line_item' ) ); ?>
                                    <?php foreach ( $order_items as $item_id => $item ) : ?>
                                        <?php $product = $item->get_product(); ?>
                                        <?php $thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $product->get_image(), $item, $item_id ); ?>
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

                                                        <div class="cart-product__title">
                                                            <?php $is_visible        = $product && $product->is_visible();
                                                            $product_permalink = apply_filters( 'woocommerce_order_item_permalink', $is_visible ? $product->get_permalink( $item ) : '', $item, $order );
                                                            echo wp_kses_post(apply_filters( 'woocommerce_order_item_name', $product_permalink ? sprintf( '<a class="cart-product__link" href="%s">%s</a>', $product_permalink, $item->get_name() ) : $item->get_name(), $item, $is_visible )); ?>
                                                        </div>

                                                        <div class="cart-product__footer">
                                                            <div class="cart-product__price">
                                                                <?php echo $order->get_formatted_line_subtotal($item); ?>
                                                            </div>
                                                            <div class="cart-product__qty">
                                                                <div class="cart-product__qty-prop">
                                                                    <?php esc_html_e( 'Qtd.', 'prontolight' ); ?>:
                                                                </div>
                                                                <div class="cart-product__qty-val">
                                                                    x<?php echo wp_kses_post(apply_filters('woocommerce_order_item_quantity_html', ' <strong class="product-quantity">' . sprintf('&times; %s', $item->get_quantity()) . '</strong>', $item)); ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
            </div>

		<?php endif; ?>

		<?php //do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php //do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">
            <?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?>
        </p>



	<?php endif;




$lomadee_total = (float) $order->get_total();
$lomadee_off = (float) $order->get_total_discount();
$lomadee_items = '';

// Get and Loop Over Order Items
foreach ( $order->get_items() as $item_id => $item ) {

   $item_price = (float) $item->get_total() / $item->get_quantity();

   $lomadee_categ_arr = $item->get_product()->category_ids;
   $lomadee_categ = $lomadee_categ_arr[0];
   $lomadee_items .= '{
                        "sku" : "'.$item->get_product_id().'",
                        "name" : "'.$item->get_name().'",
                        "category" : "'.get_the_category_by_ID($lomadee_categ).'",
                        "price" : '.$item_price.',
                        "quantity" : '.$item->get_quantity().'
                    },';
}


    $lomadee_items = substr($lomadee_items, 0,-1);

  echo '<script type="text/javascript">

          var lomadee_datalayer = {
            "page" : "conversion",
            "conversion" : {
                "transactionId" : "'.$order->get_transaction_id().'",
                "amount" : '.$lomadee_total.',
                "discount" : '.$lomadee_off.',
                "currency" : "BRL",
                "paymentType" : "'.$order->get_payment_method_title().'",
                "items" : ['.$lomadee_items.']
            }
        };

      var lomadeeTag = document.createElement("script");
      lomadeeTag.type = "text/javascript";
      lomadeeTag.src = "//secure.lomadee.com/a/7461.js";
      document.getElementsByTagName("body")[0].appendChild(lomadeeTag);
    </script>';

?>

<!-- Offer Conversion: Pronto Light CPS -->
<img src="https://adzappy.go2cloud.org/aff_l?offer_id=505&adv_sub=<?=$order->id?>&amount=<?=(float) $subtotal; ?>&adv_sub2=<?=$order->get_payment_method_title()?>" width="1" height="1" />
<!-- // End Offer Conversion -->


</div>
