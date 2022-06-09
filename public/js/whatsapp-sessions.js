$(document).ready(function(){
    
    PopulateUsers();
});

function PopulateUsers()
{
    $('#table-whatsapp').DataTable({
        'bLengthChange': false,
        'bSort': false,
        'searching': false,
        'destroy': true,
        'serverSide': true,
        'language': {
            'emptyTable': 'No records found'
        },
        columnDefs: [
            {targets:[0,1,2], width: '30%'},
            {targets: 3, width: '10%', data:null,
            render: function(data, type, row, meta){
                return `<a href='https://web.whatsapp.com/send?phone=${data[2]}' target='_blank'> <i class="fab fa-whatsapp"></i></a>`
            }
        }
        ],
        ajax: '/whatsapp-sessions/listing'
    });
}

function reset() {
    $('#form-filter').reset();
}