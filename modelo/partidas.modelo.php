<?php 

require_once "conexion.php";



class mdlPartidas{
    /*static public function mdlMostrarPartidas2($tabla , $item , $valor){
	        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();
           $stmt-> close();
	    	$stmt = null;
    }*/

    /*static public function mdlEliminarPartidas($tabla , $id){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id =:id");
        $stmt -> bindParam(":id", $id, PDO::PARAM_INT);
        if($stmt -> execute()){
			return "ok";	
		}else{
			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());
		}
		$stmt -> close();
		$stmt = null;
    }*/

    /*static public function mdlEditarPartidas($tabla , $datos){
        $stmt= Conexion::conectar()->prepare("UPDATE $tabla SET usuario=:NOM_E , password=:PASSSER_E , nombre=:NOMUSER_E , foto=:IMG_E , rol=:ROL_E WHERE id=:IDE");
        $stmt->bindParam(":IDE", $datos["idE"], PDO::PARAM_INT);
        $stmt->bindParam(":NOM_E", $datos["nom_usuarioE"], PDO::PARAM_STR);
        $stmt->bindParam(":NOMUSER_E", $datos["nom_userE"], PDO::PARAM_STR);
        $stmt->bindParam(":PASSSER_E", $datos["passE"], PDO::PARAM_STR);
        $stmt->bindParam(":ROL_E", $datos["rol_userE"], PDO::PARAM_STR);
        $stmt->bindParam(":IMG_E", $datos["img"], PDO::PARAM_STR);

        if($stmt -> execute()){
			return "ok";
		}else{
			echo "error";
		}
		$stmt-> close();
		$stmt = null;
    }*/

    /*static public function MdlMostrarPartidas1($tabla,$item ,$valor){
        $stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item =:$item");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetch();
        $stmt -> close();
		$stmt = null;
    }*/


    static public function mdlMostrarPartidas($tabla,$tabla2,$tabla3,$tabla4){
        $stmt= Conexion::conectar()->prepare("SELECT p.id as id, p.nombre as nombre, p.fech_nac as fecha, g.nombre as grado, s.nombre as seccion , p.nombre_madre as madre, p.nombre_padre as padre, e.nombre as estado, e.color as color FROM $tabla  INNER JOIN $tabla2 ON g.id = p.grado_id INNER JOIN $tabla3 ON s.id = p.secciones_id INNER JOIN $tabla4 ON e.id = p.estado_id");
		$stmt -> execute();
		return $stmt -> fetchAll();
    }

    static public function mdlMostrarGrados($tabla){
        $stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla ");
		$stmt -> execute();
		return $stmt -> fetchAll();
    }
    static public function mdlMostrarSecciones($tabla){
        $stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla ");
		$stmt -> execute();
		return $stmt -> fetchAll();
    }


    static public function mdlGuardarPartidas($tabla, $nomPart,$fechPart,$gradPart,$secPart,$madPart,$padPart, $estPart){
        $stmt= Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, fech_nac, grado_id, secciones_id,nombre_madre,nombre_padre, estado_id) 
        VALUES (:NOMBRE_PART,:FECHA_PART,:GRADO_PART,:SECCION_PART,:MADRE_PART,:PADRE_PART,:ESTADO_PART)");

        $stmt->bindParam(":NOMBRE_PART",    $nomPart, PDO::PARAM_STR);
        $stmt->bindParam(":FECHA_PART",     $fechPart, PDO::PARAM_STR);
        $stmt->bindParam(":GRADO_PART",     $gradPart, PDO::PARAM_STR);
        $stmt->bindParam(":SECCION_PART",   $secPart, PDO::PARAM_STR);
        $stmt->bindParam(":MADRE_PART",     $madPart, PDO::PARAM_STR);
        $stmt->bindParam(":PADRE_PART",     $padPart, PDO::PARAM_STR);
        $stmt->bindParam(":ESTADO_PART",    $estPart, PDO::PARAM_STR);

          if($stmt->execute()){
            return "ok";
        }else{
            echo "error";
        }
		$stmt = null;
    }
}

?>