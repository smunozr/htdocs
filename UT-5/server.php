<?php


require_once("nusoap/nusoap.php");

$server = new soap_server();
$ns = "test";
$server->configureWSDL("server", $ns);
$server->wsdl->schemaTargetNamespace = $ns;


$server->register("multiplicarNumeros",
    array("valor1" => "xsd:integer", "valor2" => "xsd:integer"),
    array("return" => "xsd:integer"), $ns);

function buscarLibros(){

}

@$server->service(file_get_contents("php://input"));