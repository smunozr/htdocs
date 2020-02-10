<?php
$nombre=$_REQUEST["nombre"]??"";
$apellido=$_REQUEST["apellidos"]??"";
$direccion=$_REQUEST["direccion"]??"";
$telefono=$_REQUEST["telefono"]??"";

    if(isset($_REQUEST["nombre"])){?>
        <table align="center" border="1">
            <tr>
                <td>Nombre:</td>
                <td><?php echo $nombre ?></td>
            </tr>
            <tr>
                <td>Apellido:</td>
                <td><?php echo $apellido ?></td>
            </tr>
            <tr>
                <td>direccion:</td>
                <td><?php echo $direccion ?></td>
            </tr>
            <tr>
                <td>telefono:</td>
                <td><?php echo $telefono ?></td>
            </tr>
        </table>
<?php
    }else{?>
        <head>
            <meta charset="UTF-8">
            <title>Title</title>
        </head>
        <body>
        <form method="post">
            <label>nombre:<input type="text" name="nombre"></label>
            <label>apellidos:<input type="text" name="apellidos"></label>
            <label>direccion:<input type="text" name="direccion"></label>
            <label>telefono:<input type="text" name="telefono"></label>
            <input type="submit" value="enviar">
        </form>
        </body>
<?php
    }
?>


