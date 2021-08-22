jQuery(function($){

	if(typeof inputmaskConfig === 'undefined') return;

	var deliveryPoints = {
        deliveryFields: ['zip','city','address','number','flat','state','neighborhood'],
		originBillingFields: {
			city : $('[data-delivery-points-scope] [name="billing_city"]'),
			zip : $('[data-delivery-points-scope] [name="billing_postcode"]'),
			address : $('[data-delivery-points-scope] [name="billing_address_1"]'),
			address_2 : $('[data-delivery-points-scope] [name="billing_address_2"]'),
            state : $('[data-delivery-points-scope] [name="billing_state"]'),
            neighborhood : $('[data-delivery-points-scope] [name="billing_neighborhood"]'),
            number : $('[data-delivery-points-scope] [name="billing_number"]'),
		},
        originDeliveryFields: {
            city : $('[data-delivery-points-scope] [name="shipping_city"]'),
            zip : $('[data-delivery-points-scope] [name="shipping_postcode"]'),
            address : $('[data-delivery-points-scope] [name="shipping_address_1"]'),
            address_2: $('[data-delivery-points-scope] [name="shipping_address_2"]'),
            state : $('[data-delivery-points-scope] [name="shipping_state"]'),
            neighborhood : $('[data-delivery-points-scope] [name="shipping_neighborhood"]'),
            number : $('[data-delivery-points-scope] [name="shipping_number"]'),
        },
		scope: $('[data-delivery-points-scope]'),
		deliveryList: $('[data-delivery-points-list]'),
		itemPrototype: $('[data-delivery-point-item-prototype]'),
		modalPrototype: $('[data-delivery-new-point-modal]'),
		zipInput: $('[data-delivery-points-zip-input]'),
		addAddressBtn: $('[data-delivery-add-new-btn]'),
		sectionAddressList: $('[data-delivery-points-section-address-list]'),
		sectionNewAddress: $('[data-delivery-points-section-new-address]'),
		init: function () {

			this.zipInput.inputmask({
				'mask': inputmaskConfig.zipMask,
				"clearMaskOnLostFocus": false,
				"oncomplete" : this.onComplete.bind(this)
			});

			this.addAddressBtn.on('click', this.addNewDeliveryPoint.bind(this));

			$(document).on('click','[data-delivery-point-item-change]', this.changeDeliveryPoint.bind(this));
            $(document).on('click','[data-delivery-point-item-edit]', this.openEditModal.bind(this));
            $(document).on('click','[data-delivery-close-modal]', this.closeModal.bind(this));
			$(document).on('click','[data-delivery-point-remove]', this.removeDeliveryPoint.bind(this));
			$(document).ready(this.initDefaultSelection.bind(this));

		},
		onComplete: function () {

			var zip = this.zipInput.val();
			var _this = this;

			$.ajax({
				url: 'https://viacep.com.br/ws/' + zip + '/json/',
				type: 'GET',
				success: function (response) {

					if(response.erro && response.erro === true){

						console.log('responce erro');
					} else {
						_this.openModal(response, zip);
					}
				}
			});
		},
		openEditModal: function (e){

            var currentDeliveryPoint = $(e.target).closest('[data-delivery-point-item]');
            var modal = this.modalPrototype.clone();

            var fieldsMap = {
                zip: currentDeliveryPoint.find('[data-saved_shipping_addresses_zip]').val(),
				city: currentDeliveryPoint.find('[data-saved_shipping_addresses_city]').val(),
				address: currentDeliveryPoint.find('[data-saved_shipping_addresses_address]').val(),
				number: currentDeliveryPoint.find('[data-saved_shipping_addresses_number]').val(),
                apartment: currentDeliveryPoint.find('[data-saved_shipping_addresses_flat]').val(),
                state: currentDeliveryPoint.find('[data-saved_shipping_addresses_state]').val(),
                neighborhood: currentDeliveryPoint.find('[data-saved_shipping_addresses_neighborhood]').val(),
			};

            $.grep(Object.keys(fieldsMap), function (deliveryField) {
                 modal.find('[name="'+ deliveryField +'"]').val(fieldsMap[deliveryField]);

                 // if(deliveryField === 'city'){
                 // 	modal.find('[data-delivery-city-title]').html(fieldsMap[deliveryField]);
				 // }
            });

            modal.removeClass('hidden');

            this.editDeliveryPointIndex =  currentDeliveryPoint.data('delivery-point-index');
            this.editDeliveryPointForm = modal.find('[data-delivery-new-point-form]');

            this.scope.append(modal);

            this.editDeliveryPointForm.on('submit', this.updateDeliveryPoint.bind(this));

		},
		openModal: function (data, zip) {

			var modal = this.modalPrototype.clone();

			if(zip){
				modal.find('[name="zip"]').val(zip);
			}

			if(data.localidade){
				modal.find('[name="city"]').val(data.localidade);
			}

			if(data.bairro){
				modal.find('[name="neighborhood"]').val(data.bairro);
			}

			if(data.logradouro){
				modal.find('[name="address"]').val(data.logradouro);
			}

			if(data.uf){
                modal.find('[name="state"]').val(data.uf);
			}

			modal.removeClass('hidden');

			this.newDeliveryPointForm = modal.find('[data-delivery-new-point-form]');

			this.newDeliveryPointForm.on('submit', this.addDeliveryPoint.bind(this));

			this.scope.append(modal);

		},
		closeModal: function (){
			this.scope.find('[data-delivery-new-point-modal]').remove();
		},
		updateDeliveryPoint: function (e){
            e.preventDefault();

            var form = this.editDeliveryPointForm;
            var currentDeliveryPoint = $('[data-delivery-point-index="'+ this.editDeliveryPointIndex +'"]');

            var args = {
                'state' : form.find('[name="state"]').val(),
                'neighborhood' : form.find('[name="neighborhood"]').val(),
                'zip' : form.find('[name="zip"]').val(),
                'city' : form.find('[name="city"]').val(),
                'address' : form.find('[name="address"]').val(),
                'number' : form.find('[name="number"]').val(),
                'flat' : form.find('[name="apartment"]').val(),
            };

            var newDeliveryPoint = this.createDeliveryPoint(args);

            newDeliveryPoint.removeClass('is-active');

            var point = currentDeliveryPoint.replaceWith(newDeliveryPoint);

            newDeliveryPoint.find('[data-delivery-point-item-change]').trigger('click');

            this.closeModal();

		},
		addDeliveryPoint: function (e) {
			e.preventDefault();

			var form = this.newDeliveryPointForm;

			var args = {
				'state' : form.find('[name="state"]').val(),
				'neighborhood' : form.find('[name="neighborhood"]').val(),
				'zip' : form.find('[name="zip"]').val(),
				'city' : form.find('[name="city"]').val(),
				'address' : form.find('[name="address"]').val(),
				'number' : form.find('[name="number"]').val(),
				'flat' : form.find('[name="apartment"]').val(),
			};

			var deliveryPoint = this.createDeliveryPoint(args);

			this.getDeliveriPoints().removeClass('is-active');

			this.deliveryList.append(deliveryPoint);
			deliveryPoint.find('[data-delivery-point-item-change]').trigger('click');
			this.closeModal();
			this.sectionAddressList.removeClass('hidden');
			this.sectionNewAddress.addClass('hidden');
			this.addAddressBtn.removeClass('hidden');
			$('[data-checkout-field-control]').trigger('input');


		},
		createDeliveryPoint: function (args) {
			var index = this.getIndex();

			var deliveryPoint = this.itemPrototype.clone();

			$.grep(this.deliveryFields, function (deliveryField) {
				var input = $('<input>', {
					type: 'hidden',
					name: 'saved_shipping_addresses[' + index + '][' + deliveryField + ']',
					value: args[deliveryField]
				});

				input.attr('data-saved_shipping_addresses_' + deliveryField,'');

				deliveryPoint.append(input)
			});

			deliveryPoint.find('[data-delivery-new-point-city]').html(args['city']);

			var formatedAddress = args['neighborhood'] + ', ' + args['address'] + ' - ' + args['state'] + ', ' + args['number'];

			if(args['flat'] !== ''){
                formatedAddress = formatedAddress + ' / ' + args['flat'];
			}

			deliveryPoint.find('[data-delivery-new-point-address]').html(formatedAddress);
			deliveryPoint.addClass('is-active');
			deliveryPoint.attr('data-delivery-point-index', index);
			deliveryPoint.removeClass('hidden');

			return deliveryPoint;
		},
		removeDeliveryPoint: function (e) {
			e.stopPropagation();

			var removedItem = $(e.target).closest('[data-delivery-point-item]');

			removedItem.remove();

			if(removedItem.hasClass('is-active')){
				this.initDefaultSelection();
			}

			// remove last
			if(this.deliveryList.find('[data-delivery-point-item]').length === 0){
				this.sectionAddressList.addClass('hidden');
				this.sectionNewAddress.removeClass('hidden');
				this.addAddressBtn.addClass('hidden');
				this.zipInput.val('');
				// Trigger step validation
				$('[data-checkout-field-control]').trigger('input');
			}
		},
		addNewDeliveryPoint: function () {
			this.addAddressBtn.addClass('hidden');
			this.sectionNewAddress.removeClass('hidden');
			this.zipInput.val('');
		},
		changeDeliveryPoint: function (e) {

			var currentDeliveryPoint = $(e.target).closest('[data-delivery-point-item]');

			currentDeliveryPoint.addClass('is-active');
			currentDeliveryPoint.siblings().removeClass('is-active');

			var state = currentDeliveryPoint.find('[data-saved_shipping_addresses_state]').val();
			var neighborhood = currentDeliveryPoint.find('[data-saved_shipping_addresses_neighborhood]').val();
			var zip = currentDeliveryPoint.find('[data-saved_shipping_addresses_zip]').val();
			var city = currentDeliveryPoint.find('[data-saved_shipping_addresses_city]').val();
			var address = currentDeliveryPoint.find('[data-saved_shipping_addresses_address]').val();
			var number = currentDeliveryPoint.find('[data-saved_shipping_addresses_number]').val();
			var appartament = currentDeliveryPoint.find('[data-saved_shipping_addresses_flat]').val();


			this.originBillingFields.state.val(state);
			this.originDeliveryFields.state.val(state);

			this.originBillingFields.neighborhood.val(neighborhood);
			this.originDeliveryFields.neighborhood.val(neighborhood);

            this.originBillingFields.number.val(number);
            this.originDeliveryFields.number.val(number);

            this.originBillingFields.address_2.val(appartament);
            this.originDeliveryFields.address_2.val(appartament);

			this.originBillingFields.city.val(city);
			this.originBillingFields.zip.val(zip);
			this.originBillingFields.address.val(address);

            this.originDeliveryFields.city.val(city);
            this.originDeliveryFields.zip.val(zip);
            this.originDeliveryFields.address.val(address);

			$('[data-delivery-points-instance-city]').html(city);
			$('[data-delivery-points-instance-address]').val(this.getFormattedAddress(address ,number ,appartament));
			
            jQuery( document.body ).trigger( 'update_checkout' );
		},
		getDeliveriPoints: function () {
			return this.deliveryList.find('[data-delivery-point-item]');
		},
		getFormattedAddress: function (address, house, appartament) {
			var formatedAddress = address;

			if(appartament !== '' && house !== ''){
				formatedAddress = address + ' ' + house + '/' + appartament;
			} else if(house !== ''){
				formatedAddress = address + ' ' + house;
			} else if(appartament !== '') {
				formatedAddress = address + ' ' + appartament
			}

			return formatedAddress;
		},
		getIndex: function () {
			var items = this.deliveryList.find('[data-delivery-point-item]');

			if(items.length === 0){
				return 0;
			}

			var maxIndex = items.eq(items.length - 1).attr('data-delivery-point-index');

			return parseInt(maxIndex) + 1;
		},
		initDefaultSelection: function () {
			this.deliveryList.find('[data-delivery-point-item]').last().find('[data-delivery-point-item-change]').trigger('click');
		}
	};

	deliveryPoints.init();
});