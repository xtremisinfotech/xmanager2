$(document).ready(function (e) {
    $("#AddEditRole").validate({
        rules: {
            name: {
                required: true,
                maxlength: 20
            }
        },
        messages: {
            name: {
                required: "Please enter role name.",
                maxlength: "Please enter role name in maximum 20 character."
            }
        }
    });

    $("#submit").click(function (event) {
        if ($('.checkbox').filter(':checked').length == 0) {
            MakeToast("Warning", "bg-warning", "Please select at least one permission from the list.");
            return false;
        } else {
            $('#AddEditRole').submit();
        }
    });

    $("#chkAll").change(function() {
		$(".checkbox").prop('checked', $(this).prop("checked"));
	});

	$('.checkbox').change(function() { 
		if(false == $(this).prop("checked")) {
			$("#chkAll").prop('checked', false);
		}

		if ($('.checkbox:checked').length == $('.checkbox').length ) {
			$("#chkAll").prop('checked', true);
		}
    });
    
    if ($('.checkbox:checked').length == $('.checkbox').length ) {
        $("#chkAll").prop('checked', true);
    }
});