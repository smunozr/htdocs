<?php

    echo "Ejercicio 1<br>";
        $resultado = 0.00;
         $tipo= gettype($resultado);
         echo "Resultado vale: $resultado y es de tipo $tipo<br>";

         $resultado="Cero";
         $tipo=gettype ($resultado);
         echo "y ahora vale: $resultado y es de $tipo <br>";

     echo "Ejercicio 2<br>";
        $resultado = 0;
        $tipo = gettype($resultado);
        echo "Resultado vale: $resultado y es de tipo $tipo<br>";
        $resultado2=(double)$resultado;
        $tipo=gettype($resultado2);
        echo "y Resultado2: $resultado2 y es de tipo $tipo <br>";
        $tipo = gettype($resultado);
        echo "mientras Resultado vale: $resultado y es de tipo $tipo<br>";

    echo "Ejerciocio 3<br>";
        $numero = 5;
        $tipo = gettype($numero);
        echo "$numero es de tipo $tipo<br>";

        $numero = 5.5;
        $tipo = gettype($numero);
        echo "$numero es de tipo $tipo<br>";

    echo "Ejercicio 4<br>";
        $numero = 5.5;
        $tipo = gettype($numero);
        echo "$numero es de tipo $tipo<br>";

        $numero=(integer)$numero;
        $tipo = gettype($numero);
        echo "$numero es de tipo $tipo<br>";

    echo "Ejercicio 5<br>";
    $nombre="juan";
    $apellido="Perro";
    $direccion="C.Jardin Botanico";
    $cP=28014;
    $localidad="Madrid";
    $provincia="Madrid";

    echo "<table border='2'>";
        echo "<tr>";
                echo "<td align='center'>Variable</td>";
                echo "<td align='center'>Valor</td>";
                echo "<td align='center'>Tipo</td>";
        echo "</tr>";
        echo "<tr>";
                echo "<td>nombre</td>";
                echo "<td>$nombre</td>";
                echo "<td>".gettype($nombre)."</td>";
        echo "</tr>";
        echo "<tr>";
                echo "<td>apellidos</td>";
                echo "<td>$apellido</td>";
                echo "<td>".gettype($apellido)."</td>";
        echo "</tr>";
        echo "<tr>";
                echo "<td>direccion</td>";
                echo "<td>$direccion</td>";
                echo "<td>".gettype($direccion)."</td>";
        echo "</tr>";
                echo "<tr>";
                echo "<td>codigoPostal</td>";
                echo "<td>$cP</td>";
                echo "<td>".gettype($cP)."</td>";
        echo "</tr>";
    echo "</table>";