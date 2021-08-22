<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<div class="cart-summary__row">

    <!-- Product item -->
    <div class="cart-summary__cell">
        <div class="cart-summary__product">
            <?php wc_get_template('cart/cart-product.php', array(
                'product' => $_product,
                'cart_item' => $cart_item,
                'cart_item_key' => $cart_item_key
            )) ?>
        </div>
    </div>

    <!-- Quantity -->
    <div class="cart-summary__cell">
        <div class="cart-summary__quantity cart-summary__quantity--sm">

        </div>
    </div>

    <!-- Price -->
    <div class="cart-summary__cell">
        <div class="cart-summary__price">
            <div class="cart-price">
                <div class="cart-price__main cart-price__main--small">

                </div>
            </div>
        </div>
    </div>

</div>