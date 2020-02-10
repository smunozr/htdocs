<?php
$tam=$_REQUEST["tam"]??"";
for ($x=0;$x<$tam;$x++){
    $nombre[$x] = $_REQUEST["nombre".$x] ?? "";
    $apellido[$x] = $_REQUEST["apell".$x] ?? "";
}?>
    <table border="1"><tr><td>Nombre:</td><td>Apellido:</td></tr><?php
       for($x=0; $x < $tam; $x++){?>
          <tr>
             <td><?php echo $nombre[$x] ?></td>
             <td><?php echo $apellido[$x] ?></td>
          </tr>
<?php } ?>
    </table>
