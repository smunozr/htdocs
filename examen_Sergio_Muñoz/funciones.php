<?php

const HOST='localhost';
const US='root';
const PW='';
const BBDD='examen_sm';

function listadoLibros($libro){
    $cnn=mysqli_connect(HOST,US,PW,BBDD);
    $sql="SELECT * FROM libros WHERE nombre='$libro'";
    $lista=mysqli_query($cnn,$sql);
    while($row=mysqli_fetch_assoc($lista)){
        $listado[]=$row;
    }
    mysqli_close($cnn);
    return $listado;
}

function listarLibros($libros){
    if($libros!=null) {
        $max = sizeof($libros); ?>
        <form method="post" >
            <select name="datos" size="6" onchange="this.form.submit('index.php')"><?php
        for ($y = 0; $y < $max; $y++) {
            echo '<option value="' . $libros[$y]["nombre"] . '">' . $libros[$y]["nombre"] . '</option>';
        }
        echo "</select>";
        echo "</form>";
    }
}

function mostrarDatos($datos,$libros){

    echo "<textarea>";
            $max=sizeof($libros);
            $lib= array();
            for($x=0;$x<max;$x++){
                $lib[$libros[$x]["nombre"]]["nombre"]=$libros[$x]["nombre"];
                $lib[$libros[$x]["nombre"]]["autor"]=$libros[$x]["autor"];
                $lib[$libros[$x]["nombre"]]["autor"]=$libros[$x]["genero"];
                $lib[$libros[$x]["nombre"]]["autor"]=$libros[$x]["paginas"];
                $lib[$libros[$x]["nombre"]]["precio"]=$libros[$x]["precio"];
            }
                echo "Nombre: {$lib[$datos]['nombre']}\n";
                echo "Autor: {$lib[$datos]['autor']}\n";
                echo "Genero: {$lib[$datos]['genero']}\n";
                echo "Paginas: {$lib[$datos]['paginas']}\n";
                echo "Precio: {$lib[$datos]['precio']}\n";
    echo "</textarea>";
}

function comprobarusu($usu,$pw):bool
{
    $validacion = false;
    $cnn = mysqli_connect(HOST, US, PW, BBDD);
    $sql = "SELECT tipo FROM usuarios WHERE usuario='a' AND clave='a'";
    $resul = mysqli_query($cnn, $sql);

    if (mysqli_num_rows($resul) == 1) {
        $validacion = true;
        $row = mysqli_fetch_assoc($resul);
        $tipo = $row["tipo"];
    }

    if ($validacion = "true") {
        $_SESSION["usurio"] = $usu;
        $_SESSION["tipo"] = $tipo;
    } else {
        $_SESSION["usurio"] = "invitado";
        $_SESSION["tipo"] = "invitado";
    }
    return $validacion;
    mysqli_close($cnn);
}

function añadirLibro($nombre,$autor,$genero,$pagina,$precio){
    $cnn = mysqli_connect(HOST, US, PW, BBDD);
    $sql="INSERT INTO libros values ('$nombre','$autor','$genero','$pagina','$precio')";
    if(mysqli_query($sql)){
        echo "INSETADO CORRECTAMENTE";
    }else{
        echo "NO SE PUDEO INSERTAR";
    }

}

