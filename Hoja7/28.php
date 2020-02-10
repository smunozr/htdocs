<?php
$c1=$_REQUEST["c1"]??"";
$c2=$_REQUEST["c2"]??"";

$bar=array("Barcelona"=>0, "Coruña"=>1188, "Madrid"=>621, "Sevilla"=>1046);
$cor=array("Barcelona"=>1188, "Coruña"=>0, "Madrid"=>609, "Sevilla"=>947);
$mad=array("Barcelona"=>621, "Coruña"=>609, "Madrid"=>0, "Sevilla"=>538);
$sev=array("Barcelona"=>1046, "Coruña"=>947, "Madrid"=>538, "Sevilla"=>0);

$ciudades=array(
    "Barcelona"=>$bar,
    "Coruña"=>$cor,
    "Madrid"=>$mad,
    "Sevilla"=>$sev

);

    echo ("la distancia entre las dos ciudades es:".$ciudades[$c1][$c2]);