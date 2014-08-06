<div>
    <div class="medium-4 columns">
        <input type="button" onclick="enviarData();" value="Enviar"/>
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Latitud</th>
                    <th>Longitud</th>
                    <th>Ver</th>
                </tr>
            </thead>
            <tbody id="tbody_datos">
                <? foreach ($consultas as $consulta):?>
                <tr>
                    <td class="fecha"><?=$consulta->fecha?></td>
                    <td class="lat"><?=$consulta->latitud?></td>
                    <td class="lng"><?=$consulta->longitud?></td>
                    <td><a class="marcador"><i class="fi-marker icon"></i></a></td>
                </tr>
                <? endforeach;?>
            </tbody>
        </table>
    </div>
    <div class="medium-8 columns left">
        <div id="map_canvas" style="display:none; height:500px;"></div>
    </div>
</div>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBYld-lcnDGktBR60Ib3HrHWncc7WYbgYw&sensor=xºFALSE"></script>
<script type="text/javascript">
    var map = null;
    var iniciado = false;
    var marker = null;
    function initialize() {
        var centro = new google.maps.LatLng(-2.18918000,-79.89010000);
        var mapOptions = {
          center: centro,
          zoom: 17,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("map_canvas"),
            mapOptions);

        marker = new google.maps.Marker({
            position: centro,
            map: map,
            draggable:false,
            title:"Consulta"
        });
    }
      
      $(function(){
          
          $("#tbody_datos").on("click",".marcador",function()
          {
            if(!iniciado)
            {
                initialize();
                $("#map_canvas").show();   
            }
            var fila = $(this).parent().parent();
            var latitud = $(fila).find(".lat").text();
            var longitud = $(fila).find(".lng").text();
            var posicion = new google.maps.LatLng(latitud,longitud);
            map.setCenter(posicion);
            marker.setPosition(posicion);
          });
          
          window.setInterval(consultarNuevos, 10000);
      });
      
      function consultarNuevos()
      {
        var ultimaFecha = $("#tbody_datos").first().find(".fecha").eq(0).text();
        $.ajax({
            type:"POST",
            url: "<?=site_url("services/consulta/nuevas")?>",
            data:{'fecha' : ultimaFecha},
            error:function(data){console.log(data);},
            success: function(data){
                var html="";
                for(posicion in data)
                {
                    html +="<tr>";
                    html +="<td class='fecha'>"+data[posicion].fecha+"</td>";
                    html +="<td class='lat'>"+data[posicion].latitud+"</td>";
                    html +="<td class='lng'>"+data[posicion].longitud+"</td>";
                    html +="<td><a class='marcador'><i class='fi-marker icon'></i></a></td>";
                    html+="</tr>";
                }
                //$("#tbody_datos").append(html);
                $(html).hide().prependTo("#tbody_datos").fadeIn(1000);             
            },
            complete: function(){}
            
        });
      }
      
      
    function enviarData()
      {
        $.ajax({
            type:"POST",
            url: "http://www.segurocanguro.com/gcm/register.php",
            data:{'user' : 'andres', 'email' : 'andresalberto', 'regId' : '12345'},
            error:function(data){console.log(data);},
            success: function(data){
                console.log('****** RESPUESTA *********');
                console.log(data);
            },
            complete: function(){}
            
        });
      }
</script> 