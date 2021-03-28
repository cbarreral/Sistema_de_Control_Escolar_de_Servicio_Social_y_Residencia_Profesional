<?php

require_once "Controladores/plantillaControlador.php";

require_once "Controladores/usuariosC.php";
require_once "Modelos/usuariosM.php";

require_once "Controladores/carrerasC.php";
require_once "Modelos/carrerasM.php";

require_once "Controladores/ajustesC.php";
require_once "Modelos/ajustesM.php";

require_once "Controladores/materiasC.php";
require_once "Modelos/materiasM.php";

require_once "Controladores/evaluacionesC.php";
require_once "Modelos/evaluacionesM.php";

require_once "Controladores/documentosEcenC.php";
require_once "Modelos/documentosEcenM.php";

require_once "Controladores/ConstanciaC.php";
require_once "Modelos/ConstanciaM.php";

$plantilla = new Plantilla();
$plantilla -> verPlantilla();