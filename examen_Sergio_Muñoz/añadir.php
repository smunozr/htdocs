<?php
include_once ("funciones.php");
    $_SESSION["añadir"]=$_REQUEST["añadir"]??"";
    if($_SESSION["añadir"]!=""){ ?>
        <form method="post" action="index.php">
            <input type="text" name="nombre" placeholder="Introduce el nombre del libro" required="required">
            <input type="text" name="autor" placeholder="Introduce el autor" required="required">
            <input type="text" name="genero" placeholder="Introduce el genero" required="required">
            <input type="number" name="pagina" placeholder="pagina" required="required">
            <input type="text" name="precio" placeholder="precio" required="required">
            <input type="submit" value="enviar">
        </form> <?php
        if(isset($_REQUEST["nombre"])){
            $nombre=htmlentities(htmlspecialchars(mysqli_real_escape_string(trim($_REQUEST["nombre"]))))??"";
            $autor=htmlentities(htmlspecialchars(mysqli_real_escape_string(trim($_REQUEST["autor"]))))??"";
            $genero=htmlentities(htmlspecialchars(mysqli_real_escape_string(trim($_REQUEST["genero"]))))??"";
            $pagina=htmlentities(htmlspecialchars(mysqli_real_escape_string(trim($_REQUEST["pagina"]))))??"";
            $precio=htmlentities(htmlspecialchars(mysqli_real_escape_string(trim($_REQUEST["precio"]))))??"";

            añadirLibro($nombre, $autor, $genero, $pagina, $precio);
        }
    }