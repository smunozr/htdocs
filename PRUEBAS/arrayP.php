<?php

$listado = array(
    array("nombre"=>'Ana1', "apellido"=>'Alberto1', "nombre2"=>'Amancio1'),
    array("nombre"=>'Ana2', "apellido"=>'Alberto2', "nombre2"=>'Amancio2'),
    array("nombre"=>'Ana3', "apellido"=>'Alberto3', "nombre2"=>'Amancio3'),
);

    shuffle($listado);
    var_dump($listado);

/*
$listado = array(
    array('Ana', 'Alberto', 'Amancio', 'Andrea'),
    array('Baltasar', 'Bartolo', 'Basilio'),
    array('Cesar', 'Carlos', 'Cristina', 'Carmen'),
);

foreach($listado as $fila)
{
    foreach($fila as $nombre)
    {
        echo " $nombre ";
    }

    echo "<br>";
}*/