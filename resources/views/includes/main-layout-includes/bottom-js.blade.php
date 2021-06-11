<script src="{{ asset('/assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('/assets/js/adminlte.min.js') }}"></script>
<script src="{{ asset('/assets/js/xmanager.js') }}"></script>

@yield('additional-js')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        }
    });

    @switch(Session::get('type'))
        @case('Success')
        MakeToast("{{ Session::get('type') }}", "bg-success", "{{ Session::get('message') }}");
        @break

        @case('Error')
        MakeToast("{{ Session::get('type') }}", "bg-danger", "{{ Session::get('message') }}");
        @break

        @case('Warning')
        MakeToast("{{ Session::get('type') }}", "bg-warning", "{{ Session::get('message') }}");
        @break

        @case('Info')
        MakeToast("{{ Session::get('type') }}", "bg-info", "{{ Session::get('message') }}");
        @break

        @default
        @break
    @endswitch

    $("#ChangeFirm").on("change", function() {
        firm_id = $(this).val();
        $.ajax({
            type: 'POST',
            url: '{{ route('SwitchFirm') }}',
            data: {
                firm_id: firm_id,
                "_token": $('meta[name="_token"]').attr('content')
            },
            success: function(data) {
                if (data.Result == 0) {
                    window.location.href = "{{ url('/') }}";
                } else {
                    MakeToast("Warning", "bg-warning", "Invalid Firm Selected!");
                }
            }
        });
    });

</script>
