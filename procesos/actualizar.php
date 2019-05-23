<?php 
    require_once "../Clases/conexion.php";
    require_once "../Clases/crud.php";

     $obj = new crud();

if(isset($_POST['idEmpleado'])){
     $datos_empleados=array(
        $_POST['idEmpleado'],
         $_POST['cuiU'],
         $_POST['nombreU'],
         $_POST['apellidoU'],
         $_POST['fecnacU'],
         $_POST['telefonoU'],
         $_POST['puestoU'],
         $_POST['escuelaU'],
         $_POST['estadoU']
     );
     echo $obj->actualizarEmpleado($datos_empleados);
    }elseif(isset($_POST['idCurso'])){
        $datos_curso=array(
            $_POST['idCurso'],
            $_POST['codigoCursoU'],
             $_POST['descripcionU'],
             $_POST['horarioU'],
             $_POST['estadoU']
         );
         echo $obj->actualizarCurso($datos_curso);
    }
   


?>