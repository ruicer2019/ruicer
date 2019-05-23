<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cursos</title>
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
                        <h4><i class="fas fa-user-friends"></i> Datos de Curso</h4>
                    </div>
                        <div class="card-body">
                            <span class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEmpleado"><i class="fas fa-plus-circle"></i> Agregar Nuevo</span>
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

<!-- //
// ────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────── I ──────────
//   :::::: V E N T A N A   E M E R G E N T E   P A R A   A G R E G A R   N U E V O   E M P L E A D O : :  :   :    :     :        :          :
// ────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────
// -->


<!-- Modal para agregar empleado-->
<div class="modal fade" id="modalEmpleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                <label for="codigoCurso">Codigo Curso</label>
                <input type="text" name="codigoCurso" id="codigoCurso" class="form-control" placeholder="Digite Codigo" aria-describedby="helpId">
            </div>

            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Digite Descripcion" aria-describedby="helpId">
            </div>

            <div class="form-group">
                <label for="horario">horario</label>
                <input type="text" name="horario" id="horario" class="form-control" placeholder="Digite Horario" aria-describedby="helpId">
            </div> 

              <input type="text" hidden="" id="estado" name="estado" value="1">
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarCurso">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal para editar empleado-->
<div class="modal fade" id="editarEmpleadoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-users"></i>Actualizar Curso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form id="frmEditar">
            <input type="text" hidden="" id="idCurso" name="idCurso">

            <div class="form-group">
                <label for="codigoCurso">Codigo Curso</label>
                <input type="text" name="codigoCursoU" id="codigoCursoU" class="form-control" placeholder="Digite Codigo" aria-describedby="helpId">
            </div>

            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" name="descripcionU" id="descripcionU" class="form-control" placeholder="Digite descripcion" aria-describedby="helpId">
            </div>

            <div class="form-group">
                <label for="horario">horario</label>
                <input type="text" name="horarioU" id="horarioU" class="form-control" placeholder="Digite nombre Horario" aria-describedby="helpId">
            </div> 

              <input type="text" hidden="" id="estadoU" name="estadoU" value="1">
              
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-warning" id="btnActualizar" data-dismiss="modal">Actualizar</button>
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
    $(document).ready(function(){
        $('#guardarCurso').click(function(){
          datos = $('#frmAgregar').serialize();
            $.ajax({
              type: "POST",
              url: "agregar.php",
              data: datos,
              success: function (response) { 
                //console.log(datos);
                alert(response);
                  if(response==1){
                  $('#tablaDatatable').load('tableCurso.php');
                  alertify.success("Agregado Correctamente");
                }else{
                  alertify.error("Revisar datos insertados , <br>1.recuerde que no es posible tener 2 codigos de curso iguales, <br>2. Los datos estan incompletos");
                }
              }
            });
        });

        $('#btnActualizar').click(function(){
          datos = $('#frmEditar').serialize();
            $.ajax({
              type: "POST",
              url: "actualizar.php",
              data: datos,
              success: function (response) {
                if(response==1){
                  $('#tablaDatatable').load('tableCurso.php');
                  alertify.success("Actualizado Correctamente");
                }else{
                  alertify.error("Fallo en el Servidor :(");
                }
              }
            });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaDatatable').load('tableCurso.php');
    });
</script>

<script type="text/javascript">

    function agregarfrmActualizar(idCurso) {
        $.ajax({
          type: "POST",
          data:"idCurso="+ idCurso,
          url: "obtenerDatos.php",
          success: function (response) {
            datos = jQuery.parseJSON(response);
            $('#idCurso').val(datos['id_curso']);
            $('#codigoCursoU').val(datos['codigo_curso']);
            $('#descripcionU').val(datos['descripcion']);
            $('#horarioU').val(datos['horario']);
            $('#estadoU').val(datos['estado']);
          }
        });
    }

    function eliminarCurso(idCurso) {
      alertify.confirm('Elimnar Curso', '¿Esta seguro de eliminar este Curso?', 
            function(){ 
              $.ajax({
              type: "POST",
              data:"idCurso="+ idCurso,
              url: "eliminar.php",
              success: function (response) {
                //alert(response);
                if(response==1){
                  $('#tablaDatatable').load('tableCurso.php');
                  alertify.success("Eliminado Correctamente");
                }else{
                  alertify.error("No es posible eliminar el usuario :(");
                }       
              }
              
              });
            },function(){

            });
    }

    
</script>