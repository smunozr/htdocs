<?php session_start();?>
<?php
include_once("cabecera.php");
include_once ("../accdat/BBDD.php");
include_once ("../accdat/bdconf.php");
$filec=$_FILES["fcsv"]??"";
$exist=$_REQUEST["hddn"]??"";
    if(!isset($_REQUEST["hddn"])){
    ?>
    <form method="post" enctype="multipart/form-data" action="importarCSV.php" >
        <input type="file" name="fcsv">
        <input type="hidden" value="1" name="hddn">
        <input type="submit" id="env">
    </form>
        <?php
    }   else{
        echo "existe";
       inportarCSV($filec);
    } ?>
