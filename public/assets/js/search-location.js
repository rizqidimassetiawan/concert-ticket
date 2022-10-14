
    function searchLocation(){
        $.ajax({
            url : '/search',
            type : 'Get',
            dataType : 'json',
            data : {
            'search' : $('#search-input').val()
            },
            success : function(result){  
            $('#loading').css('display','none')
            console.log(result);
            }
        });
    }

    $('#btn-search').on('click',function(){
        $('#place-list').html('')
        $('#loading').css('display','block')
        searchLocation()
    });

    $("#search-input").on('keyup', function (e) {
        $('#place-list').html('')
        if (e.key === 'Enter' || e.keyCode === 13) {
            $('#loading').css('display','block')
            searchLocation()
        }
    });