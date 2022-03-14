$(document).ready(function(){
    
    PopulateUsers();
});

function PopulateUsers()
{
    $('#table-whatsapp').DataTable({
        'bLengthChange': false,
        'bSort': false,
        'searching': false,
        'serverSide': true,
        'language': {
            'emptyTable': 'No records found'
        },
        columnDefs: [
            {targets:[0,1,2], width: '30%'},
            {targets: 3, width: '10%'}
        ],
        ajax: '/whatsapp-sessions/listing'
    });
}