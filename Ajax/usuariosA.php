<?php

require_once "../Controladores/usuariosC.php";
require_once "../Modelos/usuariosM.php";

class UsuariosA{
    public $Uid;
    public function EditarUsuariosA(){
        $columna = "id";
        $valor = $this->Uid;
        $resultado = UsuariosC::VerUsuariosC($columna, $valor);

        echo json_encode($resultado);
    }


    public $verificarMatricula;
    public function VerificarMatricula(){
        $columna = "matricula";
        $valor = $this->verificarMatricula;
        $resultado = UsuariosC::VerUsuariosC($columna, $valor);

        echo json_encode($resultado);   
    }

    public $checkPlantilla;
    public function checkPlantilla(){
        $columna = "id_plantilla";
        $valor = $this->checkPlantilla;
        $resultado = UsuariosC::verPlantilla($columna, $valor);

        echo json_encode($resultado);   
    }
}



if(isset($_POST["Uid"])){
    $editarU = new UsuariosA();
    $editarU ->Uid = $_POST["Uid"];
    $editarU -> EditarUsuariosA();
}

if(isset($_POST["verificarMatricula"])){
    $verificarMa = new UsuariosA();
    $verificarMa ->verificarMatricula = $_POST["verificarMatricula"];
    $verificarMa -> VerificarMatricula();
}

if(isset($_POST["checkPlantilla"])){
    $checkPla = new UsuariosA();
    $checkPla ->checkPlantilla = $_POST["checkPlantilla"];
    $checkPla -> checkPlantilla();
}