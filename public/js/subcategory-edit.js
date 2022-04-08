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
        $('#modal-add-topic #dv-loader').css('display', 'none');
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
                'data': null,
                'render': function(row, data) {
                    return `
                        <a data-bs-toggle="modal" data-bs-target="#modal-edit-topic"><i class="far fa-edit"></i></a>
                        <a data-bs-toggle="modal" data-bs-target="#modal-delete-topic" data-topicid="${row[3]}" data-topic="${row[1]}"><i class="fas fa-trash-alt"></i></a>
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
        $('#modal-add-topic #dv-loader').css('display', 'inline-flex');

        submitForm();
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

    if (validExtensions.indexOf(file) != -1) {
        validateFileSize();
    }
}

function validateFileSize() {
    fileSize = $('#video')[0].files[0].size;
    fileSize = fileSize/1024/1024;
    
    if (fileSize >= 80) {
        isValid = false;
        $('#error-video').css('display', 'block');
        $('#error-video').html('Maximum filesize allowed is 80MB');
    }
}

function submitForm() {
    
    $('#form-topic').on('submit', function(e) {

        e.preventDefault();
        $.ajax({

            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {

                    showProgress(evt);
                }, false);
                return xhr;
            },

            type: 'POST',
            url: '/topics/add',
            contentType: false,
            processData: false,
            data: new FormData(this),
            success: function(resp) {
                location.reload();
            }

        }); //End ajax
    }); // End form submit

    $('#form-topic').submit();
}

function showProgress(event) {

    if (event.lengthComputable) {

        let percentComplete = ((event.loaded / event.total) * 100);

        if (percentComplete < 100) {
            percentComplete = Math.round(percentComplete);
            $('#dv-loader span').html(`${percentComplete}%`);    
        }

        if (percentComplete === 100) {
            $('#dv-loader span').text('processing...');
        }
    }
}