$("#delete-wallpaper").click(function() {
    $(this).parent().parent().remove();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/image/"+$(this).data('id'),
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data:{id:$(this).data('id'),},
        type: 'DELETE',




    });

});
$("#activate-wallpaper").click(function() {
    console.log("activer")
    $(this).parent().parent().remove();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/activate",
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data:{id:$(this).data('id')},
        type: 'POST',
        success: function (data) {
            console.log(data)
        },
        error: function (data) {
            console.log(data)
        }



    });

});
