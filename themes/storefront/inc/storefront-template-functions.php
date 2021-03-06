<?php
/**
 * Storefront template functions.
 *
 * @package storefront
 */


function limitText( $text, $limit ) {
	$count = strlen( $text );
	if ( $count >= $limit ) {
		$text = substr( $text, 0, strrpos( substr( $text, 0, $limit ), ' ' ) ) . '...';

		return $text;
	}

	return $text;
}

if ( ! function_exists( 'storefront_display_comments' ) ) {
	/**
	 * Storefront display comments
	 *
	 * @since  1.0.0
	 */
	function storefront_display_comments() {
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || '0' != get_comments_number() ) :
			comments_template();
		endif;
	}
}

if ( ! function_exists( 'storefront_comment' ) ) {
	/**
	 * Storefront comment template
	 *
	 * @param array $comment the comment array.
	 * @param array $args the comment args.
	 * @param int   $depth the comment depth.
	 * @since 1.0.0
	 */
	function storefront_comment( $comment, $args, $depth ) {
		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
		?>
		<<?php echo esc_attr( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
		<div class="comment-body">
		<div class="comment-meta commentmetadata">
			<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 128 ); ?>
			<?php printf( wp_kses_post( '<cite class="fn">%s</cite>', 'storefront' ), get_comment_author_link() ); ?>
			</div>
			<?php if ( '0' == $comment->comment_approved ) : ?>
				<em class="comment-awaiting-moderation"><?php esc_attr_e( 'Your comment is awaiting moderation.', 'storefront' ); ?></em>
				<br />
			<?php endif; ?>

			<a href="<?php echo esc_url( htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ); ?>" class="comment-date">
				<?php echo '<time datetime="' . get_comment_date( 'c' ) . '">' . get_comment_date() . '</time>'; ?>
			</a>
		</div>
		<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-content">
		<?php endif; ?>
		<div class="comment-text">
		<?php comment_text(); ?>
		</div>
		<div class="reply">
		<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		<?php edit_comment_link( __( 'Edit', 'storefront' ), '  ', '' ); ?>
		</div>
		</div>
		<?php if ( 'div' != $args['style'] ) : ?>
		</div>
		<?php endif; ?>
	<?php
	}
}

if ( ! function_exists( 'storefront_footer_widgets' ) ) {
	/**
	 * Display the footer widget regions.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function storefront_footer_widgets() {
		$rows    = intval( apply_filters( 'storefront_footer_widget_rows', 1 ) );
		$regions = intval( apply_filters( 'storefront_footer_widget_columns', 4 ) );

		for ( $row = 1; $row <= $rows; $row++ ) :

			// Defines the number of active columns in this footer row.
			for ( $region = $regions; 0 < $region; $region-- ) {
				if ( is_active_sidebar( 'footer-' . strval( $region + $regions * ( $row - 1 ) ) ) ) {
					$columns = $region;
					break;
				}
			}

			if ( isset( $columns ) ) : ?>
				<div class=<?php echo '"footer-widgets row-' . strval( $row ) . ' col-' . strval( $columns ) . ' fix"'; ?>><?php

					for ( $column = 1; $column <= $columns; $column++ ) :
						$footer_n = $column + $regions * ( $row - 1 );

						if ( is_active_sidebar( 'footer-' . strval( $footer_n ) ) ) : ?>

							<div class="block footer-widget-<?php echo strval( $column ); ?>">
								<?php dynamic_sidebar( 'footer-' . strval( $footer_n ) ); ?>
							</div><?php

						endif;
					endfor; ?>

				</div><!-- .footer-widgets.row-<?php echo strval( $row ); ?> --><?php

				unset( $columns );
			endif;
		endfor;
	}
}

if ( ! function_exists( 'storefront_credit' ) ) {
	/**
	 * Display the theme credit
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function storefront_credit() {
		?>
		<div class="site-info">
		Pronto Light Comercio de Alimentos LTDA . CNPJ 10.927.559/0001-15. <br>
		R. Ab??lio Borin, 35 - Jardim Caravelas, S??o Paulo - SP, 04729-030

			<br />
			Fotos meramente ilustrativas
			<?php if ( apply_filters( 'storefront_credit_link', true ) ) { ?>
			<br />
			<?php
				if ( apply_filters( 'storefront_privacy_policy_link', true ) && function_exists( 'the_privacy_policy_link' ) ) {
					the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
				}
			?>
			<?php echo '<a href="https://woocommerce.com" target="_blank" title="' . esc_attr__( 'WooCommerce - The Best eCommerce Platform for WordPress', 'storefront' ) . '" rel="author">' . esc_html__( 'Built with Storefront &amp; WooCommerce', 'storefront' ) . '</a>.' ?>
			<?php } ?>
		</div><!-- .site-info -->
		<?php
	}
}

if ( ! function_exists( 'storefront_header_widget_region' ) ) {
	/**
	 * Display header widget region
	 *
	 * @since  1.0.0
	 */
	function storefront_header_widget_region() {
		if ( is_active_sidebar( 'header-1' ) ) {
		?>
		<div class="header-widget-region" role="complementary">
			<div class="col-full">
				<?php dynamic_sidebar( 'header-1' ); ?>
			</div>
		</div>
		<?php
		}
	}
}

if ( ! function_exists( 'storefront_site_branding' ) ) {
	/**
	 * Site branding wrapper and display
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function storefront_site_branding() {
		?>
		<div class="site-branding">
			<?php storefront_site_title_or_logo(); ?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'storefront_site_title_or_logo' ) ) {
	/**
	 * Display the site title or logo
	 *
	 * @since 2.1.0
	 * @param bool $echo Echo the string or return it.
	 * @return string
	 */
	function storefront_site_title_or_logo( $echo = true ) {
		if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
			$logo = get_custom_logo();
			$html = is_home() ? '<h1 class="logo">' . $logo . '</h1>' : $logo;
		} elseif ( function_exists( 'jetpack_has_site_logo' ) && jetpack_has_site_logo() ) {
			// Copied from jetpack_the_site_logo() function.
			$logo    = site_logo()->logo;
			$logo_id = get_theme_mod( 'custom_logo' ); // Check for WP 4.5 Site Logo
			$logo_id = $logo_id ? $logo_id : $logo['id']; // Use WP Core logo if present, otherwise use Jetpack's.
			$size    = site_logo()->theme_size();
			$html    = sprintf( '<a href="%1$s" class="site-logo-link" rel="home" itemprop="url">%2$s</a>',
				esc_url( home_url( '/' ) ),
				wp_get_attachment_image(
					$logo_id,
					$size,
					false,
					array(
						'class'     => 'site-logo attachment-' . $size,
						'data-size' => $size,
						'itemprop'  => 'logo'
					)
				)
			);

			$html = apply_filters( 'jetpack_the_site_logo', $html, $logo, $size );
		} else {
			$tag = is_home() ? 'h1' : 'div';

			$html = '<' . esc_attr( $tag ) . ' class="beta site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html( get_bloginfo( 'name' ) ) . '</a></' . esc_attr( $tag ) .'>';

			if ( '' !== get_bloginfo( 'description' ) ) {
				$html .= '<p class="site-description">' . esc_html( get_bloginfo( 'description', 'display' ) ) . '</p>';
			}
		}

		if ( ! $echo ) {
			return $html;
		}

		echo $html;
	}
}

