<?php

$nsl_fb = unserialize(get_option('nsl_facebook'));
$nsl_google = unserialize(get_option('nsl_google'));
$nsl_twitter = unserialize(get_option('nsl_twitter'));

$checkout_login_id = prontolight_get_checkout_login_page_id();

/*
 * Redirect after login
 */
$redirect = get_page_link();

// Redirect to checkout after social login on checkout login page
if(get_the_ID() == $checkout_login_id){
    $redirect = prontolight_get_checkout_url();
}

?>

<?php wp_enqueue_script('socauth'); ?>

<div class="socauth">

    <div class="socauth__list">

        <a class="socauth__link socauth__link--facebook"
           data-socauth-popup
           title="<?php esc_attr_e('Login with','prontolight'); ?> Facebook"
           href="<?php echo esc_url(add_query_arg(array('loginSocial' => 'facebook','redirect' => urlencode($redirect)), site_url('wp-login.php'))); ?>">
                <span class="socauth__link-icon">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 96.124 96.123" style="enable-background:new 0 0 96.124 96.123;" xml:space="preserve"><g><path d="M72.089,0.02L59.624,0C45.62,0,36.57,9.285,36.57,23.656v10.907H24.037c-1.083,0-1.96,0.878-1.96,1.961v15.803c0,1.083,0.878,1.96,1.96,1.96h12.533v39.876c0,1.083,0.877,1.96,1.96,1.96h16.352c1.083,0,1.96-0.878,1.96-1.96V54.287h14.654c1.083,0,1.96-0.877,1.96-1.96l0.006-15.803c0-0.52-0.207-1.018-0.574-1.386c-0.367-0.368-0.867-0.575-1.387-0.575H56.842v-9.246c0-4.444,1.059-6.7,6.848-6.7l8.397-0.003c1.082,0,1.959-0.878,1.959-1.96V1.98C74.046,0.899,73.17,0.022,72.089,0.02z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                </span>
            <span class="socauth__link-title">
                    <?php esc_html_e('Login with','prontolight'); ?>
                <span class="socauth__link-strong">
                        Facebook
                    </span>
                </span>
        </a>

        <a class="socauth__link socauth__link--google"
           data-socauth-popup
           title="<?php esc_attr_e('Login with','prontolight'); ?> Google"
           href="<?php echo esc_url(add_query_arg(array('loginSocial' => 'google','redirect' => urlencode($redirect)), site_url('wp-login.php'))); ?>">
                <span class="socauth__link-icon">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><path style="fill:#FBBB00;" d="M113.47,309.408L95.648,375.94l-65.139,1.378C11.042,341.211,0,299.9,0,256c0-42.451,10.324-82.483,28.624-117.732h0.014l57.992,10.632l25.404,57.644c-5.317,15.501-8.215,32.141-8.215,49.456C103.821,274.792,107.225,292.797,113.47,309.408z"/><path style="fill:#518EF8;" d="M507.527,208.176C510.467,223.662,512,239.655,512,256c0,18.328-1.927,36.206-5.598,53.451c-12.462,58.683-45.025,109.925-90.134,146.187l-0.014-0.014l-73.044-3.727l-10.338-64.535c29.932-17.554,53.324-45.025,65.646-77.911h-136.89V208.176h138.887L507.527,208.176L507.527,208.176z"/><path style="fill:#28B446;" d="M416.253,455.624l0.014,0.014C372.396,490.901,316.666,512,256,512c-97.491,0-182.252-54.491-225.491-134.681l82.961-67.91c21.619,57.698,77.278,98.771,142.53,98.771c28.047,0,54.323-7.582,76.87-20.818L416.253,455.624z"/><path style="fill:#F14336;" d="M419.404,58.936l-82.933,67.896c-23.335-14.586-50.919-23.012-80.471-23.012c-66.729,0-123.429,42.957-143.965,102.724l-83.397-68.276h-0.014C71.23,56.123,157.06,0,256,0C318.115,0,375.068,22.126,419.404,58.936z"/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                </span>
            <span class="socauth__link-title">
                    <?php esc_html_e('Login with','prontolight'); ?>
                <span class="socauth__link-strong">
                        Google
                    </span>
                </span>
        </a>

    </div>

</div>
