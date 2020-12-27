@push('style')
<style>
.dz-image img{
    width: 100% !important;
}
</style>
@endpush
<!-- Step 3 -->
<h6>@lang('site.images')</h6>
<fieldset data-pos="form-file-upload-t-4">
    <h4 class="form-section"><i class="ft-home"></i> صور المنتج </h4>
    <div class="row">
        <div class="col-md-12" id="error-images-box">
            <p id="error-images" class="error-content text-danger"></p>
            <div id="dpz-multiple-files" class="dropzone dropzone-area">
                <div class="dz-message">@lang('site.can_upload_more')</div>
            </div>
            <br><br>
        </div>
    </div>

</fieldset>

@push('script')
<script>
var uploadedDocumentMap = {}
var index =0
Dropzone.options.dpzMultipleFiles = {
    paramName: "dzfile", // The name that will be used to transfer the file
    //autoProcessQueue: false,
    maxFilesize: 5, // MB
    clickable: true,
    addRemoveLinks: true,
    acceptedFiles: 'image/*',
    dictFallbackMessage: "{{ __('messages.dictFallbackMessage') }}",
    dictInvalidFileType: "{{ __('messages.dictInvalidFileType') }}",
    dictCancelUpload: "{{ __('messages.dictCancelUpload') }}",
    dictCancelUploadConfirmation: "{{ __('messages.dictCancelUploadConfirmation') }}",
    dictRemoveFile: "{{ __('messages.dictRemoveFile') }}",
    dictMaxFilesExceeded: "{{ __('messages.dictMaxFilesExceeded') }}",
    headers: {
        'X-CSRF-TOKEN':
            "{{ csrf_token() }}"
    }
    ,
    url: "{{ route('admin.products.uploadImages') }}", // Set the url
    success: function (file, response) {
        $('#form-file-upload').append('<input type="hidden" name="images[]" value="' + response.name + '">')
        uploadedDocumentMap[file.name] = response.name;
        $('#error-images-box').prepend(`<p id="error-images${index++}" class="error-content text-danger"></p>`)
    },
    removedfile: function (file) {
        file.previewElement.remove()
        var name = ''
        if (typeof file.file_name !== 'undefined') {
            name = file.file_name
        } else {
            name = uploadedDocumentMap[file.name]
        }
        $('#form-file-upload').find('input[name="images[]"][value="' + name + '"]').remove()
        // Add this code in removedfile dropzone
        $.ajax({
            type: 'POST',
            url: '{{ route('admin.products.deleteImages') }}',
            data: {
                fileName: name
            },
            dataType: 'html',
            headers: {
                'X-CSRF-TOKEN':
                    "{{ csrf_token() }}"
            },
            // success: function(data){
            //     // var rep = JSON.parse(data);
            //     console.log(data)
            // }
        });
    }
    ,
    // previewsContainer: "#dpz-btn-select-files", // Define the container to display the previews
    init: function () {
        myDropzone = this;
        @if(isset($product))
            @foreach($product->images as $file)
                var mockFile = {name: "{{$file->img}}", fid: "{{$file->id}}", size: 0, status: 'success'};
                myDropzone.emit("addedfile", mockFile);
                myDropzone.emit("thumbnail", mockFile, "{{asset('uploads/products').'/'.$file->img}}");
                myDropzone.emit("complete", mockFile);
                $('#form-file-upload').append(`<input id="file-{{$file->id}}" type="hidden" name="old_images[]"/>`)
            @endforeach
            this.on("removedfile", function (file) {
                var fileId = 'file-'+file.fid;
                $('#form-file-upload #'+fileId).remove();
                $.post({
                    url: "{{ route('admin.products.deleteImages') }}",
                    data: {fileName: file.name , fid:file.fid, _token: $('[name="_token"]').val()},
                    dataType: 'json',
                });
            });
        @endif
    }
}
</script>

@endpush