<?php
$tam=$_REQUEST["numb"]??"";
?>
<form method="post" action="25tabla.php">
    <table border="1">
    <?php for ($x = 0; $x < $tam; $x++) { ?>
    <tr>
    <td><label>Nombre:<input type="text" name="<?php 'nombre'.$x ?>"></label></td>
    <td><label>Apellido:<input type="text" name="<?php 'apell'.$x ?>"></label></td>
    </tr>
    <?php  }?>
    <input type="hidden" value="<?php $tam ?>" name="tam">
    <input type="submit" value="Enviar">
    </table>
</form>
