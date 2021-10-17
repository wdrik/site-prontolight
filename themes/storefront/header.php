<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?><!doctype html>

<html <?php language_attributes(); ?>>


<head>

<meta name="facebook-domain-verification" content="f5eis06ueoru1y8g8p8sjeu9rz5gkw" />

<meta charset="<?php bloginfo( 'charset' ); ?>">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">




<!--FACEBOOK-->
<meta property="og:title" content=" Cardápio Pronto Light: Delivery de Comida Congelada  " />
<meta property="og:description" content="1ª marca de Comida Saudável, alimentos 100% naturais. Confira nosso cardápio de comida fitness congelada." />
<meta property="og:image" content="https://prontolight.com/wp-content/uploads/2020/06/pronto-light-2.png" />

<?php wp_head();
/*
$r = $_SERVER['REQUEST_URI']; // /Code/LT1234/
$r = explode('/', $r);
//echo $c = count($r); var_dump($r);
$xurl = isset($r[1]) ? $r[1] : '';
switch($xurl){
  case "":
  $lomadeePage = '{ "page" : "home" }';
  break;
  case "produto":
  $lomadeePage = '{ "page" : "product" }';
  break;
  case "categoria-produto":
  $lomadeePage = '{ "page" : "category" }';
  break;
  default:
  $lomadeePage = '{ "page" : "visit" }';
  break;
}
echo '<script type="text/javascript">
  var lomadee_datalayer = '.$lomadeePage.';
  var lomadeeTag = document.createElement("script");
  lomadeeTag.type = "text/javascript";
  lomadeeTag.src = "//secure.lomadee.com/a/7461.js";
  document.getElementsByTagName("body")[0].appendChild(lomadeeTag);
</script>';
*/
?>


<script src="//api.grumft.com/fp_gft/fpgft_adv.js"></script>



<style type="text/css">



	.wrapper-new__slider-right__top .wpcf7 input[type=submit] {    font-size: 12px;}




	.wrapper-new__slider-right__top .wpcf7 input[type=email], .wrapper-new__slider-right__top .wpcf7 input[type=text], .wrapper-new__slider-right__top .wpcf7 select {
    background: #FFF;
        width: 155px;
    border-radius: 25px;
    padding: 3px 14px;
    margin-bottom: 4px;
    margin-right: 4px;
    color: #6b6b6b;
    font-size: 13px;
}


  .thankyou-page__section-heading {color: #FD7B16;
    font-weight: bold;     font-size: 31px !important;}

    .thankyou-page__order-status {color: #58595B!important;
    font-weight: normal!important;
    font-size: 18px!important;}

    .thankyou-page__purchase-successful {color: #58595B!important;
    font-weight: normal!important;
    font-size: 18px!important;}

    .thankyou-page__purchase-successful-description {color: #58595B!important;
    font-weight: normal!important;
    font-size: 18px!important;}


    .tinv-wishlist.woocommerce .cart-empty {display: none;}

    .tinv-wishlist.woocommerce .return-to-shop {display: none;}


    @media only screen and (max-width: 991px) {


      .wrapper-filter-icons .filter-icon { height: 30px !important;}

        a.bt-wa {

        position: fixed;
    bottom: 63px;
    right: 13px;
    z-index: 10;
    transition: transform .2s;
    display: block !important; }


    }


     a.bt-wa {display: none;}


    .page-id-25191 .columns-4.grid { width:70%;

    margin-bottom: 81px;  margin:0 auto; }


.page-id-25191 .columns-3.grid {  width: 15%;
   }




.page-id-25191 .columns-4.grid h3 { text-align: center;      color: #665492;
    font-size: 31px;  }


.page-id-25191 h2 { text-align: center;      color: #665492;
     }


