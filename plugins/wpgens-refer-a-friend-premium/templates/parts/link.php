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
<div class="gens-refer-a-friend--share-text">
<h2 classs="titulo-indique" style="text-transform:initial; margin-bottom:5px;">Quem tem AMIGO, tem tudo! Né?!</h2><br>
<p style="line-height:1.2;">Sua amizade vale muito aqui!<br><br><strong>R$ 20,00 em créditos</strong> para você a cada amigo que usar seu código,<br>e <strong>10% de desconto + frete grátis</strong> na 1ª compra da pessoa indicada.</p>
<?php //echo $share_text; ?></div>    
<?php } ?>
<!-- <div class="gens-raf-message gens-raf__url"><?php //_e( 'Sua URL de referência:','gens-raf'); ?> <strong><?php //echo $rafLink; ?></strong><span class="gens-ctc" data-text="<?php _e('Copiado!','gens-raf'); ?>"><?php //_e('copiar <i class="far fa-copy"></i>',"gens-raf"); ?></span></div> -->
<?php if($referral_code === "yes" && $raf_id != '') { ?>
    <div class="gens-raf-message gens-raf__code">
        <?php _e( 'Seu código:','gens-raf'); ?> <strong><?php echo $raf_id; ?></strong>
        <span class="gens-ctc" data-text="<?php _e('Copiado!','gens-raf'); ?>"><?php _e('copiar <i class="far fa-copy"></i>',"gens-raf"); ?></span>
    </div>
<?php } ?>
