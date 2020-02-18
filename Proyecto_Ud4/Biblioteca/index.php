<?php
include_once ("HTML.php");
include_once ("HEAD.php");
include_once ("BODY.php");
include_once ("Li/Li.php");
include_once ("Li/Ul.php");
include_once ("Li/Ol.php");
include_once ("H/H1.php");
$head=new HEAD("titulo");
$body=new BODY();
$h1=new H1("TITULO");
$ul=new Ul("circle");
$li=new Li("Hola");
$li2=new Li("Adios");
$body->addContent($h1);
$body->addContent($ul);
$ul->setContenido($li);
$ul->setContenido($li2);
$html=new HTML($head,$body);

echo $html;