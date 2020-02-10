<?php

require_once("nusoap/nusoap.php");

$server=new soap_server();
$ns="clase";
$server->configureWSDL("server",$ns);
$server->wsdl->schemaTargetNamespace =$ns;

$server->register("genToken",
    array("usu"=>"xsd:string","clave"=>"xsd:string"),
    array("return"=>"xsd:string"),$ns);

$server->register("printValue",
    array("value"=>"xsd:string", "token"=>"xsd:string"),
    array("return"=>"xsd:string"),$ns);

$server->register("giveFecha",
    array("token"=>"xsd:string"),
    array("return=>xsd:string"),$ns);

function genToken($usu="a",$clave="a"){
   $mbd= new PDO('mysql:host=localhost;dbname=servicios',"root");
    $sql = "SELECT Nombre FROM usuarios WHERE Nombre='$usu' AND clave='$clave'";
    $row=$mbd->query($sql);
    if($row==$usu){
        $fecha= getdate();
        $dia=$fecha["mday"]."/".$fecha["month"]."/".$fecha["year"];
      $token= hash("md5",$usu.$clave.$dia);
      $sql="INSERT INTO claves values ('$token')";
      $mbd->query($sql);
      $mbd=nuLL;
    }
    return $token;
}

function printValue($value,$token){
    $mbd= new PDO('mysql:host=localhost;dbname=servicios',"root");
    $sql = "SELECT clave FROM claves WHERE clave='$token'";
    $row=$mbd->query($sql);
    if(sizeof($row)==1){
        echo $value;
    }
    $mbd=null;
}

function giveFecha($token){
    $fecha= getdate();
    $dia=$fecha["mday"]."/".$fecha["month"]."/".$fecha["year"];
    $mbd= new PDO('mysql:host=localhost;dbname=servicios',"root");
    $sql ="SELECT clave FROM claves WHERE clave='$token'"; ;
    $row=$mbd->query($sql);
    if(sizeof($row)==1){
        echo $dia;
    }
}
@$server->service(file_get_contents("php://input"));