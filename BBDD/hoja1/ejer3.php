<?php
include_once ("conexNBA.php");
?>
    <form method="post" action="ejer3.php">
        <select name="estadisticas">
            <option>puntos</option>
            <option>asistencias</option>
            <option>rebotes</option>
            <option>tapones</option>
        </select>
        <?php
           @$cnn=mysqli_connect(HOST,US,PW,BBDD);
           if($cnn) {
               $sql="SELECT DISTINCT temporada FROM partidos";
               $res=mysqli_query($cnn,$sql);
               if($res) {
                   ?>
                    <select name="tempo">
                    <?php
                   while (($row = mysqli_fetch_assoc($res))) {
                       echo "<option value='{$row['nombre']}'>'{$row['nombre']}'</option>";
                   }?>
                    </select>
               <?php}
           }
            mysqli_close($cnn);
        ?>
        <label>Numero de Jugadores:<input type="number" name="njugadores"></label>
    </form>