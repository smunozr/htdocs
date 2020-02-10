<?php
const MAX_VAL=10;

    if(!isset($_REQUEST["enviar"])) {?>
    <form method="post" action="30.php">
    <?php
        for($x=0; $x <MAX_VAL; $x++){
            echo "articulo $x<input type='text' id='nombre$x' name='nombre$x'>";
            echo " precio $x<input type='text' id='precio$x' name='precio$x'><br/>";
        } ?>
        ordenar los articulos <select name="orden">
            <option value="nomAsc">Nombre ascendente</option>
            <option value="nomDes">Nombre descendente</option>
            <option value="preAsc">Precio ascendente</option>
            <option value="preDes">Precio descendente</option>
        </select>
        <input type='submit' id='enviar' name='enviar' value="enviar">
    </form>
<?php } else{
        $orden=$_REQUEST["orden"]??"";
        for($x=0;$x<MAX_VAL;$x++){
            $arr[] = array('nombre' => $_REQUEST["nombre" . ($x)], 'precio' => $_REQUEST["precio" . ($x)]);
        }
        foreach ($arr as $clave => $fila) {
            $nombre[$clave] = $fila['nombre'];
            $precio[$clave] = $fila['precio'];
        }
        switch ($orden) {
            case "nomAsc":
                array_multisort($nombre, SORT_ASC, $arr);

                break;
            case "nomDes":
                array_multisort($nombre, SORT_DESC, $arr);

                break;
            case "preAsc":
                array_multisort($precio, SORT_ASC, $arr);
                break;
            case "preDes":
                array_multisort($precio, SORT_DESC, $arr);
                break;
        }
        foreach ($arr as $clave => $fila) {
            echo $fila["nombre"] . ":" . $fila["precio"] . "<br>";
        }
    }
    ?>