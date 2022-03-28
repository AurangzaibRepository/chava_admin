$(document).ready(function() {

    populateTopics();
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
    document.getElementById('iframe-video').src = window.URL.createObjectURL(obj.files[0]);
}

function validateForm() {

    if ($('#sub_category').val().trim() === '') {

        $('#error-subcategory').css('display', 'block');
        $('#col-buttons div').css('margin-top', '-3px');
        return false;
    }
}