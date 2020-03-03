<?php
include_once "Modulos/insert.php";
include_once "Modulos/Modifi.php";
include_once "Modulos/selec.php";

class App
{

    function run($func){
        $nombre=$_REQUEST["nombre"]??"";
        $nombreM=$_REQUEST["nombreM"]??"";
        $dni=$_REQUEST["dni"]??"";
        $ap1=$_REQUEST["ap1"]??"";
        $ap2=$_REQUEST["ap2"]??"";
        $tipovia=$_REQUEST["tipovia"]??"";
        $direccion=$_REQUEST["direccion"]??"";
        $dniU=$_REQUEST["dniU"]??"";
        switch ($func) {
            case 1:
                $mod = new insert();
                if ($dni != "") {
                    $mod->insertPersona($dni, $nombre, $ap1, $ap2, $tipovia, $direccion);
                }
                $mod->printFormulario();
                break;
            /*case 2: $mod=new insert();
                $mod->insertPersona();
            break;*/
            case 2:
                $mod = new Modifi();
                if ($dniU != "" || $nombreM != "") {
                    if ($nombreM != "") {
                     $modificado=$mod->actualizarPersona($_SESSION["dniU"], $nombreM, $ap1, $ap2, $tipovia, $direccion);
                     if ($modificado=true){
                         echo "ACTUALIZADO CORRECTAMENTE";
                         $_SESSION["dniU"]=null;
                     }
                    } else {
                        $_SESSION["dniU"] = $dniU;
                        $mod->formModificar($_SESSION["dniU"]);
                    }
                } else {
                    $mod->selecPersona();
                }
                break;

            case 3:
                $mod = new selec();
                if ($dni != "") {
                    $mod->mostrarPersona($dni);
                } else {
                    $mod->selecPersona();
                }
                break;
        }
    }
}