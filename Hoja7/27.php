<?php
$c1=$_REQUEST["c1"]??"";
$c2=$_REQUEST["c2"]??"";
$pos1=0;
$pos2=0;
$ciudades=array(
    array("Barcelona",0,1188,621,1046),
    array("Coruña",1188,0,609,947),
    array("Madrid",621,609,0,538),
    array("Sevilla",1046,947,538,0)
);

    switch ($c1){
        case "Barcelona": $pos1=0;
            breaK;
        case "Coruña": $pos1=1;
            breaK;
        case "Madrid": $pos1=2;
            breaK;
        case "Sevilla": $pos1=3;
            breaK;
    }
    switch ($c2){
        case "Barcelona": $pos2=1;
            breaK;
        case "Coruña": $pos2=2;
            breaK;
        case "Madrid": $pos2=3;
            breaK;
        case "Sevilla": $pos2=4;
            breaK;
}

    echo ("la distancia entre las dos ciudades es:".$ciudades[$pos1][$pos2]);
?>