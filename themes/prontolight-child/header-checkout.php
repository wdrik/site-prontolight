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

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); 

    // echo '<script type="text/javascript">
    //   var lomadee_datalayer = {"page":"checkout"};
    //   var lomadeeTag = document.createElement("script");
    //   lomadeeTag.type = "text/javascript";
    //   lomadeeTag.src = "//secure.lomadee.com/a/7461.js";
    //   document.getElementsByTagName("body")[0].appendChild(lomadeeTag);
    // </script>';

?>

<style type="text/css">
    
    .xsfsb-deliveryVechileIcon img {display:none !important;}

.xsfsb-progressbarcontent-style3 {    display: none !important;}

</style>


</head>

<?php
/**
 * Remove cart tab on checkout pages
 */
remove_action( 'wp_footer', 'woocommerce_cart_tab' ); ?>

<body <?php body_class(); ?>>

<?php do_action( 'storefront_before_site' ); ?>

<div id="page" class="hfeed site site-checkout">

    <?php do_action( 'storefront_before_header' ); ?>

    <header id="masthead" class="site-header checkout-header" role="banner" style="<?php storefront_header_styles(); ?>">

        <div class="col-full checkout-header__wrapper">
            <div class="checkout-header__row">

                <?php storefront_site_branding(); ?>

                <div class="checkout-header__save-checkout">
                    <div class="checkout-header__save-checkout-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="checkout-header__save-checkout-title">
                        <?php esc_html_e('Secure purchase','prontolight'); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="checkout-progress" data-checkout-progress>

            <div class="checkout-progress__step checkout-progress__step--login active <?php echo is_order_received_page() ? 'complete':''; ?>" data-checkout-progress-step="login">
                <div class="checkout-progress__step-title">
                    <?php esc_html_e('Login','prontolight') ?>
                </div>
                <div class="checkout-progress__step-line">
                    <div class="checkout-progress__step-status">
                        <i class="fas fa-check"></i>
                    </div>
                </div>
            </div>

            <div class="checkout-progress__step checkout-progress__step--payment <?php echo is_order_received_page() ? 'complete':''; ?>" data-checkout-progress-step="payment">
                <div class="checkout-progress__step-title">
                    <?php esc_html_e('Payment','prontolight') ?>
                </div>
                <div class="checkout-progress__step-line">
                    <div class="checkout-progress__step-status">
                        <i class="fas fa-check"></i>
                    </div>
                </div>
            </div>

            <div class="checkout-progress__step checkout-progress__step--complete <?php echo is_order_received_page() ? 'complete':''; ?>" data-checkout-progress-step="delivery">
                <div class="checkout-progress__step-title">
                    <?php esc_html_e('Delivery','prontolight') ?>
                </div>
                <div class="checkout-progress__step-line">
                    <div class="checkout-progress__step-status">
                        <i class="fas fa-check"></i>
                    </div>
                </div>
            </div>

        </div>

        <?php if(is_order_received_page()): ?>
            <div class="order-received-banner" style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/assets/images/order_received_banner.jpg'; ?>');">
                <div class="order-received-banner__text">
                    <?php esc_html_e('Thank you!','prontolight') ?>
                </div>
            </div>
        <?php endif; ?>

    </header><!-- #masthead -->


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
