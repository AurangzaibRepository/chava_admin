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
                        <a><i class="far fa-edit"></i></a>
                    `;
                }
            }
        ],
        'ajax': '/topics/' + $('[name=subcategory_id]').val()
    });
}

function validateForm() {

    if ($('#sub_category').val().trim() === '') {

        $('#error-subcategory').css('display', 'block');
        $('#col-buttons div').css('margin-top', '-3px');
        return false;
    }
}