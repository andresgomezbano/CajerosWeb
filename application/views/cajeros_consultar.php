<form method="GET" name="frm_banco">
    <div class="row">
        <div class="small-12">
            <div class="row">
                <div class="small-3 columns">
                    <label for="right-label" class="right inline">Nombre:</label>
                </div>
                <div class="small-5 columns">
                    <?=$form_banco->banco?>
                </div>
                <div class="small-1 columns left">
                    <input type="submit" value="Consultar" class="button tiny"/>
                </div>
            </div>
        </div> 
    </div>
</form>


<? if(isset($cajeros)):?>
<input type="hidden" value="<?=$banco_id?>" id="id_bancoActual"/>
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Coordenadas</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <? foreach ($cajeros as $cajero):?>
        <tr>
            <td class="td_nombre"><a href="<?=site_url("cajero/editar/".$cajero->id)?>"><?=$cajero->nombre?></a></td>
            <td><?=$cajero->direccion?></td>
            <td><?if($cajero->latitud !=NULL && $cajero->longitud !=NULL):?>SI<?else:?>NO<? endif;?></td>
            <td><?=$cajero->estado?></td>
            <td>
                <a href="<?=site_url("cajero/editar/".$cajero->id)?>"><i class="fi-pencil icon"></i></a>
                <a onclick="cajeroEliminar('<?=$cajero->id?>',this);"><i class="fi-trash icon"></i></a>
            </td>
        </tr>
        <? endforeach;?>
    </tbody>
</table>
<? endif;?>

<script type="text/javascript">
    function cajeroEliminar(id,elemento)
    {
        var nombre = $(elemento.parentNode.parentNode).find(".td_nombre").text();
        if(confirm("Desea eliminar el cajero: " + nombre +"?"))
        {
            var idBanco = $("#id_bancoActual").val();
            document.location.href = "<?=site_url("cajero/eliminar")?>/" + id + "/" + idBanco;
        }
    }
</script>