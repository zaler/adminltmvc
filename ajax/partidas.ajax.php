<?php 

require_once "../controlador/partidas.controlador.php";
require_once "../modelo/partidas.modelo.php";

class ajaxPartidas{

  public $idPartidas ;

    public function ajaxEditarPartidas(){
        $item = "id"; 
        $valor = $this->idPartidas;
        $respuesta = ctrPartidas::ctrVerPartidas($item,$valor);
        echo json_encode($respuesta);
    }



    
  public $idPartidasE;
    public function ajaxEliminarPartidas(){
        $valor = $this->idPartidasE;
        $respuesta = ctrPartidas::ctrEliminarPartidas($valor);
        echo $respuesta;
    }
}

//editar partidas
if(isset($_POST["id"])){
  $editar = new ajaxPartidas();
  $editar->idPartidas = $_POST["id"]; 
  $editar->ajaxEditarPartidas();
}

//eliminar partidas
if(isset($_POST["idPartidasE"])){
  $eliminar = new ajaxPartidas();
  $eliminar->idPartidasE = $_POST["idPartidasE"];
  $eliminar->ajaxEliminarPartidas();
}
?>