if ( ! function_exists( 'storefront_primary_navigation' ) ) {
	/**
	 * Display Primary Navigation
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function storefront_primary_navigation() {
		?>
		<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_html_e( 'Primary Navigation', 'storefront' ); ?>">
			<button class="menu-toggle" aria-controls="site-navigation" aria-expanded="false"><span><?php echo esc_attr( apply_filters( 'storefront_menu_toggle_text', __( 'Menu', 'storefront' ) ) ); ?></span></button>
				<?php
				wp_nav_menu(
					array(
						'theme_location'	=> 'primary',
						'container_class'	=> 'primary-navigation',
          )
				);

				wp_nav_menu(
					array(
						'theme_location'	=> 'handheld',
						'container_class'	=> 'handheld-navigation',
						)
				);
				?>
		</nav><!-- #site-navigation -->
		<?php
	}
}

if ( ! function_exists( 'storefront_secondary_navigation' ) ) {
	/**
	 * Display Secondary Navigation
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function storefront_secondary_navigation() {
	    if ( has_nav_menu( 'secondary' ) ) {
		    ?>
		    <nav class="secondary-navigation" role="navigation" aria-label="<?php esc_html_e( 'Secondary Navigation', 'storefront' ); ?>">
			    <?php
				    wp_nav_menu(
					    array(
						    'theme_location'	=> 'secondary',
						    'fallback_cb'		=> '',
					    )
				    );
			    ?>
		    </nav><!-- #site-navigation -->
		    <?php
		}
	}
}

if ( ! function_exists( 'storefront_skip_links' ) ) {
	/**
	 * Skip links
	 *
	 * @since  1.4.1
	 * @return void
	 */
	function storefront_skip_links() {
		?>
		<a class="skip-link screen-reader-text" href="#site-navigation"><?php esc_attr_e( 'Skip to navigation', 'storefront' ); ?></a>
		<a class="skip-link screen-reader-text" href="#content"><?php esc_attr_e( 'Skip to content', 'storefront' ); ?></a>
		<?php
	}
}

if ( ! function_exists( 'storefront_homepage_header' ) ) {
	/**
	 * Display the page header without the featured image
	 *
	 * @since 1.0.0
	 */
	function storefront_homepage_header() {
		edit_post_link( __( 'Edit this section', 'storefront' ), '', '', '', 'button storefront-hero__button-edit' );
		?>
		<header class="entry-header">
			<?php
			the_title( '<h1 class="entry-title">', '</h1>' );
			?>
		</header><!-- .entry-header -->
		<?php
	}
}

if ( ! function_exists( 'storefront_page_header' ) ) {
	/**
	 * Display the page header
	 *
	 * @since 1.0.0
	 */
	function storefront_page_header() {
		?>
		<header class="entry-header">
			<?php
			storefront_post_thumbnail( 'full' );
			the_title( '<h1 class="entry-title">', '</h1>' );
			?>
		</header><!-- .entry-header -->
		<?php
	}
}

if ( ! function_exists( 'storefront_page_content' ) ) {
	/**
	 * Display the post content
	 *
	 * @since 1.0.0
	 */
	function storefront_page_content() {
		?>
		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'storefront' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
		<?php
	}
}

if ( ! function_exists( 'storefront_post_header' ) ) {
	/**
	 * Display the post header with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function storefront_post_header() {
		?>
		<header class="entry-header">
		<?php
		if ( is_single() ) {
			storefront_posted_on();
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			if ( 'post' == get_post_type() ) {
				storefront_posted_on();
			}

			the_title( sprintf( '<h2 class="alpha entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		}
		?>
		</header><!-- .entry-header -->
		<?php
	}
}

if ( ! function_exists( 'storefront_post_content' ) ) {
	/**
	 * Display the post content with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function storefront_post_content() {
		?>
		<div class="entry-content">
		<?php

		/**
		 * Functions hooked in to storefront_post_content_before action.
		 *
		 * @hooked storefront_post_thumbnail - 10
		 */
		// do_action( 'storefront_post_content_before' );

		// the_content(
		// 	sprintf(
		// 		__( 'Continue reading %s', 'storefront' ),
		// 		'<span class="screen-reader-text">' . get_the_title() . '</span>'
		// 	)
		// );

		echo '<a class="custom-blog__thumb" href="'.get_post_permalink().'">'.get_the_post_thumbnail().'</a>';

		if((bool)is_single() === true) {
			the_content();
		}

		if((bool)is_single() === false) {
			echo limitText(get_the_excerpt(), 200);

			echo '<br><br>';
			echo '<a href="'.get_post_permalink().'" class="button">Veja mais</a>';
		}

		do_action( 'storefront_post_content_after' );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'storefront' ),
			'after'  => '</div>',
		) );
		?>
		</div><!-- .entry-content -->
		<?php
	}
}

if ( ! function_exists( 'storefront_post_meta' ) ) {
	/**
	 * Display the post meta
	 *
	 * @since 1.0.0
	 */
	function storefront_post_meta() {
		?>
		<aside class="entry-meta">
			<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search.

			?>
			<div class="vcard author">
				<?php
					echo get_avatar( get_the_author_meta( 'ID' ), 128 );
					echo '<div class="label">' . esc_attr( __( 'Written by', 'storefront' ) ) . '</div>';
					echo sprintf( '<a href="%1$s" class="url fn" rel="author">%2$s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), get_the_author() );
				?>
			</div>
			<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'storefront' ) );

			if ( $categories_list ) : ?>
				<div class="cat-links">
					<?php
					echo '<div class="label">' . esc_attr( __( 'Posted in', 'storefront' ) ) . '</div>';
					echo wp_kses_post( $categories_list );
					?>
				</div>
			<?php endif; // End if categories. ?>

			<?php
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', __( ', ', 'storefront' ) );

			if ( $tags_list ) : ?>
				<div class="tags-links">
					<?php
					echo '<div class="label">' . esc_attr( __( 'Tagged', 'storefront' ) ) . '</div>';
					echo wp_kses_post( $tags_list );
					?>
				</div>
			<?php endif; // End if $tags_list. ?>

		<?php endif; // End if 'post' == get_post_type(). ?>

			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
				<div class="comments-link">
					<?php echo '<div class="label">' . esc_attr( __( 'Comments', 'storefront' ) ) . '</div>'; ?>
					<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'storefront' ), __( '1 Comment', 'storefront' ), __( '% Comments', 'storefront' ) ); ?></span>
				</div>
			<?php endif; ?>
		</aside>
		<?php
	}
}

if ( ! function_exists( 'storefront_paging_nav' ) ) {
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 */
	function storefront_paging_nav() {
		global $wp_query;

		$args = array(
			'type' 	    => 'list',
			'next_text' => _x( 'Next', 'Next post', 'storefront' ),
			'prev_text' => _x( 'Previous', 'Previous post', 'storefront' ),
			);

		the_posts_pagination( $args );
	}
}

