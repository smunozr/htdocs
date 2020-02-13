<?php
$clienteSOAP=new SoapClient('http://localhost/PHP/nusoap/server.php?wsdl');

var_dump($clienteSOAP->__getFunctions());
var_dump($clienteSOAP->__getTypes());

$resultado=$clienteSOAP->multiplicarNumeros(5,3);
//   $resultado_suma=$clienteSOAP->sumar(2.7, 3.5);
// $resultado_resta=$clienteSOAP->restar(2.7, 3.5);

//  echo "la suma de 2.7 mas 3.5 es $resultado_suma"."<br/>";
// echo "la resta de 2.7 menos 3.5 es $resultado_resta";
echo "la multiplicacion de 5 y 3 es $resultado";
