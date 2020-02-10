<?php

class BBDD
{
    const HOST="localhost";
    const US="root";
    const PW="";
    const BBDD="escuela";
    private $cnn;

    function __construct(){
        $this->cnn=mysqli_connect(HOST,US,PW, BBDD);
    }

    function __destruct(){
      mysqli_close($this->cnn);
    }

    function validarUsuario($us, $pw): bool
    {
        $validacion = false;
        if ($this->cnn) {
            $sql = "SELECT tipo FROM usuarios where usuario='$us' AND clave='$pw'";
            $res = mysqli_query($this->cnn, $sql);
            if (mysqli_num_rows($res) == 1) {
                $validacion = true;
                $row = mysqli_fetch_assoc($res);
                $tipo = $row['tipo'];
            }
        }

        if ($validacion) {
            $_SESSION['usuario'] = $us;
            $_SESSION['tipo'] = $tipo;
        } else {
            unset($_SESSION['usuario']);
            unset($_SESSION['tipo']);
        }

        return $validacion;
    }

    function inportarCSV($filec)
    {
        $file = fopen($filec["tmp_name"], "r");

        if (isset($this->cnn) && isset($file)) {
            fgetcsv($file, 0, ";");
            while (!feof($file)) {
                $row = fgetcsv($file, 0, ";");
                $sql = "INSERT INTO alumnos VALUES ($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9])";
                echo $sql;
            }
        } else {
            echo "Error";
        }
        fclose($file);

    }
}