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
<style>


h1.entry-title {display: none !important;}

.woocommerce-MyAccount-navigation{ display:none; }

.page-template-template-fullwidth-php .woocommerce-MyAccount-content {
    width: 100%;
    float: left;
    margin-right: 0%;
}

.gens-refer-a-friend, .gens-refer-a-friend--generate {
    width:70%;
    width:70%;
    margin: 15px 0;
    float:left;
    padding-right:100px;
}

#tab-right{ width:30%; float:left; margin: 15px 0; padding:20px; }


ul#topicos-indicacao{ 
    list-style-type: none !important;
    margin-block-start: 0;
    margin-block-end: 0;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    padding-inline-start: 0px;
    margin-left: -10px;
}
ul#topicos-indicacao:after{
    content: " "; 
    display: block;
    clear: both;
}
ul#topicos-indicacao li{ width: 33.3333%; float: left; padding:10px; }
ul#topicos-indicacao li div{ padding:10px; background: #1E4063; border-radius: 10px; padding-top: 20px; text-align: center; height: 230px; }
ul#topicos-indicacao li div h2{ color: #fff; text-align: center;      height: 40px;}
ul#topicos-indicacao li div p{ color: #fff; text-align: center; font-size: 17px;     padding-left: 12px;
    padding-right: 12px;  padding-bottom: 11px; font-style: italic; }

ul#box-stats{    
    list-style-type: none !important;
    margin-block-start: 0;
    margin-block-end: 0;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    padding-inline-start: 0px;
}
ul#box-stats li{ width: 47%; padding:20px; border:1px solid #1E4063; color:#1E4063; text-align: left; margin-bottom: 10px; border-radius: 5px; margin-right:2%;  float: left; font-size: 12px;}
ul#box-stats li strong{ font-size: 20px; }
ul#box-stats:after{
    content: " "; 
    display: block;
    clear: both;
}


