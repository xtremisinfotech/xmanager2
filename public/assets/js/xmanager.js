var APP_ROOT = window.location.origin;

$(function () {
    $.validator.addMethod('regex', function (value, element, param) {
        return this.optional(element) ||
            value.match(typeof param == 'string' ? new RegExp(param) : param);
    }, 'Please enter a value in the correct format.');
});

function MakeToast(toastTitle, toastClass, toastBody) {
    $(document).Toasts('create', {
        position: 'topRight',
        title: toastTitle,
        class: toastClass,
        autohide: true,
        delay: 5000,
        body: toastBody
    });
}


function FormConfirmDelete(_this, confirmTitle, confirmText, confirmType) {
    swal.fire({
        title: confirmTitle,
        text: confirmText,
        type: confirmType,
        showCancelButton: true,
        confirmButtonColor: '#007bff',
        cancelButtonColor: '#ef172c',
        confirmButtonText: '&nbsp;Yes&nbsp;'
    }).then(function (result) {
        if (result.value) {
            $(_this).closest('form').submit();
        } else if (result.dismiss == 'cancel') {
            return false;
        }
    });
}