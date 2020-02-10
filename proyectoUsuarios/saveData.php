<div class="lista">
<?php
include_once ("lista.php");
$nombre = $_REQUEST["nombre"] ?? "";
$apellido = $_REQUEST["apell"] ?? "";
$correo = $_REQUEST["mail"] ?? "";
$telefono = $_REQUEST["tlf"] ?? "";
$curso = $_REQUEST["curso"] ?? "";
/*
 * comprueba si el fichero existe y q aun no se ha recivido ningun parametro
 * (se ejecuta al iniciar la pagina)
 */
if(file_exists("ficheros/usuarios.csv") && $nombre==""){
    $fichero = fopen('ficheros/usuarios.csv', 'r');
    $x = 0;
    while (!feof($fichero)) {//guarda todos los datos del fichero en el array $usus
        $row = fgetcsv($fichero, 0, ",");
        $usus[$x] = array("nombre" => $row[0], "apellido" => $row[1], "correo" => $row[2], "telefono" => $row[3], "curso" => $row[4]);
        $x++;
    }
    fclose($fichero);
    /*
     * se ejecuta cuando se recive un parametro nuevo
     */
}elseif (isset($_REQUEST["nombre"])) {
        $usu = array($nombre, $apellido, $correo, $telefono, $curso);//se guarda en el array los datos del nuevo alumno

        $fichero = fopen('ficheros/usuarios.csv', 'a+');
        fputcsv($fichero, $usu);//se cargan los datos del alumno en el fichero
        fclose($fichero);
        $fichero = fopen('ficheros/usuarios.csv', 'r');
        $x = 0;
        while (!feof($fichero)) {//guarda todos los datos del fichero en el array de $usus
            $row = fgetcsv($fichero, 0, ",");
            $usus[$x] = array("nombre" => $row[0], "apellido" => $row[1], "correo" => $row[2], "telefono" => $row[3], "curso" => $row[4]);
            $x++;
        }
        fclose($fichero);

    }else{
        $usus=null;
    }
/*
 * ejecuta la funcion cargarLista() y se pasa como parametro el array $usus
 */
cargarLista($usus);?>
</div>





