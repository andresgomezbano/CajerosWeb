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
            <td class="td_nombre"><a href="<?=site_url("banco/editar/".$banco->id)?>"><?=$banco->nombre?></a></td>
            <td><?=$banco->estado?></td>
            <td>
                <a href="<?=site_url("banco/editar/".$banco->id)?>"><i class="fi-pencil"></i></a>
                <a onclick="bancoEliminar('<?=$banco->id?>',this)"><i class="fi-trash"></i></a>
            </td>
        </tr>
        <? endforeach;?>
    </tbody>
</table>

<script type="text/javascript">
    function bancoEliminar(id,elemento)
    {
        var nombre = $(elemento.parentNode.parentNode).find(".td_nombre").text();
        if(confirm("Desea eliminar el banco: " + nombre +"?"))
        {
            document.location.href = "<?=site_url("banco/eliminar")?>/" + id;
        }
    }
</script>