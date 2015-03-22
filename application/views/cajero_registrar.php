<form method="POST" name="frm_cajero">
    <div class="row">
        <div class="small-8">
            
            <div class="row">
                <div class="small-3 columns">
                    <label for="right-label" class="right inline">Banco:</label>
                </div>
                <div class="small-9 columns">
                    <?=$form->banco_id?>
                </div>
            </div>
            
            <div class="row">
                <div class="small-3 columns">
                    <label for="right-label" class="right inline">Nombre:</label>
                </div>
                <div class="small-9 columns">
                    <?=$form->id?>
                    <?=$form->nombre?>
                    <?=form_error('nombre')?>
                </div>
            </div>
            
            <div class="row">
                <div class="small-3 columns">
                    <label for="right-label" class="right inline">Horario:</label>
                </div>
                <div class="small-9 columns">
                    <?=$form->horario?>
                    <?=form_error('horario')?>
                </div>
            </div>
            
            <div class="row">
                <div class="small-3 columns">
                    <label for="right-label" class="right inline">Dirección:</label>
                </div>
                <div class="small-9 columns">
                    <?=$form->direccion?>
                    <?=form_error('direccion')?>
                </div>
            </div>
            
            <div class="row">
                <div class="small-3 columns">
                    <label for="right-label" class="right inline">Latitud:</label>
                </div>
                <div class="small-9 columns">
                    <?=$form->latitud?>
                    <?=form_error('latitud')?>
                </div>
            </div>
            
            <div class="row">
                <div class="small-3 columns">
                    <label for="right-label" class="right inline">Longitud:</label>
                </div>
                <div class="small-9 columns">
                    <?=$form->longitud?>
                    <?=form_error('longitud')?>
                </div>
            </div>
            
            <div class="row">
                <div class="small-3 columns">
                    <label for="right-label" class="right inline">Estado:</label>
                </div>
                <div class="small-9 columns"><?=$form->estado?></div>
            </div>
            
              <div class="row">
                <div class="small-3 columns">
                  <label for="right-label" class="right inline">Redes</label>
                </div>
                <div class="small-9 columns">
                    <table>
                        <tr>
                            <td><?=$form->banred?><label for="id_banred">Banred</label></td>
                            <td><?=$form->pacificard?><label for="id_pacificard">Pacificard</label></td>
                            <td><?=$form->american_express?><label for="id_american_express">American Express</label></td>
                        </tr>
                        <tr>
                            <td><?=$form->bankard?><label for="id_bankard">Bankard</label></td>
                            <td><?=$form->nexo?><label for="id_nexo">Nexo</label></td>
                            <td><?=$form->visa_debito?><label for="id_visa_debito">Visa D&eacute;bito</label></td>
                        </tr>
                        <tr>
                            <td><?=$form->visa?><label for="id_visa">Visa</label></td>
                            <td><?=$form->plus?><label for="id_plus">Plus</label></td>
                            <td><?=$form->mastercard?><label for="id_mastercard">Mastercard</label></td>
                        </tr>
                        <tr>
                            <td><?=$form->cirrus?><label for="id_cirrus">Cirrus</label></td>
                            <td><?=$form->maestro?><label for="id_maestro">Maestro</label></td>
                            <td><?=$form->diners?><label for="id_diners">Diners Club</label></td>
                        </tr>
                    </table>
                </div>
              </div>
            
            <input type="submit" value="Guardar" class="button right"/>
        </div> 
    </div>
</form>
<div id="map_canvas" class="full" style="height:500px;"></div>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBYld-lcnDGktBR60Ib3HrHWncc7WYbgYw&sensor=xºFALSE"></script>
<script type="text/javascript">
      function initialize() {
        <? if(isset($cajero)):?>
            var centro = new google.maps.LatLng(<?=$cajero->getLatitud()?>,<?=$cajero->getLongitud()?>);
        <? else: ?>
            var centro = new google.maps.LatLng(-2.18918000,-79.89010000);
        <? endif;?>
                    
        var mapOptions = {
          center: centro,
          zoom: 17,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
            mapOptions);
            
         var marker = new google.maps.Marker({
            position: centro,
            map: map,
            draggable:true,
            title:"Cajero!"
        });
        
        google.maps.event.addListener(marker,'drag',function() {
            $('#id_latitud').val(marker.position.lat());
            $('#id_longitud').val(marker.position.lng());
        });
      }
      
      $(function(){
          initialize();
      });
</script> 