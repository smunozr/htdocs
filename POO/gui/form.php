<body>
<form action="index.php" method="post">
    <input name="dni" type="number" max="9999999999" placeholder="Dni">
    <input name="nombre" type="text" placeholder="Nombre">
    <input name="apell1" type="text" placeholder="Apellido 1">
    <input name="apell2" type="text" placeholder="Apellido 2">
    <select name="tipVia">
        <?php
        $cont=1;
        foreach ($bbdd->mostTiposVias() as $value){
            echo "<option value='$cont'>$value</option>";
            $cont++;
        }
        ?>
    </select>
    <input name="direc" type="text" placeholder="Direccion">
    <input type="submit" value="ENVIAR" name="save">
</form>
</body>
</html>
