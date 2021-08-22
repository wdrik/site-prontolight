<?php
/**
 * Plugin name: Premmerce User Shipping Addresses
 * Author: Premmerce
 * Version: 1.0
 */

namespace UserShippingAddresses;

use WP_User;

if ( ! defined( 'ABSPATH' ) ) die;

class Shipping {

    const USER_SHIPPING_ADDRESSES_KEY = 'saved_shipping_addresses';

    public function __construct()
    {
        add_action('wp_footer', [$this,'renderDefaultTemplates']);

        add_action('prontolight-render-delivery-fields', [$this,'renderDeliveryPoints']);

        /**
         * Update the value given in custom field
         */
        add_action('woocommerce_checkout_update_order_meta', function ($order_id) {
            self::updateAll( $_POST[self::USER_SHIPPING_ADDRESSES_KEY], get_current_user_id() );
        });
    }

    public static function getFieldName($name, $number = false)
    {
        $name = strtolower($name);

        if($number === false){
            return self::USER_SHIPPING_ADDRESSES_KEY  . '_' . $name;
        }
        return self::USER_SHIPPING_ADDRESSES_KEY . '[' . $number . ']' . '[' . $name . ']';
    }
    /**
     * Return user saved shipping addresses
     *
     * @param int $userId
     *
     * @return array|mixed
     */
    public static function getAll($userId = 0)
    {
        if(self::checkUser($userId)){
            $shipping_addresses = get_user_meta($userId, self::USER_SHIPPING_ADDRESSES_KEY, true);
            return is_array($shipping_addresses) ? $shipping_addresses : [];
        }

        return [];
    }

    /**
     * Update all user shipping addresses
     *
     * @param array $addresses
     * @param int $userId
     *
     * @return bool|int
     */
    public static function updateAll($addresses, $userId = 0)
    {
        if(self::checkUser($userId) && !empty($addresses) && is_array($addresses)){

            $newAddresses = [];

            foreach ($addresses as $address){
                if(is_array($address)){

                    $address = array_map(function($item){
                        return sanitize_text_field($item);
                    }, $address);

                    $newAddresses[] = $address;
                }
            }

            return update_user_meta($userId, self::USER_SHIPPING_ADDRESSES_KEY, $newAddresses);
        }

        return false;
    }

