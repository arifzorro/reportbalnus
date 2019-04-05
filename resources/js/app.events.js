// =============================================================================
// VARIABLE
var BODY = $('body');


// =============================================================================
// DEFAULT EVENT => run when page loaded

$('.datepicker').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    autoUpdateInput: false,
    "locale": {
        "format": "DD-MM-YYYY"
    }
    // merubah date format
}, function(chosen_date) {
    $(this.element).val(chosen_date.format('DD-MM-YYYY'));
});