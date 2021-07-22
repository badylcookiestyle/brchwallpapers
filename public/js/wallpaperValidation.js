function displayProductErrors(data){
        $('#product-errors').show()
        data.responseJSON.errors.file ? $('.image-alert'.toString()).append(data.responseJSON.errors.file+'<br>'):false;
        data.responseJSON.errors.category  ? $('.image-alert'.toString()).append(data.responseJSON.errors.category+'<br>'):false;
        data.responseJSON.errors.type  ?  $('.image-alert'.toString()).append(data.responseJSON.errors.type+'<br>'):false;

    }
    $(".image-alert").hide()
    $(".wallpaper-form").hide()
    $(".image-success-alert").hide()
    $(".form-toggler").click(function(){
        $( ".wallpaper-form" ).slideDown( "slow", function() {
            $(".form-toggler").slideUp("fast")
        });
    })
    $("#upload-button").click(function(){
        $('#product-errors').empty()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var can_sent=true;
        var file_data = $('#file').prop('files')[0];
        var form_data = new FormData();
        form_data.append('type',$('#check').prop('checked'));
        form_data.append('file',file_data);
        form_data.append('category',$('#category').val())


        if(typeof file_data=='undefined'){
            can_sent=false
            $('.image-success-alert').hide()
            $('.image-alert').empty()
            $('.image-alert').show()
            $('.image-alert').append("<h1>You've to choose an image</h1>")
        }
        if(can_sent==true) {
            $.ajax({
                url: "/image",
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'POST',
                success: function (data) {

                    $('.image-alert').hide()
                    $('.image-success-alert').show()
                },
                error: function (data) {
                    console.log(data)
                    $('.image-success-alert').hide()
                    $('.image-alert').empty()
                    $('.image-alert').show()
                    displayProductErrors(data)
                }


            });
        }
    })
