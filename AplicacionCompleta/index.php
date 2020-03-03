<?php
include_once "cabecera.html";
include_once "App.php";
session_start();
$func=$_REQUEST["func"]??"";
if(isset($_REQUEST["func"])){
    $_SESSION["func"]=$func;
}
$a=new App();
$a->run($_SESSION["func"]);