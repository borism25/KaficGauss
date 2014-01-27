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

<table class="tg-table-plain">
    <tr>
      <th>Proizvodi</th>
      <th>Preuzeto Stanje</th>
      <th>Ulaz</th>
      <th>Završno Stanje</th>
      <th>Prodano Količina</th>
      <th>Cijena</th>
      <th>Prodano Iznos</th>
    </tr>

		 <?php
		 // $i = 0;
		 // $arr = array();
		 // foreach ($datedata as $data1 => $value) {
		 // 	$arr [] = $value->datum_unosa;
		 // 	$arrsmjena [] = $value->smjena;

		 // 	$result = array_unique($arr);
		 // 	$result1 = array_unique($arrsmjena);
		 // }
		 // foreach ($result as $datum) {
		 // 	$smjena_ext = $datum;
		 // 	foreach ($result1 as $smjena) {

			//  		$tpl = "<tr class=" . "main" . ">";
			//  		$tpl .= "<td colspan=7>" . $smjena_ext . ' ' . $smjena . "</td>";
	 	// 				$tpl .= "</tr>";

	 	// 			if($i === 0) {
	 	// 				echo $tpl; $i = 1;
	 	// 			}

		 // 		foreach ($datedata as $key => $value1) {
		 // 			if ($datum == $value1->datum_unosa && $smjena == $value1->smjena){
		 // 				echo "<tr class=" . "content" . ">";
		 // 				echo "<td>" . $value1->naziv_proizvoda . "</td>";
		 // 				echo "<td>" . $value1->preuzeto_stanje . "</td>";
		 // 				echo "<td>" . $value1->ulaz . "</td>";
		 // 				echo "<td>" . $value1->zavrsno_stanje . "</td>";
		 // 				echo "<td>" . $value1->prodano_kolicina . "</td>";
		 // 				echo "<td>" . $value1->cijena . "</td>";
		 // 				echo "<td>" . $value1->prodano_iznos . "</td>";
		 // 				echo "</tr>";

		 // 				$i = 0;
		 // 				// $i ++;

		 // 			}

		 // 		}
		 // 	}

		 // }

		 //POKUSAJ DRUGI
		 
		 $date = 0;
		 $smjena = 0;
		 foreach ($datedata as $data) {

		 	if ($date == $data->datum_unosa) {
		 		// echo 'TRUE ' . $date . '<br>';
		 		// echo 'TRUE ' . $data->datum_unosa . '<br>';
		 		echo "<tr class=" . "content" . ">";
 				echo "<td>" . $data->naziv_proizvoda . "</td>";
 				echo "<td>" . $data->preuzeto_stanje . "</td>";
 				echo "<td>" . $data->ulaz . "</td>";
 				echo "<td>" . $data->zavrsno_stanje . "</td>";
 				echo "<td>" . $data->prodano_kolicina . "</td>";
 				echo "<td>" . $data->cijena . "</td>";
 				echo "<td>" . $data->prodano_iznos . "</td>";
 				echo "</tr>";

	 			$date = $data->datum_unosa;



		 	}else {
		 		// echo ' NOT TRUE ' .  $date . '<br>';
		 		// echo ' NOT TRUE ' .  $data->datum_unosa . '<br>';
		 			if($smjena === $data->smjena){
		 				
		 				$smjena = $data->smjena;
		 			}else {
						$tpl = "<tr class=" . "main" . ">";
				 		$tpl .= "<td colspan=7>" . $data->datum_unosa . ' ' . $data->smjena . "</td>";
		 				$tpl .= "</tr>";

		 				echo $tpl;
		 				echo $data->smjena .' + ' . $data->datum_unosa . '<br>';

		 				$smjena = $data->smjena;
 					}

 				echo "<tr class=" . "content" . ">";
 				echo "<td>" . $data->naziv_proizvoda . "</td>";
 				echo "<td>" . $data->preuzeto_stanje . "</td>";
 				echo "<td>" . $data->ulaz . "</td>";
 				echo "<td>" . $data->zavrsno_stanje . "</td>";
 				echo "<td>" . $data->prodano_kolicina . "</td>";
 				echo "<td>" . $data->cijena . "</td>";
 				echo "<td>" . $data->prodano_iznos . "</td>";
 				echo "</tr>";

	 			$date = $data->datum_unosa;

		 	} 
		 	// else {
		 	// 	// echo ' TRUE NOT TRUE ' .  $date . '<br>';
		 	// 	echo ' TRUE NOT TRUE ' .  $data->datum_unosa . '<br>';
		 	// }

		}

		?>

  </table>

  			
  <?php if ($datedata){
  	}?>
</body>
</html>
