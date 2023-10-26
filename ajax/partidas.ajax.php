<?php 

require_once "../controlador/partidas.controlador.php";
require_once "../modelo/partidas.modelo.php";

class ajaxPartidas{

  public $idPartidas;

    public function ajaxEditarPartidas(){
        $item = "partida_id"; 
        $valor = $this->idPartidas;
        $respuesta = ctrPartidas::ctrMostrarPartidas1($item,$valor);
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
if(isset($_POST["partida_id"])){
  $editar = new ajaxPartidas();
  $editar->partida_id = $_POST["partida_id"]; 
  $editar->ajaxEditarPartidas();
}

//eliminar partidas
if(isset($_POST["idPartidaE"])){
  $eliminar = new ajaxPartidas();
  $eliminar->idPartidasE = $_POST["idPartidaE"];
  $eliminar->ajaxEliminarPartidas();
}
?>