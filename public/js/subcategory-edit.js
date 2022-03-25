$(document).ready(function(){

    
});

function validateForm() {

    if ($('#sub_category').val().trim() === '') {

        $('#error-subcategory').css('display', 'block');
        $('#col-buttons div').css('margin-top', '-3px');
        return false;
    }
}