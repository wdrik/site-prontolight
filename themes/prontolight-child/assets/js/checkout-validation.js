jQuery(function($){
	"use strict";

	if(typeof inputmaskConfig === 'undefined') return;

	/**
	 * Define fields and validation rules
	 * @type {*[]}
	 */
	var fieldRules = {
		'login' : [
			{
				container: '[data-checkout-field-scope]',
				field: '[name="billing_first_name"]',
				validate: validateEmpty
			},
            {
                container: '[data-checkout-field-scope]',
                field: '[name="billing_last_name"]',
                validate: validateEmpty
            },
			{
				container: '[data-checkout-field-scope]',
				field: '[name="billing_email"]',
				validate: validateEmail
			},
			{
				container: '[data-checkout-field-scope]',
				field: '[name="billing_phone"]',
				validate: validatePhone
			},
			{
				container: '[data-delivery-points-zip-input]',
				field: '[data-delivery-points-zip-input]',
				validate: function (field) {

					if($(field).is(':visible')){
						return jQuery('.is-active[data-delivery-point-item]').length > 0
					} else {
						return true
					}
				}
			}
		],
        'payment' : [
        	{
                container: '[data-checkout-field-scope]',
                field: '[name="billing_cpf"]',
                validate: validateCpf
			}
		],
        'delivery' : [
            {
                container: '[data-checkout-field-scope]',
                field: '[name="shipping_phone"]',
                validate: validateShippingPhone
            },
            {
                container: '.form-row',
                field: '[name="e_deliverydate"]',
                validate: validateEmptyIfVisible
            },
            {
                container: '.form-row',
                field: '[name="time_slot"]',
                validate: validateTimeSlot
            },
            {
                container: '[data-checkout-field-scope]',
                field: '[name="account_password"][data-checkout-field-control]',
                validate: validatePass
            },
            {
                container: '[data-checkout-field-scope]',
                field: '[name="terms"]',
                validate: validateCheckbox
            },
            {
                container: '[data-delivery-date-scope]',
                field: '[name="e_deliverydate"]',
                validate: validateDeliveryDate
            },
        ]
	};
	// name="account_password"
	window.fieldRules = fieldRules;

	/**
	 * Check if field is empty
	 * @param field
	 * @returns {boolean}
	 */
	function validateEmpty(field){
		return field.val() !== '';
	}

    /**
     * Check if field is empty
     * @param field
     * @returns {boolean}
     */
    function validateEmptyIfVisible(field){

        // If field is hidden do not check this field otherwise check field
        if(!$(field).is(':visible')){
            return true
        } else {
            return field.val() !== '';
		}
    }

	function validatePass(field) {

        // If field is hidden do not check this field otherwise check field
        if(!$(field).is(':visible')){
            return true
        } else {
            return field.val().length > 4;
        }

    }

	function validateEmail(field){
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(field.val()).toLowerCase());
	}

	function validateCheckbox(field) {
		if(field.length === 0){
			return true
		}

		return field.is(':checked');
    }

    function validateTimeSlot(field) {
        // If field is hidden do not check this field otherwise check field
        if(!$(field).is(':visible')){
            return true
        } else {
            return field.val() !== 'select' && field.val() !== '';
		}
    }

    function validateDeliveryDate(field){
        // If field is hidden do not check this field otherwise check field
        if(!$(field).is(':visible')){
            return true
        } else {
            return validateEmpty(field) && validateTimeSlot($('[name="time_slot"]'));
		}
	}

	function validatePhone(field) {
    	return field.val().length >= 14;
    }

    function validateShippingPhone(field) {
        return Inputmask.isValid(field.val(), '(99) 9999[9]-9999');
    }

    function validateCpf(field) {
        return Inputmask.isValid(field.val(), inputmaskConfig.cpfMask);
    }

	/**
	 * Check ass checkout fields
	 * @param fieldRules
	 * @returns {*}
	 */
	function checkFields(fieldRules) {
		if(fieldRules){
			fieldRules.map(function (rule) {
				rule.valid = rule.validate($(rule.field));
			});
		}

		return fieldRules
	}


	/**
	 * Check and toogle checkout submit button
	 */
	function checkAndToogleNextStepButton(button, stepFields){

		var fields = checkFields(stepFields);

		if(fields.some(function (rule){ return !rule.valid })){
			button.addClass('disabled');
		} else {
			button.removeClass('disabled');
		}
	};

    /**
	 * Check all validation list
     */
	function checkAndTooglePlaceOrder(){
        var placeOrderBtn = $('[data-placeorder-btn]');
		placeOrderBtn.removeAttr('disabled');
	}

	function setStepProgress(editStep){
		var login = $('[data-checkout-progress-step="login"]');
		var payment = $('[data-checkout-progress-step="payment"]');
		var delivery = $('[data-checkout-progress-step="delivery"]');

		switch (editStep) {

			case 'login':
                login.removeClass('complete').addClass('active');
                payment.removeClass('active complete');
                delivery.removeClass('active complete');
                break;
            case 'payment':
                login.addClass('complete');
                payment.removeClass('complete').addClass('active');
                delivery.removeClass('active complete');
                break;
            case 'delivery':
                login.addClass('complete');
                payment.addClass('complete');
                delivery.removeClass('complete').addClass('active');
                break;
            case 'delivery-complete':
                login.addClass('complete');
                payment.addClass('complete');
                delivery.addClass('complete');
                break;
        }
	}


	/**
	 * Check fields and go to next step
	 */
	$(document).on('click','[data-checkout-step-next-btn]', function (event) {

		var stepScope = $(this).closest('[data-checkout-step]');
		var stepKey = stepScope.attr('data-checkout-step');
		var stepNextKey = stepScope.next().attr('data-checkout-step');
		var fields = checkFields(fieldRules[stepKey]);

		if(fields.some(function (rule){ return !rule.valid })){
			event.preventDefault();

			fields.map(function(fieldRule){

				if(!fieldRule.valid){

					$(fieldRule.field).closest(fieldRule.container).addClass('error');

				} else {
					$(fieldRule.field).closest(fieldRule.container).removeClass('error');
				}
			});
		} else {
			stepScope.addClass('is-complete');
			stepScope.find('input').attr('readonly', true);
            stepScope.next().find('input').removeAttr('readonly');

			if(stepNextKey === 'delivery'){
				var billingPhone = $('[name="billing_phone"]').val();

				if(billingPhone.replace(/\D/g, '').length === 11){
					$('[name="shipping_phone"]').val(billingPhone).trigger('change');
				}

			}

			if(stepKey === 'delivery'){
                checkAndTooglePlaceOrder();
                setStepProgress(stepKey + '-complete');
			} else {
                stepScope.next().removeClass('is-closed').removeClass('is-complete');
                setStepProgress(stepNextKey);
			}
		}
	});

    /**
	 * Listener for all checkout field
	 * Update validation state of checkout
     */
	$(document).on('change input','[data-checkout-field-control], [name="e_deliverydate"], [name="time_slot"]', function(){
		var field = $(this);
		var stepScope = field.closest('[data-checkout-step]');
		var nextStepBtn = stepScope.find('[data-checkout-step-next-btn]');
		var stepKey = stepScope.attr('data-checkout-step');
		var stepFieldRules = fieldRules[stepKey];

		checkAndToogleNextStepButton(nextStepBtn, stepFieldRules);

        var rule = stepFieldRules.filter(function(fieldRule){
            return field.is(fieldRule.field);
        })[0];

        if(rule && rule.validate(field)){
            $(field).closest(rule.container).removeClass('error');
        }
	});

    /**
	 * Edit step
     */
	$(document).on('click','[data-edit-step-button]', function(e){
		var stepScope = $(this).closest('[data-checkout-step]');
		var stepKey = stepScope.attr('data-checkout-step');

		stepScope.removeClass('is-complete');
		stepScope.find('input').removeAttr('readonly');
		stepScope.nextAll().addClass('is-closed');

		$('[data-checkout-field-control]').trigger('input');
        $('[data-placeorder-btn]').attr('disabled','disabled');

        setStepProgress(stepKey);
	});

    /**
	 * login update next step btn
     */
    $(window).on('load', function(){

		for (var stepKey in fieldRules){
            $.grep(fieldRules[stepKey], function(rule){
                $(rule.field).trigger('input');
            })
		}

    });

    /**
	 * Add input mask
	 *
	 *
	 * onKeyDown
     */
    $('[name="billing_phone"]').inputmask({
        'mask': '(99) 9999[9]-9999',
        'clearMaskOnLostFocus': true,
		'onKeyDown' : onKeyDown
	});

    // (99) 9999-9999
    // (99) 99999-9999

    $('[name="shipping_phone"]').inputmask({
		'mask': '(99) 9999[9]-9999',
        'clearMaskOnLostFocus': false,
		'onKeyDown' : onKeyDown
    });

    // $('[name="billing_cpf"]').inputmask({
    //     'mask': inputmaskConfig.cpfMask,
    //     'clearMaskOnLostFocus': false
    // });

    function onKeyDown(event, buffer, caretPos, opts){

		var $this = $(this);

		if(caretPos.begin === 14){
			var num = parseInt(event.key);

			if(!isNaN(num)){

				var phone = $(this).val().replace(/\D/g, '');

				setTimeout(function () {
					$this.val(parseInt(phone + num));
				},100 );
			}
		}
	}

    /**
	 * Copy field on submit form
     */
    $(document).on('click','.woocommerce-checkout-place-order-btn',function () {
		$('[name="shipping_first_name"]').val($('[name="billing_first_name"]').val());
		$('[name="shipping_last_name"]').val($('[name="billing_last_name"]').val());
    });
});