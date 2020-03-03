<?php


class selec
{
    const HOST ='localhost';
    const US = 'root';
    const PW = '';
    const BBDD ='poo';

    function selecPersona(){
        $cnn= mysqli_connect(self::HOST,self::US,self::PW,self::BBDD);
        $sql="SELECT DNI FROM personas";
        $res=mysqli_query($cnn,$sql);
        $row=mysqli_fetch_all($res);
        ?>
        <form method="post" action="index.php">
            <select name="dni"><?php
        $max=sizeof($row);
        for($i=0;$i<$max;$i++){
            echo "<option>".$row[$i][0]."</option>";
        }
        echo '<input type="submit" value="ENVIAR">';
        echo "</form>";
    }

    function mostrarPersona($dni){
        $cnn= mysqli_connect(self::HOST,self::US,self::PW,self::BBDD);
        $sql="SELECT DNI,nombre, ap1, ap2, direccion from personas WHERE DNI='$dni'";
        $res=mysqli_query($cnn,$sql);
        $row=mysqli_fetch_assoc($res);
        ?>
        <table border="1">
            <tr>
                <td>DNI</td>
                <td>NOMBRE</td>
                <td>PRIMER APELLIDO</td>
                <td>SEGUNDO APELLIDO</td>
                <td>DIRECCION</td>
            </tr>
            <tr>
                <td><?php echo $row["DNI"] ?></td>
                <td><?php echo $row["nombre"] ?></td>
                <td><?php echo $row["ap1"] ?></td>
                <td><?php echo $row["ap2"] ?></td>
                <td><?php echo $row["direccion"] ?></td>
            </tr>
        </table>
        <?php
    }
}