.page-id-25191 .columns-4.grid p {  padding-right: 20px; font-weight: 300; color: #575757; font-size: 18px;}

.page-id-25191 .columns-3.grid b { text-align: left;     float: left;
    width: 100%;}



.term-solange.term-107 .columns-4.grid h3 { text-align: center;      color: #665492;
    font-size: 31px;  }


.term-solange.term-107 h2 { text-align: center;      color: #665492;
     }


.term-solange.term-107 .columns-4.grid p { font-weight: 300; color: #575757; font-size: 18px;     text-align: center;}

.term-solange.term-107 .columns-3.grid b { text-align: left;     float: left;
    width: 100%;}

.term-solange .content-area {float: none!important;  margin: 0 auto!important;}

.term-solange .widget-area {display: none !important;}

.term-solange .storefront-sorting {display: none !important;}


.term-solange iframe {max-width: 52%;}

.term-solange .banner-category {background-position: left!important;  top: 62px;}

 .term-solange .primary-navigation {display: none;}

 .term-solange .site-search {    display: none !important;}

 .term-solange #site-navigation {height: 57px;}


.term-gabriela-ghedini .columns-4.grid h3 { text-align: center;      color: #665492;
    font-size: 31px;  }


.term-gabriela-ghedini h2 { text-align: center;      color: #665492;
     }


.term-gabriela-ghedini .columns-4.grid p { font-weight: 300; color: #575757; font-size: 18px;     text-align: center;}

.term-gabriela-ghedini .columns-3.grid b { text-align: left;     float: left;
    width: 100%;}

.term-lucilia-diniz .content-area {float: none!important;  margin: 0 auto!important;}

.term-lucilia-diniz .widget-area {display: none !important;}

.term-lucilia-diniz .storefront-sorting {display: none !important;}


.term-lucilia-diniz iframe {max-width: 100%;}

.term-lucilia-diniz .banner-category {background-position: center!important;  top: 62px;}

 .term-lucilia-diniz .primary-navigation {display: none;}

 .term-lucilia-diniz .site-search {    display: none !important;}

 .term-lucilia-diniz #site-navigation {height: 57px;}

  .term-lucilia-diniz .columns-2.grid {width: 50%;
    float: left;  padding: 20px;}

  .term-lucilia-diniz   .tinv-wraper.tinv-wishlist {display: none;}


  .term-lucilia-diniz h3.banner-category__title {display: none;}

  .term-lucilia-diniz .product--to-buy-left {padding-top: 0px;
    margin-top: 0px;
    position: relative;
    top: -8px;}


 .term-lucilia-diniz .columns-4.grid p {
    font-weight: 300;
    color: #575757;
    font-size: 18px;
    text-align: center;}




.term-gabriela-ghedini .columns-4.grid h3 { text-align: center;      color: #665492;
    font-size: 31px;  }


.term-gabriela-ghedini h2 { text-align: center;      color: #665492;
     }


.term-gabriela-ghedini .columns-4.grid p { font-weight: 300; color: #575757; font-size: 18px;     text-align: center;}

.term-gabriela-ghedini .columns-3.grid b { text-align: left;     float: left;
    width: 100%;}

.term-gabriela-ghedini .content-area {float: none!important;  margin: 0 auto!important;}

.term-gabriela-ghedini .widget-area {display: none !important;}

.term-gabriela-ghedini .storefront-sorting {display: none !important;}


.term-gabriela-ghedini iframe {max-width: 100%;}

.term-gabriela-ghedini .banner-category {background-position: center!important;  top: 62px;}

 .term-gabriela-ghedini .primary-navigation {display: none;}

 .term-gabriela-ghedini .site-search {    display: none !important;}

 .term-gabriela-ghedini #site-navigation {height: 57px;}

  .term-gabriela-ghedini .columns-2.grid {width: 50%;
    float: left;  padding: 20px;}

  .term-gabriela-ghedini   .tinv-wraper.tinv-wishlist {display: none;}

  .term-gabriela-ghedini .product--to-buy-left {padding-top: 0px;
    margin-top: 0px;
    position: relative;
    top: -8px;}


 .term-gabriela-ghedini .columns-4.grid p {
    font-weight: 300;
    color: #575757;
    font-size: 18px;
    text-align: center;}

 .gabrielamobile {display: none;}

 .wp-image-38371 {display: none;}

 .term-gabriela-ghedini .banner-category h3.banner-category__title {display: none;}

 .term-gabriela-ghedini  #content.site-content {  margin-top: 227px !important;}

  .term-gabriela-ghedini .woocommerce-info {display: none;}


.tax-product_cat  .product--price-with-discont {display: none!important;}

.tinv-wishlist.woocommerce .cart-empty {display: none;}

.tinv-wishlist.woocommerce .return-to-shop {display: none;}

div#wpcf7-f16883-o1 form {margin-bottom: 6px!important;}

div.wpcf7-validation-errors, div.wpcf7-acceptance-missing {font-size: 12px !important;}

span.wpcf7-not-valid-tip {font-size: 13px !important;}

div.wpcf7-mail-sent-ok {    font-size: 13px;     margin-top: 0px;}

.woocommerce-checkout .apponment {display: none;}

.woocommerce-cart .apponment {display: none;}

.woocommerce-account  .apponment {display: none;}





.botao-wpp {
  text-decoration: none;
  color: #eee;
  display: inline-block;
  background-color: #25d366;
  font-weight: bold;
  padding: 1rem 2rem;
  border-radius: 3px;

}

.botao-wpp:hover {
  background-color: darken(#25d366, 5%);
}

.botao-wpp:focus {
  background-color: darken(#25d366, 15%);
}

div.icon-whats {content:"\0000a0";display:inline-block;height:24px;width:24px;line-height:24px;margin:0 4px -6px -4px;position:relative;top:0;left:-3px;background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAsTAAALEwEAmpwYAAADKElEQVRYhdWXWYiPURjGn2Ma24xlLIMhF2IuLCXhQnYXyhqRyJIbNCUXjJqUC3LjSpFEIRci2bMUbpClFEbihqxjiWHMjGVmzM/F907OnPn+20fJe3P+57zP8z7Pd875/ud80j8Ol4QE5EkqltRPUoGkd5KqnHN1f9FbG9FewGrgHPCd+HgK7AAmA4keLk64ENgM1KYQbU4xfhOY8KfiY4BXXtFq4CAwHxgMFAB5QB9gNLARuBEY2Qe0TyK+2JvqemAL0DVL7jjgumfiGtA7F/FZ3tQ+BkoTPIADKrw6t4CO2RCHe+t9A+iWq3hQb4Fn4hDpNqe5vm3g50Dxn4h7dTd4yzEnHXChBxwf5EqBXUB5AgMOuOAtaX4qYKWBTgTjRcBLz9yIBCaGAz+NvyQOUOoJjA1y62gde3I1YHVOGf9YXLLcki/DjQLsDQzUEv0d52pghcfvIEntvPwoay855wi4VUH/kaTmXA1IumRtoaTBoYESa1/EEE8H/XkxJrOJt5Ia7Xf/0EBfD9QqnHN3JR33hhYlEJdzrlnSG+uWhAYarO2Qgl+m30uxHZiWxISi6ZekutDAB2v7xbGcc+8lLVA0hXmSjgIzfAwwBVhPijMD6CSph3Vfh8mdtkMvp7MPLAeavDfiODAAGAZ8sbHPwNbQCDDW45WEhZdY4ivQJYOJebS+lHwDamgbawLeNht/EFe0qxUCKEtnwPBDgYsxoi3RBIz08O2JbkwAW1IVPWCAZ0DnTCaMMx04DHzyxGuAZQFurWdsSKpig4BGA27KxoDHzQemArOBwiA3EPhodXenK+Ivw9JcDKSpWQjcs5rVQN904KUG/E6W168M4sVE17GWqZ+aiXDWwCe9sQJgJtAzR/EpRJealliViVAENBi4jOh9P+UtST3RnX9gmhot++C8J1wLzE3FcR55paT9WTzcT0n3Jd1R9EXUoOgcGSBpkqTuHvaqpDLn3MOMVWn7TtcCR4BFRN8AFcATMkezrfsMsvg6cibeS9EpWC3pjKQTkq44534EJttJmihpgqQRiv7X841bJalS0jk7N7IPYAgwkQS3nP8+fgEwrHtcAMoPuQAAAABJRU5ErkJggg%3D%3D) left center no-repeat;background-size:100% 100%}


 .wpcf7-select {    display: block;
    background: none;
    padding: 5px 10px;
    font-size: 14px;
    border: 1px solid #174063;
    border-radius: 20px;
    margin: 5px;
    background-color: #f9f9f9;
    width: 94%;}


.product_cat-emagrecimento .tinv-wishlist {display: none!important;}

.product_cat-kits .tinv-wishlist  {display: none!important;}

.tinvwl-theme-style .return-to-shop {display: none!important;}




   @media only screen and (min-width: 321px) and (max-width: 1080px) {




    .term-pagina-teste .columns-2.grid {width: 100% !important;
    float: left;  padding: 20px;}

       .page-template-template-lojas  .content-featured-product__main-title {padding-top: 70px !important;}



    #woocommerce_product_search_filter_attribute_widget-2 {display: none!important;}

      span.tinvwl_add_to_wishlist-text {font-size: 10px !important;}

      ul.products li.product .tinvwl_add_to_wishlist_button {
    margin-top: 0em;
    position: relative;
   top: -54px!important;}



    .site-content .site-main {
    margin-bottom: 2.617924em;
    margin-top: 12px;
    }


    .page-id-25191 .columns-4.grid {    width: 100%;
    float: left;
    margin-bottom: 20px;}


    .page-id-25191 .columns-3.grid {   width: 100%;
    float: left;}


    .term-solange .banner-category { display: block;  }




   .term-solange  #filterProduct {display: none!important;}


     .gabrielamobile {display:block !important;}

    .wp-image-38371 {display:block !important;}

    .wp-image-38366 {display: none;}


     .term-gabriela-ghedini .columns-2.grid {width: 100% !important;
    float: left;  padding: 20px;}


     .term-gabriela-ghedini  #filterProduct {display: none;}

      .term-gabriela-ghedini #content.site-content {margin-top: 79px !important;}

       .term-gabriela-ghedini h3 {display: none !important;}


   }


     @media only screen and (min-width: 221px) and (max-width: 320px) {


     .term-gabriela-ghedini h3 {display: none !important;}


     .term-gabriela-ghedini #content.site-content {margin-top: 79px !important;}

        .gabrielamobile {display:block !important;}

    .wp-image-38371 {display:block !important;}

    .wp-image-38366 {display: none;}


     .term-gabriela-ghedini .columns-2.grid {width: 100% !important;
    float: left;  padding: 20px;}


     .term-gabriela-ghedini  #filterProduct {display: none;}


    .page-template-template-lojas  .content-featured-product__main-title {padding-top: 70px !important;}


      span.tinvwl_add_to_wishlist-text {font-size: 9px !important;}

      ul.products li.product .tinvwl_add_to_wishlist_button {
       margin-top: 0em;
      position: relative;
      top: -54px !important;}



    }

.postid-50710   div.product form.cart {    border-top: 0px !important;
    border-bottom: 0px !important;}


.postid-50710  table td {border-top: 0px solid #2f4046 !important;}

.postid-50710   div.product form.cart {    border-top: 0px !important;
    border-bottom: 0px !important;}


.postid-50732  table td {border-top: 0px solid #2f4046 !important;}


.postid-50732   div.product form.cart {    border-top: 0px !important;
    border-bottom: 0px !important;}


.postid-50732 table td {border-top: 0px solid #2f4046 !important;}

/* --------------------------------------------------------------- */
.wrapper-filter-icons {
  display: flex;
  position: absolute;
  bottom: 178px;
  left: 6px;
}

.wrapper-filter-icons .filter-icon {
  max-width: 34px;
  margin: 0 !important;
  margin-right: 6px !important;
  position: relative;
}

li.pa_filtros-item-52 {
  padding-left: 30px;
  position: relative;
  vertical-align: middle;
  margin-bottom: 4px;
}

li.pa_filtros-item-52:before {
  content: "";
  width: 26px;
  height: 26px;
  background: url("https://prontolight.com/wp-content/themes/prontolight-child/assets/images/icones/semgluten.png")
    no-repeat;
  background-size: contain;
  position: absolute;
  left: 0;
  z-index: 1;
}

li.pa_filtros-item-54 {
  padding-left: 30px;
  position: relative;
  vertical-align: middle;
  margin-bottom: 4px;
}

li.pa_filtros-item-54:before {
  content: "";
  width: 26px;
  height: 26px;
  background: url("https://prontolight.com/wp-content/themes/prontolight-child/assets/images/icones/semlactose.png")
    no-repeat;
  background-size: contain;
  position: absolute;
  left: 0;
  z-index: 1;
}

li.pa_filtros-item-55 {
  padding-left: 30px;
  position: relative;
  vertical-align: middle;
  margin-bottom: 4px;
}

li.pa_filtros-item-55:before {
  content: "";
  width: 26px;
  height: 26px;
  background: url("https://prontolight.com/wp-content/themes/prontolight-child/assets/images/icones/vegano.png")
    no-repeat;
  background-size: contain;
  position: absolute;
  left: 0;
  z-index: 1;
}

li.pa_filtros-item-56 {
  padding-left: 30px;
  position: relative;
  vertical-align: middle;
  margin-bottom: 4px;
}

li.pa_filtros-item-56:before {
  content: "";
  width: 26px;
  height: 26px;
  background: url("https://prontolight.com/wp-content/themes/prontolight-child/assets/images/icones/vegetariano.png")
    no-repeat;
  background-size: contain;
  position: absolute;
  left: 0;
  z-index: 1;
}

li.pa_filtros-item-57 {
  padding-left: 30px;
  position: relative;
  vertical-align: middle;
  margin-bottom: 4px;
}

li.pa_filtros-item-57:before {
  content: "";
  width: 26px;
  height: 26px;
  background: url("https://prontolight.com/wp-content/themes/prontolight-child/assets/images/icones/lowcarb.png")
    no-repeat;
  background-size: contain;
  position: absolute;
  left: 0;
  z-index: 1;
}



a.convide-um-amigo{ color:#555; display:inline-block; margin-right:20px; cursor:pointer; }
a.convide-um-amigo i{ color:#E34613; }
a.convide-um-amigo:hover{ color:#E34613; }


a.sera-que-entrega{ color:#555; display:inline-block; margin-left:20px; cursor:pointer; }
a.sera-que-entrega i{ color:#E34613; }
a.sera-que-entrega:hover{ color:#E34613; }

div.overlay-cep-entrega{ position:fixed; top:0%; left:0%; width:100%; height:100%; background:rgba(0,0,0,.3); z-index:99; display:none; }
div.popup-cep-entrega{ position:relative; position:fixed; top:50%; left:50%; margin-left:-250px;  margin-top:-200px;  width:500px; height:auto; background:white; box-shadow:0 0 10px rgba(0,0,0,.3); border-radius:10px; padding:40px 40px 20px 40px; z-index:100;  display:none; }
div.popup-cep-entrega > h2{ color:#E34613; font-size:20px; margin-bottom:5px; }
div.popup-cep-entrega > p{ color:#555; }
div.popup-cep-entrega > a.close{ position:absolute; top:10px; right:15px; color:#E34613; font-size:20px; cursor:pointer; }
div.popup-cep-entrega > a.close:hover{ color:#555; }
div.popup-cep-entrega > form{ margin-top:20px; }
div.popup-cep-entrega > form label{ color:#555; display:block; }
div.popup-cep-entrega > form input{ padding:10px; width:200px; color:#555; border-radius:5px; }
div.popup-cep-entrega > form a{ padding:10px 20px; display:inline-block; border-radius:5px; background:#E34613; color:#fff; margin-left:10px; cursor:pointer; }
div.popup-cep-entrega > form a:hover{ background:#555; }



@media only screen and (max-width: 991px) {
  .wrapper-filter-icons .filter-icon {
    height: 30px !important;
  }
}

@media only screen and (max-width: 768px) {

body{ margin-top:30px !important; max-width:100% !important; }
  .wp-image-53507 {margin-bottom: 17px;}

  li.pa_filtros-item:before {
    left: inherit;
  }

  body.tax-product_cat #product-search-filter-attribute-0 li.attribute-item a {
    padding-left: 28px;
  }


   .term-solange   #content.site-content {
   margin-top: 219px !important; }

  .term-solange .banner-category {height: 119px;}

  .term-solange iframe {max-width: 100%;}


a.convide-um-amigo{ color:#555; display:block; margin-right:initial; margin-bottom:5px; cursor:pointer; text-align:center; }
a.sera-que-entrega{ color:#555; display:block; margin-left:initial; cursor:pointer;   text-align:center; }
div.popup-cep-entrega{ top:0%; left:0%; margin-left:0px;  margin-top:0px; max-width:100% !important;  width:100%; height:100%; background:white; box-shadow:0 0 10px rgba(0,0,0,.3); padding:40px 20px 40px 20px;  z-index:99999999 !important;  border-radius:0px; }
div.popup-cep-entrega > form a{ margin-left:initial !important; margin-top:10px !important; }


}

@media only screen and (max-width: 525px) {
  .wrapper-filter-icons {
    bottom: 189px;
  }

  #woocommerce_product_search_filter_attribute_widget-2 {display: none!important;}

   ul.products li.product .tinvwl_add_to_wishlist_button {
       margin-top: 0em;
      position: relative;
      top: -54px !important;}

  .wrapper-filter-icons .filter-icon {
    max-width: 30px;
    margin: 0 !important;
    margin-right: 4px !important;
  }
}

/* --------------------------------------------------------------- */

/**
 * Tooltip Styles
 */

/* Add this attribute to the element that needs a tooltip */
[data-tooltip] {
  position: relative;
  z-index: 99;
  cursor: pointer;
  color: #333;
}

/* Hide the tooltip content by default */
[data-tooltip]:before,
[data-tooltip]:after {
  visibility: hidden;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
  filter: progid: DXImageTransform.Microsoft.Alpha(Opacity=0);
  opacity: 0;
  pointer-events: all;
  transition: all ease-in-out 0.2s;
}

/* Position tooltip above the element */
[data-tooltip]:before {
  position: absolute;
  bottom: 110%;
  left: 40%;
  margin-bottom: 5px;
  margin-left: -40px;
  padding: 4px;
  width: 80px;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  background-color: #000;
  background-color: hsla(0, 0%, 20%, 0.9);
  color: #fff;
  content: attr(data-tooltip);
  text-align: center;
  font-size: 14px;
  line-height: 1.2;
  font-size: 0.7em;
}

/* Triangle hack to make tooltip look like a speech bubble */
[data-tooltip]:after {
  position: absolute;
  bottom: 110%;
  left: 40%;
  margin-left: -5;
  width: 0;
  border-top: 5px solid #000;
  border-top: 5px solid hsla(0, 0%, 20%, 0.9);
  border-right: 5px solid transparent;
  border-left: 5px solid transparent;
  content: " ";
  font-size: 0;
  line-height: 0;
}

/* Show tooltip content on hover */
[data-tooltip]:hover:before,
[data-tooltip]:hover:after {
  visibility: visible;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
  filter: progid: DXImageTransform.Microsoft.Alpha(Opacity=100);
  opacity: 1;
}





.page-id-8 .woocommerce-button.button.pay {display: none;}


.cc-color-override-2104694695.cc-window {    background-color: #fff !important; position: fixed !important;
    bottom: 0px !important;
    z-index: 999999999999999!important;}

.cc-revoke, .cc-window {font-size: 12px !important;}

.cc-color-override-2104694695 .cc-btn {color: rgb(253 123 22)!important;
    border-color: rgb(253 123 22)!important;
    background-color: transparent!important;
    }


.cc-window.cc-floating {padding: 13px !important;}

.cc-close {top: 8px !important; display: none !important;}



.cc-btn.cc-deny {display: none !important;}



.show-in-mobile{ display: none; }

.aproximadamente { display: none; }

li.post-173.product .aproximadamente { display: block!important; }

li.post-175.product .aproximadamente { display: block!important; }

li.post-189.product .aproximadamente { display: block!important; }

li.post-182.product .aproximadamente { display: block!important; }

li.postid-45788.product .aproximadamente { display: block!important; }

li.postid-198.product .aproximadamente { display: block!important; }

li.postid-191.product .aproximadamente { display: block!important; }

li.postid-196.product .aproximadamente { display: block!important; }

li.postid-192.product .aproximadamente { display: block!important; }

li.postid-13163.product .aproximadamente { display: block!important; }

li.postid-445.product .aproximadamente { display: block!important; }

li.post-448.product .aproximadamente { display: block!important; }

li.post-446.product .aproximadamente { display: block!important; }

li.post-441.product .aproximadamente { display: block!important; }

li.post-34411.product .aproximadamente { display: block!important; }

li.post-214.product .aproximadamente { display: block!important; }

li.post-34415.product .aproximadamente { display: block!important; }

li.postid-438.product .aproximadamente { display: block!important; }

li.postid-435.product .aproximadamente { display: block!important; }

li.postid-432.product .aproximadamente { display: block!important; }

li.postid-34421.product .aproximadamente { display: block!important; }

li.postid-34418.product .aproximadamente { display: block!important; }

li.postid-45752.product .aproximadamente { display: block!important; }

li.post-24191.product .aproximadamente { display: block!important; }

li.post-12494.product .aproximadamente { display: block!important; }

li.postid-24188.product .aproximadamente { display: block!important; }

li.postid-12397.product .aproximadamente { display: block!important; }

li.postid-564.product .aproximadamente { display: block!important; }

li.postid-550.product .aproximadamente { display: block!important; }

li.postid-500.product .aproximadamente { display: block!important; }

li.postid-421.product .aproximadamente { display: block!important; }

li.postid-458.product .aproximadamente { display: block!important; }

li.postid-447.product .aproximadamente { display: block!important; }

li.postid-495.product .aproximadamente { display: block!important; }

li.postid-490.product .aproximadamente { display: block!important; }

li.postid-478.product .aproximadamente { display: block!important; }

li.postid-464.product .aproximadamente { display: block!important; }

li.postid-474.product .aproximadamente { display: block!important; }

li.post-46825.product .aproximadamente { display: block!important; }

li.post-46821.product .aproximadamente { display: block!important; }

li.post-63944 .product--price-sale {display: none;}

li.post-63944 .product--calories {display: none;}

li.post-63944 .product--to-buy div {display: none;}

.xsfsb-progressbarcontent-style3 {    height: 68px !important;}


li#mega-menu-item-12790 a.dashicons-cart.mega-menu-link {display: block!important;
    cursor: pointer!important;
    box-shadow: rgb(0 0 0 / 8%) 0px 1px 2px!important;
    padding: 6px 6px!important;
    background-color: #fd7b16!important;
    border-radius: 6px!important; height: 30px!important;
    line-height: 19px!important;
    margin-right: 16px!important;
    color: #fff!important;}

    span.mobile-menu-header:nth-child(4) {    padding: 6px 6px!important;
    background-color: #fd7b16!important;
    border-radius: 6px!important;
    height: 30px!important;
    line-height: 19px!important;

    color: #fff!important;}


  #mega-menu-wrap-primary #mega-menu-primary li.mega-menu-item a.mega-menu-link:before {display: none!important;}



</style>

</head>

<body <?php body_class(); ?>>

<?php do_action( 'storefront_before_site' ); ?>


<div class="overlay-cep-entrega"> </div>

<div class="popup-cep-entrega">
	<a class="close" onclick="jQuery('.overlay-cep-entrega,.popup-cep-entrega').fadeOut(100);"><i class="fas fa-times-circle"></i></a>
  	<h2>SERÁ QUE ENTREGA?</h2>
  	<p>Onde você tá? Conta pra gente, onde é ai mesmo?</p>
  	<form>
  		<label>CEP de entrega</label>
  		<input type="text" name="cep" class="cep zip" id="test-cep" onfocus="jQuery('#response-test-cep').html('');" placeholder="Informe seu CEP" />
  		<a href="javascript:void(0);" class="submit-cep">Verificar</a>
  	</form>
    <div class="tab-test-cep" id="response-test-cep">

    </div>
</div>

<div id="page" class="hfeed site">
	<?php do_action( 'storefront_before_header' ); ?>
	<header id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles(); ?>">

    <div class="TopBarLink__TopBarWrapper-x4flhr-0 kHaKCr" style="
    background-color:#f6f6f6; text-align: center;
    top: 0px;
    right: 0px;
    left: 0px;
    z-index: 29;
    width: 100%;
    height: 36px;
    line-height: 36px; font-size: 12px;
    font-weight: 300;">
        <!-- <a class=" " href="" style="font-weight: 300;"><span class="TopBarLink__TopBarContentWrapper-x4flhr-1 fvcCyD">Convide um amigo para experimentar Pronto Light e ganhe R$ 20,00</span></a> -->
    <a class="convide-um-amigo" href="https://prontolight.com/minha-conta/myreferrals/" ><i class="fas fa-bullhorn"></i> Quero ganhar <span style="color: #E45711;">R$ 20,00 de desconto!</span></a>
    <a class="sera-que-entrega" onclick="jQuery('.overlay-cep-entrega,.popup-cep-entrega').fadeIn(500);"><i class="fas fa-map-marker-alt"></i> Será que entrega?</a>

    </div>

		<?php
		/**
		 * Functions hooked into storefront_header action
		 *
		 * @hooked storefront_header_container                 - 0
		 * @hooked storefront_skip_links                       - 5
		 * @hooked storefront_social_icons                     - 10
		 * @hooked storefront_site_branding                    - 20
		 * @hooked storefront_secondary_navigation             - 30
		 * @hooked storefront_product_search                   - 40
		 * @hooked storefront_header_container_close           - 41
		 * @hooked storefront_primary_navigation_wrapper       - 42
		 * @hooked storefront_primary_navigation               - 50
		 * @hooked storefront_header_cart                      - 60
		 * @hooked storefront_primary_navigation_wrapper_close - 68
		 */
		do_action( 'storefront_header' ); ?>

		<div class="user-account" style="top: 71%;">
			<a href="<?= get_site_url(); ?>/minha-conta">
				<i class="far fa-user"></i>
				<?php if ( !is_user_logged_in() ): ?>
					<span class="label-login">Login</span>
				<?php endif;?>

          <p style="font-size: 11px;"> <?php global $current_user;
wp_get_current_user();

echo '' . $current_user->display_name . "\n";
?></p>

			</a>
		</div>

    <div class="clip-whats">
      <a href="https://web.whatsapp.com/send?phone=5511985295823" target="_blank">
        <img src="<?= wp_upload_dir()['baseurl']?>/2018/12/prontolight_clipewhatsapp.png" alt="Whatsapp">
        <div class="clip-whats__number">11 98529.5823</div>
      </a>
    </div>

  </header><!-- #masthead -->

  <?php global $woocommerce ?>



  <div class="TopBarLink__TopBarWrapper-x4flhr-0 kHaKCr" style="
      background-color:#f6f6f6; text-align: center;
      top: 0px;
      right: 0px;
      left: 0px;
      position: fixed;
      z-index: 29;
      width: 100%;
      max-width: 100%;
      height: auto;
      line-height: 1x;
      font-size: 12px;
      padding:5px;">
      <!--
      <a href="https://prontolight.com/minha-conta/myreferrals/" style="font-weight: 300;">
        <span class="TopBarLink__TopBarContentWrapper-x4flhr-1 fvcCyD">Convide um amigo para experimentar Pronto Light e ganhe R$ 20,00</span>
      </a>
      -->
	<a class="convide-um-amigo" href="https://prontolight.com/minha-conta/myreferrals/" ><i class="fas fa-bullhorn"></i> Quero ganhar <span style="color: #E45711;">R$ 20,00 de desconto!</span></a>
	<a class="sera-que-entrega" onclick="jQuery('.overlay-cep-entrega,.popup-cep-entrega').fadeIn(500);"><i class="fas fa-map-marker-alt"></i> Será que entrega?</a>
    </div>

  <header id="headerMobile" class="site-header--mobile" style="top:50px;">
    <div class="icon-menu">
      <div id="iconMenuMobile">
        <div class="menu-line menu-line__top"></div>
        <div class="menu-line menu-line__center"></div>
        <div class="menu-line menu-line__bottom"></div>
      </div>

      <div id="iconMenuMobileBack">
        <img
          src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/arrow_back_ios_new_black_24dp.svg')?>"
        >
      </div>


      <a id="openSearchForm" href="#">
        <i class="fas fa-search"></i>
      </a>

      <a class="nav-logo--mobile" href="<?= home_url(); ?>">
        <img
          src="/wp-content/themes/prontolight-child/assets/images/logo-pronto--mobile-orange.png"
          alt="Prontolight Logo">
      </a>

      <a class="my-account--mobile" href="<?= home_url(); ?>/minha-conta">
        <i class="far fa-user"></i>
      </a>

      <div href="#" class="woocommerce-cart-tab--mobile">
        <i class="fas fa-shopping-cart"></i>

        <a class="footer-cart-contents" href="<?= esc_url( wc_get_cart_url() ); ?>">
          <span class="woocommerce-cart-tab__contents count"><?= wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
        </a>
      </div>
    </div>

    <div class="search-form--custom">
      <div class="site-search">
				<?php the_widget( 'WC_Widget_Product_Search', 'title=' ); ?>
			</div>
    </div>

    <nav id="toggleEffect" class="main-menu">
      <?php
        $menuLocations = get_nav_menu_locations();
        $navbar_items = wp_get_nav_menu_items($menuLocations['primary']);
        $child_items = [];

        // pull all child menu items into separate object
        foreach ($navbar_items as $key => $item) {
          if ($item->menu_item_parent) {
            array_push($child_items, $item);
            unset($navbar_items[$key]);
          }
        }

        // push child items into their parent item in the original object
        foreach ($navbar_items as $item) {
          foreach ($child_items as $key => $child) {
            if ($child->menu_item_parent == $item->post_name) {
              if (!$item->child_items) $item->child_items = [];

              array_push($item->child_items, $child);
              unset($child_items[$key]);
            }
          }
        }

        echo '<div class="mobile-menu-container">';
          foreach ( $navbar_items as $navItem ) {
            echo
            '<span class="mobile-menu-header">
              <a href="'.$navItem->url.'">'.$navItem->title.'</a>
            </span>';

            foreach ( $child_items as $navItemChildren ) {
              if($navItem->ID == $navItemChildren->menu_item_parent) {
                echo '
                  <div class="mobile-menu-first-item" data-nav-id="'.$navItemChildren->ID.'">
                    <span>'.$navItemChildren->title.'</span>

                    <img src="'.esc_url(get_stylesheet_directory_uri() . '/assets/images/chevron_right_black_24dp.svg').'" >
                  </div>
                ';

                echo '<div class="mobile-menu-second-item mobile-menu-second-item--'.$navItemChildren->ID.'">';
                  foreach ( $child_items as $subNavItemChildren ) {
                    if($navItemChildren->ID == $subNavItemChildren->menu_item_parent) {
                      // var_dump($subNavItemChildren);

                      echo '
                        <a href="'.$subNavItemChildren->url.'">
                          <span>'.$subNavItemChildren->title.'</span>

                          <img src="'.esc_url(get_stylesheet_directory_uri() . '/assets/images/chevron_right_black_24dp.svg').'" >
                        </a>
                      ';
                    }
                  }
                echo '</div>';
              }
            }
          }

          echo '
            <a class="mega-menu-link--the-new" href="http://google.com" tabindex="0">
              <img src="'.esc_url(get_stylesheet_directory_uri() . '/assets/images/logo-The-New.png').'" class="mega-menu-item--the-new-img">
            </a>';

        echo '</div>';
      ?>
    </nav>
  </header>

  <div class="clip-news">
    <span class="clip-news__span">Ofertas</span>
  </div>

  <div class="clip-news-content">
    <header>
      <h2>Destaques</h2>

      <i class="fas fa-times clip-news-content__close"></i>
    </header>

    <?php
      global $woocommerce;

      $items_cart = $woocommerce->cart->get_cart();

      $args = array(
        'post_type' 			=> 'product',
        'posts_per_page' 	=> -1,
        'product_cat' 		=> 'novidades',
      );

      $loop = new WP_Query($args);

      while($loop->have_posts()) {
        $loop->the_post();
        global $product;

        $weight = get_field('field_5b17f00cb8c34', $product->id);

        echo
          '<div class="item">
            <div class="clip-news-content__wrapper-top">
              <a class="img-custom--link '.$product->id.'" href="'. get_permalink($loop->post->ID) .'">
                <img class=""
                  src="'. get_the_post_thumbnail_url($loop->post->ID, 'post-thumbnail') .'"
                  alt="'.$loop->post->post_title.'">
              </a>

              <div class="product--info">
                <a href="'.get_permalink($loop->post->ID).'">'.$loop->post->post_title.'</a>

                <span class="product--calories">'.$weight['kcal'].' Kcal</span>
              </div>
            </div>

            <div class="product--to-buy">
              <div class="product--to-buy-left">';
                if($product->sale_price !== "") {
                  echo
                    '<p class="product--price">
                      <span class="monetary">R$</span>'.number_format($product->sale_price, 2,",",".").'
                    </p>';
                };

                if((bool)$product->sale_price) echo '<p class="product--price product--price-with-discont">';
                if(!(bool)$product->sale_price) echo '<p class="product--price">';
                echo '<span class="monetary">R$</span>'.number_format($product->regular_price, 2,",",".").'
                </p>
              </div>


              <a data-tag-id="'.$product->id.'"
                class="button add-itens-on-cart product_type_simple cursor-pointer"
                data-product_id="'.$product->id.'">
                Eu quero
              </a>

              <div class="wrapper-product-counter not-show '.$product->id.'">
                <a data-tag-id="'.$product->id.'" class="remove-item ajax_add_to_cart cursor-pointer">-</a>';

                $qty = 1;

                foreach($items_cart as $item => $values) {
                  $_product_id = (int) $values['data']->get_id();

                  if ( $_product_id === $product->id ) {
                    $qty = (int) $values['quantity'];
                    echo
                      "<script>
                        setTimeout(function(){
                          jQuery('.wrapper-product-counter.".$product->id."').removeClass('not-show');
                          jQuery('.button[data-product_id=".$product->id."]').css({ 'display': 'none' });
                          jQuery('.img-custom--overlay.this--white.".$product->id."').css({ 'opacity': '1', 'visibility': 'visible' });
                        }, 600);
                      </script>";

                    break;
                  } else {
                    echo
                      "<script>
                        setTimeout(function(){
                          jQuery('.wrapper-product-counter.".$product->id."').addClass('not-show');
                          jQuery('.button[data-product_id=".$product->id."]').css({ 'display': 'flex' });
                        }, 600);
                      </script>";
                  }
                }

              echo '
                <input type="number" value="'.$qty.'" class="'.$product->id.' counter-input">
                <a data-tag-id="'.$product->id.'" class="add-item cursor-pointer">+</a>
              </div>
            </div>
          </div>';
      }
      // Botão que redireciona para página do produto
      // <a href="'.get_permalink($loop->post->ID).'" class="button product_type_simple cursor-pointer">
      //   Eu quero
      // </a>
    ?>
  </div>

	<?php
	/**
	 * Functions hooked in to storefront_before_content
	 *
	 * @hooked storefront_header_widget_region - 10
	 * @hooked woocommerce_breadcrumb - 10
	 */
	do_action( 'storefront_before_content' ); ?>

	<div id="content" class="site-content" tabindex="-1">
		<div class="col-full">
		<?php
		do_action( 'storefront_content_top' );
