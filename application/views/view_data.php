	


	<script>
		$(function() {
			$('#datepicker1, #datepicker2').datepicker({ dateFormat: "yy-mm-dd" });
		});

		$(document).ready(function() {
		  $("#myTable").tablesorter();
		});


		
	</script>

	

</head>
<body>

	<?php echo form_open(); ?>
		<p>Od Datuma: <input type="text" name="datepicker1" id="datepicker1"> &nbsp Do:&nbsp <input type="text" name="datepicker2" id="datepicker2"></p>
	<?php echo "<p>" . form_submit('submit','Submit') . "</p>" ?>
  <?php echo form_close(); ?>

<!-- <table class="tg-table-plain"> -->
<table id="myTable" class="tablesorter">
	<thead>
	    <tr>
	      <th>Proizvodi</th>
	      <th>Preuzeto Stanje</th>
	      <th>Ulaz</th>
	      <th>Završno Stanje</th>
	      <th>Prodano Količina</th>
	      <th>Prodano/Završno</th>
	      <th>Cijena</th>
	      <th>Prodano Iznos</th>
	    </tr>
	</thead>
	
	<tbody>

<?php
	if ($datedata){
		 $date = 0;
		 $smjena = 0;
		 				
		 foreach ($datedata as $data) {
						$tab = "<tr class=" . "content" . ">";
						$tab .= "<td>" . $data->naziv_proizvoda . "</td>";
						$tab .= "<td>" . $data->preuzeto_stanje . "</td>";
						$tab .= "<td>" . $data->ulaz . "</td>";
						$tab .= "<td>" . $data->zavrsno_stanje . "</td>";
						$tab .= "<td>" . $data->prodano_kolicina . "</td>";
						$tab .= "<td>" . $data->prodano_zavrsno . "</td>";
						$tab .= "<td>" . $data->cijena . "</td>";
						$tab .= "<td>" . $data->prodano_iznos . "</td>";
						$tab .= "</tr>";

		 	if($smjena === $data->smjena && $date == $data->datum_unosa){
		 				echo $tab;

			 			$date = $data->datum_unosa;
		 				$smjena = $data->smjena;
		 	}else {
						$tpl = "<tr class=" . "table_smjena_datum" . ">";
				 		$tpl .= "<td colspan=8>" . $data->datum_unosa . ' - Smjena ' . $data->smjena . "</td>";
		 				$tpl .= "</tr>";

		 				echo $tpl;

		 				echo $tab;

			 			$date = $data->datum_unosa;
		 				$smjena = $data->smjena;
		 	} 
		}
  	}
?>
  </tbody>
</table>

  			
</body>
</html>
