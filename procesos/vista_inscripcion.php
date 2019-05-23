<?php
    session_start();
    //print_r($_SESSION['encabezado']);
    //echo"<br>";
    //print_r($_SESSION['cursos']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Empleados</title>
    <link rel="stylesheet" href="../librerias/Bootstrap/bootstrap.min.css">

        <!-- //
        // ──────────────────────────────────────────────────────────────────────────────────── I ──────────
        //   :::::: E S T I L O   D E   L A   D A T A T A B L E : :  :   :    :     :        :          :
        // ──────────────────────────────────────────────────────────────────────────────────────────────
        // -->

        <link rel="stylesheet" href="../librerias/datatable/bootstrap.css">
        <link rel="stylesheet" href="../librerias/datatable/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../css/estilos.css">


        <!-- //
        // ────────────────────────────────────────────────────────────────────────────────────── I ──────────
        //   :::::: L I B R E R I A S   P A R A   A L E R T I F Y : :  :   :    :     :        :          :
        // ────────────────────────────────────────────────────────────────────────────────────────────────
        // -->
        <link rel="stylesheet" href="../librerias/alertify/css/alertify.css">
        <link rel="stylesheet" href="../librerias/alertify/css/themes/bootstrap.css">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <!-- //
        // ────────────────────────────────────────────────────────────────────────────── I ──────────
        //   :::::: L I B R E R I A S   G E N E R A L E S : :  :   :    :     :        :          :
        // ────────────────────────────────────────────────────────────────────────────────────────
        // -->


        <script src="../librerias/jquery.min.js"></script>

        <script src="../librerias/Bootstrap/popper.min.js"></script>

        <script src="../librerias/Bootstrap/bootstrap.min.js"></script>

        <!-- //
        // ────────────────────────────────────────────────────────────────────────────────── I ──────────
        //   :::::: S C R I P T R S   D E   D A T A T A B L E : :  :   :    :     :        :          :
        // ────────────────────────────────────────────────────────────────────────────────────────────
        // -->

        <script src="../librerias/datatable/jquery.dataTables.min.js"></script>
        <script src="../librerias/datatable/dataTables.bootstrap4.min.js"></script>

        <!-- //
        // ────────────────────────────────────────────────────────────────────────────── I ──────────
        //   :::::: S C R I P T S   D E   A L E R T I F Y : :  :   :    :     :        :          :
        // ────────────────────────────────────────────────────────────────────────────────────────
        // -->

        <script src="../librerias/alertify/alertify.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card text-left">
                    <div class="card-header">
                        <h4><i class="fas fa-user-friends"></i> Datos de Inscripcion</h4>
                    </div>
                        <div class="card-body">
                            <span class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalCurso"><i class="fas fa-plus-circle"></i> Agregar Curso</span>
                            <span class="btn btn-warning btn-sm" onclick="ingresarDetalleAlumno()"><i class="fas fa-book-reader"></i> Inscribir Alumno</span>
                            <span class="btn btn-danger btn-sm" onclick="carcelarAsignacion()"><i class="fas fa-times-circle"></i> Cancelar</span>
                            <hr>
                            <div id="tablaDatatable">
                            </div>

                        </div>
                        
                        <div class="card-footer text-muted">
                            by Grupo Vincit
                        </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal para agregar Curso-->
<div class="modal fade" id="modalCurso" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-books"></i> Agregar Nuevo Curso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form id="frmAgregar">

             <div class="form-group">
             <td>
                    <div class="form-group">
                        <label for="Curso">Curso</label>
                        <select name="curso" id="curso" class="form-control">
                        <option value="0">Seleccione</option>
                        <?php 
                        require_once('datos_tablas.php');
                        $datos = new obtenerDatos();
                        $curso = $datos->obtenerCursos();
                        foreach ($curso as $key => $valor) {
                        echo '<option value='.$valor['id_curso'].'>'.$valor['descripcion'].'</option>';
                        }
                        ?> 
                        </select>
                    </div>
                </td>
            </div>

        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="agregarCurso()">Agregar</button>
      </div>
    </div>
  </div>
</div>


<br>
<br>
<br>
<a href="usuario/index.php"><button type="button" class="btn btn-default"><i class="fas fa-times-circle"></i> Inicio</button></a>



    </body>
</html>

<script type="text/javascript">

    function agregarCurso() {
        datos = $('#frmAgregar').serialize();
        $.ajax({
          type: "POST",
          data: datos,
          url: "obtenerDatos.php",
          success: function (response) {
              console.log(response);
            if(response==1){
                $('#tablaDatatable').load('tableInscripcion.php');
            }
            
          }
        });
    }

    function ingresarDetalleAlumno() {
        datos = $('#enca_Inscripcion').serialize();
        $.ajax({
          type: "POST",
          data: datos,
          url: "agregar.php",
          success: function (response) {
            //console.log(response);
            if(response==1){
                $('#tablaDatatable').load('tableInscripcion.php');
                alertify.success("Agregado Correctamente");
            }else{
                alertify.error("Revisar datos insertados , <br>1.Datos incompletos del alumno, <br>2. Datos inconpletos de cursos");
            }
            
          }
        });
    }

    function carcelarAsignacion() {
        <?php 
        unset($_SESSION["cursos"]);
        ?>
        window.location='vista_inscripcion.php';
    }
    

 </script>


<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaDatatable').load('tableInscripcion.php');
    });
</script>

