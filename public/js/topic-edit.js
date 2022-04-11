var isValid;
$(document).ready(function(){

    $('#modal-delete-topic').on('shown.bs.modal', (e) => {
        
       $('#modal-delete-topic .fa-spinner').css('display', 'none');
       $('#modal-delete-topic [name="topic_id"]').val($(e.relatedTarget).data('topicid') );
       $('#modal-delete-topic #spn-topic').text($(e.relatedTarget).data('topic'));
    });

    $('#modal-edit-topic').on('shown.bs.modal', (e) => {
        $('.spn-error').css('display', 'none');
    });
});


function deleteTopic() {

    $('#modal-delete-topic .fa-spinner').css('display', 'block');

    $.ajax({
        type: 'DELETE',
        url: '/topics/' + $('#modal-delete-topic [name=topic_id]').val(),
        success: function(response) {
            location.reload();
        }
    });
}

function updateTopic() {
    
    isValid = true;
    $('.spn-error').css('display', 'none');

    validateField('modal-edit-topic #type', 'modal-edit-topic #error-type');
    validateField('modal-edit-topic #title', 'modal-edit-topic #error-title');
}