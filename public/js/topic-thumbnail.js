function previewThumbnail(obj) {
    
    $('#img-thumbnail').css('display', 'block');
    $('#img-thumbnail').attr('src', URL.createObjectURL(obj.files[0]) );
}

function validateThumbnail() {

    if ($('#thumbnail').get(0).files.length == 0) {
        $('#error-thumbnail').css('display', 'block');
        isValid = false;
    }   
}