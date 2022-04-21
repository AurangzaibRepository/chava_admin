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
                'width': '15%'
            },
            {
                'targets': 3,
                'width': '10%',
                'class': 'text-center',
                render: function(data){
                    return `
                    <a href="/subcategories/edit/${data}"><i class="far fa-edit"></i></a>
                    `;
                }
            }
        ]
    });
}

function save() {

    isValid = true;
    $('.spn-error').css('display', 'none');

    validateFiled('subcategory', 'spn-subcategory');

    if (!isValid) {
        return;
    }

    $.post('/subcategories/add', {
        category_id: $('[name=id]').val(),
        sub_category: $('#subcategory').val()
    }, 
    function(response) {
        window.location = '/topics/edit/' + $('[name=id]').val();
    });
}

function validateFiled(elementID, errorID) {

    if ($(`#${elementID}`).val().trim() === '') {

        $(`#${errorID}`).css('display', 'block');
        isValid = false;
    }
}
