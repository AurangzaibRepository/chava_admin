$(function() {
    
    initializeDatepicker();
});

function initializeDatepicker() {
    $('#date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });

    $('#date').val('');

    $('#date').on('apply.daterangepicker', function(ev, picker) {
        $('#date').val(picker.startDate.format('DD/MM/YYYY'));
    });

    $('#date').on('hide.daterangepicker', function(ev, picker) {
        $('#date').val(picker.startDate.format('DD/MM/YYYY'));
    });
}