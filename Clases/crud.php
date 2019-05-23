<?php 

class crud
{

    //////////************************************************** */
     //////////////////PROCEDIMIENTOS PARA AGREGAR EN TABLAS == INSERT
    /////////////************************************************ */

    public function agregar_empleado($datos_empleados)
    {
            $cnn = new conectar();
            $enlace = $cnn->conexion();
            $enlace2 = $cnn->conexion();

            $sql1='select * from empleado where cui='.$datos_empleados[0].'';
            $resultado = $enlace->prepare($sql1);
            $resultado->execute();
            $row= $resultado->rowCount();

        if($row==1){
            $cui_repetido = 2;
            echo $cui_repetido;
        }else{
            $sql2='INSERT INTO empleado VALUES (null,'.$datos_empleados[0].',"'.$datos_empleados[1].'","'.$datos_empleados[2].'","'.$datos_empleados[3].'","'.$datos_empleados[4].'",'.$datos_empleados[5].','.$datos_empleados[6].','.$datos_empleados[7].')';

            $resultado2 = $enlace2->prepare($sql2);
            echo $resultado2->execute();
        }

    }


    public function agregar_curso($datos)
    {
            $cnn = new conectar();
            $enlace = $cnn->conexion();
            $enlace2 = $cnn->conexion();

            $sql1='select * from curso where codigo_curso="'.$datos[0].'"';
            $resultado = $enlace->prepare($sql1);
            $resultado->execute();
            $row= $resultado->rowCount();

        if($row==1){
            $cui_repetido = 0;
            echo $cui_repetido;
        }else{
            $sql2='INSERT INTO curso VALUES (null,"'.$datos[0].'","'.$datos[1].'","'.$datos[2].'",'.$datos[3].')';

            $resultado2 = $enlace2->prepare($sql2);
            echo $resultado2->execute();
        }

    }

    public function agrega_detalle()
    {
            $cnn = new conectar();
            $enlace = $cnn->conexion();

            $estudiante = $_SESSION['encabezado'];
            $detalle = $_SESSION['cursos'];

            $sql1='insert into enca_inscripcion values(null,'.$estudiante[0].','.$estudiante[1].','.$estudiante[2].',"'.$estudiante[3].'",'.$estudiante[4].',"'.$estudiante[5].'")';
            $resultado1 = $enlace->prepare($sql1);
            $resultado1->execute();
            $enca = $enlace->lastInsertId(); 

            foreach($detalle as $key => $valor){
               $sql='INSERT INTO detalle_inscripcion VALUES (null,'.$enca.','.$valor['id_curso'].')';
               $resultado2 = $enlace->prepare($sql);
               $resultado2->execute();
             };

            if($resultado1 = "1" and $resultado2 ="1"){
                echo "1";
            }else{
                echo "2";
            }


        }






    //////////************************************************** */
     //////////////////PROCEDIMIENTOS PARA OBTENER LOS DATOS QUE SE CARGAR PARA ACTUALIZAR TABLAS == CONSULTA
    /////////////************************************************ */

    public function obtenDatosEmpleado($idEmpleado){
            $cnn = new conectar();
            $enlace = $cnn->conexion();

            $sql = 'SELECT * from empleado where id_empleado ='.$idEmpleado.'';

            $resultado = $enlace->prepare($sql);
            $resultado->execute();

            $datos = $resultado->fetch(PDO::FETCH_ASSOC);
            return $datos;
        }

    public function obtenDatosCurso($idCurso){
            $cnn = new conectar();
            $enlace = $cnn->conexion();

            $sql = 'SELECT * from curso where id_curso ='.$idCurso.'';

            $resultado = $enlace->prepare($sql);
            $resultado->execute();

            $cursos = $resultado->fetch(PDO::FETCH_ASSOC);
            return $cursos;
        }


     //////////************************************************** */
     //////////////////PROCEDIMIENTOS PARA ACTUALIZAR TABLAS == UPDATE
    /////////////************************************************ */

    public function actualizarEmpleado($datos_empleado){
        $cnn = new conectar();
        $enlace = $cnn->conexion();

        $sql='UPDATE empleado SET cui="'.$datos_empleado[1].'",nombre="'.$datos_empleado[2].'",apellido="'.$datos_empleado[3].'",fec_nac="'.$datos_empleado[4].'",telefono="'.$datos_empleado[5].'",id_puesto='.$datos_empleado[6].',id_escuela='.$datos_empleado[7].' WHERE id_empleado='.$datos_empleado[0].'';

        $resultado = $enlace->prepare($sql);
        echo $resultado->execute();
        // echo $sql;
    }

    public function actualizarCurso($datos_curso){
        $cnn = new conectar();
        $enlace = $cnn->conexion();

        $sql='UPDATE curso SET codigo_curso="'.$datos_curso[1].'", descripcion="'.$datos_curso[2].'",horario="'.$datos_curso[3].'",estado='.$datos_curso[4].' WHERE id_curso='.$datos_curso[0].'';

        $resultado = $enlace->prepare($sql);
        echo $resultado->execute();
        //echo $sql;
    }



    //////////************************************************** */
     //////////////////PROCEDIMIENTOS PARA DAR DE BAJA UN ELEMENTO EN TABLAS == UPDATE
    /////////////************************************************ */
    public function eliminarEmpleado($idEmpleado){
        $cnn = new conectar();
        $enlace = $cnn->conexion();

        $sql='UPDATE empleado SET estado= 0 WHERE id_empleado='.$idEmpleado.'';

        $resultado = $enlace->prepare($sql);
        echo $resultado->execute();
        //echo $sql;
        
    }

    public function eliminarCurso($idCurso){
        $cnn = new conectar();
        $enlace = $cnn->conexion();

        $sql='UPDATE curso SET estado= 0 WHERE id_curso='.$idCurso.'';

        $resultado = $enlace->prepare($sql);
        echo $resultado->execute();
        //echo $sql;
        
    }

    //////////************************************************** */
     //////////////////PROCEDIMIENTOS PARA BRINDAR TABLAS DEREPORTES == SELECT
    /////////////************************************************ */
    
    public function reporteAsignacionPorAlumno($id_alumno, $periodo){
        $cnn = new conectar();
        $enlace = $cnn->conexion();
        $sql='select estu.cui, estu.nombre, estu.carne, enca.fecha, deta.id_curso, curs.codigo_curso, curs.descripcion, enca.periodo
        from estudiante estu, enca_inscripcion enca, detalle_inscripcion deta, curso curs 
        where enca.id_estudiante = estu.id_estudiante 
        and deta.id_enca_inscripcion = enca.id_enca_inscripcion 
        and deta.id_curso = curs.id_curso 
        and estu.cui="'.$id_alumno.'" and enca.periodo="'.$periodo.'"';
        $resultado = $enlace->prepare($sql);
        $resultado->execute();
        $row = $resultado->rowCount();
        if($row!=0){
            $Asignaciones = $resultado->fetchAll(PDO::FETCH_ASSOC);
            return $Asignaciones;
        }else{
            return 0;
        }

        
        
    }

}

?>