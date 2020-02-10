<div class="pie">
<?php
include_once ("funciones.php");
    $usu=$_REQUEST["usurio"]??"";
    $pw=$_REQUEST["psw"]??"";
    if( !isset($_SESSION["usuario"]) ||$_SESSION["usuario"]=="invitado" || comprobarusu($usu,$pw)==false){ ?>
        <form method="post">
            <input type="text" name="usuario">
            <input type="password" name="psw">
            <input type="submit" value="iniciar sesion">
        </form>
   <?php }else{
        if($_SESSION["tipo"]=="u"){?>
            <form method="post">
                <input type="hidden" name="lista" value="true">
                <input type="submit" value="Listar Libros">
            </form>
       <?php } elseif ($_SESSION["tipo"]=="a"){ ?>
            <form method="post">
                <input type="hidden" name="lista" value="true">
                <input type="submit" value="Listar Libros">
            </form>
            <form method="post">
                <input type="hidden" name="añadir" value="true">
                <input type="submit" name="Añadir libro" value="añadir libros">
            </form>
     <?php }
    }  ?>
</div>
</body>