    public function renderDefaultTemplates(){
        if(is_checkout()){
            $checkout = WC()->checkout();
            $for_country = $checkout->get_value('billing_country');
            $states = WC()->countries->get_states( $for_country );

        ?>

        <div class="delivery-points__item hidden" data-delivery-point-item data-delivery-point-item-prototype>
            <div class="delivery-points__item-check" data-delivery-point-item-change>
                <div class="delivery-points__item-checkbox">
                    <i class="fas fa-check"></i>
                </div>
            </div>
            <div class="delivery-points__item-body" data-delivery-point-item-edit>
                <div class="delivery-points__item-title" data-delivery-new-point-city>

                </div>
                <div class="delivery-points__item-description" data-delivery-new-point-address>

                </div>
            </div>
            <div class="delivery-points__item-remove">
                <div class="delivery-points__remove-btn" data-delivery-point-remove>
                    <svg viewBox="1 1 511.99998 511.99998" xmlns="http://www.w3.org/2000/svg"><path d="m256 0c-141.386719 0-256 114.613281-256 256s114.613281 256 256 256 256-114.613281 256-256c-.167969-141.316406-114.683594-255.832031-256-256zm0 480c-123.710938 0-224-100.289062-224-224s100.289062-224 224-224 224 100.289062 224 224c-.132812 123.65625-100.34375 223.867188-224 224zm0 0"/><path d="m380.449219 131.550781c-6.25-6.246093-16.378907-6.246093-22.625 0l-101.824219 101.824219-101.824219-101.824219c-6.140625-6.355469-16.269531-6.53125-22.625-.390625-6.355469 6.136719-6.53125 16.265625-.390625 22.621094.128906.132812.257813.265625.390625.394531l101.824219 101.824219-101.824219 101.824219c-6.355469 6.136719-6.53125 16.265625-.390625 22.625 6.136719 6.355469 16.265625 6.53125 22.621094.390625.132812-.128906.265625-.257813.394531-.390625l101.824219-101.824219 101.824219 101.824219c6.355469 6.136719 16.484375 5.960937 22.621093-.394531 5.988282-6.199219 5.988282-16.03125 0-22.230469l-101.820312-101.824219 101.824219-101.824219c6.246093-6.246093 6.246093-16.375 0-22.625zm0 0"/></svg>
                </div>
            </div>
        </div>

        <div class="delivery-points__modal hidden" data-delivery-new-point-modal>
            <form data-delivery-new-point-form>
                <input type="hidden" name="state">

                <input type="hidden" name="zip">
                <input type="hidden" >

                <div class="delivery-points__row">
                    <div class="delivery-points__column">
                        <label class="delivery-points__modal-row">
                            <input type="text"
                                   class="delivery-points__control"
                                   name="address"
                                   placeholder="<?php esc_attr_e('Address','woocommerce'); ?>"
                                   required
                            >
                        </label>
                        <label class="delivery-points__modal-row">
                            <input type="text"
                                   class="delivery-points__control"
                                   name="neighborhood"
                                   placeholder="<?php esc_attr_e('Neighborhood', 'woocommerce-extra-checkout-fields-for-brazil'); ?>"
                                   required
                            >
                        </label>
                        <label class="delivery-points__modal-row">
                            <input type="text"
                                   class="delivery-points__control"
                                   name="city"
                                   placeholder="<?php esc_attr_e('City', 'woocommerce'); ?>"
                                   required
                            >
                        </label>
                    </div>
                    <div class="delivery-points__column">
                        <label class="delivery-points__modal-row">
                            <input type="text"
                                   class="delivery-points__control"
                                   name="number"
                                   placeholder="<?php esc_attr_e('Number','prontolight'); ?>"
                                   required
                                   inputmode="numeric"
                            >
                        </label>

                        <label class="delivery-points__modal-row">
                            <input type="text"
                                   class="delivery-points__control"
                                   name="apartment"
                                   placeholder="<?php esc_attr_e('Apartments.', 'prontolight'); ?>"

                            >
                        </label>
                        <?php if(is_array( $states )): ?>
                            <select class="delivery-points__select" name="state" required>
                                <?php foreach ($states as $key => $state): ?>
                                <option value="<?php echo esc_attr($key); ?>">
                                    <?php echo esc_html($state); ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="delivery-points__modal-row-submit">
                    <button class="delivery-points__modal-save">
                        <?php esc_html_e('Save address','prontolight'); ?>
                    </button>
                </div>

                <div class="delivery-points__modal-row-submit">
                    <button class="delivery-points__modal-cancel" type="button" data-delivery-close-modal >
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g><g><path d="M491.318,235.318H20.682C9.26,235.318,0,244.578,0,256c0,11.423,9.26,20.682,20.682,20.682h470.636c11.423,0,20.682-9.259,20.682-20.682C512,244.578,502.741,235.318,491.318,235.318z"></path></g></g><g><g><path d="M49.932,256L211.795,94.136c8.077-8.077,8.077-21.172,0-29.249c-8.077-8.076-21.172-8.076-29.249,0L6.058,241.375c-8.077,8.077-8.077,21.172,0,29.249l176.488,176.488c4.038,4.039,9.332,6.058,14.625,6.058c5.293,0,10.587-2.019,14.625-6.058c8.077-8.077,8.077-21.172,0-29.249L49.932,256z"></path></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                        <?php esc_html_e('Cancel','prontolight'); ?>
                    </button>
                </div>
            </form>
        </div>
        <?php
        }
    }

    /**
     * Check if user id is valid
     *
     * @param $userId
     *
     * @return bool
     */
    private static function checkUser($userId)
    {
        $user = new WP_User($userId);
        return $user instanceof WP_User;
    }

    public function renderDeliveryPoints(){
        $usersShippingAddresses = self::getAll(get_current_user_id());
        $hasDeliveryPoints = count($usersShippingAddresses) > 0;

        ?>

        <div class="delivery-points" data-delivery-points-scope>

            <div class="delivery-points__section <?php echo $hasDeliveryPoints ? '':'hidden'; ?>" data-delivery-points-section-address-list>
                <div class="delivery-points__section-title">
                    <?php esc_html_e('last addresses','prontolight'); ?>
                </div>
                <div class="delivery-points__list" data-delivery-points-list>
                    <?php foreach ($usersShippingAddresses as $key => $address) {
                        self::renderAddress($key, $address);
                    }  ?>
                </div>
            </div>

            <div class="delivery-points__section <?php echo $hasDeliveryPoints ? 'hidden':''; ?>" data-delivery-points-section-new-address>
                <div class="delivery-points__section-title">
                    <?php esc_html_e('Find your address by ZIP code','prontolight'); ?>
                </div>

                <input class="delivery-points__input"
                       type="text"
                       autocomplete="off"
                       data-delivery-points-zip-input
                       inputmode="numeric"
                >
            </div>

            <div class="delivery-points__add-delivery <?php echo $hasDeliveryPoints ? '':'hidden'; ?>" data-delivery-add-new-btn>
                <?php esc_html_e('Add a new address','prontolight'); ?>
            </div>

            <div class="address-field">

                <input type="hidden" class="input-text" name="billing_state" id="billing_state">
                <input type="hidden" class="input-text" name="shipping_state" id="shipping_state">

                <input type="hidden" class="input-text" name="billing_neighborhood" id="billing_neighborhood">
                <input type="hidden" class="input-text" name="shipping_neighborhood" id="shipping_neighborhood">

                <input type="hidden" class="input-text" name="billing_number" id="billing_number">
                <input type="hidden" class="input-text" name="shipping_number" id="shipping_number">

                <input class="input-text" type="hidden" name="billing_address_2" id="billing_address_2">
                <input class="input-text" type="hidden" name="shipping_address_2" id="shipping_address_2">

                <input class="input-text" type="hidden" name="billing_city" id="billing_city">
                <input class="input-text" type="hidden" name="billing_postcode" id="billing_postcode">
                <input class="input-text" type="hidden" name="billing_address_1" id="billing_address_1">

                <input class="input-text" type="hidden" name="shipping_first_name" id="shipping_first_name">
                <input class="input-text" type="hidden" name="shipping_last_name" id="shipping_last_name">
                <input class="input-text" type="hidden" name="shipping_city" id="shipping_city">
                <input class="input-text" type="hidden" name="shipping_postcode" id="shipping_postcode">
                <input class="input-text" type="hidden" name="shipping_address_1" id="shipping_address_1">
            </div>
        </div>

        <?php
    }

