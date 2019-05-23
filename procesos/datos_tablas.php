<?php 
    require_once "../Clases/conexion.php";
    class obtenerDatos
    {
        function obtenerEmpleados(){
            $cnn = new conectar();
            $enlace = $cnn->conexion();

            $sql='SELECT empleado.id_empleado, empleado.cui, empleado.nombre, empleado.apellido, empleado.fec_nac, empleado.telefono, puesto.descripcion as puesto, escuela.descripcion as escuela FROM ((empleado INNER JOIN puesto on empleado.id_puesto = puesto.id_puesto) INNER JOIN escuela ON empleado.id_escuela = escuela.id_escuela) where empleado.estado = 1';
            
            $resultado = $enlace->prepare($sql);
            $resultado->execute();

            $datos=$resultado->fetchAll(PDO::FETCH_ASSOC);
            
            return $datos;

        }

        function obtenerCursos(){
            $cnn = new conectar();
            $enlace = $cnn->conexion();

            $sql='SELECT * FROM curso where estado=1';
            
            $resultado = $enlace->prepare($sql);
            $resultado->execute();

            $cursos=$resultado->fetchAll(PDO::FETCH_ASSOC);
            
            return $cursos;

        }

        function consultaPuesto(){
            
            $cnn = new conectar();
            $enlace = $cnn->conexion();
            $sql = "Select * from puesto";
            $resultado = $enlace->prepare($sql);
            $resultado->execute();
            $datos=$resultado->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
            
        }

        function consultaEscuela(){
            
            $cnn = new conectar();
            $enlace = $cnn->conexion();
            $sql = "Select * from escuela where estado=1";
            $resultado = $enlace->prepare($sql);
            $resultado->execute();
            $datos=$resultado->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
            
        }

        function consultaEstudiante(){
            
            $cnn = new conectar();
            $enlace = $cnn->conexion();
            $sql = "Select * from estudiante where estado=1";
            $resultado = $enlace->prepare($sql);
            $resultado->execute();
            $datos=$resultado->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
            
        }

        function consultaGrado(){
            
            $cnn = new conectar();
            $enlace = $cnn->conexion();
            $sql = "Select * from grado where estado=1";
            $resultado = $enlace->prepare($sql);
            $resultado->execute();
            $datos=$resultado->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
            
        }

        function consultaSalon(){
            
            $cnn = new conectar();
            $enlace = $cnn->conexion();
            $sql = "Select * from salon where estado=1";
            $resultado = $enlace->prepare($sql);
            $resultado->execute();
            $datos=$resultado->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
            
        }
    }
    
?>