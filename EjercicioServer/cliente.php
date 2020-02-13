<?php
    $clienteSOAP=new SoapClient('http://localhost/PHP/EjercicioServer/server.php?wsdl');

    $token=$clienteSOAP->genToken();
    $clienteSOAP->printValue("hola",$token);
    $clienteSOAP->giveFecha($token);
