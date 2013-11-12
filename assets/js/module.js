
/* Module-specific javascript can be placed here */

$(document).ready(function() {
	handleButton($('#et_save'));

	handleButton($('#et_cancel'),function(e) {
		if (m = window.location.href.match(/\/update\/[0-9]+/)) {
			window.location.href = window.location.href.replace('/update/','/view/');
		} else {
			window.location.href = '/patient/episodes/'+et_patient_id;
		}
		e.preventDefault();
	});

	handleButton($('#et_deleteevent'));

	handleButton($('#et_canceldelete'),function(e) {
		if (m = window.location.href.match(/\/delete\/[0-9]+/)) {
			window.location.href = window.location.href.replace('/delete/','/view/');
		} else {
			window.location.href = '/patient/episodes/'+et_patient_id;
		}
		e.preventDefault();
	});

	$('.Element_OphCiNursingtheatrerecord_Personnel').find('select').unbind('change').change(function() {
		if ($(this).val() != '') {
			var closestTextbox = $(this).nextAll('input');
			var currentText = closestTextbox.val();
			var newText = ($(this).find("option:selected").text());
			if (currentText.length == 0) {
				closestTextbox.val(ucfirst(newText));
			} else {
				closestTextbox.val(currentText+', '+newText);
			}
		}
	});

	$('input[type="radio"][name="Element_OphCiNursingtheatrerecord_DayOfOperation[change_of_medical_history_since_pre_operative_assessment]"]').click(function() {
		if ($('#Element_OphCiNursingtheatrerecord_DayOfOperation_change_of_medical_history_since_pre_operative_assessment_1').is(':checked')) {
			$('#div_Element_OphCiNursingtheatrerecord_DayOfOperation_history_change_notes').show();
			$('#Element_OphCiNursingtheatrerecord_DayOfOperation_history_change_notes').focus();
		} else {
			$('#div_Element_OphCiNursingtheatrerecord_DayOfOperation_history_change_notes').hide();
		}
	});

	$('input[type="radio"][name="Element_OphCiNursingtheatrerecord_CataractSurgery[surgery_id]"]').click(function() {
		var element = null;
		$('input[type="radio"][name="Element_OphCiNursingtheatrerecord_CataractSurgery[surgery_id]"]').map(function() {
			if ($(this).next('label').text() == 'Other') {
				element = $(this);
			}
		});

		if (element.is(':checked')) {
			$('#div_Element_OphCiNursingtheatrerecord_CataractSurgery_surgery_notes').show();
			$('#div_Element_OphCiNursingtheatrerecord_CataractSurgery_surgery_notes').focus();
		} else {
			$('#div_Element_OphCiNursingtheatrerecord_CataractSurgery_surgery_notes').hide();
		}
	});
});

function ucfirst(str) { str += ''; var f = str.charAt(0).toUpperCase(); return f + str.substr(1); }

function eDparameterListener(_drawing) {
	if (_drawing.selectedDoodle != null) {
		// handle event
	}
}
