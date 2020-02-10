<?php
include_once ("Persona.php");
class BBDD{
    const HOST = "localhost";
    const US = "root";
    const PW = "";
    const BBDD = "poo";
    private $cnn;

    function __construct()
    {
        @$this->cnn = new mysqli($this->HOST, $this->US, $this->PW, $this->BBDD);
    }
/*
    function __destruct()
    {
        $this->cnn->close();
    }
*/
/*
    public function mostTiposVias()
    {
        $cons = "SELECT * FROM tipovia";
        if ($this->conexion->query($cons)) {
            $resultado = $this->conexion->query($cons);
            while ($row = $resultado->fetch_assoc()) {
                $arrayTipoVia[] = $row;
            }
            return $arrayTipoVia;
        }
        unset($this->conexion);

    }*/
    public function mostTiposVias()
    {

        $tipos=false;
        $sql="SELECT * FROM tipovias";
        $result=$this->cnn->query($sql);
        if($result) {
            while (($row = mysqli_fetch_assoc($result))) {
                $tipos[] = $row['tipo'];

            }
        }
        return $tipos;

    }

    public function setPersona($persona){
        $insert="INSERT into personas VALUES('{$persona->__get('dni')}', '{$persona->__get('nombre')}', ";
        $insert.="'{$persona->__get('apell1')}', '{$persona->__get('apell2')}','{$persona->__get('tipoVia')}','{$persona->__get('direccion')}')";
        $result=$this->cnn->query($insert);
        return $result;

    }

    function mostrarPersona($dni){
        $resultado=false;
        $sql="SELECT * from personas where dni=$dni";
        $result=$this->cnn->query($sql);
        if($result) {
            $row = mysqli_fetch_assoc($result);
            $resultado=$row;
        }
        return $resultado;
    }

}
