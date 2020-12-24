$(document).ready(function() {

    $("#avatar").fileinput({
    overwriteInitial: true,
    maxFileSize: 2000,
    showClose: false,
    showCaption: false,
    browseLabel: '',
    removeLabel: '',
    removeTitle: 'Cancel or reset changes',
    elErrorContainer: '#kv-avatar-errors-1',
    msgErrorClass: 'alert alert-block alert-danger',
    initialPreviewAsData: true,
    browseOnZoneClick: true,
    showUpload: false,
    fileActionSettings: {
        showZoom: false,
    },
    allowedFileExtensions: ["jpg","jpeg","png"],
    theme:"fas",

    });
    $('#image').fileinput({
        language: 'es',
        allowedFileExtensions:['jpg','jpeg','png'],
        maxFileSize: 2000,
        browseOnZoneClick: true,
        initialPreviewShowDelete: false,
        showCaption: false,
        showUpload: false,
        showClose: false,
        removeClass: "btn btn-danger",
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        initialCaption: "-- Seleccione una imagen --",
        fileActionSettings: {
            showZoom: false,
        },
        theme:"fas",
    });
    $("#fileDocument").fileinput({
        'showUpload': false
    });
    //
    $(document).ready(function () {
        $('.select-input').select2({
            theme: 'bootstrap4',
        });

        $('.form_submit').submit(function()
        {
            $('.btn_submit').prop('disabled',true);
            $('.btn_submit').html('<p><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only"></span> Registrando...</p>');
        });
    });
    /* Aumentamos el marco superior cuando se muestre el modal */



});


