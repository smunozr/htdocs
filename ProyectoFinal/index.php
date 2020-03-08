<?php
session_start();
include_once ("BBDD/BBDD.php");
include_once ("Modulos/articulos.php");
include_once ("Modulos/carrito.php");
include_once ("Modulos/pedidos.php");
include_once ("App.php");
$a=new App();
$a->run();