<?php
/**
 * Checkout terms and conditions area.
 *
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

if ( apply_filters( 'woocommerce_checkout_show_terms', true ) && function_exists( 'wc_terms_and_conditions_checkbox_enabled' ) ) {
	do_action( 'woocommerce_checkout_before_terms_and_conditions' );

	?>
	<div class="woocommerce-terms-and-conditions-wrapper">
		<?php
		/**
		 * Terms and conditions hook used to inject content.
		 *
		 * @since 3.4.0.
		 * @hooked wc_privacy_policy_text() Shows custom privacy policy text. Priority 20.
		 * @hooked wc_terms_and_conditions_page_content() Shows t&c page content. Priority 30.
		 */
		do_action( 'woocommerce_checkout_terms_and_conditions' );
		?>

		<?php if ( wc_terms_and_conditions_checkbox_enabled() ) : ?>

            <!-- Privacy policy -->
            <div class="checkbox-group" data-checkout-field-scope>
                <div class="checkbox-group__row">
                    <div class="checkbox-group__checkbox">
                        <label class="modern-checkbox">
                            <input class="modern-checkbox__checkbox-input"
                                   data-checkout-field-control
                                   type="checkbox"
                                   name="privacy"
                                   id="privacy"
                                   value="1"
                            >
                            <span class="modern-checkbox__checkbox"></span>
                        </label>
                    </div>
                    <div class="checkbox-group__body">
                        <label class="checkbox-group__label" for="terms">
                            <!-- <?php esc_html_e( 'I\'ve read and accept the Privacy Policy', 'prontolight' ); ?> -->
                            Autorizo deixar na portaria
                        </label>
                        <div class="">
                            <div class="checkbox-group__tooltip">
                                <?php $privacy_page_id   = wc_privacy_policy_page_id(); ?>
                                <a class="checkbox-group__link"
                                   target="_blank"
                                   href="<?php echo get_the_permalink($privacy_page_id); ?>">
                                    <?php echo get_the_title($privacy_page_id); ?>
                                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 31.49 31.49" style="width: 10px; enable-background:new 0 0 31.49 31.49;" xml:space="preserve"><path style="fill:#58595B;" d="M21.205,5.007c-0.429-0.444-1.143-0.444-1.587,0c-0.429,0.429-0.429,1.143,0,1.571l8.047,8.047H1.111C0.492,14.626,0,15.118,0,15.737c0,0.619,0.492,1.127,1.111,1.127h26.554l-8.047,8.032c-0.429,0.444-0.429,1.159,0,1.587c0.444,0.444,1.159,0.444,1.587,0l9.952-9.952c0.444-0.429,0.444-1.143,0-1.571L21.205,5.007z"/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                                </a>

                                <?php if($content = get_field('tooltip', $privacy_page_id)): ?>
                                <div class="checkbox-group__tooltip-drop">
                                    <?php echo $content; ?>
                                </div>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Terms -->
            <div class="checkbox-group" data-checkout-field-scope>
                <input type="hidden" name="terms-field" value="1" />
                <div class="checkbox-group__row">
                    <div class="checkbox-group__checkbox">
                        <label class="modern-checkbox">
                            <input class="modern-checkbox__checkbox-input"
                                   data-checkout-field-control
                                   type="checkbox"
                                   name="terms"
                                   id="terms"
                                   value="1"
                                   <?php checked( apply_filters( 'woocommerce_terms_is_checked_default', isset( $_POST['terms'] ) ), true ); // WPCS: input var ok, csrf ok. ?>
                            >
                            <span class="modern-checkbox__checkbox"></span>
                        </label>
                    </div>
                    <div class="checkbox-group__body">
                        <label class="checkbox-group__label" for="terms">
                            <?php esc_html_e( 'I accept the terms and conditions', 'prontolight' ); ?>
                        </label>
                        <div class="">
                            <div class="checkbox-group__tooltip">
                                <?php $terms_page_id   = wc_terms_and_conditions_page_id(); ?>
                                <a class="checkbox-group__link"
                                   target="_blank"
                                   href="<?php echo get_the_permalink($terms_page_id); ?>">
                                    <?php echo get_the_title($terms_page_id); ?>
                                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 31.49 31.49" style="width: 10px; enable-background:new 0 0 31.49 31.49;" xml:space="preserve"><path style="fill:#58595B;" d="M21.205,5.007c-0.429-0.444-1.143-0.444-1.587,0c-0.429,0.429-0.429,1.143,0,1.571l8.047,8.047H1.111C0.492,14.626,0,15.118,0,15.737c0,0.619,0.492,1.127,1.111,1.127h26.554l-8.047,8.032c-0.429,0.444-0.429,1.159,0,1.587c0.444,0.444,1.159,0.444,1.587,0l9.952-9.952c0.444-0.429,0.444-1.143,0-1.571L21.205,5.007z"/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                                </a>
                                <?php if($content = get_field('tooltip', $terms_page_id)): ?>
                                    <div class="checkbox-group__tooltip-drop">
                                        <?php echo $content; ?>
                                    </div>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="checkbox-group__error">
                    <?php esc_html_e('To finish, you must accept the terms and conditions','prontolight'); ?>
                </div>
            </div>
		<?php endif; ?>
	</div>
	<?php

	do_action( 'woocommerce_checkout_after_terms_and_conditions' );
}
