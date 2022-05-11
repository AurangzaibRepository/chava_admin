function previewThumbnail(obj) {
    
    $('#img-thumbnail').css('display', 'block');
    $('#img-thumbnail').attr('src', URL.createObjectURL(obj.files[0]) );
}