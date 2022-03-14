$(document).ready(function(){
    
    PopulateUsers();
});

function PopulateUsers()
{
    $('#table-whatsapp').DataTable({
        'bLengthChange': false,
        'bSort': false,
        'searching': false,
        'language': {
            'emptyTable': 'No records found'
        },
        columnDefs: [
            {targets:[0,1,2,3], width: '25%'},
        ],
        ajax: '/whatsapp-sessions/listing'
    });
}