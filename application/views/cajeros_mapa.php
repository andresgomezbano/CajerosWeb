<div class="row fullWidth full">
    <div class="medium-3 columns" style="overflow-y: scroll; height: 100%; display: none;" id="div_listado">
        <form name="frm_cajeros" id="frm_cajeros" method="POST" >
            <input type="hidden" value="" name="cajeros_eliminar" id="id_cajeros_eliminar"/>
            <div id="div_cajeros">
                <? if(isset($cajeros)):?>
                    <? foreach ($cajeros as $cajero):?>
                        <div class="row">
                            <h6><?=$cajero->nombre?></h6>
                            <h6 class="subheader"><?=$cajero->direccion?></h6>
                        </div>
                    <? endforeach; ?>
                <? endif; ?>
            </div>
        </form>
    </div>
    <div class="medium-12 columns" style="height: 100%;" id="div_mapa">
        <div class="row">
            <div class="medium-2 columns">
                <a class="icon" onclick="mostrarListado();"><i class="fi-list"></i></a>
                <label for="right-label" class="right inline">Banco:</label>
            </div>
            <div class="medium-6 columns">
                <?=$form_banco->banco?>
            </div>
            <div class="medium-2 columns left">
                <a href="javascript:consultarCajeros();" class="button tiny">Consultar</a>
            </div>
            <div class="medium-1 columns left">
                <a href="javascript:guardarCajeros();" class="button tiny">Guardar</a>
            </div>
        </div>
        <div id="map_canvas" style="height:100%;"></div>
    </div>
</div>



<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBYld-lcnDGktBR60Ib3HrHWncc7WYbgYw&sensor=FALSE"></script>
<script type="text/javascript">
    var map = null;
    var idEliminar = null;
    var markers = null;
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
          if(idBanco === "")return;
          $.ajax({
            url: "<?=site_url("services/cajero/consultar")?>/" + idBanco,
            beforeSend: limpiar,
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

    function limpiar()
    {
        elminarMarcadores();
        idEliminar = [];
        markers = [];
        $("#div_cajeros").html("");
    }
    
    function agregarMarcador(cajero)
    {
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(cajero.latitud,cajero.longitud),
            map: map,
            idCajero: cajero.id,
            draggable:true,
        });
        
        marker.info = new google.maps.InfoWindow({
            content: '<b>Direcciòn:</b>' + cajero.direccion + '<br/><a onclick="eliminarMarcador(' + cajero.id + ');">borrar</a>'
        });

        google.maps.event.addListener(marker, 'mouseover', function() { 
            marker.info.open(map, marker);
        });
        
        //google.maps.event.addListener(marker, 'mouseout', function() {
        //    marker.info.close();
        //});
        
        google.maps.event.addListener(marker,'drag',function() {
            $('#cajero_latitud' + marker.idCajero).val(marker.position.lat());
            $('#cajero_longitud' + marker.idCajero).val(marker.position.lng());
        });
       markers.push(marker);
    }
    
    function eliminarMarcador(idCajero)
    {
        idEliminar.push(idCajero);
        var marcador = buscarMarcador(idCajero);
        marcador.setMap(null);
        $("#cajero_" + idCajero).remove();
    }
    
    function elminarMarcadores()
    {
        if(markers==null)return;
        var n = markers.length;
        for(var i=0;i<n;i++)markers[i].setMap(null);
    }
    
    function buscarMarcador(idCajero)
    {
        var n = markers.length;
        for(var i=0;i<n;i++)if(markers[i].idCajero == idCajero)return markers[i];
        return null;
    }
    
    function agregarCajero(cajero)
    {
          var html="<div class='row' id='cajero_" + cajero.id + "'>";
          html += "<h6 class='cajero'>" + cajero.nombre + "</h6>";
          html += "<h6 class='subheader'>" + cajero.direccion + "</h6>";
          html += "<input type='hidden' name='cajero_id[]' value='" + cajero.id + "'/>";
          html += "<input type='hidden' name='cajero_latitud[]' id='cajero_latitud" + cajero.id + "' value='" + cajero.latitud + "'/>";
          html += "<input type='hidden' name='cajero_longitud[]' id='cajero_longitud" + cajero.id + "' value='" + cajero.longitud + "'/>";
          html += "</div>";
          $("#div_cajeros").append(html);
    }
    
    function guardarCajeros()
    {
        $("#id_cajeros_eliminar").val(idEliminar.toString());
        $("#frm_cajeros").submit();
    }
    
    function mostrarListado()
    {
        if($("#div_listado").is(":visible"))
        {
            $("#div_mapa").removeClass("medium-9");
            $("#div_mapa").addClass("medium-12");
        }
        else
        {
            $("#div_mapa").removeClass("medium-12");
            $("#div_mapa").addClass("medium-9");
        }
        $("#div_listado").toggle();
    }
    
    $(function(){
          initializeMap();
          $("#div_cajeros").on("click",".cajero",function(){
              var latitud = $(this.parentNode).find("input[name*=latitud]").val();
              var longitud = $(this.parentNode).find("input[name*=longitud]").val();
              map.setCenter(new google.maps.LatLng(latitud,longitud));
          });
          consultarCajeros();
    });
</script>  