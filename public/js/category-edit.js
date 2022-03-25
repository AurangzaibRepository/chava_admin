var isValid;
$(function() {
    
    populateSubCategories();

    $('#modal-subcategory').on('shown.bs.modal', (e) => {
        $('#subcategory').val('');
        $('.spn-error').css('display', 'none');
    });
});

function populateSubCategories() {

    $('#tbl-subcategories').DataTable({
        'searching': false,
        'bLengthChange': false,
        'bSort': false,
        'language': {
            'emptyTable': 'No data found'
        },
        'ajax': '/topics/sub-categories/' + $('[name=id]').val(),
        'columnDefs': [{
                'targets': 0,
                'width': '8%',
                'class': 'text-center'
            },
            {
                'targets': 2,
                'width': '10%',
                'class': 'text-center',
                render: function(data){
                    return `
                    <a><i class="far fa-edit"></i></a>
                    `;
                }
            }
        ]
    });
}

function save() {

    isValid = true;
    $('.spn-error').css('display', 'none');
}
