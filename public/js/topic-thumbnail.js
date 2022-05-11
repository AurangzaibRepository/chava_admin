function previewThumbnail(obj) {
    
    $('#img-thumbnail').css('display', 'block');
    $('#img-thumbnail').attr('src', URL.createObjectURL(obj.files[0]) );
}

function validateThumbnail() {

    let file = $('#thumbnail').get(0).files;
    let validImageTypes = ["image/gif", "image/jpeg", "image/png"];

    if (file.length == 0) {
        $('#error-thumbnail').css('display', 'block');
        isValid = false;
        return;
    }   

    if ($.inArray(file[0]['type'], validImageTypes) < 0 ) {
        $('#error-thumbnail').html('Thumbnail must be image file');
        $('#error-thumbnail').css('display', 'block');
        isValid = false;
    }

}