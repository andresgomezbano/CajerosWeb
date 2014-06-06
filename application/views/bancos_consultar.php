<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <? foreach ($bancos as $banco):?>
        <tr>
            <td><a href="<?=site_url("banco/editar/".$banco->id)?>"><?=$banco->nombre?></a></td>
            <td><?=$banco->estado?></td>
        </tr>
        <? endforeach;?>
    </tbody>
</table>