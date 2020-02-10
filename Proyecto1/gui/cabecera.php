
<html lang="en">
<head>
    <meta charset="UTF-8"/>
</head>
<body>
    <a href="../index.php">
    <h1 align="center">INICIO DEL SITIO</h1>
    </a>
    <?php include_once "login.php"?>
    <div align="center">
        <form method="post">
            <a href="gui/importarCSV.php">
            <input type="button" value="ImportarCSV" name="ImportarCSV" /></a>
            <a href="gui/crearUsu.php">
            <input type="button" value="Crear" name="CrearUsuario" /></a>
            <input type="button" value="ExportarCSV" name="Exportar CSV" />
            <input type="button" value="Modificar" name="Modificar" />
            <input type="button" value="Consultar" name="Consultar" />
            <input type="button" value="Borrar" name="Borrar" />
        </form>
        <hr/>
    </div>
</body>
</html>