$(document).ready(function (e) {
    $("#FormCustomerVendorDetails").validate({
        rules: {
            CVName: {
                required: true,
                maxlength: 50
            },
            CVEmail: {
                maxlength: 50
            },
            CVMobile: {
                required: true,
                maxlength: 15
            },
            CVAddress: {
                required: true,
                maxlength: 1000
            },
            CVState: {
                required: true,
                maxlength: 50
            },
            CVCity: {
                required: true,
                maxlength: 50
            },
            CVPin: {
                required: true,
                maxlength: 6
            },
            CVGSTN: {
                maxlength: 15,
				regex: /\d{2}[A-Z]{5}\d{4}[A-Z]{1}[A-Z\d]{1}[Z]{1}[A-Z\d]{1}/
            },
            CVType: {
                required: true
            }
        },
        messages: {
            CVName: {
                required: "Please enter name.",
                maxlength: "Please enter name in maximum 50 character."
            },
            CVEmail: {
                maxlength: "Please enter email address in maximum 50 character."
            },
            CVMobile: {
                required: "Please enter mobile number.",
                maxlength: "Please enter mobile number in maximum 15 character."
            },
            CVAddress: {
                required: "Please enter address.",
                maxlength: "Please enter address in maximum 1000 character."
            },
            CVState: {
                required: "Please enter state.",
                maxlength: "Please enter state name in maximum 50 character."
            },
            CVCity: {
                required: "Please enter city name.",
                maxlength: "Please enter city name in maximum 50 character."
            },
            CVPin: {
                required: "Please enter pin code.",
                maxlength: "Please enter pin code in maximum 6 character."
            },
            CVGSTN: {
                maxlength: 'Please enter GST number in 15 character.',
				regex: 'Please enter valid GST number.'
            },
            CVType: {
                required: "Please select type."
            }
        }
    });
});