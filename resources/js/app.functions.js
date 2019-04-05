export function getCurrentDate(format) {
    var d = new Date();
    var day = d.getDate();
    var month = d.getMonth()+1;
    day = (day > 9) ? day : ("0"+day);
    month = (month > 9) ? month : ("0"+month);
    if (format) {
        return  (day + format + month + format + d.getFullYear());
    }
    return  (day + '/' + month + '/' + d.getFullYear());
}
export function setDateRangePicker(selector) {
    $(selector).daterangepicker({
      singleDatePicker: true,
      showDropdowns: true,
      autoUpdateInput: false,
      "locale": {
        "format": "DD-MM-YYYY"
    }
    // merubah date format
    }, function(chosen_date) {
      $(selector).val(chosen_date.format('DD-MM-YYYY'));
    });
}
