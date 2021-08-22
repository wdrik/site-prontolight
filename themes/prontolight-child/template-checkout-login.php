<?php

/**
 * Template name: Checkout login
 */
get_header('checkout'); ?>

<div class="checkout-login">

    <div class="checkout-login__container">
        <div class="checkout-login__row">
            <div class="checkout-login__col">

                <div class="checkout-login__frame">
                    <div class="checkout-login__title">
                        <?php esc_html_e('Login','prontolight'); ?>
                    </div>
                    <div class="checkout-login__body">
                        <div class="checkout-login__socauth">
                            <?php get_template_part('parts/socauth/socauth'); ?>
                        </div>
                        <form method="post">

                            <div class="checkout-login__field-row">
                                <label class="checkout-login__field">
                                    <span class="checkout-login__field-icon checkout-login__field-icon--email">
                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 382.117 382.117" style="enable-background:new 0 0 382.117 382.117;" xml:space="preserve"><path d="M336.764,45.945H45.354C20.346,45.945,0,65.484,0,89.5v203.117c0,24.016,20.346,43.555,45.354,43.555h291.41c25.008,0,45.353-19.539,45.353-43.555V89.5C382.117,65.484,361.772,45.945,336.764,45.945z M336.764,297.72H45.354c-3.676,0-6.9-2.384-6.9-5.103V116.359l131.797,111.27c2.702,2.282,6.138,3.538,9.676,3.538l22.259,0.001c3.536,0,6.974-1.257,9.677-3.539l131.803-111.274v176.264C343.664,295.336,340.439,297.72,336.764,297.72z M191.059,192.987L62.87,84.397h256.378L191.059,192.987z"/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                                    </span>
                                    <input class="checkout-login__field-input checkout-login__field-input--email"
                                           autocomplete="off"
                                           type="text"
                                           name="username"
                                           placeholder="<?php esc_html_e('e-mail','prontolight'); ?>">
                                </label>
                            </div>

                            <div class="checkout-login__field-row checkout-login__field-row--md">
                                <label class="checkout-login__field">
                                    <span class="checkout-login__field-icon checkout-login__field-icon--pass">
                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="486.733px" height="486.733px" viewBox="0 0 486.733 486.733" style="enable-background:new 0 0 486.733 486.733;"xml:space="preserve"><g><path d="M403.88,196.563h-9.484v-44.388c0-82.099-65.151-150.681-146.582-152.145c-2.225-0.04-6.671-0.04-8.895,0C157.486,1.494,92.336,70.076,92.336,152.175v44.388h-9.485c-14.616,0-26.538,15.082-26.538,33.709v222.632c0,18.606,11.922,33.829,26.539,33.829h321.028c14.616,0,26.539-15.223,26.539-33.829V230.272C430.419,211.646,418.497,196.563,403.88,196.563z M273.442,341.362v67.271c0,7.703-6.449,14.222-14.158,14.222H227.45c-7.71,0-14.159-6.519-14.159-14.222v-67.271c-7.477-7.36-11.83-17.537-11.83-28.795c0-21.334,16.491-39.666,37.459-40.513c2.222-0.09,6.673-0.09,8.895,0c20.968,0.847,37.459,19.179,37.459,40.513C285.272,323.825,280.919,334.002,273.442,341.362zM331.886,196.563h-84.072h-8.895h-84.072v-44.388c0-48.905,39.744-89.342,88.519-89.342c48.775,0,88.521,40.437,88.521,89.342V196.563z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                                    </span>
                                    <input class="checkout-login__field-input checkout-login__field-input--email"
                                           autocomplete="off"
                                           type="password"
                                           name="password"
                                           placeholder="<?php esc_html_e('Password','prontolight'); ?>"
                                    >
                                </label>
                            </div>

                            <div class="checkout-login__field-row checkout-login__field-row--md checkout-login__text-center">
                                <a class="checkout-login__lost-password-link" href="<?php echo esc_url(wp_lostpassword_url()); ?>">
                                    <?php esc_html_e('Lost your password?', 'prontolight'); ?>
                                </a>
                            </div>

                            <div class="checkout-login__field-row">
                                <button class="checkout-login__submit" type="submit" name="login" value="<?php esc_attr_e('Login','saleszone'); ?>">
                                    <?php esc_html_e('Login', 'prontolight'); ?>
                                </button>
                            </div>

                            <input type="hidden" name="redirect" value="<?php echo esc_attr(prontolight_get_checkout_url()); ?>">
                            <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
                        </form>
                        <div class="checkout-login__footer checkout-login__text-center">
                            <a class="checkout-login__return-btn" href="<?php echo esc_url(wc_get_cart_url()); ?>">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g><g><path d="M491.318,235.318H20.682C9.26,235.318,0,244.578,0,256c0,11.423,9.26,20.682,20.682,20.682h470.636c11.423,0,20.682-9.259,20.682-20.682C512,244.578,502.741,235.318,491.318,235.318z"/></g></g><g><g><path d="M49.932,256L211.795,94.136c8.077-8.077,8.077-21.172,0-29.249c-8.077-8.076-21.172-8.076-29.249,0L6.058,241.375c-8.077,8.077-8.077,21.172,0,29.249l176.488,176.488c4.038,4.039,9.332,6.058,14.625,6.058c5.293,0,10.587-2.019,14.625-6.058c8.077-8.077,8.077-21.172,0-29.249L49.932,256z"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                                <?php esc_html_e('Come back','prontolight'); ?>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="checkout-login__col">

                <div class="checkout-login__frame">
                    <div class="checkout-login__title">
                        <?php esc_html_e('Register','prontolight'); ?>
                    </div>
                    <div class="checkout-login__body">

                        <div class="checkout-login__logo">
                            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/p-logo.png'); ?>" alt="Logo">
                        </div>

                        <div class="checkout-login__field-row checkout-login__field-row--md checkout-login__text-center">
                            <span class="checkout-login__lost-password-link">
                                <?php esc_html_e('Not have an account yet?', 'prontolight'); ?>
                            </span>
                        </div>

                        <div class="checkout-login__field-row">
                            <a class="checkout-login__submit" href="<?php echo esc_url(prontolight_get_checkout_url()); ?>">
                                <?php esc_html_e('Register here!', 'prontolight'); ?>
                            </a>
                        </div>

                        <div class="checkout-login__footer checkout-login__text-center">
                            <a class="checkout-login__return-btn" href="<?php echo esc_url(wc_get_cart_url()); ?>">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g><g><path d="M491.318,235.318H20.682C9.26,235.318,0,244.578,0,256c0,11.423,9.26,20.682,20.682,20.682h470.636c11.423,0,20.682-9.259,20.682-20.682C512,244.578,502.741,235.318,491.318,235.318z"/></g></g><g><g><path d="M49.932,256L211.795,94.136c8.077-8.077,8.077-21.172,0-29.249c-8.077-8.076-21.172-8.076-29.249,0L6.058,241.375c-8.077,8.077-8.077,21.172,0,29.249l176.488,176.488c4.038,4.039,9.332,6.058,14.625,6.058c5.293,0,10.587-2.019,14.625-6.058c8.077-8.077,8.077-21.172,0-29.249L49.932,256z"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                                <?php esc_html_e('Come back','prontolight'); ?>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>


<?php get_footer();