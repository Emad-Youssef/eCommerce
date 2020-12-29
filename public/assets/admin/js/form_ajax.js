
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

//delete
$(document).on('click','.delete',function(){

    var route   = $(this).data('route');
    var token   = $(this).data('token');
    var msDelete   = $(this).data('msdelete');
    var yes   = $(this).data('yes');
    var no   = $(this).data('no');
    $.confirm({
        icon                : 'glyphicon glyphicon-floppy-remove',
        animation           : 'rotateX',
        closeAnimation      : 'rotateXR',
        title               : '',
        autoClose           : 'cancel|6000',
        text                : msDelete,
        confirmButtonClass  : 'btn-outline',
        cancelButtonClass   : 'btn-outline',
        confirmButton       : yes,
        cancelButton        : no,
        dialogClass			: "modal-danger modal-dialog",
        confirm: function () {
            $.ajax({
                url     : route,
                type    : 'post',
                data    : {_method: 'delete', _token :token},
                dataType:'json',
                success : function(data){
                    $('#type-errors').hide();
                    $('#type-errors').text(data.message).show();
                    $('.table-responsive .table').DataTable().ajax.reload();
                },
                error: function (errors){
                    alert(errors.status+" error")
                }
            });
        }
    });
});

// is active
$(document).on('submit','.is_active', function(e) {
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
            console.log(data.message)
            $('.table-responsive .table').DataTable().ajax.reload();
        },
        error: function (errors){
            alert(errors.status+" error")
        }
    })
});


// Wizard tabs with numbers setup
var formProduct = $(".number-tab-steps");
var Snext = formProduct.data('next');
var Sprevious = formProduct.data('previous');
var Ssave = formProduct.data('save');
formProduct.steps({

    headerTag: "h6",
    bodyTag: "fieldset",
    transitionEffect: "fade",
    titleTemplate: '<span class="step">#index#</span> #title#',
    labels: {
        finish: Ssave,
        next: Snext,
        previous: Sprevious,
    },
    onStepChanging: function (event, currentIndex, newIndex){
     
       if(currentIndex == 0 && $('#arname').val() < 1){
            $('#arname').addClass('has_error')
            return false;
        }else if(currentIndex == 0 && $('#enname').val() < 1){
            $('#enname').addClass('has_error')
            return false;
        }else if(currentIndex == 1 && $('#slug').val() < 2){
            $('#slug').addClass('has_error')
            return false;
        }else if(currentIndex == 1 && !$('#categories .selectize-control .item').length){
            $('#categories').addClass('has_error')
            return false;
        }else if(currentIndex == 2 && $('#price').val() < 2){
            $('#price').addClass('has_error')
            return false;
        }else if(currentIndex == 2 && $('#selling_price').val() < 2){
            $('#selling_price').addClass('has_error')
            return false;
        }else{
            $('.border-msg').removeClass('has_error')
            return true;
        }
    },
    onFinished: function (event, currentIndex) {
        event.preventDefault()
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        var route = $(this).data('action');
        var dataSend = new FormData(this);
        var old_color = "#666EE8";
        $('.steps a .step').css("border-color",old_color)
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
                        var noty_id = $('#error-'+newKey).parents('fieldset').data('pos');
                        $('#'+noty_id+' .step').css("border-color", "#FF4961");
                    });
                }else {
                    alert(errors.status)
                    location.reload();
                }
            }
        })
    }
});
