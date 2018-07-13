$("#search_food").keyup(function() {
var key = $(this).val();
    setTimeout(function() {
        $.ajax({
            url: 'search/food',
            type: 'GET',
            data: {
                name : key,
            },
            success: function(response) {
                $('tbody').html(response);
            }   
        })  
    },1000);
});

function CheckForm(){
    r = confirm("Ban co muon xoa khong?");
    if(r == false) return false;
    else return true;                               
}
