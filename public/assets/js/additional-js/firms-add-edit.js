$(document).ready(function (e) {
    $("#FormFirmDetails").validate({
        rules: {
            FirmName: {
                required: true,
                maxlength: 100
            },
            FirmAddress: {
                required: true,
                maxlength: 500
            },
            FirmCity: {
                required: true,
                maxlength: 50
            },
            FirmPinCode: {
                required: true,
                number: true,
                maxlength: 6
            },
            FirmState: {
                required: true,
                maxlength: 50
            },
            FirmCountry: {
                required: true,
                maxlength: 50
            },
            FirmPhoneNo: {
                required: true,
                maxlength: 15
            },
            FirmGSTN: {
                required: true,
                maxlength: 15,
                regex: /\d{2}[A-Z]{5}\d{4}[A-Z]{1}[A-Z\d]{1}[Z]{1}[A-Z\d]{1}/
            }
        },
        messages: {
            FirmName: {
                required: "Please enter firm name.",
                maxlength: "Please enter firm name in max 100 character."
            },
            FirmAddress: {
                required: "Please enter address.",
                maxlength: "Please enter address in max 500 character."
            },
            FirmCity: {
                required: "Please enter city.",
                maxlength: "Please enter city in max 500 character."
            },
            FirmPinCode: {
                required: "Please enter pin code.",
                number: "Please enter valid pin code",
                maxlength: "Please enter valid pin code."
            },
            FirmState: {
                required: "Please enter state.",
                maxlength: "Please enter state in max 50 character."
            },
            FirmCountry: {
                required: "Please enter country.",
                maxlength: "Please enter country in max 50 character."
            },
            FirmPhoneNo: {
                required: "Please enter phone number.",
                maxlength: "Please enter phone number in max 15 character."
            },
            FirmGSTN: {
                required: "Please enter GST Number.",
                maxlength: "Please enter GST Number in max 15 character.",
                regex: "Please enter valid GST Number."
            }
        }
    });

    $("#FirmGSTN").on("keyup", function () {
        this.value = this.value.toUpperCase();
    });
});