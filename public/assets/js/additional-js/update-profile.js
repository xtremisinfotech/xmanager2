$(document).ready(function (e) {
    $("#UserPersonalDetails").validate({
        rules: {
            name: {
                required: true,
                maxlength: 20
            }
        },
        messages: {
            name: {
                required: "Please enter name.",
                maxlength: "Please enter name in maximum 20 character."
            }
        }
    });

    $("#UserPassword").validate({
        rules: {
            current_password: {
                required: true,
                maxlength: 20
            },
            new_password: {
                required: true,
                maxlength: 20
            },
            confirm_password: {
                required: true,
                maxlength: 20
            }
        },
        messages: {
            current_password: {
                required: "Please enter current password.",
                maxlength: "Please enter current in maximum 20 character."
            },
            new_password: {
                required: "Please enter new password.",
                maxlength: "Please enter new password in maximum 20 character."
            },
            confirm_password: {
                required: "Please enter confirm password.",
                maxlength: "Please enter confirm password in maximum 20 character."
            }
        }
    });
});