<?php
include_once ("App.php");
const HOST='localhost';
const US='root';
const PW='';
const BBDD='ajax';
$app=new App();

echo $app->run();