if ( ! function_exists( 'storefront_post_nav' ) ) {
	/**
	 * Display navigation to next/previous post when applicable.
	 */
	function storefront_post_nav() {
		$args = array(
			'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next post:', 'storefront' ) . ' </span>%title',
			'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'storefront' ) . ' </span>%title',
			);
		the_post_navigation( $args );
	}
}

if ( ! function_exists( 'storefront_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function storefront_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time> <time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			_x( 'Posted on %s', 'post date', 'storefront' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo wp_kses( apply_filters( 'storefront_single_post_posted_on_html', '<span class="posted-on">' . $posted_on . '</span>', $posted_on ), array(
			'span' => array(
				'class'  => array(),
			),
			'a'    => array(
				'href'  => array(),
				'title' => array(),
				'rel'   => array(),
			),
			'time' => array(
				'datetime' => array(),
				'class'    => array(),
			),
		) );
	}
}

if ( ! function_exists( 'storefront_product_categories' ) ) {
	/**
	 * Display Product Categories
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since  1.0.0
	 * @param array $args the product section args.
	 * @return void
	 */
	function storefront_product_categories( $args ) {

		if ( storefront_is_woocommerce_activated() ) {

			$args = apply_filters( 'storefront_product_categories_args', array(
				'limit' 						=> 3,
				'columns' 					=> 3,
				'child_categories' 	=> 0,
				'orderby' 					=> 'name',
				'title'							=> __( 'Shop by Category', 'storefront' ),
			) );

			$shortcode_content = storefront_do_shortcode( 'product_categories', apply_filters( 'storefront_product_categories_shortcode_args', array(
				'number'  => intval( $args['limit'] ),
				'columns' => intval( $args['columns'] ),
				'orderby' => esc_attr( $args['orderby'] ),
				'parent'  => esc_attr( $args['child_categories'] ),
			) ) );

			/**
			 * Only display the section if the shortcode returns product categories
			 */
			if ( false !== strpos( $shortcode_content, 'product-category' ) ) {

				echo '<section class="storefront-product-section storefront-product-categories" aria-label="' . esc_attr__( 'Product Categories', 'storefront' ) . '">';

				do_action( 'storefront_homepage_before_product_categories' );

				echo '<h2 class="section-title">' . wp_kses_post( $args['title'] ) . '</h2>';

				do_action( 'storefront_homepage_after_product_categories_title' );

				echo $shortcode_content;

				do_action( 'storefront_homepage_after_product_categories' );

				echo '</section>';

			}
		}
	}
}

if ( ! function_exists( 'storefront_recent_products' ) ) {
	/**
	 * Display Recent Products
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since  1.0.0
	 * @param array $args the product section args.
	 * @return void
	 */
	function storefront_recent_products( $args ) {

		if ( storefront_is_woocommerce_activated() ) {

			$args = apply_filters( 'storefront_recent_products_args', array(
				'limit'   => 4,
				'columns' => 4,
				'orderby' => 'date',
				'order'   => 'desc',
				'title'   => __( 'New In', 'storefront' ),
			) );

			$shortcode_content = storefront_do_shortcode( 'products', apply_filters( 'storefront_recent_products_shortcode_args', array(
				'orderby'  => esc_attr( $args['orderby'] ),
				'order'    => esc_attr( $args['order'] ),
				'per_page' => intval( $args['limit'] ),
				'columns'  => intval( $args['columns'] ),
			) ) );

			/**
			 * Only display the section if the shortcode returns products
			 */
			if ( false !== strpos( $shortcode_content, 'product' ) ) {

				echo '<section class="storefront-product-section storefront-recent-products" aria-label="' . esc_attr__( 'Recent Products', 'storefront' ) . '">';

				do_action( 'storefront_homepage_before_recent_products' );

				echo '<h2 class="section-title">' . wp_kses_post( $args['title'] ) . '</h2>';

				do_action( 'storefront_homepage_after_recent_products_title' );

				echo $shortcode_content;

				do_action( 'storefront_homepage_after_recent_products' );

				echo '</section>';

			}
		}
	}
}

if ( ! function_exists( 'storefront_featured_products' ) ) {
	/**
	 * Display Featured Products
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since  1.0.0
	 * @param array $args the product section args.
	 * @return void
	 */
	function storefront_featured_products( $args ) {

		if ( storefront_is_woocommerce_activated() ) {

			$args = apply_filters( 'storefront_featured_products_args', array(
				'limit'      => 4,
				'columns'    => 4,
				'orderby'    => 'date',
				'order'      => 'desc',
				'visibility' => 'featured',
				'title'      => __( 'We Recommend', 'storefront' ),
			) );

			$shortcode_content = storefront_do_shortcode( 'products', apply_filters( 'storefront_featured_products_shortcode_args', array(
				'per_page'   => intval( $args['limit'] ),
				'columns'    => intval( $args['columns'] ),
				'orderby'    => esc_attr( $args['orderby'] ),
				'order'      => esc_attr( $args['order'] ),
				'visibility' => esc_attr( $args['visibility'] ),
			) ) );

			/**
			 * Only display the section if the shortcode returns products
			 */
			if ( false !== strpos( $shortcode_content, 'product' ) ) {

				echo '<section class="storefront-product-section storefront-featured-products" aria-label="' . esc_attr__( 'Featured Products', 'storefront' ) . '">';

				do_action( 'storefront_homepage_before_featured_products' );

				echo '<h2 class="section-title">' . wp_kses_post( $args['title'] ) . '</h2>';

				do_action( 'storefront_homepage_after_featured_products_title' );

				echo $shortcode_content;

				do_action( 'storefront_homepage_after_featured_products' );

				echo '</section>';

			}
		}
	}
}

if ( ! function_exists( 'storefront_popular_products' ) ) {
	/**
	 * Display Popular Products
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since  1.0.0
	 * @param array $args the product section args.
	 * @return void
	 */
	function storefront_popular_products( $args ) {

		if ( storefront_is_woocommerce_activated() ) {

			$args = apply_filters( 'storefront_popular_products_args', array(
				'limit'   => 4,
				'columns' => 4,
				'orderby' => 'rating',
				'order'   => 'desc',
				'title'   => __( 'Fan Favorites', 'storefront' ),
			) );

			$shortcode_content = storefront_do_shortcode( 'products', apply_filters( 'storefront_popular_products_shortcode_args', array(
				'per_page' => intval( $args['limit'] ),
				'columns'  => intval( $args['columns'] ),
				'orderby'  => esc_attr( $args['orderby'] ),
				'order'    => esc_attr( $args['order'] ),
			) ) );

			/**
			 * Only display the section if the shortcode returns products
			 */
			if ( false !== strpos( $shortcode_content, 'product' ) ) {

				echo '<section class="storefront-product-section storefront-popular-products" aria-label="' . esc_attr__( 'Popular Products', 'storefront' ) . '">';

				do_action( 'storefront_homepage_before_popular_products' );

				echo '<h2 class="section-title">' . wp_kses_post( $args['title'] ) . '</h2>';

				do_action( 'storefront_homepage_after_popular_products_title' );

				echo $shortcode_content;

				do_action( 'storefront_homepage_after_popular_products' );

				echo '</section>';

			}
		}
	}
}

