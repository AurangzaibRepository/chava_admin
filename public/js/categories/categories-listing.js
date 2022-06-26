var isValid;

$(function() {

    populateCategories();

    $('#modal-category').on('shown.bs.modal', (e) => {
        $('.spn-error').css('display', 'none');
        $('#error-response').css('visibility', 'hidden');
        $('.modal-body #category, .modal-body #status').val('');
        $('.modal-body #publish').prop('checked', false);
    });
});

function populateCategories() {

    $('#tbl-categories').DataTable({
        'searching': false,
        'bSort': false,
        'bLengthChange': false,
        'serverSide': true,
        'ajax': {
            type: 'POST',
            url: '/categories/listing'
        }
    });
}

function addCategory() {

    isValid = true;
    $('.spn-error').css('display', 'none');

    validateField('category', 'spn-category');
    validateField('status', 'spn-status');

    if (!isValid) {
        return;
    }

    $.ajax({
        'type': 'POST',
        'data': {
            category: $('#category').val(),
            status: $('#status').val(),
            published: ($('#publish').is(':checked') ? 1 : 0)
        },
        'url': 'categories/add',
        success: function() {
            window.location = '/topics';
        },
        error: function(xhr, status, error) {
            $('#error-response').css('visibility', 'visible');
        }
    });
}

function validateField(elementID, errorID) {

    if ($(`#${elementID}`).val().trim() === '') {
        
        isValid = false;
        $(`#${errorID}`).css('display', 'block');
    }
}
