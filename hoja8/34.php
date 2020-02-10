<?php
if(!isset($_REQUEST["envi"])){?>
    <form method="post" action="32.php">
        <?php
        for($x=0; $x<10;$x++){?>
            <label>Nombre:<input type="text" name="<?php echo 'nombre'.$x ?>"></label>
            <label>Apellido:<input type="text" name="<?php echo 'apell'.$x ?>"></label>
            <label>Curso:<input type="text" name="<?php echo 'curs'.$x ?>"></label>
            <label>edad:<input type="text" name="<?php echo 'edad'.$x ?>"></label>
            <label>localidad:<input type="text" name="<?php echo 'loc'.$x ?>"></label><br>
        <?php  } ?>
        <input type="submit" name="envi" value="Enviar">
    </form>
<?php  }else{
    for ($x=0; $x<10; $x++){
        $alumn[]=array("nombre"=>$_REQUEST["nombre".$x],"apellido"=>$_REQUEST["apell".$x],"curso"=>$_REQUEST["curs".$x],"edad"=>$_REQUEST["edad".$x],"localidad"=>$_REQUEST["loc".$x]);
    }
    foreach ($alumn as $clave => $fila) {
        $nombre[$clave] = $fila["nombre"];
        $apellido[$clave] = $fila["apellido"];
        $curso[$clave] = $fila["curso"];
        $edad[$clave] = $fila["edad"];
        $localidad[$clave] = $fila["localidad"];
    }

    array_multisort($curso, SORT_ASC, $apellido, SORT_STRING, $nombre, SORT_STRING,$alumn);

    foreach ($alumn as $clave => $fila){
        echo $fila["nombre"]." ".$fila["apellido"]." ".$fila["curso"]." ".$fila["edad"]." ".$fila["localidad"]. "<br>";
    }
}?>