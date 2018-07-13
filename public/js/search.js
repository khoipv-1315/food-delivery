$(document).ready(function() {
    $('#search-form').on('submit', function(event) {
        event.preventDefault();
        var keyword = $('#search-input').val();
        var url = "/search";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: 'post',
            async: false,
            data: {
                'keyword': keyword
            },
            success: function(result) {
                $('.main-content').html(result);
            },
        })
    });
});
