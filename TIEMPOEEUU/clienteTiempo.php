<?php
    $clienteSOAP=new SoapClient('ndfdXML.wsdl');

    $resultados=$clienteSOAP->NDFDgenByDay(39,-77,'2020-01-28',4,'e','24 hourly');

    print_r($resultados);