if ( ! function_exists( 'storefront_on_sale_products' ) ) {
	/**
	 * Display On Sale Products
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @param array $args the product section args.
	 * @since  1.0.0
	 * @return void
	 */
	function storefront_on_sale_products( $args ) {

		if ( storefront_is_woocommerce_activated() ) {

			$args = apply_filters( 'storefront_on_sale_products_args', array(
				'limit'   => 4,
				'columns' => 4,
				'orderby' => 'date',
				'order'   => 'desc',
				'on_sale' => 'true',
				'title'   => __( 'On Sale', 'storefront' ),
			) );

			$shortcode_content = storefront_do_shortcode( 'products', apply_filters( 'storefront_on_sale_products_shortcode_args', array(
				'per_page' => intval( $args['limit'] ),
				'columns'  => intval( $args['columns'] ),
				'orderby'  => esc_attr( $args['orderby'] ),
				'order'    => esc_attr( $args['order'] ),
				'on_sale'  => esc_attr( $args['on_sale'] ),
			) ) );

			/**
			 * Only display the section if the shortcode returns products
			 */
			if ( false !== strpos( $shortcode_content, 'product' ) ) {

				echo '<section class="storefront-product-section storefront-on-sale-products" aria-label="' . esc_attr__( 'On Sale Products', 'storefront' ) . '">';

				do_action( 'storefront_homepage_before_on_sale_products' );

				echo '<h2 class="section-title">' . wp_kses_post( $args['title'] ) . '</h2>';

				do_action( 'storefront_homepage_after_on_sale_products_title' );

				echo $shortcode_content;

				do_action( 'storefront_homepage_after_on_sale_products' );

				echo '</section>';

			}
		}
	}
}

if ( ! function_exists( 'storefront_best_selling_products' ) ) {
	/**
	 * Display Best Selling Products
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since 2.0.0
	 * @param array $args the product section args.
	 * @return void
	 */
	function storefront_best_selling_products( $args ) {
		if ( storefront_is_woocommerce_activated() ) {

			$args = apply_filters( 'storefront_best_selling_products_args', array(
				'limit'   => 4,
				'columns' => 4,
				'orderby' => 'popularity',
				'order'   => 'desc',
				'title'	  => esc_attr__( 'Best Sellers', 'storefront' ),
			) );

			$shortcode_content = storefront_do_shortcode( 'products', apply_filters( 'storefront_best_selling_products_shortcode_args', array(
				'per_page' => intval( $args['limit'] ),
				'columns'  => intval( $args['columns'] ),
				'orderby'  => esc_attr( $args['orderby'] ),
				'order'    => esc_attr( $args['order'] ),
			) ) );

			/**
			 * Only display the section if the shortcode returns products
			 */
			if ( false !== strpos( $shortcode_content, 'product' ) ) {

				echo '<section class="storefront-product-section storefront-best-selling-products" aria-label="' . esc_attr__( 'Best Selling Products', 'storefront' ) . '">';

				do_action( 'storefront_homepage_before_best_selling_products' );

				echo '<h2 class="section-title">' . wp_kses_post( $args['title'] ) . '</h2>';

				do_action( 'storefront_homepage_after_best_selling_products_title' );

				echo $shortcode_content;

				do_action( 'storefront_homepage_after_best_selling_products' );

				echo '</section>';

			}
		}
	}
}

if ( ! function_exists( 'storefront_homepage_content' ) ) {
	/**
	 * Display homepage content
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since  1.0.0
	 * @return  void
	 */
	function storefront_homepage_content() {
		while ( have_posts() ) {
			the_post();

			get_template_part( 'content', 'homepage' );

		} // end of the loop.
	}
}

if ( ! function_exists( 'storefront_social_icons' ) ) {
	/**
	 * Display social icons
	 * If the subscribe and connect plugin is active, display the icons.
	 *
	 * @link http://wordpress.org/plugins/subscribe-and-connect/
	 * @since 1.0.0
	 */
	function storefront_social_icons() {
		if ( class_exists( 'Subscribe_And_Connect' ) ) {
			echo '<div class="subscribe-and-connect-connect">';
			subscribe_and_connect_connect();
			echo '</div>';
		}
	}
}

if ( ! function_exists( 'storefront_get_sidebar' ) ) {
	/**
	 * Display storefront sidebar
	 *
	 * @uses get_sidebar()
	 * @since 1.0.0
	 */
	function storefront_get_sidebar() {
		get_sidebar();
	}
}

if ( ! function_exists( 'storefront_post_thumbnail' ) ) {
	/**
	 * Display post thumbnail
	 *
	 * @var $size thumbnail size. thumbnail|medium|large|full|$custom
	 * @uses has_post_thumbnail()
	 * @uses the_post_thumbnail
	 * @param string $size the post thumbnail size.
	 * @since 1.5.0
	 */
	function storefront_post_thumbnail( $size = 'full' ) {
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( $size );
		}
	}
}

if ( ! function_exists( 'storefront_primary_navigation_wrapper' ) ) {
	/**
	 * The primary navigation wrapper
	 */
	function storefront_primary_navigation_wrapper() {
		echo '<div class="storefront-primary-navigation"><div class="col-full">';
	}
}

if ( ! function_exists( 'storefront_primary_navigation_wrapper_close' ) ) {
	/**
	 * The primary navigation wrapper close
	 */
	function storefront_primary_navigation_wrapper_close() {
		echo '</div></div>';
	}
}

if ( ! function_exists( 'storefront_header_container' ) ) {
	/**
	 * The header container
	 */
	function storefront_header_container() {
		echo '<div class="col-full">';
	}
}

if ( ! function_exists( 'storefront_header_container_close' ) ) {
	/**
	 * The header container close
	 */
	function storefront_header_container_close() {
		echo '</div>';
	}
}


// <div class="slider-home slider-home--summer">
//   <div class="col-full">
//     <div class="slider-home__container">
//       <div class="slider-home__content">
//         <div class="slider-home__text">
//           <a href="https://prontolight.com/categoria-produto/objetivo/">
//             <img style="float: left; max-height: 320px;" src="wp-content/uploads/2019/01/txt-programas-de-emagrecimento.png">
//           </a>
//         </div>
//       </div>
//     </div>
//   </div>
// </div>


// style="background: url(wp-content/uploads/2019/06/Banner-Molhos.png); background-size: contain; background-repeat: no-repeat;"
// style="background: url(wp-content/uploads/2019/06/Sopas-Pronto-Banner.png); background-size: contain; background-repeat: no-repeat;"

