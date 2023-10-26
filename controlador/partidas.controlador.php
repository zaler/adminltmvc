<?php

class ctrPartidas
{
   static public function ctrEliminarPartidas($valor)
    {
        $tabla = "partidas";
        $respuesta = mdlPartidas::mdlEliminarPartidas($tabla, $valor);
        return $respuesta;
    }

    static public function ctrMostrarPartidas1($item, $valor)
    {
        $tabla = "mnt_partidas";
        $respuesta = mdlPartidas::mdlMostrarPartidas($tabla, $item, $valor);
        return $respuesta;
    }
    
    static public function ctrMostrarPartidas()
    {
        $tabla = "mnt_partidas as p";
        $tabla2 = "ctl_grado as g";
        $tabla3 = "ctl_secciones as s";
        $tabla4 = "ctl_estado as e";
        $respuesta = mdlPartidas::mdlMostrarPartidas($tabla,$tabla2,$tabla3,$tabla4);
        return $respuesta;
    }

    static public function ctrMostrarGrados()
    {
        
        $tabla = "ctl_grado";
        
        $respuesta = mdlPartidas::mdlMostrarGrados($tabla); 
        return $respuesta;
    }
    static public function ctrMostrarSecciones()
    {
        
        $tabla = "ctl_secciones";
        
        $respuesta = mdlPartidas::mdlMostrarSecciones($tabla); 
        return $respuesta;
    }


    static public function ctrGuardarPartidas()
    {
        if (isset($_POST["nombre"])) {
            $nomPart = $_POST["nombre"];
            $fechPart = $_POST["fecha"];
            $gradPart = $_POST["grado"];
            $secPart = $_POST["seccion"];
            $madPart = $_POST["madre"];
            $padPart = $_POST["padre"];
            $estPart = 1;

            $tabla = "mnt_partidas";
            $respuesta = mdlPartidas::mdlGuardarPartidas($tabla, $nomPart,$fechPart,$gradPart,$secPart,$madPart,$padPart,$estPart);
            if ($respuesta == "ok") {
                echo '<script>
						swal({
								type:"success",
							  	title: "¡CORRECTO!",
							  	text: "La partida de nacimiento ha sido guardado correctamente",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"					  
						}).then(function(result){
								if(result.value){   
								    history.back();
								  } 
						});
					</script>';
            } else {
                echo "<div class='alert alert-danger mt-3 small'> fallida</div>";
            }
        }
    }

    static public function ctrVerPartidas($item, $valor)
    {
        $tabla = "mnt_partidas";
        $respuesta = mdlPartidas::mdlVerPartidas($tabla, $item, $valor);
        return $respuesta;
    }
    

    static public function ctrEditarPartida()
    {
        if (isset($_POST["nombre"])) {
            $id= $_POST['partida_id'];
            $nomPart = $_POST["nombre"];
            $fechPart = $_POST["fecha"];
            $gradPart = $_POST["grado"];
            $secPart = $_POST["seccion"];
            $madPart = $_POST["madre"];
            $padPart = $_POST["padre"];

            $tabla = "mnt_partidas";

            $respuesta = mdlPartidas::mdlEditarPartidas($tabla,  $id, $nomPart,$fechPart,$gradPart,$secPart,$madPart,$padPart);
            if ($respuesta == "ok") {
               echo '<script>
						swal({
								type:"success",
							  	title: "¡CORRECTO!",
							  	text: "Los datos de la partida han sido actualizado correctamente",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"				  
						}).then(function(result){
								if(result.value){   
								    history.back();
								  } 
						});
					</script>';
            } else {
                echo "<div class='alert alert-danger mt-3 small'> fallida</div>";
            }
        }
    }
}
