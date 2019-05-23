<?php 
    require_once "../Clases/conexion.php";
    require_once "../Clases/crud.php";

     $obj = new crud();

     if(isset($_POST['idEmpleado']))
     {
        echo $obj->eliminarEmpleado($_POST['idEmpleado']);
     }
     elseif(isset($_POST['idCurso']))
     {
        echo $obj->eliminarCurso($_POST['idCurso']);
     }

?>