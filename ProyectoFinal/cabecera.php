<?php
include_once "Modulos/login.php"
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>BODEGA</title>
</head>
<body>
<div class="cabecera">
    <form method="post" action="index.php">
        <input type="hidden" name="func" value="2">
        <input type="submit" value="INICIO">
    </form>
    <form method="post" action="index.php">
        <input type="hidden" name="func" value="3">
        <input type="submit" value="Articulos">
    </form>
    <form method="post" action="index.php">
        <input type="hidden" name="func" value="4">
        <input type="submit" value="Carrito">
    </form>
    <form method="post" action="index.php">
        <input type="hidden" name="func" value="8">
        <input type="submit" value="Consultar Pedidos">
    </form>
    <?php
        switch ($log){
            case 1: $a=new login();
            $b=$a->loggear($usu,$pwd);
            if($b==false){
                echo "Error, Usuario o contraseña incorrectos";
            }
            break;
            case 10:$a=new login();
            $a->loggout();
            break;
            default:
            if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]=="" ){
                $a=new login();
                $a->loggear($usu,$pwd);
            }else{
            include_once ("Modulos/loggout.html");
            echo $_SESSION["usuario"];
            }
            break;
        }
    ?>
</div>
<div class="img-ini">
    <img src="img/celler.jpg">
</div>