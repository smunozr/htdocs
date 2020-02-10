<?php
include ("HTML.php");
include ("Head.php");
include ("Body.php");
include("Sueltas/P.php");
include ("H/H1.php");
include ("H/H2.php");
include ("H/H3.php");
include ("H/H4.php");
include ("H/H5.php");
include ("H/H6.php");
include ("Sueltas/Div.php");
include ("Sueltas/Br.php");
include ("Table/Table.php");
$head = new Head("Prueba");
$head->addMeta("author","SORIK");
$head->addMeta("pais","patrialandia");
$parrafo = new P("Hola mundo");
$H1 = new H1("CaraCarton");
$br = new Br();
$td = new Td();
$tdVacio = new Td();
$td->setAtributos("id='jose'","bgcolor='grey'","style='color:black'");
$td->setContenido("puto Lalo");
$td2=new Td();
$td2->setAtributos("id='churri'","colspan='2'","bgcolor='pink'","style='color:black'");
$td2->setContenido("Llevaba razon");
$trVacio=new Tr($tdVacio,$tdVacio);
$trInicio=new Tr($td,$td);
$trCentro = new Tr($td2);
$trTd2 = new Tr($td,$tdVacio,$td2,$tdVacio,$tdVacio);
$tabla = new Table($trInicio,$trCentro);
$tabla->setAtributos("border='2'");
$div = new Div($tabla);
$body = new Body($div);
$pagina = new HTML($head,$body);
echo $pagina;

?>
