<?php 

include "controlador/plantilla.controlador.php";
include "controlador/usuarios.controlador.php";
include "controlador/roles.controlador.php";
include "controlador/partidas.controlador.php";

include "modelo/usuarios.modelo.php";
include "modelo/roles.modelo.php";
include "modelo/partidas.modelo.php";



 

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();






?>