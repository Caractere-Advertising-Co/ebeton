let currentPage = 1;

$(document).ready(function() {
    $('#load-more').on('click', (e) =>{
        currentPage++; // Do currentPage + 1, because we want to load the next page

        console.log(currentPage);
        
        $.ajax({
            type:'POST',
            url: '/wp-admin/admin-ajax.php',
            dataType: 'json',
            data : {
                action: 'load_more_ref',
                paged : currentPage,
            },
            success : function(res){
                if(currentPage >= res.max){
                    $('#load-more').hide();
                };
                $('.grid-chantier').append(res.html);
            }
        })
    });
});
