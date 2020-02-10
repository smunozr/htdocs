<?php
/*
 * funcion encargada de pintar el nombre de los alimnos en la lista
 * recive un array con los alumnos como parametro
 */
function cargarLista($usus){
    if($usus!=null) {
        $max = sizeof($usus); ?>
        <form method="post" action="index.php">
        <select name="alumno" size="6" onchange="this.form.submit('index.php')"><?php
        for ($y = 0; $y < $max; $y++) {
            echo '<option value="' . $usus[$y]["nombre"] . '">' . $usus[$y]["nombre"] . '</option>';
        }
        echo "</select>";
        echo "</form>";
    }
}

