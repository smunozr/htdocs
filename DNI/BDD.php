<?php


class BDD
{
    const HOST ='localhost';
    const US = 'root';
    const PW = '';
    const BBDD ='poo';
    var $conexion;


function insertarPersona($Persona){
    $consulta = "INSERT INTO PERSONAS VALUES ($Persona->DNI,'$Persona->nombre','$Persona->ap1','$Persona->ap2','$Persona->tipovia','$Persona->direccion')";

     $this->conexion->query($consulta);

}
function getPersona($id='-1'){
    $ret= null;
    $sql = "Select * from table where dni= $id";
    $result = $this->conexion->query($sql);
    if ($result->num_rows==1){
        $row = $result->fetch_assoc();
        $ret = new Persona($row['dni']);
    }
    return $ret;
}
function obtenertipovia(){
    $ret = null;
    $consulta = "SELECT * FROM TIPOVIAS";
   $result =  $this->conexion->query($consulta);
   while($row = $result->fetch_assoc()){
       $ret[]=$row;
   }
    return $ret;

}
    private function printTipoVias()
    {
        $tipoVias = $this->obtenertipovia();

        unset($this);

        echo '<select name="tipovia">';

        foreach ($tipoVias as $tipoVia)
            echo "<option value=\"{$tipoVia['cod']}\">{$tipoVia['tipos']}</option>";
        echo "</select>";
    }
function __construct()
{
    $this->conexion = new mysqli();
    //try{
        $this->conexion->connect(self::HOST,self::US,self::PW,self::BBDD);
    //}
    /*catch (Exception $e){
        $this->conexion=null;
        throw new Exception("No se pudo conectar");
    }*/

}


function __destruct()
{
    $this->conexion->close();
}
}