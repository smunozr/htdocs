<?php

class BBDD{
    const HOST='localhost';
    const US='root';
    const PW='';
    const BBDD='nba';
    private $cnn;

    function __construct()
    {
        $this->cnn=mysqli_connect(self::HOST,self::US,self::PW,self::BBDD);
    }

   function __destruct()
    {
        $this->cnn->close();
    }
    /*
     * Obtiene las conferencias de la base de datos NBA y devuelve un array con los datos obtenidos
     */
    function getConferencia(){

        $sql="SELECT DISTINCT(Conferencia) FROM equipos ";
        $conferencias=mysqli_query($this->cnn, $sql);
        if($conferencias) {
            while ($row = mysqli_fetch_assoc($conferencias)) {
                $conferencia[]=$row;
            }
        }
        return $conferencia;
    }
    /*
     * obtiene los equipos en funcion de la conferencia que se pase
     * devuleve un array con los equipos
     */
    function getEquipo($conferencia){

        $sql="SELECT Nombre FROM equipos WHERE Conferencia='$conferencia'";
        $equipos=mysqli_query($this->cnn, $sql);
        if($equipos){
            while ($row = mysqli_fetch_assoc($equipos)){
                $equipo[]=$row;
            }
        }

        return $equipo;
    }
    /*
     * obtiene el nombre de los jugadores del equipo que se ha recibido
     *
     */
    function getJugadores($equipo){

        $sql="SELECT Nombre FROM jugadores WHERE Nombre_equipo='$equipo'";
        $jugador=mysqli_query($this->cnn,$sql);
        if($jugador){
            while ($row = mysqli_fetch_assoc($jugador)){
                $jugadores[]=$row;
            }
        }
        return $jugadores;
    }

    function getCodigo($jugador){

        $sql="SELECT codigo FROM jugadores WHERE Nombre='$jugador'";
        $res=mysqli_query($this->cnn,$sql);
        $row = mysqli_fetch_assoc($res);
        return $row;
    }

    function getEstadisticas($codigo){
        $sql="SELECT Puntos_por_partido, Asistencias_por_partido, Tapones_por_partido, Rebotes_por_partido FROM estadisticas WHERE jugador='$codigo'";
        $res=mysqli_query($this->cnn,$sql);
        $row=mysqli_fetch_assoc($res);
        return $row;
    }
}
