<?php


class insert
{
    const HOST ='localhost';
    const US = 'root';
    const PW = '';
    const BBDD ='poo';

    function printFormulario(){
        ?>
        <form method="post" action="index.php">
            <input type="text" name="nombre" placeholder="Nombre">
            <input type="text" name="dni" placeholder="Dni" maxlength="10" minlength="10">
            <input type="text" name="ap1" placeholder="Primer Apellido">
            <input type="text" name="ap2" placeholder="Segundo Apellido">
            <select name="tipovia">
                <option>calle</option>
                <option>avenida</option>
            </select>
            <input type="text" name="direccion" placeholder="Direccion">
           <!--<input type="hidden" value="2" name="func">-->
            <input type="submit" value="ENVIAR">
        </form>
  <?php  }

    function insertPersona($dni,$nombre,$ap1,$ap2,$tipvia,$direccion){
        $cnn= mysqli_connect(self::HOST,self::US,self::PW,self::BBDD);
        if($tipvia=="calle"){
            $dir="01";
        }else{
            $dir="02";
        }
        $sql="INSERT INTO personas values ('$dni','$nombre','$ap1','$ap2','$dir','$direccion')";
        $res=mysqli_query($cnn,$sql);
        mysqli_close($cnn);
    }
}