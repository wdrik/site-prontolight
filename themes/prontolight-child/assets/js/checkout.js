jQuery(function($){

    var MOBILE_BP = 860;

	$(document).on('change','[name="payment_method"]', function () {
		var id  = $( this ).attr( 'ID' );

		$('.payment_box').addClass('hidden');
		$('.' + id).removeClass('hidden');

		$(this).closest('[data-checkout-step]').find('[data-checkout-step-next-btn]').removeClass('hidden');
	});

    /**
     * Update payment title
     */

    $('[data-payment-method-instance]').val($('[name="payment_method"]:checked').attr('data-payment-title'));
    $(document).on('change','[name="payment_method"]', function () {
        $('[data-payment-method-instance]').val($(this).attr('data-payment-title'));
    });

    $(window).on('resize', function () {
        if($(window).width() < MOBILE_BP) {
            var cart = $('[data-checkout-sticky-cart]');
            cart.trigger("sticky_kit:detach");
        }
    });

    function initStickyCart(){
        if($(window).width() < MOBILE_BP) return;

        var cart = $('[data-checkout-sticky-cart]');
        var parent = cart.closest('[data-checkout-sticky-container]');

        cart.data('sticky_kit', false);

        cart.stick_in_parent({
            parent: parent,
            recalc_every: 1
        });

        /*Issue solution https://github.com/leafo/sticky-kit/issues/31 */
        cart.on('sticky_kit:bottom', function(e) {
            $(this).parent().css('position', 'static');
        });
        cart.on('sticky_kit:unbottom', function(e) {
            $(this).parent().css('position', 'relative');
        });
    }

    //
    //data-delivery-delivery-time-instance-title

    $(document).on('change','[name="e_deliverydate"]', function () {
        var $this = $(this);
        $('[data-delivery-date-instance-field]').val($this.val());
        var title = $this.closest('.form-row').find('label').text();
        $('[data-delivery-delivery-date-instance-title]').html(title.replace('*',''));
    });

    $(document).on('change','[name="time_slot"]', function () {
        var $this = $(this);
        $('[data-delivery-time-instance-field]').val($this.val());
        var title = $this.closest('.form-row').find('label').text();
        $('[data-delivery-delivery-time-instance-title]').html(title.replace('*',''));
    });

    $(document).ready(initStickyCart);

    $(document).on('click','[data-thankyou-toggle]', function () {

        var btn = $(this);
        var preview = btn.closest('[data-thankyou-preview]');
        var fullDetails = $('[data-thankyou-full]');

        preview.fadeOut(function(){
            fullDetails.fadeIn();
        });
    });


    $(document).on('click','.open-popup-link', function () {
        var $this = $(this);

        $.magnificPopup.open({
            items: {
                src: $this.attr('data-mfp-src')
            },
            type:'inline',
            midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
        });
    });

    $(document).on('update_checkout', function () {

        setTimeout(function () {
            var successMessage = $('.coupone-popup .form-coupon .woocommerce-message');

            if(successMessage.length === 1){
                $.magnificPopup.close();
            }

        }, 3000)

    });

    $(document).on('change','#privacy', function () {
        var $this = $(this);

        if($this.prop('checked')){
            $('#terms').prop('checked', true).trigger('change');
        }
    });
});