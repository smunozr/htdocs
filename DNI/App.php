<?php
include_once ("Persona.php");
include_once ("BDD.php");
class App
{
function __construct()
{
    include_once 'body.php';
    if (isset($_POST['nombre'])){
    $p = new Persona($_POST['nombre'],$_POST['apellido1'],$_POST['apellido2'],$_POST['direccion'],$_POST['tipovia'],$_POST['DNI']);
    echo "Persona insetada";
    }
}
/*
    private function printTipoVias()
    {
        $bbdd = new BDD;

        $tipoVias = $bbdd->obtenertipovia();

        unset($bbdd);

        echo '<select name="tipovia">';

        foreach ($tipoVias as $tipoVia)
            echo "<option value=\"{$tipoVia['cod']}\">{$tipoVia['tipos']}</option>";
        echo "</select>";
    }*/
}