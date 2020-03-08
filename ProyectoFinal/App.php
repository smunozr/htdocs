<?php
include_once "Modulos/articulos.php";
include_once "Modulos/pedidos.php";
include_once "Modulos/login.php";
include_once "Modulos/carrito.php";
include_once "BBDD/BBDD.php";

class App
{

    function run(){
        $func=$_REQUEST["func"]??"";
        $id_art=$_REQUEST["articulo"]??"";
        $cantidad=$_REQUEST["cantidad"]??"";
        $usu=$_REQUEST["usu"]??"";
        $pwd=$_REQUEST["pwd"]??"";
        $log=$_REQUEST["log"]??"";
        $pedCon=$_REQUEST["pedConsultar"]??"";
        if($pedCon!=""){
            $func=8;
        }
        include_once ("cabecera.php");

        switch ($func){
            case 2: include_once ("Modulos/inicio.html");
            break;
            case 3:
                $articulo=new articulos();
                $articulo->listarArticulos();
                break;
            case 4:
                if($_SESSION["usuario"]!="") {
                    $carrito = new carrito();
                    $pedido=new pedidos();
                    if(isset($_SESSION["carrito"])){
                        $carrito->listarCarrito($_SESSION["carrito"]);
                        echo $pedido->calcCantidadTotal($_SESSION["carrito"]);
                        include_once ("Modulos/formEli.html");
                    }else{
                        echo "<h2>ANTES DEBES INTRODUCIR ALMENOS 1 ARTICULO</h2>";
                    }

                }else{
                    include_once "Modulos/error.html";
                }
            break;
            case 5: if( !isset($_SESSION["usuario"])|| $_SESSION["usuario"]!="" ){
                $carrito=new carrito();
                $carrito->añadirArticulo($id_art,$cantidad);
            }else{
                include_once "Modulos/error.html";
            }
            break;
            case 6: $pedido=new pedidos();
            $a=$pedido->confirmarPedido($_SESSION["carrito"],$_SESSION["usuario"]);
            if($a==true){
                echo "<h2>PEDIDO CONFIRMADO</h2>";
                unset($_SESSION["carrito"]);
            }else{
                echo "<h2>ERROR AL TRAMITAR EL PEDIDO</h2>";
            }
            break;
            case 7: $carrito = new carrito();
            $carrito->destCarrito();
            break;
            case 8:if(isset($_SESSION["usuario"])) {
                $pedido = new pedidos();
                if($pedCon=="") {
                    $pedido->listarPedidos($_SESSION["usuario"]);
                }else{
                    $pedido->verPedido($pedCon);
                }
            }else{
                include_once "Modulos/error.html";
            }
            default:include_once "Modulos/inicio.html";
            break;
        }
        echo "</body>"."\n"."</html>";
    }

}