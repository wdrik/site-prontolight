<?php
/**
 * Refer a Friend Product Share HTML
 *
 * Available variables: $rafLink (Referral link), $title (twitter title option), $twitter_via(twitter via option)
 *
 * @see     http://wpgens.helpscoutdocs.com/article/34-how-to-edit-template-files-and-keep-them-after-plugin-update
 * @version 2.3.11
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>
<div class="gens-referral_share">
    <a href="<?php echo $rafLink; ?>" class="gens-referral_share__fb"><i class="gens_raf_icn-facebook"></i> <?php _e("Compartilhe no Facebook","gens-raf"); ?></a>
    
    <?php if($whatsapp === 'yes') { ?>
    <a href="<?php echo $rafLink; ?>" class="gens-referral_share__wade" data-title="<?php echo $title. ' '.$rafLink; ?>"><i class="gens_raf_icn-whatsapp"></i> <?php _e("Compartilhe no WhatsApp","gens-raf"); ?></a>
    <?php } if($linkedin === 'yes') { ?>
    <a href="<?php echo $rafLink; ?>" class="gens-referral_share__ln"><i class="gens_raf_icn-linkedin"></i> <?php _e("Share via Linkedin","gens-raf"); ?></a>
    <?php } if($pinterest === 'yes') { ?>
    <a href="<?php echo $rafLink; ?>" class="gens-referral_share__pin"><i class="gens_raf_icn-pinterest"></i> <?php _e("Share via Pinterest","gens-raf"); ?></a>
    <?php } ?>
    <a href="<?php echo $rafLink; ?>" class="gens-referral_share__wa" data-title="<?php echo $title; ?>"><i class="gens_raf_icn-whatsapp"></i> <?php _e("Compartilhe no WhatsApp","gens-raf"); ?></a>
</div>
<?php if($email_hide != 'yes') { ?>
<div class="gens-referral_share__email">
    <span class="gens-referral_share__email__title"><?php _e( 'ou compartilhar por e-mail','gens-raf'); ?></span>
    <form id="gens-referral_share__email" action="" type="post" novalidate>
        <div class="gens-referral_share__email__inputs">
            <input type="email" placeholder="<?php _e( 'E-mail do indicado','gens-raf'); ?>">
            <input type="text" placeholder="<?php _e( 'Nome do indicado','gens-raf'); ?>">
        </div>
        <a href="#" id="js--gens-email-clone">+</a>
        <a href="#" id="js--gens-email-remove">-</a>
        <input type="submit" value="<?php _e( 'Enviar','gens-raf'); ?>">
    </form>
</div>
<?php } ?>