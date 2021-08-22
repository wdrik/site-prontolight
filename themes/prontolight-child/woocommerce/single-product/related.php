<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
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
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $woocommerce;
$items_cart = $woocommerce->cart->get_cart();

function getMenuPrice($menu) {
	$price['regular'] = 0;
	$price['sale'] = false;

	if (!$menu || !$menu['days']) { return $price; }

	$sale = (float)$menu['sale'];

	foreach ($menu['days'] as $key => $day) {
		foreach ($day as $fkey => $food) {
			if ($food) {
				foreach ($food as $meal) {
					if (is_object($meal)) {
						$product = wc_get_product($meal->id);
					} else {
						$product = wc_get_product($meal);
					}

					if (!$product) { continue; }

					$price['regular'] += $product->get_price();
				}
			}
		}
	}

	if ($sale) {
		$price['sale'] = $price['regular'] - (($price['regular'] / 100) * $sale);
		return $price;
	}
}

if ( $related_products ) : ?>

	<section class="related products">

		<h2><?php esc_html_e( 'Related products', 'woocommerce' ); ?></h2>

		<?php woocommerce_product_loop_start(); ?>

			<div class="owl-carousel--products__related owl-carousel owl-theme">

				<?php foreach ( $related_products as $related_product )  {

					//--> Default related products component
					// $post_object = get_post( $related_product->get_id() );
					// setup_postdata( $GLOBALS['post'] =& $post_object );
					// wc_get_template_part( 'content', 'product' );
					//--> end Default related products component

					$product = wc_get_product($related_product->get_id());

					if ($product->get_type() !== 'menu_product') {
						$weight = get_field('field_5b17f00cb8c34', $product->id);

						echo
							'<div class="item">
								<a class="img-custom--link" href="'.get_permalink($product->id).'">
									<img class=""
										src="'.get_the_post_thumbnail_url($product->id, 'post-thumbnail').'"
										alt="'.get_the_title($product->id).'">

									<div class="img-custom--overlay">
										quero!
									</div>
								</a>

								<div class="product--info">
									<a href="'.get_permalink($product->id).'">'.get_the_title($product->id).'</a>

									<span class="product--calories">'.$weight['kcal'].' Kcal</span>
								</div>

								<div class="product--to-buy product--to-buy__tabs">
									<div class="product--to-buy-left">';
										if($product->sale_price !== "") {
											echo
												'<p class="product--price product--price-with-discont">
													<span class="monetary">R$</span>'.number_format($product->sale_price, 2,",",".").'
												</p>';
										};

										echo
										'<p class="product--price">
											<span class="monetary">R$</span>'.number_format($product->regular_price, 2,",",".").'
										</p>
                  </div>


                  <a data-tag-id="'.$product->id.'"
                    class="button add-itens-on-cart product_type_simple cursor-pointer"
                    data-product_id="'.$product->id.'">
                    Eu quero
                  </a>
                </div>

                <div class="wrapper-product-counter wrapper-product-counter--categ not-show '.$product->id.'">
                  <a data-tag-id="'.$product->id.'" class="remove-item ajax_add_to_cart cursor-pointer">-</a>';

                  $qty = 1;

                  foreach($items_cart as $item => $values) {
                    $_product_id = (int) $values['data']->get_id();

                    if ( $_product_id === $product->id ) {
                      $qty = (int) $values['quantity'];
                      echo
                        "<script>
                          jQuery('.wrapper-product-counter.".$product->id."').removeClass('not-show');
                          jQuery('.button[data-product_id=".$product->id."]').css({ 'display': 'none' });
                        </script>";

                      break;
                    } else {
                      echo
                        "<script>
                          jQuery('.wrapper-product-counter.".$product->id."').addClass('not-show');
                          jQuery('.button[data-product_id=".$product->id."]').css({ 'display': 'flex' });
                        </script>";
                    }
                  }

              echo '
                  <input type="number" value="'.$qty.'" class="'.$product->id.' counter-input">
                  <a data-tag-id="'.$product->id.'" class="add-item cursor-pointer">+</a>
                </div>
							</div>';
					}

					if ($product->get_type() === 'menu_product') {
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

						echo '<div class="product--info">
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
									// echo
									// 	'<p class="product--price product--price-with-discont">
									// 		<span class="monetary">R$</span>'.number_format($product->regular_price, 2,",",".").'
									// 	</p>';

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
											.number_format($product->regular_price / $total_days , 2,",",".").
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
										Eu quero
									</a>
						</div>
					</div>';
					}
				}?>

			</div>

		<?php woocommerce_product_loop_end(); ?>

	</section>

<?php endif;

wp_reset_postdata();

// <a href="/prontolight/dev/categoria-produto/pratos-e-sopas/?add-to-cart='.$product->id.'"
// class="button product_type_simple add_to_cart_button ajax_add_to_cart"
// data-quantity="1"
// data-product_id="'.$product->id.'"
// aria-label="Adicionar “'.get_the_title($product->id).'” no seu carrinho"
// rel="nofollow"
// data-product_sku="">
// Eu Quero
// </a>
