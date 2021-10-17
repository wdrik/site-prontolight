<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php do_action( 'storefront_before_footer' ); ?>

  <section class="newsletter-content">
    <div class="newsletter-container">
      <img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/newsletter.png">
      <div class="newsletter-form-wrapper">
        <h3>Cadastre-se e receba ofertas exclusivas, dicas e receitas para uma vida mais saudável e equilibrada :)</h3>
          <!-- Begin Mailchimp Signup Form -->
          <link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">
          <style type="text/css">
            #mc_embed_signup {
              clear:left;
              font:14px Helvetica,Arial,sans-serif;
              width:100%;
            }

            #mc_embed_signup form {
              text-align: left;
            }

            #mc_embed_signup #mc_embed_signup_scroll input.email {
              border-radius: 10px;
              background-color: #fff;
              padding: 0.6180469716em;
              color: #43454b;
              outline: 0;
              border: 0;
              -webkit-appearance: none;
              box-sizing: border-box;
              font-weight: 400;
              box-shadow: inset 0 1px 1px rgb(0 0 0 / 13%);
              font-family: "Source Sans Pro", HelveticaNeue-Light, "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
              line-height: 1.618;
              text-rendering: optimizeLegibility;
              height: auto;
            }

            #mc_embed_signup #mc_embed_signup_scroll .button {
              border-radius: 10px;
              background-color: #ffffff;
              color: #00274a;
              margin-left: 6px;
              width: 160px;
              max-width: 100%;
              height: auto;
              cursor: pointer;
              padding: 6px 0;
              text-decoration: none;
              font-weight: 600;
              text-shadow: none;
              display: inline-block;
              outline: 0;
              -webkit-appearance: none;
              font-size: 16px;
            }

            @media only screen and (max-width: 768px) {
              #mc_embed_signup #mc_embed_signup_scroll .button {
                margin-left: 0;
                width: 100%;
              }

              #mc_embed_signup #mc_embed_signup_scroll input.email {
                text-align: center;
              }
            }

          </style>

          <div id="mc_embed_signup">
            <form
              action="https://prontolight.us18.list-manage.com/subscribe/post?u=337a6f71f39ea7a61f046efd1&amp;id=275f9c478a"
              method="post"
              id="mc-embedded-subscribe-form"
              name="mc-embedded-subscribe-form"
              class="validate"
              target="_blank"
              novalidate>
              <div id="mc_embed_signup_scroll">
                <label for="mce-EMAIL"></label>
                <input
                  type="email"
                  value=""
                  name="EMAIL"
                  class="email"
                  id="mce-EMAIL"
                  placeholder="Digite seu E-mail"
                  required>
                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div style="position: absolute; left: -5000px;" aria-hidden="true">
                  <input type="text" name="b_337a6f71f39ea7a61f046efd1_275f9c478a" tabindex="-1" value="">
                </div>

                <div class="clear">
                  <input
                    type="submit"
                    value="Eu quero"
                    name="subscribe"
                    id="mc-embedded-subscribe"
                    class="button">
                </div>
              </div>
            </form>
          </div>
          <!--End mc_embed_signup-->

          <?php // echo do_shortcode('[contact-form-7 id="12680" title="Newsletter"]'); ?>
      </div>
    </div>
  </section>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="col-full">

			<?php
			/**
			 * Functions hooked in to storefront_footer action
			 *
			 * @hooked storefront_footer_widgets - 10
			 * @hooked storefront_credit         - 20
			 */
			do_action( 'storefront_footer' ); ?>

		</div><!-- .col-full -->

		<a class="logo-footer--sinnapse" href="http://sinnapse.com" target="_blank" title="agencia de marketing digital sp" alt="agencia de marketing digital sp">
			<img src="<?= wp_upload_dir()["baseurl"] ?>/2018/11/logo-sinnapse-white.png" alt="agencia de marketing digital sp">
		</a>



    <a href="https://api.whatsapp.com/send?phone=5511985295823" target="_blank" class="bt-wa"><img src="https://prontolight.com/whatsapp-logo.webp" width="48px" alt="WhatsApp" title="WhatsApp" data-done="Loaded"></a>


		<div class="product-added">
			Produto Selecionado!
		</div>

		<div class="boleto-method">
			Você receberá um e-mail para agendar sua entrega, após o pagamento.
		</div>
	</footer><!-- #colophon -->

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = 'jPZbWHDYti';var d=document;var w=window;function l(){var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
</script>
<!-- {/literal} END JIVOSITE CODE -->


<style type="text/css">



.payment_box.payment_method_ipag-gateway_boleto h2 {
    font-size: 16px!important;
    text-transform: none!important;
    font-weight: 400!important;
}

.payment_box.payment_method_ipag-gateway_boleto h2 strong { color: #e46200 !important;

}


.thankyou-page__purchase-successful {font-size: 31px !important;}

.payment-methods__header-icon {
    width: 72%; }


</style>

<!--
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>

<script type="text/javascript">

	var typed = new Typed('.animated-text', {
	strings: ['Saudável, praticidade, conveniência', 'Sabor, valor, variedade ', ],
  typeSpeed: 50,
  backSpeed: 50,
  loop: true
});

</script>
-->
<script type="text/javascript">

	jQuery(document).ready(function(){

		jQuery('a.submit-cep').click(function(){

		jQuery(this).html('<i class="fas fa-redo fa-spin"></i> pesquisando').addClass('disabled');

		jQuery.ajax({
		     url : "/wp-content/themes/storefront/check-cep.php",
		     type : 'post',
		     data : {
		        cep :jQuery('#test-cep').val()
		     },
		     beforeSend : function(){

		     }
		})
		.done(function(msg){
		     jQuery("#response-test-cep").html(msg);
		     jQuery(".submit-cep").html('Verificar');

		})
		.fail(function(jqXHR, textStatus, msg){
		     alert('Erro ao pesquisar CEP!');
		});

		});

	});

    function generateLinkWA(v){

        var linkSrc = 'https://api.whatsapp.com/send?phone=5511994018564&text='+encodeURIComponent(v);
        jQuery('div.body-box a').attr('href',linkSrc);

    }

</script>


<?php

$r = $_SERVER['REQUEST_URI']; // /Code/LT1234/
$r = explode('/', $r);
//echo $c = count($r); var_dump($r);
$xurl = isset($r[1]) ? $r[1] : '';
if($xurl!='finalizar-compra'){
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
}
?>
</body>
</html>
