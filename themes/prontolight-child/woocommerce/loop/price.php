<?php
/**
 * Loop Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/price.php.
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
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
$weight = get_field('field_5b17f00cb8c34', $product->id);

?>

<?php if ( $price_html = $product->get_price_html() ) : ?>
	<span class="price"><?= $price_html; ?></span>

	<span class="loop-product--calories">
		kcal <?= $weight["kcal"]; ?>
	</span>

<?php endif; ?>
