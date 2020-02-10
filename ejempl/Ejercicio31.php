<?php
$cartas=array(1,2,3);
shuffle($cartas);
if(!isset($_REQUEST["elegir"])) {
    if (!isset($_REQUEST["barajar"])) {
        foreach ($cartas as $carta) {
            echo "$carta ";
        }
    } else {
        shuffle($cartas);
        echo "-   -   -";
    } ?>
    <form action="Ejercicio31.php" method="post">
        <input type="submit" name="barajar" value="barajar">
        Selecciona en que posicion está el as<select name="pos">
            <option value="0">1</option>
            <option value="1">2</option>
            <option value="2">3</option>
        </select>
        <input type="submit" value="elegir" name="elegir">
    </form>
    <?php
}
if(isset($_REQUEST["elegir"])) {
    $pos = $_REQUEST["pos"] ?? "";
    foreach ($cartas as $carta) {
        echo "$carta ";
    }
    if ($cartas[$pos] == 1) {

        echo "<br/>Felcidades has acertado";
    }else{
        echo "<br/>Has perdido";
    }
}
