<?php 

require_once "../controlador/partidas.controlador.php";
require_once "../modelo/partidas.modelo.php";

class ajaxPartidas{

  public $idPartidas;

    public function ajaxEditarPartidas(){
        $item = "id"; 
        $valor = $this->idPartidas;
        $respuesta = ctrPartidas::ctrMostrarPartidas($item,$valor);
           echo json_encode($respuesta);
    }

 public $idPartidasE;

   public function ajaxEliminarPartidas(){
        $valor = $this->idPartidasE;
        $respuesta = ctrPartidas::ctrEliminarPartidas1($valor);
        echo $respuesta;
    }
}

//editar partidas
if(isset($_POST["id"])){
$editar = new ajaxPartidas();
$editar->id = $_POST["id"];
$editar->ajaxEditarPartidas();
}

//eliminar partidas

if(isset($_POST["idPartidaE"])){
$eliminar = new ajaxPartidas();
$eliminar->idPartidasE = $_POST["idPartidaE"];
$eliminar->ajaxEliminarPartidas();

}
?>