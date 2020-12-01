$(function () {
    "use strict";
    $("button[type='submit']").prop("disabled", false);
    $(document).on('submit','#form-ajax', function(e) {
        e.preventDefault()
        var route = $(this).data('action');
        var dataSend = new FormData(this);

        $.ajax({
            url     : route,
            type    : 'post',
            data    : dataSend,
            dataType:'json',
            processData: false,
            contentType: false,
            cache: false,
            success : function(data){
                window.location = data.route;
            },
            error: function (errors){
                if(errors.status == 422){
                    $('.error-content').empty();
                    $('.border-msg').removeClass('has_error');
                    var response = $.parseJSON(errors.responseText);
                    $.each(response.errors, function( key, value){
                        var newKey = key.split('.').join("");
                        $('#error-'+newKey).text(value);
                        $('#'+newKey).addClass('has_error');
                    });
                }else {
                    alert(errors.status+" االرجاء المحاوله في وقت لاحق خطأ")
                    location.reload();
                }
            }
        })
    });

    $(document).on('submit','.form-delete', function(e) {
        e.preventDefault()
        var route = $(this).data('action');
        var dataSend = new FormData(this);
        $.ajax({
            url     : route,
            type    : 'post',
            data    : dataSend,
            dataType:'json',
            processData: false,
            contentType: false,
            cache: false,
            success : function(data){
                $('#type-errors').hide();
                $('#type-errors').text(data.message).show();
                $('.table-responsive .table').DataTable().ajax.reload();
            },
            error: function (errors){
                alert(errors.status+" error")

            }
        })
    });


});
