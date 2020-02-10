<?php session_start();?>
<?php
include_once ("../lib/funcionesSeguiridad.php");
include_once("cabecera.php");
    if(comprobarSeguridad()==true){?>
        <html>
        <head>
        </head>
        <body>
        <form>
            <label>Nombre:<input type="text" name="nombre"> </label>
            <laber>Apellido:<input type="text" name="apellido"> </laber>
            <label>ID: <input type="text" name="id"></label>
            <label>DNI:<input type="text" name="dni"></label>
            <label>Fecha Nacimiento:<input type="date" name="fecha"></label>
            <label>Nº Telefono:<input type="text" name="telefono"></label>
            <label>Localidad:<input type="text" name="localidad"></label>
        </form>
        </body>
        </html>

<?php
    }else{
        include_once ("NotAllowed.php");

    }
?>
