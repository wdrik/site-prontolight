<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
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
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<ul class="products columns-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?>">

<script>
jQuery(document).ready(function($) {
  var baseURL = "https://prontolight.com";

  function handleUpdateMiniCard() {
    jQuery.ajax({
      type: "POST",
      data: {
        action: 'mode_theme_update_mini_cart',
      },
      url: baseURL + '/wp-admin/admin-ajax.php',
    }).then(function(data) {
      $('.widget_shopping_cart_content').html(data);
    })
  }

  let addItem         = $('.add-item-loop');
  let removeItem      = $('.remove-item-loop');
  let addItensOnCart  = $('.add-itens-on-cart');
  let counterInput    = $('.counter-input');

  counterInput.on('change', function(e) {
    if (e.target.value > 99) e.target.value = 99;
    if (e.target.value < 1) e.target.value = 1;
  });

  counterInput.on('click', function() { this.select() });

  addItensOnCart.on('click', function(e) {
    e.preventDefault();

    let button = $(this);

    button.addClass('loading')

    // let productId = e.target.href.split('/').pop();
    let productId = e.target.getAttribute('data-tag-id');
    let currentQuantity  = $('input.'+productId).val();

    let form = {
      productId,
      currentQuantity
    }

    $.ajax({
      type: "POST",
      data: {
        action: 'handle_products_on_cart',
        form: form
      },
      url: baseURL + '/wp-admin/admin-ajax.php',
    }).then(function(res) {
      let response = JSON.parse(res);

      handleUpdateMiniCard();

      $('.woocommerce-cart-tab__contents').text(response.count);
      $('a.footer-cart-contents span.count').text(response.count);

      if (response.count >= 1) {
        $('.woocommerce-cart-tab')
        .css({'display': 'block'})
        .removeClass('woocommerce-cart-tab--empty')
        .addClass('woocommerce-cart-tab--has-contents')
      }

      if (response.count === 0) {
        $('.woocommerce-cart-tab')
          .css({'display': 'none'})
          .removeClass('woocommerce-cart-tab--has-contents')
          .addClass('woocommerce-cart-tab--empty')
      }

      if (response.count === 1) {
        setTimeout(function() {
          $('.woocommerce-cart-tab-container').addClass('woocommerce-cart-tab-container--visible');
        }, 1000);
      }

      setTimeout(function() {
        button.removeClass('loading');
        $('.wrapper-product-counter.'+productId).removeClass('not-show');
        $('.button[data-product_id="'+productId+'"]').css({ 'display': 'none' });

        $('.img-custom--overlay.this--white.'+productId).css({ 'opacity': '1', 'visibility': 'visible' });
        $('.img-custom--link.'+productId).css({ 'pointer-events': 'all' });
      }, 800);
    });
  });

  addItem.on('click', function(e) {
    e.preventDefault();

    let btn = $(this);

    btn.css({ 'pointer-events': 'none' });

    // let productId = e.target.href.split('/').pop();
    let productId = e.target.getAttribute('data-tag-id');
    let currentQuantity  = $('input.'+productId).val();

    if ($('input.'+productId).val() >= 99) return;

    $('input.'+productId).val(parseInt($('input.'+productId).val()) + 1);

    currentQuantity = parseInt(currentQuantity) + 1;

    let form = {
      productId,
      currentQuantity
    }

    $.ajax({
      type: "POST",
      data: {
        action: 'handle_products_on_cart',
        form: form
      },
      url: baseURL + '/wp-admin/admin-ajax.php',
    }).then(function(data) {
      let response = JSON.parse(data);
      $('.woocommerce-cart-tab__contents').text(response.count);
      $('a.footer-cart-contents span.count').text(response.count);

      $('.widget_shopping_cart_content').html(data);
    })

    setTimeout(function() {
      handleUpdateMiniCard();
      $('.widget_shopping_cart_content').addClass('loading');

      setTimeout(function() {
        $('.widget_shopping_cart_content').removeClass('loading');

        btn.css({ 'pointer-events': 'all' });
      }, 800);
    }, 800);

  })

  removeItem.on('click', function(e) {
    e.preventDefault();

    let btn = $(this);

    btn.css({ 'pointer-events': 'none' });

    // let productId = e.target.href.split('/').pop();
    let productId = e.target.getAttribute('data-tag-id');
    let currentQuantity  = $('input.'+productId).val();

    if ($('input.'+productId).val() <= 1) return;

    $('input.'+productId).val(parseInt($('input.'+productId).val()) - 1);

    currentQuantity = parseInt(currentQuantity) - 1;

    let form = {
      productId,
      currentQuantity
    }

    $.ajax({
      type: "POST",
      data: {
        action: 'handle_products_on_cart',
        form: form
      },
      url: baseURL + '/wp-admin/admin-ajax.php',
    }).then(function(data) {
      let response = JSON.parse(data);
      $('.woocommerce-cart-tab__contents').text(response.count);
      $('a.footer-cart-contents span.count').text(response.count);

      $('.widget_shopping_cart_content').html(data);
    });

    setTimeout(function() {
      handleUpdateMiniCard();
      $('.widget_shopping_cart_content').addClass('loading');

      setTimeout(function() {
        $('.widget_shopping_cart_content').removeClass('loading');

        btn.css({ 'pointer-events': 'all' });
      }, 800);
    }, 800);
  });
});

</script>

