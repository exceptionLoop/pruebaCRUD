Seguro que quieres borrar esta empresa/companhia?
<form method="post" enctype="multipart/form-data">
    <table class="table table-striped">
        <tr><td><input type="hidden" name="id" value="<?=isset($usuario['id'])?$_GET['id']:'-';?>"/></td></tr>
        <tr>
            <td>Empresa<br>
            <b><?=isset($data['name'])?$data['name']:'';?></b></td>
        </tr>
        <tr>
            <td><input type="submit" name="delete" value="Yes"/>
            <input type="submit" name="delete" value="No"/></td>
        </tr>
    </table>
</form>