<?php
    $clienteSOAP=new SoapClient('http://localhost/EjercicioServer/server.php?wsdl');

    $token=$clienteSOAP->genToken();
    $clienteSOAP->printValue("hola",$token);
    $clienteSOAP->giveFecha($token);
