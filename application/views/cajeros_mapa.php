<style type="text/css">
    #cajeros.row:nth-child(odd) {
  background-color: grey;
}
#cajeros.row:nth-child(even) {
  background-color: lightGrey;
}
</style>

<div class="row fullWidth full">
    <div class="medium-3 columns cajeros" id="cajeros" style="overflow-y: scroll; height: 100%;">
    <? if(isset($cajeros)):?>
        <? foreach ($cajeros as $cajero):?>
            <div class="row">
                <h6><?=$cajero->nombre?></h6>
                <h6 class="subheader"><?=$cajero->direccion?></h6>
            </div>
        <? endforeach; ?>
    <? endif; ?>
    </div>
    <div class="medium-9 columns" style="height: 100%;">
        <div class="row">
            <div class="small-2 columns">
                <label for="right-label" class="right inline">Banco:</label>
            </div>
            <div class="small-6 columns">
                <?=$form_banco->banco?>
            </div>
            <div class="small-2 columns left">
                <a href="javascript:consultarCajeros();" class="button tiny">Consultar</a>
            </div>
        </div>
        <div id="map_canvas" style="height:100%;"></div>
    </div>
</div>



<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBYld-lcnDGktBR60Ib3HrHWncc7WYbgYw&sensor=xºFALSE"></script>
<script type="text/javascript">
      function initializeMap() {
        var mapOptions = {
          center: new google.maps.LatLng(-34.397, 150.644),
          zoom: 8,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
            mapOptions);
      }
      
      function consultarCajeros()
      {
          alert($("#id_banco").val());
      }
      
      $(function(){
          initializeMap();
      });
</script>  