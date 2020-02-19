<?php
include_once ("Biblioteca/BODY.php");
include_once ("Biblioteca/HTML.php");
include_once ("Biblioteca/HEAD.php");
include_once ("Biblioteca/Form/Form.php");
include_once ("Biblioteca/Form/input.php");
include_once ("Biblioteca/Table/Table.php");
include_once ("Biblioteca/Table/Td.php");
include_once ("Biblioteca/Table/Tr.php");
include_once ("Biblioteca/Table/Th.php");

class App
{
    const HOST='localhost';
    const US='root';
    const PW='';
    const BBDD='escuela2';

    public function run(){
        $nombre=$_REQUEST["nombre"]??"";
        $apellido=$_REQUEST["apellido"]??"";
        $dni=$_REQUEST["dni"]??"";
        $fecha=$_REQUEST["fecha"]??"";
        $localidad=$_REQUEST["localidad"]??"";
        $telf=$_REQUEST["localidad"]??"";
        $body=new BODY();
        $head=new HEAD("BIBLIOTECA");

        $body->addContent($this->printForm());
        if ($nombre!=""){
            $ins=$this->insertar($nombre,$apellido,$dni,$fecha,$localidad,$telf);
            if ($ins==true){
                $body->addContent($this->mostDatos($nombre,$apellido,$dni,$fecha,$localidad,$telf));
            }
        }

        $html=new HTML($head,$body);
        return $html;
    }

    public function printForm(){
        $form=new Form("POST","index.php");
        $inpuDni=new input("text");
        $inpuName=new input("text");
        $inpuApellido=new input("text");
        $inpuFechaNac=new input("date");
        $inpuLocalidad=new input("text");
        $inpuTelf=new input("number");
        $inpuEnviar=new input("submit");

        $inpuDni->setAtributos(' placeholder="DNI" name="dni"');
        $inpuName->setAtributos(' placeholder="NOMBRE" name="nombre"');
        $inpuApellido->setAtributos(' placeholder="APELLIDO" name="apellido"');
        $inpuFechaNac->setAtributos(' placeholder="FECHA" name="fecha"');
        $inpuLocalidad->setAtributos(' placeholder="LOCALIDAD" name="localidad"');
        $inpuTelf->setAtributos(' placeholder="TELEFONO" name="telf"');
        $inpuEnviar->setAtributos(' value="ENVIAR"');

        $form->setContenido($inpuDni,$inpuName,$inpuApellido,$inpuFechaNac,$inpuLocalidad,$inpuTelf,$inpuEnviar);

        return $form;
    }

    public function insertar($nombre,$apellido,$dni,$fecha,$localidad,$telf):bool {
        $cnn=mysqli_connect(self::HOST,self::US,self::PW,self::BBDD);
        $sql="INSERT INTO alumnos VALUES ('$dni','$nombre','$apellido','$fecha','$telf','$localidad')";
        $ins=mysqli_query($cnn,$sql);
        return $ins;
    }

    public function mostDatos($nombre,$apellido,$dni,$fecha,$localidad,$telf){
        $table=new Table('border="1"');
        $trPrincipal= new Tr("");
        $trSecundario=new Tr("");
        $thN=new Th("");
        $thA=new Th("");
        $thDni=new Th("");
        $thF=new Th("");
        $thT=new Th("");
        $thL=new Th("");
        $tdN=new Td("");
        $tdA=new Td("");
        $tdDni=new Td("");
        $tdF=new Td("");
        $tdT=new Td("");
        $tdL=new Td("");

        $thN->setContenido("NOMBRE");
        $thA->setContenido("APELLIDO");
        $thDni->setContenido("DNI");
        $thF->setContenido("FECHA NACIMIENTO");
        $thT->setContenido("TELEFONO");
        $thL->setContenido("LOCALIDAD");
        $tdN->setContenido($nombre);
        $tdA->setContenido($apellido);
        $tdDni->setContenido($dni);
        $tdF->setContenido($fecha);
        $tdT->setContenido($telf);
        $tdL->setContenido($localidad);

        $trPrincipal->setContenido($thN,$thA,$thDni,$thF,$thT,$thL);
        $trSecundario->setContenido($tdN,$tdA,$tdDni,$tdF,$tdT,$tdL);
        $table->setContenido($trPrincipal,$trSecundario);
        return $table;

    }
}