<?php
?>
<body>
<form action="funciones.php" method="post">
    <h1>Datos de Alumnos</h1>
    <?php
    $cadenaTabla="<table border='1' align='center' width='40%'>";
    $numero=1;
    for($cont=0;$cont<10;$cont++){
        $cadenaTabla.="<tr><td><label for='datos.$numero'>Introduzca el nombre de alumno $numero</label></td><td><input type='text' name='alumno" . $numero . "[]' required='required'></td></tr>";
        $numero++;
    }
    $cadenaTabla.="</table>";
    echo $cadenaTabla; echo "<br><br><br>";
    ?>
    <?php
    $cadenaTabla="<table border='1' align='center' width='40%'>";
    $numero=1;
    for($cont=0;$cont<10;$cont++){
        $cadenaTabla.="<tr><td><label for='datos.$numero'>Introduzca los apellidos de alumno $numero</label></td><td><input type='text' name='alumno" . $numero . "[]' required='required'></td></tr>";
        $numero++;
    }
    $cadenaTabla.="</table>";
    echo $cadenaTabla; echo "<br><br><br>";
    ?>
    <?php
    $cadenaTabla="<table border='1' align='center' width='40%'>";
    $numero=1;
    for($cont=0;$cont<10;$cont++){
        $cadenaTabla.="<tr><td><label for='datos.$numero'>Introduzca el curso de alumno $numero</label></td><td><input type='text' name='alumno" . $numero . "[]' required='required'></td></tr>";
        $numero++;
    }
    $cadenaTabla.="</table>";
    echo $cadenaTabla; echo "<br><br><br>";
    ?>
    <?php
    $cadenaTabla="<table border='1' align='center' width='40%'>";
    $numero=1;
    for($cont=0;$cont<10;$cont++){
        $cadenaTabla.="<tr><td><label for='datos.$numero'>Introduzca la edad de alumno $numero</label></td><td><input type='text' name='alumno" . $numero . "[]' required='required'></td></tr>";
        $numero++;
    }
    $cadenaTabla.="</table>";
    echo $cadenaTabla; echo "<br><br><br>";
    ?>
    <?php
    $cadenaTabla="<table border='1' align='center' width='40%'>";
    $numero=1;
    for($cont=0;$cont<10;$cont++){
        $cadenaTabla.="<tr><td><label for='datos.$numero'>Introduzca la localidad de alumno $numero</label></td><td><input type='text' name='alumno" . $numero . "[]' required='required'></td></tr>";
        $numero++;
    }
    $cadenaTabla.="</table>";
    echo $cadenaTabla; echo "<br><br><br>";
    ?>
    <div align="center"> <input type="submit" value="Ingresar datos" align="center"></div>

    <?php include ("funciones.php"); ?>
</form>
</body>
