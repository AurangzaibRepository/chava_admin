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
            {'targets': [0,1,2,3,4], 'width': '15%' },
            {'targets': 5, 'width': '10%', 'data': null,
        render: function(row, data){

            if (row[4] === 'Active'){
                icon = 'fa-toggle-on';
                status = 'Inactive';
            }

            if (row[4] === 'Inactive'){
                icon = 'fa-toggle-off';
                status = 'Active';
            }

            return `
            <a class="user-modal" data-bs-toggle="modal" data-bs-target="#modal-user" data-name="${row[0]}" data-last-active="${row[3]}" 
            data-country="${row[5]}"
            data-phone-no="${row[6]}" data-created-at="${row[7]}">
            <i class="far fa-question-circle"></i></a>
            <a class="change-status" onClick="confirmStatusChange(${row[1]}, '${status}')">
            <i class="fa ${icon}"></i>
            </a>
            `;
        }}
        ]
    });
}

function confirmStatusChange(userID, status)
{
    let statusText = (status === 'Active' ? 'activate' : 'deactivate');

    if (confirm(`Are you sure you want to ${statusText}?`))
    {
        window.location.href = `/users/change-status/${userID}/${status}`;
    }
}