function validate(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key);
    var regex = /[0-9]|\./;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault) theEvent.preventDefault();
    }
}
$(window).on("load resize", function(e) {
    if ($(window).width() > 315) {
        $('.product-tab .tab-link:nth-child(1) ').append('<div class="tab-content-mobile"></div>');
        $('.product-tab .tab-link:nth-child(1) .tab-content-mobile').append($('#tab-1').html());
        $('.product-tab .tab-link:nth-child(1)').addClass('current');

        $('.product-tab .tab-link:nth-child(2)').append('<div class="tab-content-mobile"></div>');
        $('.product-tab .tab-link:nth-child(2) .tab-content-mobile').append($('#tab-2').html());

        $('.product-tab .tab-link:nth-child(3)').append('<div class="tab-content-mobile"></div>');
        $('.product-tab .tab-link:nth-child(3) .tab-content-mobile').append($('#tab-3').html());

        $('.product-tab .tab-content').remove();
        $('.tab-link').click(function(e) {

        })
    }
});
$(".not-dqtab").each(function(e) {
    $(this).find('.tabs-title li:first-child').addClass('current');
    $(this).find('.tab-content').first().addClass('current');

    $(this).find('.tabs-title li').click(function() {
        if ($(window).width() > 315) {
            if ($(this).hasClass('current')) {
                $(this).removeClass('current');
            } else {
                var tab_id = $(this).attr('data-tab');
                var url = $(this).attr('data-url');
                $(this).closest('.e-tabs').find('.tab-viewall').attr('href', url);

                $(this).closest('.e-tabs').find('.tabs-title li').removeClass('current');
                $(this).closest('.e-tabs').find('.tab-content').removeClass('current');

                $(this).addClass('current');
                $(this).closest('.e-tabs').find("#" + tab_id).addClass('current');
            }
        } else {
            var tab_id = $(this).attr('data-tab');
            var url = $(this).attr('data-url');
            $(this).closest('.e-tabs').find('.tab-viewall').attr('href', url);

            $(this).closest('.e-tabs').find('.tabs-title li').removeClass('current');
            $(this).closest('.e-tabs').find('.tab-content').removeClass('current');

            $(this).addClass('current');
            $(this).closest('.e-tabs').find("#" + tab_id).addClass('current');

        }

    });
});

$(document).on('click', '.btn-edit', function() {
    var id = $('.btn-edit').attr('data-id');
    var url = '/review/create';
    $.ajax({
        url: url,
        type: 'get',
        data: {
            'id': id,
        },
        success: function(result) {
            $('#myModal').html(result);
            $('#btnnewreview').click();
        },
    })
});
