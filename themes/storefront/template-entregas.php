<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Regiões de entrega
 *
 * @package storefront
 */

get_header(); ?>

<style>
ul.tabela-de-frete{ padding:0 0 0 0; list-style: none; margin: 40px 0 40px 0;  }
ul.tabela-de-frete:after{ content:" "; display: block; clear: both;  }
ul.tabela-de-frete li.header{ background-color:#174063;   height: 50px;  padding:10px;  display: flex; align-items: center; justify-content:center; width: 33%; float: left; color:#fff; }
ul.tabela-de-frete li.header:nth-child(even){  background-color:#104060 !important;  }
ul.tabela-de-frete li.body{  background-color:#f9f9f9 !important; padding:10px; text-align: center; height: 50px; display: flex; align-items: center; justify-content:center; width: 33%; float: left;  border-bottom:1px solid #ddd;}
ul.tabela-de-frete li.body.even{ background-color:#f0f0f0 !important;  }

ul.tabela-de-frete li.body:nth-child(even){  }


ul.tabela-de-frete-2{ padding:0 0 0 0; list-style: none; margin: 40px 0 40px 0; display: none; }
ul.tabela-de-frete-2 li.header-2{ background-color:#174063;   padding:10px;  display: flex; align-items: center; justify-content:center; width: 100%; float: left; color:#fff;  }
ul.tabela-de-frete-2 li.body-2{  background-color:#f9f9f9 !important; padding:10px; text-align: center; display: flex; align-items: center; justify-content:center; width: 100%; float: left;  border-bottom:1px solid #ddd;}
ul.tabela-de-frete-2 li.body-2.even{ background-color:#f0f0f0 !important;  }


@media (max-width: 768px){


h1{ margin-top:150px; padding-left:5px; }
ul.tabela-de-frete-2{ display: block; }
ul.tabela-de-frete{ display: none; }


}

</style>

  <h1 class="content-featured-product__main-title text-orange">Regiões de entrega</h1>

  <ul class="tabela-de-frete">
    <li class="header"></li>
    <li class="header">Taxa de entrega</li>
    <li class="header">Pedidos acima de R$ 280,00</li>


    <li class="body">SP Capital (Centro, Zona Sul, Zona Oeste)</li>
    <li class="body">R$ 12,90</li>
    <li class="body">Frete Grátis</li>


    <li class="body even">SP Capital (Zona Leste, Zona Norte)</li>
    <li class="body even">R$ 16,90</li>
    <li class="body even">Frete Grátis</li>

    <li class="body">Grande SP (ABCD, Alphaville, Cotia, Taboão da Serra)</li>
    <li class="body">R$ 29,90</li>
    <li class="body">R$ 16,90</li>

  </ul> 


  <ul class="tabela-de-frete-2">
    <li class="header-2">Regiões de entrega:<br />SP Capital (Centro, Zona Sul, Zona Oeste)</li>
    <li class="body-2">Taxa de entrega: <br />R$ 12,90</li>
    <li class="body-2">Pedidos acima de R$ 280,00:<br />Frete Grátis</li>


    <li class="header-2">Regiões de entrega:<br />SP Capital (Zona Leste, Zona Norte)</li>
    <li class="body-2 even" >Taxa de entrega: <br />R$ 16,90</li>
    <li class="body-2">Pedidos acima de R$ 280,00:<br />Frete Grátis</li>


    <li class="header-2">Regiões de entrega:<br />Grande SP (ABCD, Alphaville, Cotia, Taboão da Serra)</li>
    <li class="body-2 even">Taxa de entrega: <br />R$ 29,90</li>
    <li class="body-2">Pedidos acima de R$ 280,00:<br />R$ 16,90</li>

  </ul> 



<?php
get_footer();
