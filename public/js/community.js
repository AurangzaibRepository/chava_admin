$(document).ready(function(){

    
})

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