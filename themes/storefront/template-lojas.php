<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Lojas
 *
 * @package storefront
 */

get_header(); ?>


  <h1 class="content-featured-product__main-title text-orange">Pontos de Venda</h1>
  
 
<?php echo do_shortcode( '[wpsl template="default"]' ); ?>

<?php
get_footer();
