<?php

$cad=$_REQUEST[""]??"";
$cad_sus="";
$patron='/[^a-z]/';
$sus=",";
    $cad_sus=preg_replace($patron,$sus,$cad);
    $arrayP[]=explode($sus,$cad_sus);
    $array_val[]=array_count_values($arrayP[]);
    foreach ($array_val as $arrayP => $valor){
        echo "la palabra $arrayP se repite $valor veces </br>";
}

/*for($x=0;$x<strlen($cad);$x++){
    $aux=substr($cad,$x);

    if($aux<a||$aux>z||$aux!=","){
        $cad_sus=str_replace($aux,",",$cad)
    }
}*/

?>
