$(document).ready(function(){

    // Function to populate users
    PopulateUsers();
});

// Function to populate users
function PopulateUsers()
{
    $('#table-users').DataTable({
        'searching': false,
        'lengthChange': false,
        'bSort': false,
        //'ajax': '/users-listing',
        'ajax': {
            type: 'POST',
            url : '/users-listing'
        },
        columnDefs:[
            {'targets': 4, 'data': null,
        render: function(){
            return `<a data-bs-toggle="modal" data-bs-target="#modal-user"><i class="far fa-question-circle" style="color: red"></i></a>
            <a><i class="far fa-trash-alt" style="color: #0b5ed7"></i></a>`
        }}
        ]
    });
}