    public static function renderAddress( $key, $address )

    {

        ?>
            <div class="delivery-points__item"
                 data-delivery-point-item
                 data-delivery-point-index="<?php echo esc_attr($key); ?>">
                <div class="delivery-points__item-check" data-delivery-point-item-change>
                    <div class="delivery-points__item-checkbox">
                        <i class="fas fa-check"></i>
                    </div>
                </div>
                <div class="delivery-points__item-body" data-delivery-point-item-edit>
                    <div class="delivery-points__item-title" data-delivery-new-point-city>
                        <?php echo esc_html($address['city']); ?>
                    </div>
                    <div class="delivery-points__item-description" data-delivery-new-point-address>

                        <?php echo esc_html($address['neighborhood']); ?>
                        ,
                        <?php echo esc_html($address['address']); ?>
                        -
                        <?php echo esc_html($address['state']); ?>
                        ,
                        <?php echo esc_html($address['number']); ?>

                        <?php echo $address['flat'] ? ' / '. $address['flat'] : '';?>

                    </div>
                </div>
                <div class="delivery-points__item-remove">
                    <div class="delivery-points__remove-btn" data-delivery-point-remove>
                        <svg viewBox="1 1 511.99998 511.99998" xmlns="http://www.w3.org/2000/svg"><path d="m256 0c-141.386719 0-256 114.613281-256 256s114.613281 256 256 256 256-114.613281 256-256c-.167969-141.316406-114.683594-255.832031-256-256zm0 480c-123.710938 0-224-100.289062-224-224s100.289062-224 224-224 224 100.289062 224 224c-.132812 123.65625-100.34375 223.867188-224 224zm0 0"/><path d="m380.449219 131.550781c-6.25-6.246093-16.378907-6.246093-22.625 0l-101.824219 101.824219-101.824219-101.824219c-6.140625-6.355469-16.269531-6.53125-22.625-.390625-6.355469 6.136719-6.53125 16.265625-.390625 22.621094.128906.132812.257813.265625.390625.394531l101.824219 101.824219-101.824219 101.824219c-6.355469 6.136719-6.53125 16.265625-.390625 22.625 6.136719 6.355469 16.265625 6.53125 22.621094.390625.132812-.128906.265625-.257813.394531-.390625l101.824219-101.824219 101.824219 101.824219c6.355469 6.136719 16.484375 5.960937 22.621093-.394531 5.988282-6.199219 5.988282-16.03125 0-22.230469l-101.820312-101.824219 101.824219-101.824219c6.246093-6.246093 6.246093-16.375 0-22.625zm0 0"/></svg>
                    </div>
                </div>
                <?php self::renderField('state', $address['state'], $key ); ?>
                <?php self::renderField('neighborhood', $address['neighborhood'], $key ); ?>
                <?php self::renderField('Zip', $address['zip'], $key ); ?>
                <?php self::renderField('City', $address['city'], $key ); ?>
                <?php self::renderField('Address', $address['address'], $key ); ?>
                <?php self::renderField('number', $address['number'], $key ); ?>
                <?php self::renderField('Flat', $address['flat'], $key ); ?>
            </div>
        <?php
    }

    public static function renderField($name, $value = '', $number = 0)
    {
        ?>
        <input type="hidden"
               class="input-text"
               name="<?php echo self::getFieldName( $name, $number); ?>"
               placeholder="<?php echo $name; ?>"
               value="<?php echo $value ?>"
               data-<?php echo self::getFieldName( $name ); ?>
        >
        <?php
    }
}

new Shipping();
