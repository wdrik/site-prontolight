<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>
<p class="price"><?php echo $product->get_price_html(); ?></p>
<?php
	if($product->sale_price>0){ $valor_produto = $product->sale_price; }else{ $valor_produto = $product->regular_price; }
	$cashback = (float) (($valor_produto/10)/4);
	echo '<p>Ganhe R$ '.number_format($cashback,2,",",".").' em Cashback</p>';
?>
<?php   echo do_shortcode("[ti_wishlists_addtowishlist]")  ?>
