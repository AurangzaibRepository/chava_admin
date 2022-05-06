$(function() {
    selectDate();
});

function selectUser() {
    userDropdown.val($("[name=hdn_userid]").val());
}

function selectDate() {
    $('#date').val($("[name=hdn_date]").val() );
}