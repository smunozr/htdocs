 <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document</title>
        </head>
        <body>
        <form action="index.php" method="post">
            <h1>Bienvenido</h1>
            <p>nombre</p>
            <input type="text" name="nombre">
            <p>DNI</p>
            <input type="text" name="DNI">
            <p>Apellido 1</p>
            <input type="text" name="apellido1">
            <p>Apellido 2</p>
            <input type="text" name="apellido2">
            <p>Dirección</p>
            <input type="text" name="direccion">
            <?php
                $a=new BDD();
                $a->printTipoVias()
            ?>
            <button>Enviar</button>
        </form>
        </body>
        </html>
