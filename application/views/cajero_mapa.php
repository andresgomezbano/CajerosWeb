<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBYld-lcnDGktBR60Ib3HrHWncc7WYbgYw&sensor=xºFALSE"></script>
<script type="text/javascript">
      function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(-34.397, 150.644),
          zoom: 8,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
            mapOptions);
      }
      
      $(function(){
          initialize();
      });
</script>

            <div class="row">
                <div class="small-3 columns">
                    <label for="right-label" class="right inline">Banco:</label>
                </div>
                <div class="small-9 columns"><?=$form_banco->banco?></div>
            </div>

<div id="map_canvas" class="full" style="height:500px;">aa</div>

  