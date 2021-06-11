$(document).ready(function(e) {
    $("#FormUserPassword").validate({
        rules: {
            oldpassword: {
                required: true,
                maxlength: 20
            },
            password: {
                required: true,
                maxlength: 20
            },
            password_confirmation: {
                required: true,
                maxlength: 20,
                equalTo: "#password"
            }
        },
        messages: {
            oldpassword: {
                required: "Please enter old password.",
                maxlength: "Please enter old password in maximum 20 character."
            },
            password: {
                required: "Please enter password.",
                maxlength: "Please enter password in maximum 20 character."
            },
            password_confirmation: {
                required: "Please enter confirm password.",
                maxlength: "Please enter confirm password in maximum 20 character.",
                equalTo: "confirm password doesn't match."
            }
        }
    });
});