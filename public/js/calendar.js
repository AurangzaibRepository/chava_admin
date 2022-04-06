$(function(){

    populateReminders();
});

function populateReminders() {

    $('#table-reminders').DataTable({

        'searching': false,
        'bLengthChange': false,
        'bSort': false,
        'columnDefs': [{
            'targets': 0, 
            'width': '8%',
            'class': 'text-center'
        }],
        'ajax': '/calendar/listing'
    });
}