if ( ! function_exists( 'storefront_homepage_custom_slider' ) ) {
	/**
	 * Display homepage content
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since  1.0.0
	 * @return  void
	 */
	function storefront_homepage_custom_slider() {
		echo '<div class="fullbanner-home__mobile owl-carousel owl-theme">';

    if( have_rows('banner_mobile', 26) ):
      while( have_rows('banner_mobile', 26) ): the_row();
        $link = get_sub_field('link');
        $image = get_sub_field('imagem');

        echo '<a style="background: url('.$image.') no-repeat;" href="'.$link.'"></a>';
      endwhile;
    endif;

		echo '</div>';

    echo
    '<section class="fullbanner-home">
      <div class="fullbanner-home__slider owl-carousel owl-theme">';
        if( have_rows('banner_desktop', 26) ):
          while( have_rows('banner_desktop', 26) ): the_row();
            $link = get_sub_field('link');
            $image = get_sub_field('imagem');

            echo '<div class="slider-home slider-home--novidade" style=" background-size: cover !important; background-position: center !important;  background: url('.$image.') no-repeat;">
              <div class="col-full">
                <div class="slider-home__container">
                  <div class="slider-home__content">
                    <div class="slider-home__text" >
                      <a href="'.$link.'"></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>';
          endwhile;
        endif;
      echo '</div>
    </section>';
	}
}

if ( ! function_exists( 'storefront_homepage_custom_features_home' ) ) {
	/**
	 * Display homepage content
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since  1.0.0
	 * @return  void
	 */
	function storefront_homepage_custom_features_home() {
		echo
			'<section class="features-home">
				<div class="col-full">
					<div class="table-row">
						<div class="table-row__column features-home__column">
						<img src="wp-content/themes/prontolight-child/assets/images/3xs-juros.png">
						<p class="text-bold text-italic">no cart??o para compras acima de R$300</p>
						</div>
						<div class="table-row__column features-home__column">
						<img src="wp-content/themes/prontolight-child/assets/images/entrega-rapida.png">
						<p class="text-bold text-italic">Pe??a hoje e receba amanh??*</p>
						</div>
						<div class="table-row__column features-home__column">
						<img src="wp-content/themes/prontolight-child/assets/images/entrega-todososdias.png">
						<p class="text-bold text-italic">Entregas de segunda a s??bado*</p>
						</div>
						<div class="table-row__column features-home__column">
						<img src="wp-content/themes/prontolight-child/assets/images/entrega-noturna.png">
						<p class="text-bold text-italic">Entrega noturna das 20h ??s 23h*</p>
						</div>
					</div>
				</div>
			</section>

			<div class="col-full">
				<span class="span--info">*Condi????es v??lidas para S??o Paulo Capital e Grande S??o Paulo.</span>
			</div>
			';
	}
}

if ( ! function_exists( 'storefront_homepage_custom_program_tabs' ) ) {
		/**
	 * Display homepage content
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since  1.0.0
	 * @return  void
	 */
	function storefront_homepage_custom_program_tabs() {
		echo '<section class="products-tabs-home program-tabs-home default-section">';
			echo '<div class="col-full">';
				echo '<h2 class="h2 text-center" >Destaques</h2>';

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

							// var_dump((bool)unserialize($user_meta['custom-menu-' . $product->id][0]));
							// echo '<br><hr>';
							// echo '$days ';
							// var_dump($days);
							// echo '<br><hr>';
							// echo '$get_prices ';
							// var_dump($get_prices);
							// echo '<br><hr>';
							// echo '$user_id: '.$user_id;
							// echo '<br><hr>';
							// echo '$regular_price: '.$regular_price;
							// echo '<br><hr>';
							// echo '$sale_price: '.(int)$sale_price;
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
                        <span class="per-day">Valor por dia</span>

                        <div>
                          <span class="monetary">R$</span>
                          <span class="price-last-twoo">'
                            .number_format(($sale_price !== "") ? $sale_price / $total_days : $regular_price / $total_days , 2,",",".").
                          '</span>
                        </div>
											</p>';
									} elseif ($product->sale_price !== "") {
										echo
                      '<p class="product--price product--price-per-day">
												<span class="per-day">Valor por dia</span>

                        <div>
                          <span class="monetary">R$</span>
                          <span class="price-last-twoo">'
                            .number_format(($sale_price !== "") ? $product->sale_price / $total_days : $product->regular_price / $total_days , 2,",",".").
                          '</span>
                        </div>
											</p>';
									} else {
										echo
                    '<p class="product--price product--price-per-day">
                      <span class="per-day">Valor por dia</span>

                      <div>
                        <span class="monetary">R$</span>
                        <span class="price-last-twoo">'
                          .number_format($regular_price / $total_days , 2,",",".").
                        '</span>
                      </div>

										</p>';
									}
								} elseif ($user_id !== 0 && (bool)unserialize($user_meta['custom-menu-'.$product->id][0]) === false) {

									if ((int)$product->sale_price !== 0) {
										echo
                      '<p class="product--price product--price-per-day">
                        <span class="per-day">Valor por dia</span>

                        <div>
                          <span class="monetary">R$</span>
                          <span class="price-last-twoo">'
                            .number_format(($sale_price !== "") ? $product->sale_price / $total_days : $product->regular_price / $total_days , 2,",",".").
                          '</span>
                        </div>
											</p>';
									}

									if ((int)$product->sale_price === 0) {
										echo
                      '<p class="product--price product--price-per-day">
                        <span class="per-day">Valor por dia</span>

                        <div>
                          <span class="monetary">R$</span>
                          <span class="price-last-twoo">'
                            .number_format($product->regular_price / $total_days, 2,",",".").
                          '</span>
                        </div>
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
										<a
											class="button button--reverse product_type_simple add_to_cart_button ajax_add_to_cart"
											data-quantity="1"
											data-product_id="'.$product->id.'"
											aria-label="Adicionar ???'.$the_title.'??? no seu carrinho"
											rel="nofollow"
											data-product_sku="">
											Eu Quero
                    </a>
							</div>
						</div>';
						}
					}
				echo '</div>';
			echo '</div>';
		echo '</section>';
	}
}

