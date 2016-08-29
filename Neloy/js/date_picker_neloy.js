
var jq = $.noConflict();
jq(document).ready(function ()
{

    jq(".datepicker-3").datepicker(
            jq.datepicker.regional["en"]
            ).datepicker("option",
            {
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });
});
