
<?php $arr = array();   ?>
<?php foreach ($info as $data){
    $arr_u[] = "#ulaz_" . $data->ID;
    $arr_p[] = "#prodano_kolicina_" . $data->ID;
  } ?>

  <?php $arr1 = implode(', ', $arr_u); ?>
  <?php $arr2 = implode(', ', $arr_p); ?>

          <script> 
                $(document).ready(function() { 

                        $(<?php echo "'" . $arr1 . "'"; ?>).keyup(function () { 
                          if(this.value)
                          {
                            var id_kucice = this.id;
                            var indeks = id_kucice.lastIndexOf("_");
                            id_kucice = id_kucice.substring(indeks);

                            var preuzeto_stanje=$('#preuzeto_stanje'+ id_kucice).val(); 
                            var ulaz=this.value;
                            //$('#ulaz'+ id_kucice).val(); 
                            var iznos=parseInt(preuzeto_stanje) + parseInt(ulaz); 

                            $('#zavrsno_stanje'+ id_kucice).val(iznos); 
                          }
                         }); 

                      $(<?php echo "'" . $arr2 . "'"; ?>).keyup(function () { 
                          
                          if(this.value)
                          {
                            var id_kucice = this.id;
                            var indeks = id_kucice.lastIndexOf("_");
                            id_kucice = id_kucice.substring(indeks);

                            var prodano_kolicina=this.value;

                            var cijena=$('#cijena'+ id_kucice).val(); 
                            var iznos=parseInt(prodano_kolicina) * parseFloat(cijena); 
                            $('#prodano_iznos'+ id_kucice).val(iznos);

                            var zavrsno_stanje=$('#zavrsno_stanje'+ id_kucice).val(); 
                            var iznos2=parseInt(zavrsno_stanje) - parseInt(prodano_kolicina); 
                            $('#prodano_zavrsno'+ id_kucice).val(iznos2);

                          }
                       }); 
                });  
          </script> 

          <script>
                function removeid(id) {
                    var broj = id;
                    var controller = 'welcome';
                    var base_url = '<?php echo site_url(); //you have to load the "url_helper" to use this function ?>';

                    $.ajax({
                      type: 'POST',
                      url: base_url + '/' + controller + '/removeid',
                      data: {parametar1: ""+broj+""},
                      success: function(data){
                        // on success use return data here
                        $(".table"+broj).hide("slow");
                      },
                      error: function(xhr, type, exception) {
                        // if ajax fails display error alert
                        alert("ajax error response type "+type);
                      }
                    });
                }
          </script>

<body>
<div class="main">
  <?php foreach ($date as $date1):?>
    <?php echo "Zadnji uneseni datum: " . $date1->datum;?>
  <?php endforeach; ?>

  <?php 
    $options = array (
      '1' => 'Smjena 1',
      '2' => 'Smjena 2',
    ); 
  ?>
  <table class="tg-table-plain">
    <tr class="table-head">
      <th>Proizvodi</th>
      <th>Preuzeto Stanje</th>
      <th>Ulaz</th>
      <th>Završno Stanje</th>
      <th>Prodano Količina</th>
      <th>Prodano Završno</th>
      <th>Cijena</th>
      <th>Prodano Iznos</th>
    </tr>

    <?php echo form_open(); ?>
    <?php echo form_dropdown('smjena', $options, ''); ?>

    <?php foreach ($info as $data):?>
      <tr class="<?php echo 'table' . $data->ID;?>">

      <?php $naziv_proizvoda = array(
              'name'        => 'naziv_proizvoda ' . $data->ID,
              'id'          => $data->ID,
              'value'       => $data->naziv_proizvoda,
            ); ?>
       
        <td><?php echo "<p>" . form_input($naziv_proizvoda) . "</p>" ?></td>

        <?php $preuzeto_stanje = array(
              'name'        => 'preuzeto_stanje ' . $data->ID,
              'id'          => 'preuzeto_stanje_' . $data->ID,
              'value'       => $data->prodano_zavrsno,
              'readonly'    => 'true',
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
              'readonly'    => 'true',
            ); ?>

        <td><?php echo "<p>" . form_input($zavrsno_stanje) . "</p>" ?></td>

        <?php $prodano_kolicina = array(
              'name'        => 'prodano_kolicina ' . $data->ID,
              'id'          => 'prodano_kolicina_' . $data->ID,
              'value'       => '',
            ); ?>

        <td><?php echo "<p>" . form_input($prodano_kolicina) . "</p>" ?></td>

        <?php $prodano_zavrsno = array(
              'name'        => 'prodano_zavrsno ' . $data->ID,
              'id'          => 'prodano_zavrsno_' . $data->ID,
              'value'       => '',
              'readonly'    => 'true',
            ); ?>

        <td><?php echo "<p>" . form_input($prodano_zavrsno) . "</p>" ?></td>

        <?php $cijena = array(
              'name'        => 'cijena ' . $data->ID,
              'id'          => 'cijena_' . $data->ID,
              'value'       => $data->cijena,
              
            ); ?>

        <td><?php echo "<p>" . form_input($cijena) . "</p>" ?></td>

        <?php $prodano_iznos = array(
              'name'        => 'prodano_iznos ' . $data->ID,
              'id'          => 'prodano_iznos_' . $data->ID,
              'value'       => '',
              'readonly'    => 'true',
            ); ?>

        <td><?php echo "<p>" . form_input($prodano_iznos) . "</p>" ?></td>


       <td> <?php

           $ttt = '<input type="button"';
           $ttt .= 'name=';
           $ttt .= $data->naziv_proizvoda;
           $ttt .= ' id=';
           $ttt .= $data->ID;
           $ttt .= ' value="';
           $ttt .= $data->ID;
           $ttt .= '" onClick="removeid(this.id);" />';

           echo $ttt;

           ?> </td>

      </tr>
      
    <?php endforeach; ?>


    </table>

  <?php echo "<p>" . form_submit('submit','Submit') . "</p>" ?>
  <?php echo form_close(); ?>

</div>
<div class="footer">
  <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
  </div>

 

</body>
</html>
<!-- <td><a href="index.php?id=<?php echo $data->ID ?>&obrisi=da">Obriši</a></td> -->