$(document).ready(function(){

    $('#modal-delete-topic').on('shown.bs.modal', (e) => {
        
       $('#modal-delete-topic [name="topic_id"]').val($(e.relatedTarget).data('topicid') );
       $('#modal-delete-topic #spn-topic').text($(e.relatedTarget).data('topic'));
    });
});


function deleteTopic() {

    $.ajax({
        type: 'DELETE',
        url: '/topics/' + $('#modal-delete-topic [name=topic_id]').val(),
        success: function(response) {
            location.reload();
        }
    });
}