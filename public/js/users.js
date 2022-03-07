$(document).ready(function(){

    // Function to populate users
    PopulateUsers();

    $('#modal-user').on('shown.bs.modal', function(e){
        let name= $(e.relatedTarget).data('name');
        let country = $(e.relatedTarget).data('country');
        let joiningDate = $(e.relatedTarget).data('created-at');
        let lastActive = $(e.relatedTarget).data('last-active');
        let phoneNumber = $(e.relatedTarget).data('phone-no');

        $('#modal-user #name').text(name);
        $('#modal-user #country').text(country);
        $('#modal-user #registered-date').html(joiningDate);
        $('#modal-user #last-active').text(lastActive);
        $('#modal-user #phone-no').html(phoneNumber);
    });
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
        render: function(row, data){
            return `<a data-bs-toggle="modal" data-bs-target="#modal-user" data-name="${row[0]}" data-last-active="${row[3]}" 
            data-country="${row[4]}"
            data-phone-no="${row[5]}" data-created-at="${row[6]}">
            <i class="far fa-question-circle" style="color: red"></i></a>
            <a><i class="far fa-trash-alt" style="color: #0b5ed7"></i></a>`
        }}
        ]
    });
}