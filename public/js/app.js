$(document).ready(function() {
	$('.addButton').click(function(e) {
		if ($('.cloneProduct').length < $('#initialForm .id_product option').length - 1) {
			var html = '';

			html = $('#initialForm').html();
			html = html.replace(/addButton/gi, 'removeButton');
			html = html.replace(/fa-plus/gi, 'fa-minus');
			html = html.replace(/\[0\]/gi, '[' + new Date().getTime() + Math.random() + ']');

			$('#productZone').append("<div class='row cloneProduct'>" + html + '</div>');
			validate();
		}
	});

	$(document).on('click', '.removeButton', function() {
		$(this).parent().parent().remove();
		getTotal();
	});

	$(document).on('input change paste', '.onlyLetters', function() {
		var newVal = $(this).val().replace(/[^a-zA-Z\s]/g, '');
		$(this).val(newVal);
	});

	$(document).on('change', '.id_product', function() {
		var select = $(this);
		$('.id_product').each(function(index, el) {
			if (select.attr('class') != $(el).attr('class') && $(el).val() == select.val()) {
				$(el).prop('selectedIndex', 0);
			}
		});
	});

	$(document).on('change keypress input', '#purchaseForm .quantity', function() {
		getTotal();
	});

	$(document).on('change', '#purchaseForm .id_product', function() {
		var opt = $('[name="' + $(this).attr('name') + '"]' + ' option:selected');
		$(this).parent().parent().find('.lot_number').val(opt.attr('data-lot'));
		$(this).parent().parent().find('.expiration').val(opt.attr('data-expiration'));
		$(this).parent().parent().find('.price').val(opt.attr('data-price'));

		$(this).parent().parent().find('.quantity').rules('add', {
			required: true,
			number: true,
			max: parseInt(opt.attr('data-quantity'))
		});
		getTotal();
	});

	function getTotal() {
		var total = 0;
		$('.price').each(function() {
			if ($(this).val()) {
				total += $(this).val() * $(this).parent().parent().find('.quantity').val();
			}
		});
		$('#totalInput').val(total);
	}

	function validate() {
		if ($('#inventoryForm').length > 0) {
			$('#inventoryForm').validate();
			$('.id_product').each(function() {
				$(this).rules('add', {
					required: true,
					number: true
				});
			});

			$('.id_product').each(function() {
				$(this).rules('add', {
					required: true,
					number: true
				});
			});

			$('.quantity').each(function() {
				$(this).rules('add', {
					required: true,
					number: true,
					max: 99999999,
					min: 1
				});
			});

			$('.lot_number').each(function() {
				$(this).rules('add', {
					required: true,
					number: true,
					max: 99999999
				});
			});

			$('.expiration').each(function() {
				$(this).rules('add', {
					required: true,
					date: true
				});
			});

			$('.price').each(function() {
				$(this).rules('add', {
					required: true,
					number: true,
					max: 99999999,
					min: 0
				});
			});
		}

		if ($('#purchaseForm').length > 0) {
			$('#purchaseForm').validate();
		}
	}

	validate();
});
