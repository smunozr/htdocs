<?php
include_once ("BBDD.php");
include_once ("Jugador.php");
class App{

    function run()
    {

        $bbdd = new BBDD();
        /*jugador1*/
        /*conferencia*/
        echo '<div class="jugador1">';
        if (!isset($_REQUEST["conferencia1"]) && !isset($_SESSION["conferencia1"])) {
            $conferencia = $bbdd->getConferencia();
            $max = sizeof($conferencia); ?>
            <form method="post" action="index.php">
            <select name="conferencia1" onchange="this.form.submit('index.php')"><?php
            for ($y = 0; $y < $max; $y++) {
                echo '<option value="' . $conferencia[$y]["Conferencia"] . '">' . $conferencia[$y]["Conferencia"] . '</option>';
            }
            echo "</select>";
            echo "</form>";
            /*Equipo*/
        }elseif (!isset($_REQUEST["equipo1"]) && !isset($_SESSION["equipo1"])) {
            $_SESSION["conferencia1"] = $_REQUEST["conferencia1"];
            $equipo = $bbdd->getEquipo($_SESSION["conferencia1"]);

            $max = sizeof($equipo); ?>
            <form method="post" action="index.php">
            <select name="equipo1" onchange="this.form.submit('index.php')"><?php
            for ($y = 0; $y < $max; $y++) {
                echo '<option value="' . $equipo[$y]["Nombre"] . '">' . $equipo[$y]["Nombre"] . '</option>';
            }
            echo "</select>";
            echo "</form>";
            /*jugador*/
        } elseif (!isset($_REQUEST["jugador1"]) && !isset($_SESSION["jugador1"])) {
            $_SESSION["equipo1"] = $_REQUEST["equipo1"] ?? "";

            $jugadores = $bbdd->getJugadores($_SESSION["equipo1"]);

            $max = sizeof($jugadores); ?>
            <form method="post" action="index.php">
                <select name="jugador1" onchange="this.form.submit('index.php')"><?php
            for ($y = 0; $y < $max; $y++) {
                echo '<option value="' . $jugadores[$y]["Nombre"] . '">' . $jugadores[$y]["Nombre"] . '</option>';
            }
            echo "</select>";
            echo "</form>";
        } elseif (isset($_REQUEST["jugador1"]) || isset($_SESSION["jugador1"])) {
                 $_SESSION["jugador1"] = $_REQUEST["jugador1"]??$_SESSION["jugador1"];
            $codigo = $bbdd->getCodigo($_SESSION["jugador1"]);
            $cod = $codigo['codigo'];
            $estadisticas = $bbdd->getEstadisticas($cod);
            $_SESSION["1jugador"]["puntos"] = $estadisticas['Puntos_por_partido'];
            $_SESSION["1jugador"]["asistencias"] = $estadisticas['Asistencias_por_partido'];
            $_SESSION["1jugador"]["tapones"] = $estadisticas['Tapones_por_partido'];
            $_SESSION["1jugador"]["rebotes"] = $estadisticas['Rebotes_por_partido'];

   }
        echo '</div>';
        echo '<div class="jugador2">';
        /*jugador 2*/
        if (!isset($_REQUEST["conferencia2"]) && !isset($_SESSION["conferencia2"])) {
            $conferencia = $bbdd->getConferencia();
            $max = sizeof($conferencia); ?>
            <form method="post" action="index.php">
            <select name="conferencia2" onchange="this.form.submit('index.php')"><?php
            for ($y = 0; $y < $max; $y++) {
                echo '<option value="' . $conferencia[$y]["Conferencia"] . '">' . $conferencia[$y]["Conferencia"] . '</option>';
            }
            echo "</select>";
            echo "</form>";
            /*Equipo*/
        }elseif (!isset($_REQUEST["equipo2"]) && !isset($_SESSION["equipo2"])) {
            $_SESSION["conferencia2"] = $_REQUEST["conferencia2"];
            $equipo = $bbdd->getEquipo($_SESSION["conferencia2"]);

            $max = sizeof($equipo); ?>
            <form method="post" action="index.php">
            <select name="equipo2" onchange="this.form.submit('index.php')"><?php
            for ($y = 0; $y < $max; $y++) {
                echo '<option value="' . $equipo[$y]["Nombre"] . '">' . $equipo[$y]["Nombre"] . '</option>';
            }
            echo "</select>";
            echo "</form>";
            /*jugador*/
        } elseif (!isset($_REQUEST["jugador2"]) && !isset($_SESSION["jugador2"])) {
            $_SESSION["equipo2"] = $_REQUEST["equipo2"] ?? "";

            $jugadores = $bbdd->getJugadores($_SESSION["equipo2"]);

            $max = sizeof($jugadores); ?>
            <form method="post" action="index.php">
                <select name="jugador2" onchange="this.form.submit('index.php')"><?php
            for ($y = 0; $y < $max; $y++) {
                echo '<option value="' . $jugadores[$y]["Nombre"] . '">' . $jugadores[$y]["Nombre"] . '</option>';
            }
            echo "</select>";
            echo "</form>";
        } elseif (isset($_REQUEST["jugador2"]) || isset($_SESSION["jugador2"])) {
            $_SESSION["jugador2"] = $_REQUEST["jugador2"]??$_SESSION["jugador2"];
            $codigo = $bbdd->getCodigo($_SESSION["jugador2"]);
            $cod = $codigo['codigo'];
            $estadisticas = $bbdd->getEstadisticas($cod);
            $_SESSION["2jugador"]["puntos"] = $estadisticas['Puntos_por_partido'];
            $_SESSION["2jugador"]["asistencias"] = $estadisticas['Asistencias_por_partido'];
            $_SESSION["2jugador"]["tapones"] = $estadisticas['Tapones_por_partido'];
            $_SESSION["2jugador"]["rebotes"] = $estadisticas['Rebotes_por_partido'];

   }
        echo "</div>";
        if(isset($_SESSION["1jugador"]) && isset($_SESSION["2jugador"])){
            $player1=0;
            $player2=0;
            echo "<table>";
            if($_SESSION["1jugador"]["puntos"]>$_SESSION["2jugador"]["puntos"]){
                $player1++; ?>
                <tr>
                <td colspan="2"><?php echo $_SESSION["jugador1"]?> </td> <td colspan="2"><?php echo $_SESSION["jugador2"]?></td>
                </tr>
                 <tr>
                   <td>PUNTOS: </td> <td bgcolor="green"><?php echo $_SESSION["1jugador"]["puntos"] ?></td><td bgcolor="red"><?php echo $_SESSION["2jugador"]["puntos"] ?></td>
                </tr>

      <?php }elseif($_SESSION["1jugador"]["puntos"]<$_SESSION["2jugador"]["puntos"]){
                $player2++;
             ?>
                <tr>
                <td colspan="2"><?php echo $_SESSION["jugador1"]?> </td> <td colspan="2"><?php echo $_SESSION["jugador2"]?></td>
                </tr>
                 <tr>
                   <td>PUNTOS: </td> <td bgcolor="red"><?php echo $_SESSION["1jugador"]["puntos"] ?></td><td bgcolor="green"><?php echo $_SESSION["2jugador"]["puntos"] ?></td>
                </tr>
      <?php
            }else{
                  ?>
                <tr>
                <td colspan="2"><?php echo $_SESSION["jugador1"]?> </td> <td colspan="2"><?php echo $_SESSION["jugador2"]?></td>
                </tr>
                 <tr>
                   <td>PUNTOS: </td> <td bgcolor="yellow"><?php echo $_SESSION["1jugador"]["puntos"] ?></td><td bgcolor="yellow"><?php echo $_SESSION["2jugador"]["puntos"] ?></td>
                </tr>
      <?php
            }

            if($_SESSION["1jugador"]["asistencias"]>$_SESSION["2jugador"]["asistencias"]){
                $player1++; ?>
                 <tr>
                   <td>ASISTENCIAS: </td> <td bgcolor="green"><?php echo $_SESSION["1jugador"]["asistencias"] ?></td><td bgcolor="red"><?php echo $_SESSION["2jugador"]["asistencias"] ?></td>
                </tr>
      <?php }elseif($_SESSION["1jugador"]["asistencias"]<$_SESSION["2jugador"]["asistencias"]){
                $player2++;
             ?>
                 <tr>
                   <td>ASISTENCIAS: </td> <td bgcolor="red"><?php echo $_SESSION["1jugador"]["asistencias"] ?></td><td bgcolor="green"><?php echo $_SESSION["2jugador"]["asistencias"] ?></td>
                </tr>
      <?php
        }else{
              ?>
                 <tr>
                   <td>ASISTENCIAS: </td> <td bgcolor="yellow"><?php echo $_SESSION["1jugador"]["asistencias"] ?></td><td bgcolor="yellow"><?php echo $_SESSION["2jugador"]["asistencias"] ?></td>
                </tr>
      <?php
        }

            if($_SESSION["1jugador"]["rebotes"]>$_SESSION["2jugador"]["rebotes"]){
                $player1++; ?>
                 <tr>
                   <td>REBOTES: </td> <td bgcolor="green"><?php echo $_SESSION["1jugador"]["rebotes"] ?></td><td bgcolor="red"><?php echo $_SESSION["2jugador"]["rebotes"] ?></td>
                </tr>
      <?php }elseif($_SESSION["1jugador"]["rebotes"]<$_SESSION["2jugador"]["rebotes"]){
             $player2++; ?>
                 <tr>
                   <td>REBOTES: </td> <td bgcolor="red"><?php echo $_SESSION["1jugador"]["rebotes"] ?></td><td bgcolor="green"><?php echo $_SESSION["2jugador"]["rebotes"] ?></td>
                </tr>
      <?php
    }else{
           ?>
                 <tr>
                   <td>REBOTES: </td> <td bgcolor="yellow"><?php echo $_SESSION["1jugador"]["rebotes"] ?></td><td bgcolor="yellow"><?php echo $_SESSION["2jugador"]["rebotes"] ?></td>
                </tr>
      <?php
    }
            if($_SESSION["1jugador"]["tapones"]>$_SESSION["2jugador"]["tapones"]){
                $player1++; ?>
                 <tr>
                   <td>TAPONES: </td> <td bgcolor="green"><?php echo $_SESSION["1jugador"]["tapones"] ?></td><td bgcolor="red"><?php echo $_SESSION["2jugador"]["tapones"] ?></td>
                </tr>
      <?php }elseif($_SESSION["1jugador"]["tapones"]<$_SESSION["2jugador"]["tapones"]){
            $player2++; ?>
                 <tr>
                   <td>TAPONES: </td> <td bgcolor="red"><?php echo $_SESSION["1jugador"]["tapones"] ?></td><td bgcolor="green"><?php echo $_SESSION["2jugador"]["tapones"] ?></td>
                </tr>
      <?php
    }else{
           ?>
                 <tr>
                   <td>TAPONES: </td> <td bgcolor="yellow"><?php echo $_SESSION["1jugador"]["tapones"] ?></td><td bgcolor="yellow"><?php echo $_SESSION["2jugador"]["tapones"] ?></td>
                </tr>
      <?php
    }

        echo "</table>";
            if($player1>$player2){
                echo "ganador :".$_SESSION["jugador1"];
            }elseif ($player2>$player1){
                echo "ganador :".$_SESSION["jugador2"];
            }else{
                echo "EMPATE";
            }
       session_destroy();
       echo '<a href="index.php"><button>Volver</button> </a>';
    }
  }
}