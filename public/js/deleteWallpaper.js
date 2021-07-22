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
