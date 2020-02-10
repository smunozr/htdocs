<?php
    if(file_exists("fichero/puntuaciones.csv")) {
        $fichero = fopen("fichero/puntuaciones.csv", 'r+');
        $x = 0;
        while (!feof($fichero)) {
            $row = fgetcsv($fichero, 0, ",");
            if ($row != null) {
                $jugadores[$x]["jugador"] = $row[0];
                $jugadores[$x]["puntuacion"] = $row[1];
                $x++;
            }
        }

            function sort_by_puntuacion ($a, $b) {
            return $b['puntuacion'] - $a['puntuacion'];
            }
           usort($jugadores, 'sort_by_puntuacion');

            echo '<table border="1">';
            for($y=0;$y<sizeof($jugadores)&&$y<5;$y++){
                echo "<tr>";
                echo '<td>'.$jugadores[$y]["jugador"]."</td><td>".$jugadores[$y]["puntuacion"] ." "."puntos".'</td>';
                echo "</tr>";
            }

            echo "</table>";

    }
