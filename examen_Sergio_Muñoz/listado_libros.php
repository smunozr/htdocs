<?php
include_once ("funciones.php");
    $_SESSION["lista"]=$_REQUEST["lista"]??"";
    if(isset($_REQUEST["lista"])||$_SESSION["lista"]!="") {
        $libro = $_REQUEST["libro"] ?? "";

        if (!isset($_REQUEST["libro"])) {
            ?>
            <form method="post" action="index.php">
                <input type="text" name="libro" placeholder="Introduce el titulo del libro" required="required">
                <input type="submit" value="Buscar">
            </form>
        <?php } elseif(isset($_REQUEST["libro"])) {
            $libros = listadoLibros($libro);
            $_SESSION["libros"]=$libros;
            listarLibros($libros);

        }

        if(isset($_REQUEST["datos"])){
            $datos=$_REQUEST["datos"];
            mostrarDatos($datos,$_SESSION["libros"]);
        }
    }