if ( ! function_exists( 'storefront_homepage_custom_products_tabs' ) ) {
	/**
	 * Display homepage content
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since  1.0.0
	 * @return  void
	 */
	function storefront_homepage_custom_products_tabs() {
    global $woocommerce;
    $items_cart = $woocommerce->cart->get_cart();

    echo '<section class="products-tabs-home default-section" style="position: relative;">';

			echo '<div class="col-full">';
				echo '<h2 class="h2 text-center">Mais Vendidos</h2>';

				echo
					'<div class="tab-custom">
						<ul class="tabs-custom">
							<li id="pratos"><a href="#" class="tab-link">Pratos</a></li>
							<li id="porcoes"><a href="#" class="tab-link">Por????es</a></li>
							<li id="lanches"><a href="#" class="tab-link">Lanches</a></li>
							<li id="sucos"><a href="#" class="tab-link">Sucos</a></li>
						</ul>';

					echo '<div class="tab_content">';
						echo '<div class="loader"></div>';

						//--> Pratos e Sopas!
						echo '<div class="tabs_item" data-id="pratos" style="display: block;">';
							// The tax query
							$tax_query[] = array(
								'taxonomy' => 'product_visibility',
								'field'    => 'name',
								'terms'    => 'featured',
								'operator' => 'IN', // or 'NOT IN' to exclude feature products
							);

							$args = array(
								'post_type' 			=> 'product',
								'posts_per_page' 	=> 15,
								'product_cat' 		=> 'pratos-e-sopas',
								'orderby' 				=> 'meta_value_num',
								'order'						=> 'asc',
								'meta_key'				=> 'total_sales',
								'tax_query'       => $tax_query
							);

							$loop = new WP_Query($args);

							echo '<div class="owl-carousel--products owl-carousel owl-theme">';
								while($loop->have_posts()) {
									$loop->the_post();
									global $product;

									$weight = get_field('field_5b17f00cb8c34', $product->id);

									echo
                    '<div class="item">
                      <div class="wrapper-product-counter not-show '.$product->id.'">
                        <a data-tag-id="'.$product->id.'" class="remove-item ajax_add_to_cart cursor-pointer">-</a>';

                        $qty = 1;

                        foreach($items_cart as $item => $values) {
                          $_product_id = (int) $values['data']->get_id();

                          if ( $_product_id === $product->id ) {
                            $qty = (int) $values['quantity'];
                            echo
                              "<script>
                                setTimeout(function(){
                                  jQuery('.wrapper-product-counter.".$product->id."').removeClass('not-show');
                                  jQuery('.button[data-product_id=".$product->id."]').css({ 'display': 'none' });
                                  jQuery('.img-custom--overlay.this--white.".$product->id."').css({ 'opacity': '1', 'visibility': 'visible' });
                                }, 600);
                              </script>";

                            break;
                          } else {
                            echo
                              "<script>
                                setTimeout(function(){
                                  jQuery('.wrapper-product-counter.".$product->id."').addClass('not-show');
                                  jQuery('.button[data-product_id=".$product->id."]').css({ 'display': 'flex' });
                                }, 600);
                              </script>";
                          }
                        }

                      echo '
                        <input type="number" value="'.$qty.'" class="'.$product->id.' counter-input">
                        <a data-tag-id="'.$product->id.'" class="add-item cursor-pointer">+</a>
                      </div>

											<a class="img-custom--link '.$product->id.'" href="'. get_permalink($loop->post->ID) .'">
												<img class=""
													src="'. get_the_post_thumbnail_url($loop->post->ID, 'post-thumbnail') .'"
                          alt="'.$loop->post->post_title.'">

                        <div class="img-custom--overlay '.$product->id.' this--white">
                          <input type="number" value="'.$qty.'" class="'.$product->id.' counter-input">
                        </div>
											</a>

                      <div class="product--info">
                        <a href="'.get_permalink($loop->post->ID).'">'.$loop->post->post_title.'</a>

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
                    </div>';
								}
							echo '</div>';
						echo '</div>';

						//--> Por????es!
						echo '<div class="tabs_item" data-id="porcoes">';
							// The tax query
							$tax_query[] = array(
								'taxonomy' => 'product_visibility',
								'field'    => 'name',
								'terms'    => 'featured',
								'operator' => 'IN', // or 'NOT IN' to exclude feature products
							);

							$args = array(
								'post_type' 			=> 'product',
								'posts_per_page' 	=> 15,
								'product_cat' 		=> 'porcoes',
								'orderby' 				=> 'meta_value_num',
								'order'						=> 'asc',
								'meta_key'				=> 'total_sales',
								'tax_query'       => $tax_query
							);

							$loop = new WP_Query($args);

							echo '<div class="owl-carousel--products owl-carousel owl-theme">';
                while($loop->have_posts()) {
                  $loop->the_post();
                  global $product;

                  $weight = get_field('field_5b17f00cb8c34', $product->id);

                  echo
                    '<div class="item">
                      <div class="wrapper-product-counter not-show '.$product->id.'">
                        <a data-tag-id="'.$product->id.'" class="remove-item ajax_add_to_cart cursor-pointer">-</a>';

                        $qty = 1;

                        foreach($items_cart as $item => $values) {
                          $_product_id = (int) $values['data']->get_id();

                          if ( $_product_id === $product->id ) {
                            $qty = (int) $values['quantity'];
                            echo
                              "<script>
                                setTimeout(function(){
                                  jQuery('.wrapper-product-counter.".$product->id."').removeClass('not-show');
                                  jQuery('.button[data-product_id=".$product->id."]').css({ 'display': 'none' });
                                  jQuery('.img-custom--overlay.this--white.".$product->id."').css({ 'opacity': '1', 'visibility': 'visible' });
                                }, 600);
                              </script>";

                            break;
                          } else {
                            echo
                              "<script>
                                setTimeout(function(){
                                  jQuery('.wrapper-product-counter.".$product->id."').addClass('not-show');
                                  jQuery('.button[data-product_id=".$product->id."]').css({ 'display': 'flex' });
                                }, 600);
                              </script>";
                          }
                        }

                      echo '
                        <input type="number" value="'.$qty.'" class="'.$product->id.' counter-input">
                        <a data-tag-id="'.$product->id.'" class="add-item cursor-pointer">+</a>
                      </div>

                      <a class="img-custom--link '.$product->id.'" href="'. get_permalink($loop->post->ID) .'">
                        <img class=""
                          src="'. get_the_post_thumbnail_url($loop->post->ID, 'post-thumbnail') .'"
                          alt="'.$loop->post->post_title.'">

                        <div class="img-custom--overlay '.$product->id.' this--white">
                          <input type="number" value="'.$qty.'" class="'.$product->id.' counter-input">
                        </div>
                      </a>

                      <div class="product--info">
                        <a href="'.get_permalink($loop->post->ID).'">'.$loop->post->post_title.'</a>

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
                  </div>';
                }
							echo '</div>';
						echo '</div>';

						//--> Lanches!
						echo '<div class="tabs_item" data-id="lanches">';
							// The tax query
							$tax_query[] = array(
								'taxonomy' => 'product_visibility',
								'field'    => 'name',
								'terms'    => 'featured',
								'operator' => 'IN', // or 'NOT IN' to exclude feature products
							);

							$args = array(
								'post_type' 			=> 'product',
								'posts_per_page' 	=> 15,
								'product_cat' 		=> 'lanches-e-quiches',
								'orderby' 				=> 'meta_value_num',
								'order'						=> 'asc',
								'meta_key'				=> 'total_sales',
								'tax_query'       => $tax_query
							);

							$loop = new WP_Query($args);

							echo '<div class="owl-carousel--products owl-carousel owl-theme">';
                while($loop->have_posts()) {
                  $loop->the_post();
                  global $product;

                  $weight = get_field('field_5b17f00cb8c34', $product->id);

                  echo
                    '<div class="item">
                      <div class="wrapper-product-counter not-show '.$product->id.'">
                        <a data-tag-id="'.$product->id.'" class="remove-item ajax_add_to_cart cursor-pointer">-</a>';

                        $qty = 1;

                        foreach($items_cart as $item => $values) {
                          $_product_id = (int) $values['data']->get_id();

                          if ( $_product_id === $product->id ) {
                            $qty = (int) $values['quantity'];
                            echo
                              "<script>
                                setTimeout(function(){
                                  jQuery('.wrapper-product-counter.".$product->id."').removeClass('not-show');
                                  jQuery('.button[data-product_id=".$product->id."]').css({ 'display': 'none' });
                                  jQuery('.img-custom--overlay.this--white.".$product->id."').css({ 'opacity': '1', 'visibility': 'visible' });
                                }, 600);
                              </script>";

                            break;
                          } else {
                            echo
                              "<script>
                                setTimeout(function(){
                                  jQuery('.wrapper-product-counter.".$product->id."').addClass('not-show');
                                  jQuery('.button[data-product_id=".$product->id."]').css({ 'display': 'flex' });
                                }, 600);
                              </script>";
                          }
                        }

                      echo '
                        <input type="number" value="'.$qty.'" class="'.$product->id.' counter-input">
                        <a data-tag-id="'.$product->id.'" class="add-item cursor-pointer">+</a>
                      </div>

                      <a class="img-custom--link '.$product->id.'" href="'. get_permalink($loop->post->ID) .'">
                        <img class=""
                          src="'. get_the_post_thumbnail_url($loop->post->ID, 'post-thumbnail') .'"
                          alt="'.$loop->post->post_title.'">

                        <div class="img-custom--overlay '.$product->id.' this--white">
                          <input type="number" value="'.$qty.'" class="'.$product->id.' counter-input">
                        </div>
                      </a>

                      <div class="product--info">
                        <a href="'.get_permalink($loop->post->ID).'">'.$loop->post->post_title.'</a>

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
                  </div>';
                }
							echo '</div>';
						echo '</div>';

						//--> Sucos!
						echo '<div class="tabs_item" data-id="sucos">';
							// The tax query
							$tax_query[] = array(
								'taxonomy' => 'product_visibility',
								'field'    => 'name',
								'terms'    => 'featured',
								'operator' => 'IN', // or 'NOT IN' to exclude feature products
							);

							$args = array(
								'post_type' 			=> 'product',
								'posts_per_page' 	=> 15,
								'product_cat' 		=> 'sucos',
								'orderby' 				=> 'meta_value_num',
								'order'						=> 'asc',
								'meta_key'				=> 'total_sales',
								'tax_query'       => $tax_query // <===
							);

							$loop = new WP_Query($args);

							echo '<div class="owl-carousel--products owl-carousel owl-theme">';
                while($loop->have_posts()) {
                  $loop->the_post();
                  global $product;

                  $weight = get_field('field_5b17f00cb8c34', $product->id);

                  echo
                    '<div class="item">
                      <div class="wrapper-product-counter not-show '.$product->id.'">
                        <a data-tag-id="'.$product->id.'" class="remove-item ajax_add_to_cart cursor-pointer">-</a>';

                        $qty = 1;

                        foreach($items_cart as $item => $values) {
                          $_product_id = (int) $values['data']->get_id();

                          if ( $_product_id === $product->id ) {
                            $qty = (int) $values['quantity'];
                            echo
                              "<script>
                                setTimeout(function(){
                                  jQuery('.wrapper-product-counter.".$product->id."').removeClass('not-show');
                                  jQuery('.button[data-product_id=".$product->id."]').css({ 'display': 'none' });
                                  jQuery('.img-custom--overlay.this--white.".$product->id."').css({ 'opacity': '1', 'visibility': 'visible' });
                                }, 600);
                              </script>";

                            break;
                          } else {
                            echo
                              "<script>
                                setTimeout(function(){
                                  jQuery('.wrapper-product-counter.".$product->id."').addClass('not-show');
                                  jQuery('.button[data-product_id=".$product->id."]').css({ 'display': 'flex' });
                                }, 600);
                              </script>";
                          }
                        }

                      echo '
                        <input type="number" value="'.$qty.'" class="'.$product->id.' counter-input">
                        <a data-tag-id="'.$product->id.'" class="add-item cursor-pointer">+</a>
                      </div>

                      <a class="img-custom--link '.$product->id.'" href="'. get_permalink($loop->post->ID) .'">
                        <img class=""
                          src="'. get_the_post_thumbnail_url($loop->post->ID, 'post-thumbnail') .'"
                          alt="'.$loop->post->post_title.'">

                        <div class="img-custom--overlay '.$product->id.' this--white">
                          <input type="number" value="'.$qty.'" class="'.$product->id.' counter-input">
                        </div>
                      </a>

                      <div class="product--info">
                        <a href="'.get_permalink($loop->post->ID).'">'.$loop->post->post_title.'</a>

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
                  </div>';
                }
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</section>';
	}
}

