<?php


class Modifi
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
            <select name="dniU"><?php
        $max=sizeof($row);
        for($i=0;$i<$max;$i++){
            echo "<option>".$row[$i][0]."</option>";
        }
        echo '<input type="submit" value="ENVIAR">';
        echo "</form>";
    }

    function formModificar($dni){
        $cnn= mysqli_connect(self::HOST,self::US,self::PW,self::BBDD);
        $sql="SELECT nombre, ap1, ap2, direccion from personas WHERE DNI='$dni'";
        $res=mysqli_query($cnn,$sql);
        $row=mysqli_fetch_assoc($res);

        ?>
           <form method="post" action="index.php">
            <input type="text" name="nombreM" placeholder="<?php echo $row["nombre"] ?>">
            <input type="text" name="ap1" placeholder="<?php echo $row["ap1"] ?>">
            <input type="text" name="ap2" placeholder="<?php echo $row["ap2"] ?>">
            <select name="tipovia">
                <option>calle</option>
                <option>avenida</option>
            </select>
            <input type="text" name="direccion" placeholder="<?php echo $row["direccion"] ?>">
            <input type="submit" value="ENVIAR">
        </form>
    <?php
    mysqli_close($cnn);
    }

    function actualizarPersona($dni,$nombre,$ap1,$ap2,$tipovia,$direccion){
        $cnn= mysqli_connect(self::HOST,self::US,self::PW,self::BBDD);
         if($tipovia=="calle"){
            $dir="01";
        }else{
            $dir="02";
        }
        $sql="UPDATE personas SET nombre='$nombre', ap1='$ap1', ap2='$ap2', tipovia='$dir', direccion='$direccion' WHERE DNI='$dni'";
        $res=mysqli_query($cnn,$sql);
        return $res;
    }
}