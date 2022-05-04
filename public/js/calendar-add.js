$(function() {
    
    initializeDatepicker();
});

function initializeDatepicker() {
    $('#date').daterangepicker({
        format: 'DD/MM/YY'
    });

    $('#date').val('');
}