<?php
$cad_ADN=$_REQUEST["CadADN"]??"";
$cadTranscrita="";


    strtoupper($cad_ADN);
    for($x=0;$x<strlen($cad_ADN);$x++){
        $aux=substr($cad_ADN,$x,1);
        switch ($aux){
            case "G": $cadTranscrita=$cadTranscrita."C";
                        break;
            case "C":$cadTranscrita=$cadTranscrita."G";
                        break;
            case "T":$cadTranscrita=$cadTranscrita."A";
                        break;
            case "A":$cadTranscrita=$cadTranscrita."U";
                    break;
            default:$cadTranscrita=$cadTranscrita." ";
        }
    }

    echo $cad_ADN;
    echo $cadTranscrita;
?>

