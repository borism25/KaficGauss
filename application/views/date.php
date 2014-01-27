<!DOCTYPE html>
<html>
<head>
	<title>Tablica Po Danima</title>
	<style type="text/css">
		.tg-left { text-align: left; } .tg-right { text-align: right; } .tg-center { text-align: center; }
		.tg-bf { font-weight: bold; } .tg-it { font-style: italic; }
		.tg-table-plain { border-collapse: collapse; border-spacing: 0; font-size: 100%; font: inherit; }
		.tg-table-plain td, .tg-table-plain th { border: 1px #555 solid; padding: 10px; vertical-align: top; }
	</style>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script>
		$(function() {
			$('#datepicker1, #datepicker2').datepicker({ dateFormat: "yy-mm-dd" });
		});

		
	</script>

	

</head>
<body>
	<?php echo form_open(); ?>
		<p>Od Datuma: <input type="text" name="datepicker1" id="datepicker1"> &nbsp Do:&nbsp <input type="text" name="datepicker2" id="datepicker2"></p>
	<?php echo "<p>" . form_submit('submit','Submit') . "</p>" ?>
  <?php echo form_close(); ?>

</body>
</html>
