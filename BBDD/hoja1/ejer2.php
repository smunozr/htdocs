<?php
include_once ("conexNBA.php");
?>

    <form>
        <select>
            <?php
            @$cnn=mysqli_connect(HOST,US,PW,BBDD);
            if($cnn) {
                $sql="SELECT DISTINCT temporada FROM partidos";


            }
            mysqli_close($cnn);
            var_dump();
            ?>
        </select>
    </form>
