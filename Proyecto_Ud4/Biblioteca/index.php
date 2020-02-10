<?php
include_once ("HTML.php");

$head=new HEAD("titulo");
$body=new BODY();
$html=new HTML($body,$head);

echo $html;