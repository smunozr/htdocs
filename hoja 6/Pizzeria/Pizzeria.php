<?php
$masa=$_REQUEST["masa"]??"";
$base=$_REQUEST["base"]??"";
$salsa=$_REQUEST["salsa"]??"";
$pollo=$_REQUEST["pollo"]??"";
$bacon=$_REQUEST["bacon"]??"";
$jamon=$_REQUEST["jamon"]??"";
$cebolla=$_REQUEST["cebolla"]??"";
$aceitunas=$_REQUEST["aceitunas"]??"";
$pimiento=$_REQUEST["pimiento"]??"";

$total=0.00;
$Pmasa=0.00;
$psalsa=0.00;
$Pbase=0.00;


    if(isset($pollo))$total+=(float)$pollo;
    if(isset($bacon))$total+=(float)$bacon;
    if(isset($jamon))$total+=(float)$jamon;
    if(isset($cebolla))$total+=(float)$cebolla;
    if(isset($pimineto))$total+=(float)$pimiento;
    if(isset($aceitunas))$total+=(float)$aceitunas;

    switch ($masa){

        case "Mini": $total+=2.95;
            $Pmasa=2.95;
        break;
        case "Media": $total+=4.95;
            $Pmasa= 4.95;
        break;
        case "Maxi": $total+=8.45;
            $Pmasa=8.45;
        break;
    };

    switch ($base){
        case "normal":$total+=0;
        break;
        case "crujiente":$total+=1;
            $Pbase=1;
        break;
        case "rellena":$total+=2;
            $Pbase=2;
        break;
    };

    switch ($salsa){
        case "barbacoa":$total+=0.95;
            $psalsa=0.95;
        break;
        case "carbonara":$total+=1.45;
            $psalsa=1.45;
        break;
        default:$total+=0;
    };

?>

    <table border="1">
        <tr>
            <td>Masa</td>
            <td><?php echo $masa.$Pmasa ?> </td>
        </tr>
        <tr>
            <td>Base</td>
            <td><?php echo $base.$Pbase ?> </td>
        </tr>
        <tr>
            <td>Salsa</td>
            <td><?php echo $salsa.$psalsa ?> </td>
        </tr>
        <tr>
            <td>Ingredientes</td>
            <td><?php echo "Pollo: $pollo" ?> </td>
            <td><?php echo "Bacon: $bacon" ?> </td>
            <td><?php echo "Cebolla: $cebolla" ?> </td>
            <td><?php echo "Aceitunas: $aceitunas" ?> </td>
            <td><?php echo "Pimiento: $pimiento" ?> </td>
            <td><?php echo "Jamon: $jamon" ?> </td>
        </tr>
        <tr>
            <?php echo $total ?>
        </tr>
    </table>

