$(document).ready(function() {
    $('#email').on('change', function(event) {
        event.preventDefault();
        var input = $('#email').val();
        var url = "cart/check";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            async: false,
            data: {
                'email': input
            },
            success: function(result) {
                $('#user_id').val(result.id);
                $('#email').val(result.email);
                $('#name').val(result.name);
                $('#address').val(result.address);
                $('#phone').val(result.phone);
            },
        })
    });
});
