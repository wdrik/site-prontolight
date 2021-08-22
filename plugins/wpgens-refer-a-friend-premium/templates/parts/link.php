<?php
/**
 * Refer a Friend Product Share Link HTML
 *
 * Available variables: $rafLink (Referral link), $share_text(share text option)
 *
 * @see     http://wpgens.helpscoutdocs.com/article/34-how-to-edit-template-files-and-keep-them-after-plugin-update
 * @version 2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>
<?php if(isset($share_text)) { ?>
<div class="gens-refer-a-friend--share-text"><?php echo $share_text; ?></div>    
<?php } ?>
<div class="gens-raf-message gens-raf__url"><?php _e( 'Sua URL de referência:','gens-raf'); ?> <strong><?php echo $rafLink; ?></strong><span class="gens-ctc" data-text="<?php _e('Copiado!','gens-raf'); ?>"><?php _e("Clique para copiar","gens-raf"); ?></span></div>
<?php if($referral_code === "yes" && $raf_id != '') { ?>
    <div class="gens-raf-message gens-raf__code">
        <?php _e( 'Seu código de cupom para compartilhar:','gens-raf'); ?> <strong><?php echo $raf_id; ?></strong>
        <span class="gens-ctc" data-text="<?php _e('Copiado!','gens-raf'); ?>"><?php _e("Clique para copiar","gens-raf"); ?></span>
    </div>
<?php } ?>