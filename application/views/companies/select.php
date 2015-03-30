<h2 class="sub-header">Empresa</h2>
<a href="companies.php?action=insert">Introduce nueva empresa</a>
<br/>
<table class="table table-striped">
    <?php foreach($data as $row):?>
    <tr>
        <td><b><?=$row['name']?></b></td>
        <td>
            <a href="companies.php?action=update&id=<?=$row['idcompany'];?>">Actualizar</a>
                &nbsp;
            <a href="companies.php?action=delete&id=<?=$row['idcompany'];?>">Borrar</a>
        </td>
    </tr>
    <?php endforeach;?>
</table>