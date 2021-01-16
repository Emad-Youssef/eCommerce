$(function () {
  'use strict';
  // describe remaining letters

  var paremtImage = $('.photos-show-mini');
  paremtImage.on('click','.open-file', function() {

      let file = $(this).data('clickfile');
          $('#'+file).click();

    })
  paremtImage.on('change','.fileupload', function () {

    var clickfile = $(this).attr("id");
    var ext = $(this).val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['png','jpg','jpeg']) == -1){
        $(this).val('');
        $('#suggest #photo-suggest').addClass('hidden')
        $('#suggest #photo-errors').removeClass('hidden')
        $('#suggest').removeClass('hidden')
      } else{
        $(this).next('li').replaceWith(`<li class="fleft with-photo rel ">
            <div class="open-file" data-clickfile="`+clickfile+`" >
                <a  class="icon mini vis remove3 abs" title="إحذف"  rel="">إحذف</a>
                <img class="" src="`+URL.createObjectURL(event.target.files[0])+`" id="" alt="">
            </div>
        </li>`);

        $('#suggest').addClass('hidden')
        $('#suggest #photo-errors').addClass('hidden')
        $('#suggest #photo-suggest').removeClass('hidden')
      }
	})

	paremtImage.on('click','li .remove3', function () {

    var clickfile = $(this).parent().data("clickfile")

    $(this).parents('li').replaceWith(`<li class="fleft empty rel" style="z-index: 0;">
        <div class="br5">
            <a data-clickfile="`+clickfile+`" class="open-file block" title="">
            <span class="icon margin0_a rel add2 block"></span>
            </a>
        </div>
    </li>`);

  });

});
