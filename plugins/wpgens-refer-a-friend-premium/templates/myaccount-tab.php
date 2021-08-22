<?php
/**
 * Refer a Friend My Account Page HTML
 *
 * Available variables: $rafLink (Referral link), $coupons [array], $referrer_data [array]
 *
 * @see     http://wpgens.helpscoutdocs.com/article/34-how-to-edit-template-files-and-keep-them-after-plugin-update
 * @version 2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>
<div class="gens-refer-a-friend" data-link="<?php echo $rafLink; ?>">
    <?php include WPGens_RAF::get_template_path('link.php','/parts'); ?>
    <?php
        do_action('gens_after_referral_url');
    ?>
    <?php include WPGens_RAF::get_template_path('share.php','/parts'); ?>
    <?php
    // Coupons section
    if($coupons) { ?>
    <h3 class="gens-referral_coupons__title"><?php echo apply_filters( 'wpgens_raf_title', __( ' Os seus cupons', 'gens-raf' ) ); ?></h3>
        <table class="shop_table shop_table_responsive gens-referral_coupons__table">
            <tr>
                <th><?php _e('Código do cupom','gens-raf'); ?></th>
                <th><?php _e('Desconto','gens-raf'); ?></th>
                <th><?php _e('Quantidade de uso','gens-raf'); ?></th>
                <th><?php _e('Data de validade','gens-raf'); ?></th>
            </tr>
            <?php foreach ( $coupons as $coupon ) { ?>
            <tr>
                <td><?php echo $coupon['title']; ?></td>
                <td><?php echo $coupon['discount']; ?></td>
                <td><?php echo $coupon['usageCount']; ?></td>
                <td><?php echo $coupon['expiry']; ?></td>
            </tr>
            <?php } ?>
            <h4 style="font-size: 17px;"> Os seus cupons são cumulativos :) </h4>

        </table>
    <?php } ?>

    <h3 class="gens-referral_stats__title"><?php echo apply_filters( 'wpgens_raf_title', __( 'Acompanhe seus convites', 'gens-raf' ) ); ?></h3>
    <div class="gens-referral_stats">
        <div><?php _e('Cupons ganhos:','gens-raf'); ?> <span><?php echo $referrer_data['num_friends_refered']; ?></span></div>
        <div><?php _e('Cupons pendentes:','gens-raf'); ?> <span><?php echo $referrer_data['potential_orders']; ?></span></div>
    </div>
    <?php
    // Friends section
    if($referrer_data['friends']) { ?>
        <table class="shop_table shop_table_responsive gens-referral_stats__table">
            <tr>
                <th><?php _e('Amigo(a)','gens-raf'); ?></th>
                <th><?php _e('Referido em','gens-raf'); ?></th>
                <th><?php _e('Status','gens-raf'); ?></th>
            </tr>
            <?php foreach ( $referrer_data['friends'] as $friend ) { ?>
            <tr>
                <td><?php echo $friend['name']; ?></td>
                <td><?php echo $friend['date']; ?></td>
                <td><?php _e($friend['status'], 'gens-raf'); ?></td>
            </tr>
            <?php } ?>
        </table>
    <?php } ?>
</div>