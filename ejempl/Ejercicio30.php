<?php
const MAX=10;
if(!isset($_REQUEST["enviar"])) {
    ?>

    <form action="Ejercicio30.php" method="post">
        <?php

        for ($i = 1; $i <= MAX; $i++) {
            echo "Escribe el nombre del articulo $i<input type='text' id='nombre$i' name='nombre$i'>";
            echo " Escribe el precio del articulo $i<input type='text' id='precio$i' name='precio$i'><br/>";
        } ?>
        Elige como quieres ordenar los articulos <select name="orden">
            <option value="nomAsc">Nombre ascendente</option>
            <option value="nomDes">Nombre descendente</option>
            <option value="preciAsc">Precio ascendente</option>
            <option value="preciDes">Precio descendente</option>
        </select>
        <input type='submit' id='enviar' name='enviar' value="enviar">
    </form>
    <?php
}else {
    $orden = $_REQUEST["orden"] ?? "";

    for ($i = 0; $i < MAX; $i++) {
        if (isset($_REQUEST["nombre" . ($i + 1)]) && $_REQUEST["nombre" . ($i + 1)] != "") {
            //$arr[$i][$j]="'nombre' => ".$_REQUEST["nombre".($i+1)];
            $arr[] = array('nombre' => $_REQUEST["nombre" . ($i + 1)], 'precio' => $_REQUEST["precio" . ($i + 1)]);
        }
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
        case "preciAsc":
            array_multisort($precio, SORT_ASC, $arr);
            break;
        case "preciDes":
            array_multisort($precio, SORT_DESC, $arr);
            break;
    }
    foreach ($arr as $clave => $fila) {
        echo $fila["nombre"] . ":" . $fila["precio"] . "<br>";
    }
}
