<!DOCTYPE html>
<html>
<head>
  <title>Tablica</title>
  <style type="text/css">
    .tg-left { text-align: left; } .tg-right { text-align: right; } .tg-center { text-align: center; }
    .tg-bf { font-weight: bold; } .tg-it { font-style: italic; }
    .tg-table-plain { border-collapse: collapse; border-spacing: 0; font-size: 100%; font: inherit; }
    .tg-table-plain td, .tg-table-plain th { border: 1px #555 solid; padding: 10px; vertical-align: top; }
  </style>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script> 
                $(document).ready(function() { 
                        $("#ulaz_33").blur(function () { 


                        var preuzeto_stanje=$('#preuzeto_stanje_33').val(); 
                        var ulaz=$('#ulaz_33').val(); 
                        var iznos=preuzeto_stanje - ulaz; 
                        

                        
                        $('#zavrsno_stanje_33').val(iznos); 

                    }); 

                });  
                
            </script> 
<body>

  <?php foreach ($date as $date1):?>
    <?php echo "Zadnji uneseni datum: " . $date1->datum;?>
  <?php endforeach; ?>

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

    <?php echo form_open(); ?>
    <?php foreach ($info as $data):?>
      <tr class="tg-even">

       
      
      <?php $naziv_proizvoda = array(
              'name'        => 'naziv_proizvoda ' . $data->ID,
              'id'          => $data->ID,
              'value'       => $data->naziv_proizvoda,
            ); ?>
       
        <td><?php echo "<p>" . form_input($naziv_proizvoda) . "</p>" ?></td>

        <?php $preuzeto_stanje = array(
              'name'        => 'preuzeto_stanje ' . $data->ID,
              'id'          => 'preuzeto_stanje_' . $data->ID,
              'value'       => $data->preuzeto_stanje,
            ); ?>

        <td><?php echo "<p>" . form_input($preuzeto_stanje) . "</p>" ?></td>

        <?php $ulaz = array(
              'name'        => 'ulaz ' . $data->ID,
              'id'          => 'ulaz_' . $data->ID,
              'value'       => '',
            ); ?>

        <td><?php echo "<p>" . form_input($ulaz) . "</p>" ?></td>

        <?php $zavrsno_stanje = array(
              'name'        => 'zavrsno_stanje ' . $data->ID,
              'id'          => 'zavrsno_stanje_' . $data->ID,
              'value'       => '',
            ); ?>

        <td><?php echo "<p>" . form_input($zavrsno_stanje) . "</p>" ?></td>

        <?php $prodano_kolicina = array(
              'name'        => 'prodano_kolicina ' . $data->ID,
              'id'          => 'prodano_kolicina ' . $data->ID,
              'value'       => '',
            ); ?>

        <td><?php echo "<p>" . form_input($prodano_kolicina) . "</p>" ?></td>

        <?php $cijena = array(
              'name'        => 'cijena ' . $data->ID,
              'id'          => $data->ID,
              'value'       => $data->cijena,
            ); ?>

        <td><?php echo "<p>" . form_input($cijena) . "</p>" ?></td>

        <?php $prodano_iznos = array(
              'name'        => 'prodano_iznos ' . $data->ID,
              'id'          => 'prodano_iznos ' . $data->ID,
              'value'       => '',
            ); ?>

        <td><?php echo "<p>" . form_input($prodano_iznos) . "</p>" ?></td>

      </tr>
      
    <?php endforeach; ?>
  </table>
  <?php echo "<p>" . form_submit('submit','Submit') . "</p>" ?>
  <?php echo form_close(); ?>



  <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</body>
</html>
<!-- <td><a href="index.php?id=<?php echo $data->ID ?>&obrisi=da">Obriši</a></td> -->