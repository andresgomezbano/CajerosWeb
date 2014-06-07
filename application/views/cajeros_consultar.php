<form method="POST" name="frm_banco">
    <div class="row">
        <div class="small-8">
            <div class="row">
                <div class="small-3 columns">
                    <label for="right-label" class="right inline">Nombre:</label>
                </div>
                <div class="small-9 columns">
                    <?=$form_banco->banco?>
                </div>
            </div>

            <input type="submit" value="Consultar" class="button right"/>
        </div> 
    </div>
</form>


<? if(isset($cajeros)):?>
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
            <td><a href="<?=site_url("cajero/editar/".$cajero->id)?>"><?=$cajero->nombre?></a></td>
            <td><?=$cajero->direccion?></td>
            <td><?if($cajero->latitud !=NULL && $cajero->longitud !=NULL):?>SI<?else:?>NO<? endif;?></td>
            <td><?=$cajero->estado?></td>
            <td>
                <a href="<?=site_url("cajero/editar/".$cajero->id)?>"><i class="fi-pencil"></i></a>
                <a href="javascript:cajero_eliminar('<?=$cajero->id?>',this);"><i class="fi-trash"></i></a>
            </td>
        </tr>
        <? endforeach;?>
    </tbody>
</table>
<? endif;?>

<script type="text/javascript">
    
</script>