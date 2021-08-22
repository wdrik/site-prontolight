<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
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
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

wc_print_notices();

?>

<?php do_action( 'woocommerce_before_checkout_form', $checkout ); ?>

    <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
        <div class="checkout-page">

            <div class="checkout-page__container" data-checkout-sticky-container>
                <div class="checkout-page__row">
                    <div class="checkout-page__body">


                        <div class="checkout-form">
                            <div class="checkout-form__step-list">
                                <!-- STEP 1 Info -->
                                <div class="checkout-form__step " data-checkout-step="login">
                                    <div class="checkout-form__main">
                                        <div class="checkout-form__step-header">
                                            <div class="checkout-form__step-title">
                                                <?php esc_html_e('Identification','prontolight'); ?>
                                            </div>
                                        </div>
                                        <div class="checkout-form__step-body">
                                            <div class="checkout-form__section">
                                                <div class="checkout-form__section-title">
                                                    <?php esc_html_e('Personal information','prontolight'); ?>
                                                </div>

                                                <div class="checkout-form__field-row">
                                                    <div class="checkout-form__field-col">
                                                        <?php prontolight_checkout_field([
                                                            'type' => 'text',
                                                            'name' => 'billing_first_name',
                                                            'label' => __('First name','prontolight'),
                                                            'placeholder' => __('Enter here your first_name','prontolight'),
                                                            'value' => $checkout->get_value( 'billing_first_name' ),
                                                            'id' => 'billing_first_name'
                                                        ]); ?>
                                                    </div>
                                                    <div class="checkout-form__field-col">
                                                        <?php prontolight_checkout_field([
                                                            'type' => 'text',
                                                            'name' => 'billing_last_name',
                                                            'label' => __('Last name','prontolight'),
                                                            'placeholder' => __('Enter here your last name','prontolight'),
                                                            'value' => $checkout->get_value( 'billing_last_name' ),
                                                            'id' => 'billing_last_name'
                                                        ]); ?>
                                                    </div>
                                                </div>

                                                <div class="checkout-form__field-row">
                                                    <div class="checkout-form__field-col">
                                                        <?php prontolight_checkout_field([
                                                            'type' => 'text',
                                                            'name' => 'billing_email',
                                                            'label' => __('E-mail','prontolight'),
                                                            'placeholder' => __('Enter here your email','prontolight'),
                                                            'value' => $checkout->get_value( 'billing_email' ),
                                                            'id' => 'billing_email'
                                                        ]); ?>
                                                    </div>
                                                    <div class="checkout-form__field-col">
                                                        <?php prontolight_checkout_field([
                                                            'type' => 'text',
                                                            'name' => 'billing_phone',
                                                            'label' => __('Phone','prontolight'),
                                                            'placeholder' => __('Enter your phone','prontolight'),
                                                            'value' => $checkout->get_value( 'billing_phone' ),
                                                            'id' => 'billing_phone',
                                                            'inputmode' => 'numeric'
                                                        ]); ?>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="checkout-form__section checkout-form__visible-on-complete">
                                                <div class="checkout-form__section-title">
                                                    <?php esc_html_e('Address','prontolight'); ?>
                                                </div>
                                                <div class="checkout-form__field">
                                                    <div class="checkout-form__field-title" data-delivery-points-instance-city></div>
                                                    <input class="checkout-form__field-input" type="text" data-delivery-points-instance-address>
                                                </div>
                                            </div>

                                            <div class="checkout-form__section checkout-form__hide-on-complete">
                                                <?php do_action('prontolight-render-delivery-fields'); ?>
                                            </div>

                                            <div class="checkout-form__section checkout-form__hide-on-complete">
                                                <button class="checkout-form__btn-next disabled" data-checkout-step-next-btn type="button">
                                                    <?php esc_html_e('Continue','prontolight'); ?>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="checkout-form__aside">
                                        <button class="checkout-form__btn-edit-step" type="button" data-edit-step-button>
                                            <svg height="401pt" viewBox="0 -1 401.52289 401" width="401pt" xmlns="http://www.w3.org/2000/svg"><path d="m370.589844 250.972656c-5.523438 0-10 4.476563-10 10v88.789063c-.019532 16.5625-13.4375 29.984375-30 30h-280.589844c-16.5625-.015625-29.980469-13.4375-30-30v-260.589844c.019531-16.558594 13.4375-29.980469 30-30h88.789062c5.523438 0 10-4.476563 10-10 0-5.519531-4.476562-10-10-10h-88.789062c-27.601562.03125-49.96875 22.398437-50 50v260.59375c.03125 27.601563 22.398438 49.96875 50 50h280.589844c27.601562-.03125 49.96875-22.398437 50-50v-88.792969c0-5.523437-4.476563-10-10-10zm0 0"/><path d="m376.628906 13.441406c-17.574218-17.574218-46.066406-17.574218-63.640625 0l-178.40625 178.40625c-1.222656 1.222656-2.105469 2.738282-2.566406 4.402344l-23.460937 84.699219c-.964844 3.472656.015624 7.191406 2.5625 9.742187 2.550781 2.546875 6.269531 3.527344 9.742187 2.566406l84.699219-23.464843c1.664062-.460938 3.179687-1.34375 4.402344-2.566407l178.402343-178.410156c17.546875-17.585937 17.546875-46.054687 0-63.640625zm-220.257812 184.90625 146.011718-146.015625 47.089844 47.089844-146.015625 146.015625zm-9.40625 18.875 37.621094 37.625-52.039063 14.417969zm227.257812-142.546875-10.605468 10.605469-47.09375-47.09375 10.609374-10.605469c9.761719-9.761719 25.589844-9.761719 35.351563 0l11.738281 11.734375c9.746094 9.773438 9.746094 25.589844 0 35.359375zm0 0"/></svg>
                                        </button>
                                    </div>
                                </div>
                                <!-- STEP 1 END -->

                                <!-- STEP 2 Payment-->
                                <div class="checkout-form__step is-closed" data-checkout-step="payment">
                                    <div class="checkout-form__main">
                                        <div class="checkout-form__step-header">
                                            <div class="checkout-form__step-title">
                                                <?php esc_html_e('Payment','prontolight'); ?>
                                            </div>
                                        </div>
                                        <div class="checkout-form__step-body">

                                            <?php prontolight_checkout_field([
                                                'type'  => 'tel',
                                                'name'  => 'billing_cpf',
                                                'label' => __('CPF','prontolight'),
                                                'value' => $checkout->get_value( 'billing_cpf' ),
                                                'id'    => 'billing_cpf',
                                                'mod'    => 'checkout-form__field--md'
                                            ]); ?>

                                            <div class="checkout-form__section checkout-form__hide-on-complete">
                                                <?php woocommerce_checkout_payment(); ?>
                                            </div>

                                            <div class="checkout-form__section checkout-form__visible-on-complete">
                                                <div class="checkout-form__field">
                                                    <div class="checkout-form__field-title" ><?php esc_html_e('Payment method','prontolight'); ?></div>
                                                    <input class="checkout-form__field-input" type="text" readonly="readonly" data-payment-method-instance>
                                                </div>
                                            </div>

                                            <div class="checkout-form__section checkout-form__hide-on-complete">
                                                <button class="checkout-form__btn-next <?php defined('PAYMENT_SELECTED') ? '':'hidden'; ?>"
                                                        data-checkout-step-next-btn
                                                        type="button">
                                                    <?php esc_html_e('Continue','prontolight'); ?>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="checkout-form__aside">
                                        <button class="checkout-form__btn-edit-step" type="button" data-edit-step-button>
                                            <svg height="401pt" viewBox="0 -1 401.52289 401" width="401pt" xmlns="http://www.w3.org/2000/svg"><path d="m370.589844 250.972656c-5.523438 0-10 4.476563-10 10v88.789063c-.019532 16.5625-13.4375 29.984375-30 30h-280.589844c-16.5625-.015625-29.980469-13.4375-30-30v-260.589844c.019531-16.558594 13.4375-29.980469 30-30h88.789062c5.523438 0 10-4.476563 10-10 0-5.519531-4.476562-10-10-10h-88.789062c-27.601562.03125-49.96875 22.398437-50 50v260.59375c.03125 27.601563 22.398438 49.96875 50 50h280.589844c27.601562-.03125 49.96875-22.398437 50-50v-88.792969c0-5.523437-4.476563-10-10-10zm0 0"/><path d="m376.628906 13.441406c-17.574218-17.574218-46.066406-17.574218-63.640625 0l-178.40625 178.40625c-1.222656 1.222656-2.105469 2.738282-2.566406 4.402344l-23.460937 84.699219c-.964844 3.472656.015624 7.191406 2.5625 9.742187 2.550781 2.546875 6.269531 3.527344 9.742187 2.566406l84.699219-23.464843c1.664062-.460938 3.179687-1.34375 4.402344-2.566407l178.402343-178.410156c17.546875-17.585937 17.546875-46.054687 0-63.640625zm-220.257812 184.90625 146.011718-146.015625 47.089844 47.089844-146.015625 146.015625zm-9.40625 18.875 37.621094 37.625-52.039063 14.417969zm227.257812-142.546875-10.605468 10.605469-47.09375-47.09375 10.609374-10.605469c9.761719-9.761719 25.589844-9.761719 35.351563 0l11.738281 11.734375c9.746094 9.773438 9.746094 25.589844 0 35.359375zm0 0"/></svg>
                                        </button>
                                    </div>
                                </div>

                                <!-- STEP 3 DELIVERY -->
                                <div class="checkout-form__step is-closed" data-checkout-step="delivery">
                                    <div class="checkout-form__main">
                                        <div class="checkout-form__step-header">
                                            <div class="checkout-form__step-title">
                                                <?php esc_html_e('Delivery','prontolight'); ?>
                                            </div>
                                        </div>
                                        <div class="checkout-form__step-body">
                                            <div class="checkout-form__visible-on-complete">

                                                <div class="checkout-form__field-row">
                                                    <div class="checkout-form__field-col">
                                                        <div class="checkout-form__section ">
                                                            <div class="checkout-form__field">
                                                                <div class="checkout-form__field-title" data-delivery-delivery-date-instance-title></div>
                                                                <input class="checkout-form__field-input" type="text" data-delivery-date-instance-field>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="checkout-form__field-col">
                                                        <div class="checkout-form__section ">
                                                            <div class="checkout-form__field">
                                                                <div class="checkout-form__field-title" data-delivery-delivery-time-instance-title></div>
                                                                <input class="checkout-form__field-input" type="text" data-delivery-time-instance-field>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="checkout-form__section checkout-form__hide-on-complete">
                                                <div class="checkout-form__section-title">
                                                    <?php esc_html_e('Let\'s notify before delivering','prontolight'); ?>
                                                </div>

                                                <?php prontolight_checkout_field([
                                                    'type' => 'text',
                                                    'name' => 'shipping_phone',
                                                    'label' => __('Notify before delivering','prontolight'),
                                                    'placeholder' => __('Enter your phone','prontolight'),
                                                    'value' => '',
                                                    'inputmode' => 'numeric'
                                                ]); ?>

                                                <div class="checkout-form__delivery-date" data-delivery-date-scope>
                                                    <div class="checkout-form__delivery-date-notice">
                                                        <?php esc_html_e('Select the date and period to continue the purchase','prontolight'); ?>
                                                    </div>

                                                    <?php do_action('prontolight_checkout_delivery_date', $checkout); ?>

                                                </div>

                                                <div class="checkout-form__terms">
                                                    <!-- Create an account -->
                                                    <?php if ( ! is_user_logged_in() && $checkout->is_registration_enabled() ) : ?>

                                                        <?php if ( ! $checkout->is_registration_required() ) : ?>
                                                            <div class="checkout-form__terms-row">
                                                                <div class="checkbox-group">
                                                                    <div class="checkbox-group__row">
                                                                        <div class="checkbox-group__checkbox">
                                                                            <label class="modern-checkbox" data-checkout-field-scope>
                                                                                <input class="modern-checkbox__checkbox-input"
                                                                                       type="checkbox"
                                                                                       name="createaccount"
                                                                                       id="createaccount"
                                                                                       value="1"
                                                                                    <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true ) ?>
                                                                                >
                                                                                <span class="modern-checkbox__checkbox"></span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="checkbox-group__body">
                                                                            <label class="checkbox-group__label" for="createaccount">
                                                                                <?php esc_html_e( 'Create an account?', 'prontolight' ); ?>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

                                                        <?php if ( $checkout->get_checkout_fields( 'account' ) ) : ?>
                                                            <div class="checkout-form__terms-row">
                                                                <div class="form__field create-account">
                                                                <?php foreach ( $checkout->get_checkout_fields( 'account' ) as $key => $field ) :
                                                                    prontolight_checkout_field([
                                                                        'type' => $field['type'],
                                                                        'name' => $key,
                                                                        'label' => $field['label'],
                                                                        'placeholder' => $field['placeholder'],
                                                                        'value' => $checkout->get_value( $key ) . '' .$checkout->get_value( $key )
                                                                    ]);
                                                                    endforeach; ?>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>

                                                    <?php endif; ?>

                                                    <?php if ( apply_filters( 'woocommerce_checkout_show_terms', true ) && function_exists( 'wc_terms_and_conditions_checkbox_enabled' ) ):?>
                                                        <div class="checkout-form__terms-row">
                                                            <?php  wc_get_template( 'checkout/terms.php' ); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    
                                                </div>
                                            </div>
                                            <div class="checkout-form__section checkout-form__hide-on-complete">
                                                <button class="checkout-form__btn-next"
                                                        data-checkout-step-next-btn
                                                        type="button">
                                                    <?php esc_html_e('Continue','prontolight'); ?>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="checkout-form__aside">
                                        <button class="checkout-form__btn-edit-step" type="button" data-edit-step-button>
                                            <svg height="401pt" viewBox="0 -1 401.52289 401" width="401pt" xmlns="http://www.w3.org/2000/svg"><path d="m370.589844 250.972656c-5.523438 0-10 4.476563-10 10v88.789063c-.019532 16.5625-13.4375 29.984375-30 30h-280.589844c-16.5625-.015625-29.980469-13.4375-30-30v-260.589844c.019531-16.558594 13.4375-29.980469 30-30h88.789062c5.523438 0 10-4.476563 10-10 0-5.519531-4.476562-10-10-10h-88.789062c-27.601562.03125-49.96875 22.398437-50 50v260.59375c.03125 27.601563 22.398438 49.96875 50 50h280.589844c27.601562-.03125 49.96875-22.398437 50-50v-88.792969c0-5.523437-4.476563-10-10-10zm0 0"/><path d="m376.628906 13.441406c-17.574218-17.574218-46.066406-17.574218-63.640625 0l-178.40625 178.40625c-1.222656 1.222656-2.105469 2.738282-2.566406 4.402344l-23.460937 84.699219c-.964844 3.472656.015624 7.191406 2.5625 9.742187 2.550781 2.546875 6.269531 3.527344 9.742187 2.566406l84.699219-23.464843c1.664062-.460938 3.179687-1.34375 4.402344-2.566407l178.402343-178.410156c17.546875-17.585937 17.546875-46.054687 0-63.640625zm-220.257812 184.90625 146.011718-146.015625 47.089844 47.089844-146.015625 146.015625zm-9.40625 18.875 37.621094 37.625-52.039063 14.417969zm227.257812-142.546875-10.605468 10.605469-47.09375-47.09375 10.609374-10.605469c9.761719-9.761719 25.589844-9.761719 35.351563 0l11.738281 11.734375c9.746094 9.773438 9.746094 25.589844 0 35.359375zm0 0"/></svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="checkout-form__place-order">
                                    <?php wc_get_template_part('checkout/place-order') ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="checkout-page__aside">

                        <div class="sticky-cart" data-checkout-sticky-cart>

                            <div class="sticky-cart__summary">
                                <?php

                                do_action( 'woocommerce_checkout_before_order_review' );

                                do_action( 'woocommerce_checkout_order_review' );

                                do_action( 'woocommerce_checkout_after_order_review' );

                                ?>
                            </div>

                            <div class="sticky-cart__place-order">
                                <?php wc_get_template_part('checkout/place-order') ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
