<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Como emagrecer com saúde
 *
 * @package storefront
 */

get_header(); ?>

<div class="fullbanner-intern-seo" style="background-image: url('<?php the_post_thumbnail_url() ?>');">
  <h1 class="content-featured-product__main-title text-white"><?= the_title(); ?></h1>
</div>


<?php if (have_rows('conteudo')): the_row();
  $text = get_sub_field('texto'); ?>

  <div class="products-intern-text">
    <?= $text; ?>
  </div>
<?php endif; ?>

<?php
echo '<section  class="products-tabs-home program-tabs-home default-section">';
  echo '<div class="col-full">';
    echo '<h2 class="h2 text-center">Destaques de Emagrecimento</h2>';

    // The tax query
    $tax_query[] = array(
      'taxonomy' => 'product_visibility',
      'field'    => 'name',
      'terms'    => 'featured',
      'operator' => 'IN', // or 'NOT IN' to exclude feature products
    );

    $args = array(
      'post_type' 			=> 'product',
      'posts_per_page'  => -1,
      'orderby' 				=> 'meta_value_num',
      'order'						=> 'asc',
      'meta_key'				=> 'total_sales',
      'tax_query'       => $tax_query // <===
    );

    $loop = new WP_Query($args);

    function getMenuPrice($menu) {
      $price['regular'] = 0;
      $price['sale'] 		= false;

      if (!$menu || !$menu['days']) {
        return $price;
      }

      $sale = (float) $menu['sale'];

      foreach ($menu['days'] as $key => $day) {
        foreach ($day as $fkey => $food) {
          if ($food) {
            foreach ($food as $meal) {
              if (is_object($meal))
                $product = wc_get_product($meal->id);
              else
                $product = wc_get_product($meal);

              if (!$product)
                continue;

              $price['regular'] += $product->get_price();
            }
          }
        }
      }

      if ($sale) {
        $price['sale'] = $price['regular'] - (($price['regular'] / 100) * $sale);
        return $price;
      }

      return $price;
    }

    $user_id = get_current_user_id();

    echo '<div class="owl-carousel--products owl-carousel owl-theme">';

    $ct = 0;

      while($loop->have_posts() && $ct < 15) {
        $loop->the_post();
        global $product;

        if ($product->get_type() === 'menu_product') {
          $ct++;

          $days 					= get_field('field_5b10f177525ce', $product->id);
          $total_days 		= (int)count($days['days']);
          $total_calories = (int)0;
          $title 					= get_user_meta(get_current_user_id(), 'custom-menu-title-' . $product->id, true);
          $regular_price 	= 0;
          $sale_price 		= 0;

          ($title) ? $the_title = esc_html($title) : $the_title = get_the_title($product->id);

          if ($user_id !== 0 && (bool)!unserialize($user_meta['custom-menu-'.$product->id])) {
            $user_meta 			= get_user_meta($user_id);
            $days['days'] 	= unserialize($user_meta['custom-menu-' . $product->id][0]);
            $total_days 		= (int)count($days['days']);
            $get_prices 		= getMenuPrice($days);

            $regular_price 	= $get_prices["regular"];
            $sale_price 		= $get_prices["sale"];
          } else {
            $regular_price 	= $product->regular_price;
            $sale_price 		= $product->sale_price;
          }

          if ($days['days'] === false) {
            $days 					= get_field('field_5b10f177525ce', $product->id);
            $total_days 		= (int)count($days['days']);
          }

          foreach ($days['days'] as &$day) {
            foreach ($day['breakfast'] as &$breakfast) {
              $weight = get_field('field_5b17f00cb8c34', (int)$breakfast);
              $total_calories += (int)$weight['kcal'];
            }

            foreach ($day['brunch'] as &$brunch) {
              $weight = get_field('field_5b17f00cb8c34', (int)$brunch);
              $total_calories += (int)$weight['kcal'];
            }

            foreach ($day['lunch'] as &$lunch) {
              $weight = get_field('field_5b17f00cb8c34', (int)$lunch);
              $total_calories += (int)$weight['kcal'];
            }

            foreach ($day['snack_dinner'] as &$snack_dinner) {
              $weight = get_field('field_5b17f00cb8c34', (int)$snack_dinner);
              $total_calories += (int)$weight['kcal'];
            }

            foreach ($day['dinner'] as &$dinner) {
              $weight = get_field('field_5b17f00cb8c34', (int)$dinner);
              $total_calories += (int)$weight['kcal'];
            }

            foreach ($day['supper'] as &$supper) {
              $weight = get_field('field_5b17f00cb8c34', (int)$supper);
              $total_calories += (int)$weight['kcal'];
            }
          }

          $calories_per_day = $total_calories / $total_days;

          echo
          '<div class="item">
            <a class="img-custom--link" href="'. get_permalink($product->id).'">
              <img class=""
                src="'.get_the_post_thumbnail_url($product->id, 'post-thumbnail').'"
                alt="'.$the_title.'">
            </a>';

          echo '<div class="product--info">
            <div class="product--info-left">
              <a href="'.get_permalink($product->id).'">'.$the_title.'</a>

              <span class="product--calories">'.(int)$calories_per_day.' Kcal por dia</span>
            </div>
            <div class="product--info-right">';

            if($user_id !== 0 && (bool)unserialize($user_meta['custom-menu-'.$product->id][0]) === true) {
              if ((int)$regular_price !== 0 && (float)$regular_price !== 0) {

                if( (int)$sale_price === 0 ) {
                  echo
                  '<p class="product--price product--price-sale">
                    <span class="monetary">R$</span>'.number_format($regular_price, 2,",",".").'
                  </p>';
                }

                if( (int)$sale_price !== 0 ) {
                  echo
                  '<p class="product--price product--price-with-discont">
                    <span class="monetary">R$</span>'.number_format($regular_price, 2,",",".").'
                  </p>';
                }


              } elseif ($product->regular_price !== "") {
                echo
                  '<p class="product--price product--price-sale">
                    <span class="monetary">R$</span>'.number_format($product->regular_price, 2,",",".").'
                  </p>';
              };

              if ((int)$sale_price !== 0 && (bool)$sale_price !== false) {
                echo
                  '<p class="product--price product--price-sale">
                    <span class="monetary">R$</span>'.number_format($sale_price, 2,",",".").'
                  </p>';
              } elseif ($product->sale_price !== "") {
                echo
                  '<p class="product--price product--price-sale">
                    <span class="monetary">R$</span>'.number_format($product->sale_price, 2,",",".").'
                  </p>';
              };

            } elseif ($user_id !== 0 && (bool)unserialize($user_meta['custom-menu-'.$product->id][0]) === false) {
              if ((int)$product->sale_price !== 0) {
                echo
                  '<p class="product--price product--price-with-discont">
                    <span class="monetary">R$</span>'.number_format($product->regular_price, 2,",",".").'
                  </p>';

                echo
                  '<p class="product--price product--price-sale">
                    <span class="monetary">R$</span>'.number_format($product->sale_price, 2,",",".").'
                  </p>';
              }

              if ((int)$product->sale_price === 0) {
                echo
                  '<p class="product--price product--price-sale">
                    <span class="monetary">R$</span>'.number_format($product->regular_price, 2,",",".").'
                  </p>';
              }

            } else {
              if ((int)$product->sale_price === 0) {
                echo
                  '<p class="product--price product--price-sale">
                    <span class="monetary">R$</span>'.number_format($product->regular_price, 2,",",".").'
                  </p>';
              } else {
                if ($product->sale_price !== "") {
                  echo
                    '<p class="product--price product--price-with-discont">
                      <span class="monetary">R$</span>'.number_format($regular_price, 2,",",".").'
                    </p>';
                }

                echo
                  '<p class="product--price product--price-sale">
                    <span class="monetary">R$</span>'.number_format($sale_price, 2,",",".").'
                  </p>';
              }
            }

            echo '</div>
          </div>

          <div class="product--to-buy">
            <div>';

            if($user_id !== 0 && (bool)unserialize($user_meta['custom-menu-'.$product->id][0]) === true) {
              if ((int)$sale_price !== 0 && (bool)$sale_price !== false) {
                echo
                  '<p class="product--price product--price-per-day">
                    <span class="monetary">R$</span>
                    <span class="price-last-twoo">'
                      .number_format(($sale_price !== "") ? $sale_price / $total_days : $regular_price / $total_days , 2,",",".").
                    '</span>
                    <span class="per-day">por dia</span>
                  </p>';
              } elseif ($product->sale_price !== "") {
                echo
                  '<p class="product--price product--price-per-day">
                    <span class="monetary">R$</span>
                    <span class="price-last-twoo">'
                      .number_format(($sale_price !== "") ? $product->sale_price / $total_days : $product->regular_price / $total_days , 2,",",".").
                    '</span>
                    <span class="per-day">por dia</span>
                  </p>';
              } else {
                echo
                '<p class="product--price product--price-per-day">
                  <span class="monetary">R$</span>
                  <span class="price-last-twoo">'
                    .number_format($regular_price / $total_days , 2,",",".").
                  '</span>
                  <span class="per-day">por dia</span>
                </p>';
              }
            } elseif ($user_id !== 0 && (bool)unserialize($user_meta['custom-menu-'.$product->id][0]) === false) {

              if ((int)$product->sale_price !== 0) {
                echo
                  '<p class="product--price product--price-per-day">
                    <span class="monetary">R$</span>
                    <span class="price-last-twoo">'
                      .number_format(($sale_price !== "") ? $product->sale_price / $total_days : $product->regular_price / $total_days , 2,",",".").
                    '</span>
                    <span class="per-day">por dia</span>
                  </p>';
              }

              if ((int)$product->sale_price === 0) {
                echo
                  '<p class="product--price product--price-per-day">
                    <span class="monetary">R$</span>
                    <span class="price-last-twoo">'
                      .number_format($product->regular_price / $total_days, 2,",",".").
                    '</span>
                    <span class="per-day">por dia</span>
                  </p>';
              }

            } else {
              echo
                '<p class="product--price product--price-per-day">
                  <span class="monetary">R$</span>
                  <span class="price-last-twoo">'
                    .number_format(($sale_price !== "") ? $sale_price / $total_days : $regular_price / $total_days , 2,",",".").
                  '</span>
                  <span class="per-day">por dia</span>
                </p>';
            }

            echo
              '</div>
                <a
                  class="button button--reverse product_type_simple add_to_cart_button ajax_add_to_cart"
                  data-quantity="1"
                  data-product_id="'.$product->id.'"
                  aria-label="Adicionar “'.$the_title.'” no seu carrinho"
                  rel="nofollow"
                  data-product_sku="">
                  Comprar
                </a>
          </div>
        </div>';
        }
      }
    echo '</div>';
  echo '</div>';
echo '</section>';
?>

<?php wp_reset_postdata(); ?>

<?php if (have_rows('duvidas')): the_row();
  $questions = get_sub_field('perguntas_e_respostas'); ?>

  <ul class="accordion">
    <?php foreach($questions as $question): ?>
      <li>
        <a><?= $question['pergunta']; ?></a>
        <?= $question['resposta'];?>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>

<?php
get_footer();
