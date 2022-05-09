$(function() {
    selectDate();
    selectTime();
});

function selectUser() {
    userDropdown.val($("[name=hdn_userid]").val());

    if (edit) {
        userDropdown.select2({
            disabled: true
        });
    }
}

function selectDate() {
    $('#date').val($("[name=hdn_date]").val() );
}

function selectTime() {
    $('#time').val($('[name=hdn_time]').val());
}