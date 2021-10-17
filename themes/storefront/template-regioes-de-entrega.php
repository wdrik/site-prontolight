<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: regiões de entrega 2021
 *
 * @package storefront
 */

get_header(); ?>

  <h1 class="content-featured-product__main-title text-orange">Regiões de Entrega</h1>

  <h3 class="doc-title">Grande São Paulo</h3>
  <p class="doc-text">
    Taxa de entrega: R$ 29,90<br>
    Compras acima R$ 250,00 a taxa de entrega é R$ 16,90.

  </p>
  <h3 class="doc-title">São Paulo Capital - Centro, Zona Sul, Zona Oeste</h3>
  <p class="doc-text">
    Taxa de entrega: R$ 12,90<br>
    Compras acima R$ 280,00 o frete é grátis.
  </p>


    <h3 class="doc-title">São Paulo Capital - Zona Leste e Zona Norte</h3>
  <p class="doc-text">
    Taxa de entrega: R$ 16,90<br>
    Compras acima R$ 280,00 o frete é grátis.
  </p>

     <h3 class="doc-title">Região de Campinas / SP</h3>
  <p class="doc-text">
    Para região de Campinas as compras são válidas apenas por WhatsApp. Clique aqui e veja o cardápio.<br>
    <strong>Taxa de entrega:<strong><br>
     Campinas: R$ 14,90<br>
     Itatiba/Itupeva: R$ 20,00<br>
     Vinhedo/Valinhos: R$ 10,90<br>
     Louveira: R$7,00
  </p>




<?php
get_footer();
