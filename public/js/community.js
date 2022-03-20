$(document).ready(function(){

    $('select').select2({
        dropdownParent: $('#modal-approval')
    });

    $('#modal-approval').on('show.bs.modal', function(e){
        var feedID = $(e.relatedTarget).data('id');

        alert(feedID);
    });
});

function changeStatus(feedID, status, answer = null)
{
    $.post('/community/change-status', {
        feedID: feedID,
        status: status,
        answer: answer
    }, 
    function(response){
        window.location = '/community';
    });
}