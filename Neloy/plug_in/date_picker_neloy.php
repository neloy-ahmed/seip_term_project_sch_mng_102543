<link href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/ui-darkness/jquery-ui.min.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/i18n/jquery-ui-i18n.min.js"></script>
<style>
	.ui-datepicker-month {
		color: black;
	}
	.ui-datepicker-year {
		color: black;
	}
</style>
<script>
	var jq = $.noConflict();
	jq(document).ready(function()
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
</script>