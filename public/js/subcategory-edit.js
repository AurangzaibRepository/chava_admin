var isValid;

$(document).ready(function() {

    populateTopics();

    $('#modal-add-topic').on('shown.bs.modal', (e) => {

        $('.spn-error').css('display', 'none');
        $('#modal-add-topic .field').val('');
        $('#iframe-video').css('display', 'none');
        $('#iframe-video').attr('src', '');
        $('#modal-add-topic .btn-primary').attr('disabled', false);
        $('#modal-add-topic #video').css('pointer-events', 'auto');
        $('#modal-add-topic .fa-spinner').css('display', 'none');
    });

    $('#modal-add-topic').on('hidden.bs.modal', (e) => {
        location.reload(); 
    });

    $('#iframe-video').on('load', function() {
        $("#iframe-video").contents().find("img").attr("style","width:100%");
    });
});

function populateTopics() {

    $('#tbl-topics').DataTable({

        'searching': false,
        'bLengthChange': false,
        'bSort': false,
        'language': {
            'emptyTable': 'No data available'
        },
        'columnDefs': [
            {
                'targets': 0,
                'width': '8%',
                'class': 'text-center'
            },
            {
                'targets': 2,
                'width': '15%'
            },
            {
                'targets': 3,
                'width': '10%',
                'class': 'text-center',
                'visible': false,
                'render': function(data) {
                    return `
                        <a data-bs-toggle="modal" data-bs-target="#modal-add-topic"><i class="far fa-edit"></i></a>
                    `;
                }
            }
        ],
        'ajax': '/topics/' + $('[name=subcategory_id]').val()
    });
}

function updateVideo(obj) {

    $('#iframe-video').css('display', 'block');
    document.getElementById('iframe-video').src = window.URL.createObjectURL(obj.files[0]);
}

function validateForm() {

    if ($('#sub_category').val().trim() === '') {

        $('#error-subcategory').css('display', 'block');
        $('#col-buttons div').css('margin-top', '-3px');
        return false;
    }
}

function validateTopic() {
    
    isValid = true;
    $('.spn-error').css('display', 'none');

    validateField('type', 'error-type');
    validateField('topic', 'error-topic');
    validateField('video', 'error-video');
    validateFileType();

    if (isValid) {
        $('#modal-add-topic .btn-primary').attr('disabled', true);
        $('#modal-add-topic #video').css('pointer-events', 'none');
        $('#modal-add-topic .fa-spinner').css('display', 'block');

        $('#form-topic').submit();
    }
    
    return false;
}

function validateField(elementID, errorID) {

    if ($(`#${elementID}`).val().trim() === '' ) {
        isValid = false;
        $(`#${errorID}`).css('display', 'block');
    }
}

function validateFileType() {

    let validExtensions = [];
    let errorMsg = '';

    if ($('#type').val() === 'article') {
        errorMsg = 'Only word and pdf files allowed';
        validExtensions = ["doc", "docx", "pdf"];
    }

    if ($('#type').val() === 'video') {
        errorMsg = 'Only video files are allowed';
        validExtensions = ["mp4", "mov", "wmv", "avi"];
    }

    let file = $('#video').val().split('.').pop();

    if (validExtensions.indexOf(file) == -1) {
        isValid = false;
        $('#error-video').css('display', 'block');
        $('#error-video').text(errorMsg);
    }
}