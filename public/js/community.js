$(document).ready(function(){

    $('select').select2({
        dropdownParent: $('#modal-approval')
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