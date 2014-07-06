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