if ( ! function_exists( 'storefront_homepage_custom_feature_product' ) ) {
	/**
	 * Display homepage content
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since  1.0.0
	 * @return  void
	 */
	function storefront_homepage_custom_feature_product() {
		echo '<section class="home-feature-product">';
			echo '<div class="home-feature-product__wrapper">';
				echo '<div class="home-feature-product__column">';
					echo '</div>';
					echo '<div class="home-feature-product__column">';
					echo '<div class="home-feature-product__content content-featured-product">';
					echo '<h2 class="content-featured-product__main-title text-white" style="font-size: 66px;text-transform: capitalize; font-weight: normal">Programa de emagrecimento</h2>';
					echo '<h3 class="content-featured-product__title">WLT 21 dias (Weight Loss Transformation)</h3>';
					// echo '<p class="content-featured-product__kcal">400kcal</p>';
					echo
						'<p class="content-featured-product__description">
							O WLT ?? um kit completo de emagrecimento, composto de Refei????es Saud??veis entregues na sua casa. S??o 21 dias com TODAS as refei????es saud??veis (caf?? da manh??, lanches, almo??o e jantar). <br>
							O card??pio ?? feito com base em suas necessidades e prefer??ncias.  Descubra como pessoas emagrecem at?? 8 kilos em 3 semanas e como voc?? tamb??m pode fazer o mesmo. Se voc?? quer emagrecer, clique abaixo
						</p>';
					// echo '<p class="content-featured-product__price">R$25<span>,30</span></p>';
					echo '<a class="button" href="https://forms.gle/uKPTJKssutSXwNuA6" target="_blank">Eu Quero</a>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</section>';


//depoimentos


		echo '<br /><br /><br /><br />
		<section id="home-depoimentos">

				<div class="col-full">
					<h2 class="h2 text-center">DEPOIMENTOS</h2>
					<div class="custom-row">

						<div class="custom-col-4">
							<div class="box-depoimento">
								<span class="pic1"> </span>
								<h3>Ana Carolina</h3>
								<p style="color: #6d6d6d; font-size: 14px;">"Consegui finalmente seguir uma alimenta????o saud??vel e variada nutricionalmente, conforme minha necessidade direcionada aos meus treinos."</p>
							</div>
						</div>

						<div class="custom-col-4">
							<div class="box-depoimento">
								<span class="pic2"> </span>
								<h3>Higor</h3>
								<p style="color: #6d6d6d; font-size: 14px;">"Por onde come??ar? Comida? Sabor? Embalagem ? Atendimento? Praticidade? J?? utilizo a Pronto Light h?? 3 meses e super recomendo! O sabor ?? incr??vel, a embalagem uma facilidade, o atendimento impec??vel!" </p>
							</div>
						</div>

						<div class="custom-col-4">
							<div class="box-depoimento">
								<span class="pic3"> </span>
								<h3>Thaiza</h3>
								<p style="color: #6d6d6d; font-size: 14px;">"A melhor forma de comer comida de boa qualidade com praticidade no dia a dia!"</p>
							</div>
						</div>

					</div>
				</div>
			</section>';


//sobre


		echo '<section id="sobre-pronto">
				<h2 class="h2 text-center">prontolight</h2>

				<div id="box-text">
					<h1 style="font-size: 24px;
    font-weight: 500; position: relative;     margin-top: -15px; text-transform: uppercase;">Delivery de Comida Congelada Saud??vel em SP</h1>

					<p style="color: #6d6d6d; font-size: 14px;">Vivemos com objetivo de mudar a vida das pessoas atrav??s de uma <strong>alimenta????o equilibrada, saud??vel</strong> e extremamente pr??tica. O que fazemos de t??o diferente? Buscamos sempre novas formas de trazer praticidade para o seu dia-a-dia, comida gostosa e que faz bem para a sa??de. Sabemos da import??ncia de sempre inovar, de trazer uma experi??ncia cada vez melhor para os nossos clientes atrav??s da nossa experi??ncia. Na correria di??ria muitas pessoas n??o tem tempo para cozinhar, ou sequer gostam, mas sabem a import??ncia da comida de qualidade, do poder transformador da comida.  Oferecemos uma enorme variedade de comidas congeladas saud??veis, voc?? escolhe o que te atende: comida para o dia a dia, <strong>programas de emagrecimento</strong>, kits detox, low carb, marmitas fitness, doces fitness, sucos saud??veis, lanches e snack. Nossa comida ?? feita com muito sabor e carinho. Embaladas em por????es individuais e a v??cuo garantindo a conserva????o natural dos alimentos, al??m da qualidade. ?? a tecnologia presente em nossa cozinha. Temos tanta certeza que voc?? vai gostar que garantimos: se n??o gostar de algum prato, mandamos outro para voc??! </p>
				</div>
				<div class="col-full">

					<div class="custom-row">
						<div class="custom-col-6">

							<div class="box-accordion">
								<h3 onclick="jQuery(\'+div\',this).toggle(500);"style="    color: #174063; font-size: 15px;
    font-weight: 500;">O que ?? uma alimenta????o saud??vel?<i class="fas fa-angle-down"></i></h3>
								<div><p style="color: #6d6d6d; font-size: 14px;">Uma alimenta????o equilibrada e que faz bem para sa??de ?? aquela que atende ??s necessidades do organismo.
<br><br>
N??o basta apenas a comida ser saud??vel, ela precisa respeitar a tradi????o alimentar, trazer releituras e ingredientes que fa??am sua refei????o ser saborosa! Sabe aquele gostinho de quero mais?
<br><br>
A pronto Light est?? aqui para te ajudar nesse estilo de vida. N??s fazemos o poss??vel ( e at?? tentamos o imposs??vel) para incentivar a comida saud??vel. Os ingredientes s??o selecionados, org??nicos, in natura ou minimamente processados, como recomendado pelos especialistas, mas sempre com criatividade.
<br><br>

?? o melhor dos mundos, sabor, afeto e praticidade e entregue na porta da sua casa. Pra n??s, o ??nico caminho para o sucesso ?? fazer as escolhas certas, sempre com o foco na sa??de.

</p></div>
							</div>



							<div class="box-accordion">
								<h3 onclick="jQuery(\'+div\',this).toggle(500);"style="    color: #174063; font-size: 15px;
    font-weight: 500;">Por que escolher a Pronto Light?

 <i class="fas fa-angle-down"></i></h3>
								<div><p style="color: #6d6d6d; font-size: 14px;">Comida ?? a chave para sua sa??de, emagrecer n??o ?? o ??nico objetivo.  Ter h??bitos saud??veis ?? o melhor investimento para sua sa??de.  Nem sempre temos tempo passar horas na cozinha, no entanto, sabemos sabem a import??ncia da comida de qualidade, do poder transformador da comida, mas isso n??o ?? desculpa para se alimentar mal, uma alternativa s??o as comidas prontas congeladas saud??veis.  Tenha sempre ?? m??o a melhor escolha: Pronto Light. Comida de verdade, sem conservantes, com muito sabor e praticidade.

</p></div>
							</div>


								<div class="box-accordion">
								<h3 onclick="jQuery(\'+div\',this).toggle(500);"style="    color: #174063; font-size: 15px;
    font-weight: 500;">Como funciona? <i class="fas fa-angle-down"></i></h3>
								<div><p style="color: #6d6d6d; font-size: 14px;">Temos pratos pr??-montados, ou por????es individuais, com as quais voc?? pode montar sua pr??pria combina????o. O pedido pode ser agendado para entrega no mesmo dia ou para outra data.</p></div>
							</div>




						</div>
						<div class="custom-col-6">


									<div class="box-accordion">
								<h3 onclick="jQuery(\'+div\',this).toggle(500);" style="    color: #174063; font-size: 15px;
    font-weight: 500;">Entrega de Comida Congelada<i class="fas fa-angle-down"></i></h3>
								<div><p style="color: #6d6d6d; font-size: 14px;">
								O Ultra Congelamento, ?? a melhor forma de garantir a conserva????o natural dos alimentos, al??m da qualidade. ?? a tecnologia presente em nossa cozinha.
<br><br>
Na pressa, n??o precisa recorrer ao fast food. Voc?? tem uma alternativa muito mais saud??vel e pr??tica. Unimos o melhor dos mundos: comida boa, pr??tica e nutritiva entregue em casa.
<br><br>
Comida saud??vel, igual ??quela feita em casa, sem conservantes artificiais, sem s??dio em excesso, como aquela que voc?? encontra nos supermercados e que podem at?? fazer mal pra sa??de. Entrega r??pida de comida saud??vel congelada ?? diferente porque ?? feita com alimentos frescos, com uma validade menor, mas com certeza um prato quase feito na hora.

</p></div>
							</div>

							<div class="box-accordion">
								<h3 onclick="jQuery(\'+div\',this).toggle(500);"style="    color: #174063; font-size: 15px;
    font-weight: 500;">Por que embalamos a v??cuo as Comidas Congeladas?
 <i class="fas fa-angle-down"></i></h3>
								<div><p>O v??cuo tira todo o ar do alimento no momento que ?? embalado, isso evita formar aqueles cristais de gelo que vemos em Marmitas Fitness tradicionais. O resultado ?? uma comida deliciosa, sem aquele gelo que vira ??gua e estraga o sabor e textura dos alimentos.

</p></div>
							</div>

							<div class="box-accordion">
								<h3 onclick="jQuery(\'+div\',this).toggle(500);"style="    color: #174063; font-size: 15px;
    font-weight: 500;">Entrega em S??o Paulo SP e Regi??o<i class="fas fa-angle-down"></i></h3>
								<div><p>Entregamos em S??o Paulo e regi??o.<br><br>
								?? muito simples! Voc?? t??m 3 hor??rios de entrega:<br>

Manh?? ??? Entre 09:00 e 12:00;<br>
Tarde ??? Entre 12 e 17 horas;<br>
Noite ??? Entre 20 e 23 horas.
<br><br>
Entregas de segunda a s??bado*</p></div>
							</div>
						</div>
					</div>
				</div>
			  </section>
			  <br /><br />';
	}
}
