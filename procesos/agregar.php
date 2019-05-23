<?php 

session_start();

    require_once "../Clases/conexion.php";
    require_once "../Clases/crud.php";

     $obj = new crud();

    if(isset($_POST['cui']) 
    && isset($_POST['nombre']) 
    && isset($_POST['apellido']) 
    && isset($_POST['fecnac']) 
    && isset($_POST['telefono']) 
    && ($_POST['puesto'])!=0 
    && ($_POST['escuela'])!=0){
     $datos=array(
         $_POST['cui'], 
         $_POST['nombre'],
         $_POST['apellido'],
         $_POST['fecnac'],
         $_POST['telefono'],
         $_POST['puesto'],
         $_POST['escuela'],
         $_POST['estado']

     );

     echo $obj->agregar_empleado($datos);
    }
    
    if(isset($_POST['codigoCurso']) 
    && isset($_POST['descripcion']) 
    && isset($_POST['horario'])){
        if(!empty($_POST['horario'])){
        $datos=array(
            $_POST['codigoCurso'],
            $_POST['descripcion'],
            $_POST['horario'],
            $_POST['estado']
        );
    }
        echo $obj->agregar_curso($datos);
        //echo $_POST['horario'];
    } 
   
    if(
    isset($_POST['estudiante'])
    and isset($_POST['grado'])
    and isset($_POST['escuela'])
    and isset($_POST['fecha'])
    and isset($_POST['salon'])
    and isset($_POST['periodo']) 
    and isset($_SESSION['cursos']))
    {
        unset( $_SESSION["encabezado"] ); 

        $datos=array(
            $_POST['estudiante'],
            $_POST['grado'],
            $_POST['escuela'],
            $_POST['fecha'],
            $_POST['salon'],
            $_POST['periodo']
        );
        $_SESSION['encabezado']= $datos;
        echo $obj->agrega_detalle();
    }
?>