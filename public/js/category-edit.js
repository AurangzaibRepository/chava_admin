$(function() {
    
    populateSubCategories();
});

function populateSubCategories() {

    $('#tbl-subcategories').DataTable({
        'searching': false,
        'bLengthChange': false,
        'bSort': false,
        'language': {
            'emptyTable': 'No data found'
        }
    });
}
