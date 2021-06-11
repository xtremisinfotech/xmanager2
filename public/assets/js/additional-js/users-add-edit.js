$(document).ready(function(e) {
    $("#FormUserAddEdit").validate({
        rules: {
            name: {
                required: true,
                maxlength: 50
            },
            email: {
                required: true,
                email: true,
                maxlength: 50
            },
            password: {
                required: true,
                maxlength: 20
            },
            password_confirmation: {
                required: true,
                maxlength: 20,
                equalTo: "#password"
            },
            
        },
        messages: {
            name: {
                required: "Please enter user's name.",
                maxlength: "Please enter user's name in maximum 50 character."
            },
            email: {
                required: "Please enter user's email.",
                email: 'Please enter valid email.',
                maxlength: "Please enter user's email in maximum 50 character."
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