@media(max-width: 768px){

.gens-refer-a-friend, .gens-refer-a-friend--generate {
    width:100%;
    width:100%;
    margin: 15px 0;
    padding-right:0px;
}

#tab-right{ width:100%;  margin: 0px 0; padding:0px; }

ul#topicos-indicacao li{ width: 100%; float: left; padding:10px; }


}
.titulo-indique{ font-size: 26px; line-height: 1.3; font-weight: bold; color: #1E4063 !important; }
.titulo-indique strong{ font-size: 14px; line-height: 1; text-transform: uppercase; font-weight: normal; }


.gens-raf-message, .gens-raf-mail-share {
    display: block !important;
    position: relative !important;
        background-color: #40ce5a!important;
    color: #fff;
    padding: 20px 90px 20px 20px !important;
    margin-bottom: 25px;
    border-left: initial !important;
}

.gens-raf-message .gens-ctc {
    font-size: 15px;
    color: #fff;
}

.gens-raf-message .gens-ctc i{
    font-size: 20px;
    margin-left: 10px;
    position: relative; 
}

.gens-raf-message .gens-ctc:hover {
    color: #fff;
    opacity: .9;
}


.gens-referral_share a {
    text-align: center;
    display: block;
    flex-basis: initial !important;
    flex-grow: initial !important; 
    flex-shrink: initial !important; 
    padding: 10px;
    font-weight: 600;
    color: #1E4063 !important; 
    text-decoration: none;
    margin-bottom: 25px;
    margin-right: 1%;
    box-sizing: border-box;
    font-size: 15px;
    text-decoration: none !important;
    width: 50px !important;
    border: 1px solid #1E4063;
    height: 50px;
    background: none !important;
    border-radius: 100%;
}


.gens-referral_share a:hover {
    background: #1E4063 !important; 
    color: #fff !important; 
}

.gens-referral_share a i {
    position: relative;
    left: 4px;
    top: 3px;
}


ul.lista-descontos{    
    list-style-type: none !important;
    margin-block-start: 0;
    margin-block-end: 0;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    padding-inline-start: 0px;
}

ul.lista-descontos li{ border:1px solid #dedede;  }
ul.lista-descontos li p{ width: 25%; padding:10px; border-right:1px solid #dedede; color:#1E4063;  margin-bottom: 0px;text-align: left;  border-radius: 0px;  float: left; font-size: 13px;}
ul.lista-descontos.grid-33 li p{ width: 33.33333%; } 
ul.lista-descontos li p:last-of-type{border-right:0; }
ul.lista-descontos li p strong{ font-size: 14px; display: none; }
ul.lista-descontos li:after{ content: " "; display: block; clear: both; }
.show-in-mobile{ display: none; }

@media(max-width: 780px){

    ul.lista-descontos li { margin-bottom: 10px; border-radius: 5px; padding-top:5px }
    ul.lista-descontos.grid-33{ width: 100%; }
    ul.lista-descontos li p{ width: 100%; padding:5px 5px 5px 10px; border-right:0; color:#1E4063;  margin-bottom: 0px; }
    ul.lista-descontos li p strong{ display: inline-block; }
    ul.lista-descontos.grid-33 li p strong{ display: block; }
    .hide-in-mobile{ display: none; }
    .show-in-mobile{ display: block; }

    .gens-referral_share a{ display: inline-block !important; margin-right: 10px; }

}
</style>
<div class="gens-refer-a-friend" data-link="<?php echo $rafLink; ?>">
    <?php include WPGens_RAF::get_template_path('link.php','/parts'); ?>
    <?php
        do_action('gens_after_referral_url');
    ?>
    <?php include WPGens_RAF::get_template_path('share.php','/parts'); ?>




</div>
<div id="tab-right">


    <?php
    $creditos  = 0;
    // Coupons section
    if($coupons) {
        $i=0;
        foreach ( $coupons as $coupon ) { 


            // var_dump($coupon['discount']);
            // echo '<br /><br />';
            $trim = (string) trim(strip_tags($coupon['discount']));
            $v = preg_replace("/[Az-zA|#]/","",$trim).'<br />';
            $v = str_replace('&82;&36;','',$v).'<br />';
            $creditos += $v;
        } 
    } 
    ?>


<ul id="box-stats">
<li style="border-color: #E45711;"><strong>R$ <?=$creditos?></strong><br />Seus créditos</li>
<li><strong><?=$referrer_data['num_friends_refered']?></strong><br />Convites aceitos</li>
</ul>
<br />
<br class="show-in-mobile"/>
<br class="show-in-mobile"/>
<br class="show-in-mobile"/>
</div>
<br style="clear:both;"/>
<div>

<h3 class="titulo-indique"><strong>Indique um amigo</strong><br />Como funciona?</h3>
<ul id="topicos-indicacao">
    <li>
        <div><h3 style="width: 37px;
    height: 37px;
    margin: 0 auto;
    border-radius: 25px;
    border: 1px solid #E45711;
    text-align: center;
    margin-bottom: 10px;
    background: #E45711;
    color: #fff;
    font-size: 20px;
    font-weight: 500;"><span>1</span></h3>
            <h2>COMPARTILHE<br>SEU CUPOM</h2>
            <p>Envie seu código de desconto para os seus amigos conhecerem a gente! Eles vão ganhar <strong>10% de desconto + frete grátis</strong>
</p>
        </div>
    </li>
    <li>
        <div><h3 style="width: 37px;
    height: 37px;
    margin: 0 auto;
    border-radius: 25px;
    border: 1px solid #E45711;
    text-align: center;
    margin-bottom: 10px;
    background: #E45711;
    color: #fff;
    font-size: 20px;
    font-weight: 500;"><span>2</span></h3>
            <h2>Ganhe <br />créditos</h2>
            <p><strong>Você recebe os créditos toda vez que seus amigos usarem seu cupom</strong> na primeira compra.  Quanto mais amigos, mais créditos!</p>
        </div>
    </li>
    <li>
        <div><h3 style="width: 37px;
    height: 37px;
    margin: 0 auto;
    border-radius: 25px;
    border: 1px solid #E45711;
    text-align: center;
    margin-bottom: 10px;
    background: #E45711;
    color: #fff;
    font-size: 20px;
    font-weight: 500;"><span>3</span></h3>
            <h2>Aproveite</h2>
            <p>Seus créditos viram <strong>Cupons de Desconto</strong>  para você usar
nas suas compras pelo site. Os descontos são cumulativos! <span style="font-style: normal!important;">😃</span> </p>
        </div>
    </li>
</ul>
    <?php
    // Coupons section
    if($coupons) { ?>
    <h3 class="gens-referral_coupons__title" style="margin-bottom: 0px; padding-top: 43px;"><?php echo apply_filters( 'wpgens_raf_title', __( ' Os seus cupons', 'gens-raf' ) ); ?></h3>
        <h4 style="font-size: 17px;"> Os seus cupons são cumulativos</h4>
        <ul class="lista-descontos">
            <li class="hide-in-mobile" style="background: #efefef;">
                <p><b><?php _e('Código do cupom','gens-raf'); ?></b></p>
                <p><b><?php _e('Desconto','gens-raf'); ?></b></p>
                <p><b><?php _e('Quantidade de uso','gens-raf'); ?></b></p>
                <p><b><?php _e('Data de validade','gens-raf'); ?></b></p>
            </li>
            <?php foreach ( $coupons as $coupon ) { ?>
            <li>
                <p><strong>Código do cupom:</strong> <?php echo $coupon['title']; ?></p>
                <p><strong>Desconto:</strong> <?php echo $coupon['discount']; ?></p>
                <p><strong>Quantidade de uso:</strong> <?php echo $coupon['usageCount']; ?></p>
                <p><strong>Data de validade:</strong> <?php echo $coupon['expiry']; ?></p>
            </li>
            <?php } ?>

        </ul>
    <?php } ?>

    <h3 class="gens-referral_stats__title" style="margin-bottom: 0px;"><?php echo apply_filters( 'wpgens_raf_title', __( 'Acompanhe seus convites', 'gens-raf' ) ); ?></h3>
    <div class="gens-referral_stats" style="margin-bottom:15px; margin-top:10px">
        <div style="background:#1E4063;"><?php _e('Cupons ganhos:','gens-raf'); ?> <span><?php echo $referrer_data['num_friends_refered']; ?></span></div>
        <div><?php _e('Cupons pendentes:','gens-raf'); ?> <span><?php echo $referrer_data['potential_orders']; ?></span></div>
    </div>
    <?php
    // Friends section
    if($referrer_data['friends']) { ?>
        <ul class="lista-descontos grid-33">
            <li class="hide-in-mobile" style="background: #efefef;">
                <p><b><?php _e('Amigo(a)','gens-raf'); ?></b></p>
                <p><b><?php _e('Referido em','gens-raf'); ?></b></p>
                <p><b><?php _e('Status','gens-raf'); ?></b></p>
            </li>
            <?php foreach ( $referrer_data['friends'] as $friend ) { ?>
            <li>
                <p><strong>Amigo(a)</strong> <?php echo $friend['name']; ?></td>
                <p><strong>Resfriado em</strong> <?php echo $friend['date']; ?></td>
                <p><strong>Status</strong> <?php _e($friend['status'], 'gens-raf'); ?></td>
            </li>
            <?php } ?>
        </ul>
    <?php } ?>
    </div>
