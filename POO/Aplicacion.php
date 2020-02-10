<?php
include_once ("Persona.php");
include_once ("BBDD.php");
class Aplicacion{

    function run(){
        $bbdd= new BBDD();
        include_once ("gui/head.html");
        include_once("gui/form.php");
        include_once ("gui/foot.html");



        if(isset($_REQUEST["nombre"])) {
            $nombre=$_REQUEST["nombre"];
            $apell1=$_REQUEST["apell1"];
            $apell2=$_REQUEST["apell2"];
            $dni=$_REQUEST["dni"];
            $tipoVia=$_REQUEST["tipVia"];
            $direccion=$_REQUEST["direc"];

            $pers = new Persona($nombre, $apell1, $apell2, $dni, $tipoVia, $direccion);
            $bbdd->setPersona($pers);
            $bbdd=null;
        }
    }
}
