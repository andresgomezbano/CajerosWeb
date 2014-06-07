<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <? foreach ($bancos as $banco):?>
        <tr>
            <td><a href="<?=site_url("banco/editar/".$banco->id)?>"><?=$banco->nombre?></a></td>
            <td><?=$banco->estado?></td>
            <td>
                <a href="<?=site_url("banco/editar/".$banco->id)?>"><i class="fi-pencil"></i></a>
                <a href="javascript:bancoEliminar('<?=$banco->id?>',this);"><i class="fi-trash"></i></a>
            </td>
        </tr>
        <? endforeach;?>
    </tbody>
</table>

<div id="dlg_confirmar" style="display: none;">
    Desea eliminar el banco?
</div>

<script type="text/javascript">
    
    $(function() {
        $("#dlg_confirmar").dialog({
            resizable: false,
            autoOpen: false,
            height:140,
            modal: true,
            buttons: {
                "Delete all items": function() {
                    $(this).dialog( "close" );
                },
                Cancel: function() {
                    $( this ).dialog( "close" );
                }
            }
        });
    });

    function bancoEliminar(id,elemento)
    {
        $("#dlg_confirmar").dialog("open");
    }
</script>