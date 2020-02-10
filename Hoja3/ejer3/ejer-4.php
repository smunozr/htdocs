<?php
$artA=$_REQUEST["ArticuloA"]??"";
$artB=$_REQUEST["artB"]??"";
$artC=$_REQUEST["artC"]??"";

    if(isset($_REQUEST["ArticuloA"])==false) { ?>
        <form method="post">
            <label>Articulo A<input type="number" value="ArticuloA" name="ArticuloA"></label>
            <label>Articulo B<input type="number" value="artB" name="artB"></label>
            <label>Articulo C<input type="number" value="artC" name="artC"></label>
            <input type="submit" value="enviar">
        </form>
<?php
    } else {
        $calcA=5.99*(float)$artA;
        $calcB=12.49*(float)$artB;
        $calcC=19.99*(float)$artC;
        $iva=($calcA+$calcB+$calcC)*0.20;
        $total=$calcA+$calcB+$calcC+$iva;
        ?>
        <table border="1">
            <tr>
                <td>Articulo</td>
                <td>Precio</td>
                <td>Unidades</td>
                <td>Subtotal</td>
            </tr>
            <tr>
                <td>Articulo A</td>
                <td>5.99</td>
                <td><?php echo $artA ?></td>
                <td><?php echo $calcA?></td>
            </tr>
            <tr>
                <td>Articulo B</td>
                <td>12.49</td>
                <td><?php echo $artB?></td>
                <td><?php echo $calcB?></td>
            </tr>
            <tr>
                <td>Articulo C</td>
                <td>19.99</td>
                <td><?php echo $artC?></td>
                <td><?php echo $calcC?></td>
            </tr>
        </table>
        </br>
        <table border="1">
            <tr>
                <td>IVA (20%)</td>
                <td><?php echo $iva?></td>
            </tr>
            <tr>
                <td>TOTAL</td>
                <td><?php echo $total?></td>
            </tr>
        </table>
<?php } ?>