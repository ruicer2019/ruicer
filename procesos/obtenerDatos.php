<?php 

session_start();

require_once "../Clases/conexion.php";
require_once "../Clases/crud.php";

     $obj_datos = new crud();

     if(isset($_POST['idEmpleado']))
     {
          echo json_encode($obj_datos->obtenDatosEmpleado($_POST['idEmpleado']));
          
     }elseif(isset($_POST['idCurso']))
     {
          echo json_encode($obj_datos->obtenDatosCurso($_POST['idCurso']));
     }
     elseif(isset($_POST['curso']))
     {
          $_SESSION['cursos'][] = $obj_datos->obtenDatosCurso($_POST['curso']);
          echo "1";
     }elseif(isset($_POST['estudiante']) and isset($_POST['periodo']))
     {
          $id_estudiante=$_POST['estudiante'];
          $periodo = $_POST['periodo'];
          echo json_encode($obj_datos->reporteAsignacionPorAlumno($id_estudiante,$periodo));
     }

?>