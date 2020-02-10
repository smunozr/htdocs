
<?php
session_start();
if(file_exists("fichero/preguntas.csv")) {
    if (!isset($_REQUEST["usuario"]) && !isset($_SESSION["usuario"])) {
        ?>
        <form method="post">
            <label>introduce tu nombre de usuario:<input type="text" name="usuario" required="required"></label>
            <input type="submit" value="Empezar">
        </form>
        <?php
        $_SESSION["entrada"] = false;
    } elseif ($_SESSION["entrada"] == false) {
        $usuario = $_REQUEST["usuario"] ?? "";
        $_SESSION["usuario"] = $usuario;
        $ficheroP = fopen("fichero/preguntas.csv", 'r+');
        $x = 0;
        while (!feof($ficheroP)) {
            $row = fgetcsv($ficheroP, 0, ",");
            if ($row != null) {
                $preguntas[$x] = $row;
                $x++;
            }
        }
        fclose($ficheroP);
        shuffle($preguntas);
        $_SESSION["preguntas"] = $preguntas;
        $_SESSION["entrada"] = true;
        $_SESSION["contP"] = 0;
        $_SESSION["aciertos"] = 0;
        $_SESSION["numPregs"] = $x;

    } elseif ($_REQUEST["respuesta"] == $_SESSION["preguntas"][$_SESSION["contP"]][6]) {
        $_SESSION["contP"]++;
        $_SESSION["aciertos"]++;

        if ($_SESSION["contP"] == $_SESSION["numPregs"]) {
            $_SESSION["entrada"] = false;
            $elevado = pow(2, $_SESSION["aciertos"]);
            $_puntuacion = (($elevado * 10) - 10 + 1000);
            $puntuacion = array($_SESSION["usuario"], $_puntuacion);
            $ficheroU = fopen("fichero/puntuaciones.csv", "a+");
            fputcsv($ficheroU, $puntuacion);
            fclose($ficheroU);
            echo "<h2>HAS GANADO</h2> " . $_SESSION["usuario"] . "<br/>";
            echo $_puntuacion . "puntos";
            session_destroy();
            echo '<a href="index.php"><button>Volver</button> </a>';
        }
    } elseif ($_REQUEST["respuesta"] != $_SESSION["preguntas"][$_SESSION["contP"]][6]) {
        unset($_SESSION["preguntas"]);
        $_SESSION["entrada"] = false;
        if ($_SESSION["aciertos"] == 0) {
            $puntuacion = 0;
        } else {
            $elevado = pow(2, $_SESSION["aciertos"]);
            $puntuacion = (($elevado * 10) - 10);
        }
        $_puntuacion = array($_SESSION["usuario"], $puntuacion);
        $ficheroU = fopen("fichero/puntuaciones.csv", "a+");
        fputcsv($ficheroU, $_puntuacion);
        fclose($ficheroU);
        echo "<h2>HAS PERDIDO</h2> " . $_SESSION["usuario"] . "<br/>";
        echo $puntuacion . "puntos";
        session_destroy();
        echo '<a href="index.php"><button>Volver</button> </a>';
    }
    if ($_SESSION["entrada"] == true) {
        ?>
        <form method="post">
            <img src="<?php echo $_SESSION["preguntas"][$_SESSION["contP"]][5] ?>" width="200px" height="200px">
            <h2><?php echo $_SESSION["preguntas"][$_SESSION["contP"]][0] ?></h2>
            <label><?php echo $_SESSION["preguntas"][$_SESSION["contP"]][1] ?></label><input type="radio" name="respuesta" value="1" required="required">
            <label><?php echo $_SESSION["preguntas"][$_SESSION["contP"]][2] ?></label><input type="radio" name="respuesta" value="2" required="required">
            <label><?php echo $_SESSION["preguntas"][$_SESSION["contP"]][3] ?></label><input type="radio" name="respuesta" value="3" required="required">
            <label><?php echo $_SESSION["preguntas"][$_SESSION["contP"]][4] ?></label><input type="radio" name="respuesta" value="4" required="required">
            <input type="submit" value="Enviar">
        </form>
    <?php }
}else{
    echo "<h2>NO HAY PREGUNTAS</h2>";
    echo '<a href="index.php"><button>Volver</button> </a>';
}
    ?>

