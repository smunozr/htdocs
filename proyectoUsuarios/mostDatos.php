<div class="mostdatos">
<textarea>
<?php
if(isset($_REQUEST["alumno"])){//comprueba que se ha recibido un nombre de un alumno
    $alumno=$_REQUEST["alumno"];
    $alumnos = array();
    $cont = 0;
    $file = fopen("ficheros/usuarios.csv", "r+");
        while (($row = fgetcsv($file, 0, ","))) {//guardar en un array bidimensional los datos de los alumnos del fichero
            $alumnos[$row[0]]['Nombre'] = $row[0];
            $alumnos[$row[0]]['Apellido'] = $row[1];
            $alumnos[$row[0]]['Correo'] = $row[2];
            $alumnos[$row[0]]['Telefono'] = $row[3];
            $alumnos[$row[0]]['Curso'] = $row[4];
            $cont++;
        }
        fclose($file);
            //se pintan los datos del alumno seleccionado dentro del textarea
            echo "Nombre: {$alumnos[$alumno]['Nombre']}\n";
            echo "Apellido: {$alumnos[$alumno]['Apellido']}\n";
            echo "Telefono: {$alumnos[$alumno]['Telefono']}\n";
            echo "Correo: {$alumnos[$alumno]['Correo']}\n";
            echo "Curso: {$alumnos[$alumno]['Curso']}\n";
}?>
</textarea>
</div>