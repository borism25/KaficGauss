<script> 
                $(document).ready(function() { 
                        $('#ulaz').keyup(function () { 
                          if(this.value)
                          {

                            var preuzeto_stanje=$('#preuzeto_stanje').val(); 
                            var ulaz=this.value;
                            var iznos=parseInt(preuzeto_stanje) + parseInt(ulaz); 

                            $('#zavrsno_stanje').val(iznos); 
                                                       
                        }


                    }); 

                      $('#prodano_kolicina').keyup(function () { 
                          
                          if(this.value)
                          {
                            var prodano_kolicina=this.value;

                            var cijena=$('#cijena').val(); 
                            var iznos=parseInt(prodano_kolicina) * parseFloat(cijena); 
                            $('#prodano_iznos').val(iznos);

                            var zavrsno_stanje=$('#zavrsno_stanje').val(); 
                            var iznos2=parseInt(zavrsno_stanje) - parseInt(prodano_kolicina); 
                            $('#prodano_zavrsno').val(iznos2);

                            }
                    }); 
                });  
          </script> 


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

      <tr class="tg-even">

      <?php $naziv_proizvoda = array(
              'name'        => 'naziv_proizvoda',
              'id'          => 'naziv_proizvoda',
              'value'       => '',
            ); ?>
       
        <td><?php echo form_input($naziv_proizvoda) ?></td>

        <?php $preuzeto_stanje = array(
              'name'        => 'preuzeto_stanje',
              'id'          => 'preuzeto_stanje',
              'value'       => '0',
              'readonly'    => 'true',
              
            ); ?>

        <td><?php echo form_input($preuzeto_stanje) ?></td>

        <?php $ulaz = array(
              'name'        => 'ulaz',
              'id'          => 'ulaz',
              'value'       => '',
            ); ?>

        <td><?php echo form_input($ulaz) ?></td>

        <?php $zavrsno_stanje = array(
              'name'        => 'zavrsno_stanje',
              'id'          => 'zavrsno_stanje',
              'value'       => '',
              
            ); ?>

        <td><?php echo form_input($zavrsno_stanje) ?></td>

        <?php $prodano_kolicina = array(
              'name'        => 'prodano_kolicina',
              'id'          => 'prodano_kolicina',
              'value'       => '',
            ); ?>

        <td><?php echo form_input($prodano_kolicina) ?></td>

        <?php $prodano_zavrsno = array(
              'name'        => 'prodano_zavrsno',
              'id'          => 'prodano_zavrsno',
              'value'       => '',
              'readonly'    => 'true',
              
            ); ?>

        <td><?php echo form_input($prodano_zavrsno) ?></td>

        <?php $cijena = array(
              'name'        => 'cijena',
              'id'          => 'cijena',
              'value'       => '',
              
            ); ?>

        <td><?php echo form_input($cijena) ?></td>

        <?php $prodano_iznos = array(
              'name'        => 'prodano_iznos',
              'id'          => 'prodano_iznos',
              'value'       => '',
              'readonly'    => 'true',
              
            ); ?>

        <td><?php echo form_input($prodano_iznos) ?></td>

      </tr>
      
    </table>

    <?php echo '<p>*Unesite prvo Cijenu</p>';
          echo '<p>*Unesite Ime proizvoda</p>'; ?>

  <?php echo "<p>" . form_submit('submit','Submit') . "</p>" ?>
  <?php echo form_close(); ?>

</div>