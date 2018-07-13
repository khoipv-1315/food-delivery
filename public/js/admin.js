$(document).load(function() {
    $(document).on('click', '.pagination li a', function(e) {
        e.preventDefault();
        console.log(1);
        let page = $(this).attr('href').split('page=')[1];
        getPosts(page);
        $('body,html').animate({
            scrollTop: 0
        }, 0);
    });
});
function getPosts(page) {
    $.ajax({
        type : 'get',
        url: '/admin/user?page=' + page,
        }).done(function (data) {
        $('.x_content').html(data);
    });
}