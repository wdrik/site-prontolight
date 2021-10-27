<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

global $woocommerce;
$items = $woocommerce->cart->get_cart();
?>


<li <?php wc_product_class(); ?>>
	<?php

	if($product->get_type() !== 'menu_product') {
		$weight = get_field('field_5b17f00cb8c34', $product->id);

    echo
      '<div class="item">
        <div class="wrapper-product-counter wrapper-product-counter--categ !! not-show '.$product->id.'">
          <a data-tag-id="'.$product->id.'" class="remove-item-loop ajax_add_to_cart cursor-pointer">-</a>';

          $qty = 1;

          foreach($items as $item => $values) {
            $_product_id = (int) $values['data']->get_id();

            if($items[$item]['bundled_by'] !== null) {
              WC()->cart->remove_cart_item($item);
            }

            if ( $_product_id === $product->id && $items[$item]['bundled_by'] === null ) {
              $qty = (int) $values['quantity'];

              echo
                "<script>
                  setTimeout(function(){
                    jQuery('.wrapper-product-counter.".$product->id."').removeClass('not-show');
                    jQuery('.button[data-product_id=".$product->id."]').css({ 'display': 'none' });
                    jQuery('.img-custom--overlay.this--white.".$product->id."').css({ 'opacity': '1', 'visibility': 'visible' });
                  }, 800);
                </script>";

              break;
            } else {
              echo
                "<script>
                  setTimeout(function(){
                    jQuery('.wrapper-product-counter.".$product->id."').addClass('not-show');
                    jQuery('.button[data-product_id=".$product->id."]').css({ 'display': 'flex' });
                  }, 800);
                </script>";
            }
          }

        echo '
          <input type="number" value="'.$qty.'" class="'.$product->id.' counter-input">
          <a data-tag-id="'.$product->id.'" class="add-item-loop cursor-pointer">+</a>
        </div>

        <a class="img-custom--link '.$product->id.'" href="'. get_permalink($loop->post->ID) .'">
          <img class=""
            src="'. get_the_post_thumbnail_url($loop->post->ID, 'post-thumbnail') .'"
            alt="'.$loop->post->post_title.'">


          <div class="img-custom--overlay '.$product->id.' this--white">
            <input type="number" value="'.$qty.'" class="'.$product->id.' counter-input">
          </div>
        </a>';

	if($product->sale_price>0){ $valor_produto = $product->sale_price; }else{ $valor_produto = $product->regular_price; }
	$cashback = (float) (($valor_produto/10)/4);
	echo '<div style="position:absolute; top:10px; right:10px; padding-top:19px; line-height:1.3; text-align:center; width:60px; height:60px; overflow:hidden; border-radius:100%; font-size:10px; background:#71BF52; color:#fff;" >R$ '.number_format($cashback,2,",",".").'<br />Cashback</div>';
        echo '<div class="wrapper-filter-icons">';
          $tags = (string)$product->get_attribute( 'filtros' );

          $str = 'Low Carb';
          if (preg_match('/' . $str . '/', $tags)) {
            echo '<span data-tooltip="Low Carb"><img src="'.get_site_url().'/wp-content/themes/prontolight-child/assets/images/lowcarb.png" alt="Low Carb" class="filter-icon"></span>';
          }

          $str = 'Sem Glúten';
          if (preg_match('/' . $str . '/', $tags)) {
            echo '<span data-tooltip="Sem Glúten"><img src="'.get_site_url().'/wp-content/themes/prontolight-child/assets/images/semgluten.png" alt="Sem Glúten" class="filter-icon"></span>';
          }

          $str = 'Plant Based';
          if (preg_match('/' . $str . '/', $tags)) {
            echo '<span data-tooltip="Plant Based" ><img src="'.get_site_url().'/wp-content/themes/prontolight-child/assets/images/vegano.png" alt="vegano" class="filter-icon"></span>';
          }

          $str = 'Vegetariano';
          if (preg_match('/' . $str . '/', $tags)) {
            echo '<span data-tooltip="Vegetariano" ><img src="'.get_site_url().'/wp-content/themes/prontolight-child/assets/images/vegetariano.png" alt="vegetariano" class="filter-icon"></span>';
          }

          $str = 'Zero Lactose';
          if (preg_match('/' . $str . '/', $tags)) {
            echo '<span data-tooltip="Zero Lactose"><img src="'.get_site_url().'/wp-content/themes/prontolight-child/assets/images/semlactose.png" alt="Zero Lactose" class="filter-icon"></span>';
          }
        echo '</div>';
//if(get_field('texto-livre')) { echo ; }
        echo '<div class="wrapper-category-product">
          <div class="product--info">
            <a href="'.get_permalink($loop->post->ID).'">'.get_the_title($product->id).'</a>

            <span class="product--calories">'.$weight['kcal'].' Kcal<br>'.$weight['g'].'g<span class="aproximadamente" style="font-size:9px; position: absolute;     right: 8px;     padding-top: 15px;">  </span>'.get_field('texto-livre').'</span><br>



          </div>

          <div class="product--to-buy product--to-buy__tabs">
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

          </div>
        </div>
      </div>';

  	echo do_shortcode("[ti_wishlists_addtowishlist loop=yes]");
	}

	if($product->get_type() === 'menu_product') {
		$user_id = get_current_user_id();

		$days 					= get_field('field_5b10f177525ce', $product->id);
		$total_days 		= (int)count($days['days']);
		$total_calories = (int)0;
		$title 					= get_user_meta(get_current_user_id(), 'custom-menu-title-' . $product->id, true);
		$regular_price 	= 0;
		$sale_price 		= 0;

		($title) ? $the_title = esc_html($title) : $the_title = get_the_title($product->id);

		if ($user_id !== 0 && (bool)!unserialize($user_meta['custom-menu-'.$product->id][0])) {
			$user_meta 			= get_user_meta($user_id);
			$days['days'] 	= unserialize($user_meta['custom-menu-'.$product->id][0]);
			$total_days 		= (int)count($days['days']);

			$price['regular'] = 0;
			$price['sale'] 		= false;

			if (!$days || !$days['days']) {
				$get_prices = $price;
			}

			$sale = (float)$days['sale'];

			foreach ($days['days'] as $key => $day) {
				foreach ($day as $fkey => $food) {
					if ($food) {
						foreach ($food as $meal) {
							if (is_object($meal))
								$product_intern = wc_get_product($meal->id);
							else
								$product_intern = wc_get_product($meal);

							if (!$product_intern) continue;

							$price['regular'] += $product_intern->get_price();
						}
					}
				}
			}

			if ($sale) {
				$price['sale'] = $price['regular'] - (($price['regular'] / 100) * $sale);
				$get_prices = $price;
			}

			$regular_price 	= $get_prices["regular"];
			$sale_price 		= $get_prices["sale"];
		} else {
			$regular_price 	= $product->regular_price;
			$sale_price 		= $product->sale_price;
		}

		if($days['days'] === false) {
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

			// var_dump((bool)unserialize($user_meta['custom-menu-' . $product->id][0]));
			// echo '<br><hr>';
			// echo '$regular_price: '.$regular_price;
			// echo '<br><hr>';
			// echo '$sale_price: '.$sale_price;
			// echo '<br><hr>';
			// echo '$product->regular_price: '.$product->regular_price;
			// echo '<br><hr>';
			// echo '$product->sale_price: '.$product->sale_price;
			// echo '<br><hr>';
			// echo '$total_days: '.$total_days;
			// echo '<br><hr>';

	if($product->sale_price>0){ $valor_produto = $product->sale_price; }else{ $valor_produto = $product->regular_price; }
	$cashback = (float) (($valor_produto/10)/4);
	echo '<div style="position:absolute; top:10px; right:10px; padding-top:19px; line-height:1.3; text-align:center; width:60px; height:60px; overflow:hidden; border-radius:100%; font-size:10px; background:#71BF52; color:#fff;" >R$ '.number_format($cashback,2,",",".").'<br />Cashback</div>';


			echo '
			<div class="wrapper-category-product">
				<div class="product--info">
					<div class="product--info-left">
						<a href="'.get_permalink($product->id).'">'.$the_title.'</a>

						<span class="product--calories">'.(int)$calories_per_day.' Kcal por dia</span>
					</div>
					<div class="product--info-right">';

					if($user_id !== 0 && (bool)unserialize($user_meta['custom-menu-'.$product->id][0]) === true) {
						if ((int)$regular_price !== 0 && (bool)$regular_price !== false) {
							echo
								'<p class="product--price product--price-with-discont">
									<span class="monetary">R$</span>'.number_format($regular_price, 2,",",".").'
								</p>';
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
									<span class="per-day">Valor por dia</span>
                  <span>
                    <span class="monetary">R$</span>
                    <span class="price-last-twoo">'
                      .number_format(($sale_price !== "") ? $sale_price / $total_days : $regular_price / $total_days , 2,",",".").
                    '</span>
                  </span>
								</p>';
						} elseif ($product->sale_price !== "") {
							echo
                '<p class="product--price product--price-per-day">
									<span class="per-day">Valor por dia</span>
                  <span>
                    <span class="monetary">R$</span>
                    <span class="price-last-twoo">'
                      .number_format(($sale_price !== "") ? $product->sale_price / $total_days : $product->regular_price / $total_days , 2,",",".").
                    '</span>
                  </span>
								</p>';
						} else {
							echo
              '<p class="product--price product--price-per-day">
								<span class="per-day">Valor por dia</span>
                <span>
                  <span class="monetary">R$</span>
                  <span class="price-last-twoo">'
                    .number_format($product->regular_price / $total_days , 2,",",".").
                  '</span>
                </span>
							</p>';
						}
					} elseif ($user_id !== 0 && (bool)unserialize($user_meta['custom-menu-'.$product->id][0]) === false) {

						if ((int)$product->sale_price !== 0) {
							echo
                '<p class="product--price product--price-per-day">
									<span class="per-day">Valor por dia</span>
                  <span>
                    <span class="monetary">R$</span>
                    <span class="price-last-twoo">'
                      .number_format(($sale_price !== "") ? $product->sale_price / $total_days : $product->regular_price / $total_days , 2,",",".").
                    '</span>
                  </span>
								</p>';
						}

						if ((int)$product->sale_price === 0) {
							echo
                '<p class="product--price product--price-per-day">
                  <span class="per-day">Valor por dia</span>
                  <span>
                    <span class="monetary">R$</span>
                    <span class="price-last-twoo">'
                      .number_format($product->regular_price / $total_days, 2,",",".").
                    '</span>
                  </span>
								</p>';
						}

					} else {
						echo
              '<p class="product--price product--price-per-day">
								<span class="per-day">Valor por dia</span>
                <span>
                  <span class="monetary">R$</span>
                  <span class="price-last-twoo">'
                    .number_format(($sale_price !== "") ? $sale_price / $total_days : $regular_price / $total_days , 2,",",".").
                  '</span>
                </span>
							</p>';
					}


					echo
						'</div>
							<a class="button button--reverse product_type_simple add_to_cart_button ajax_add_to_cart"
								data-quantity="1"
								data-product_id="'.$product->id.'"
								aria-label="Adicionar “'.$the_title.'” no seu carrinho"
								rel="nofollow"
								data-product_sku="">
								Eu Quero
							</a>
				</div>
			</div>
		</div>';
	}




	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	// do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	// do_action( 'woocommerce_before_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	// do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	// do_action( 'woocommerce_after_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	// do_action( 'woocommerce_after_shop_loop_item' );

	?>

</li>


