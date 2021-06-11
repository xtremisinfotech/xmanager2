$(document).ready(function (e) {
    $("#FormProductCategory").validate({
        rules: {
            CategoryName: {
                required: true,
                maxlength: 50
            }
        },
        messages: {
            CategoryName: {
                required: "Please enter category name.",
                maxlength: "Please enter category name in max 50 character."
            }
        }
    });
});