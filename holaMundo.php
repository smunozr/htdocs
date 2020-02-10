<h1>Adios Mundo</h1>

<?php
    const PI=3.14;
    $PI="hola";
    $a=1;
    echo PI;
    echo $PI;
    echo "Hola mundo";
    function test(){
        global $a;
        echo $a;
    }

    test();