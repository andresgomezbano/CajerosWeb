<div class="row fullWidth full">
    <div class="medium-3 columns cajeros" id="div_cajeros" style="overflow-y: scroll; height: 100%;">
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



<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBYld-lcnDGktBR60Ib3HrHWncc7WYbgYw&sensor=FALSE"></script>
<script type="text/javascript">
    var map = null;
    function initializeMap() {
        var mapOptions = {
          center: new google.maps.LatLng(-2.18918000,-79.89010000),
          zoom: 17,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("map_canvas"),mapOptions);
    }
      
    function consultarCajeros()
    {
          var idBanco = $("#id_banco").val();
          $.ajax({
            url: "<?=site_url("services/cajero/consultar")?>/" + idBanco,
            beforeSend: function(){$("#div_cajeros").html("");},
            error:function()
            {
                alert('Ha existido un inconveniente al tratar de cargar cajeros');
            },
            success: function(data){
                var n = data.length;
                for(var i=0;i<n;i++)
                {
                    agregarCajero(data[i]);
                    agregarMarcador(data[i]);
                }
            },
            complete: function(data){}
            
        });
    }
      
    function agregarMarcador(cajero)
    {
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(cajero.latitud,cajero.longitud),
            map: map,
            draggable:true,
        });
        
        marker.info = new google.maps.InfoWindow({
            content: '<b>Direcciòn:</b>' + cajero.direccion
        });

        google.maps.event.addListener(marker, 'mouseover', function() { 
            marker.info.open(map, marker);
        });
        
        google.maps.event.addListener(marker, 'mouseout', function() {
            marker.info     .close();
        });
    }
     
    function agregarCajero(cajero)
    {
          var html="<div class='row'>";
          html += "<h6 class='cajero'>" + cajero.nombre + "</h6>";
          html += "<h6 class='subheader'>" + cajero.direccion + "</h6>";
          html += "<input type='hidden' name='cajero" + cajero.id + "_id' value='" + cajero.id + "'/>";
          html += "<input type='hidden' name='cajero" + cajero.id + "_latitud' value='" + cajero.latitud + "'/>";
          html += "<input type='hidden' name='cajero" + cajero.id + "_longitud' value='" + cajero.longitud + "'/>";
          html += "</div>";
          $("#div_cajeros").append(html);
    }
      
    $(function(){
          initializeMap();
          $("#div_cajeros").on("click",".cajero",function(){
              
          });
    });
</script>  