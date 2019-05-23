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
                        <h4><i class="fas fa-user-friends"></i> Datos de Empleados</h4>
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
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-users"></i> Agregar Nuevo Empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form id="frmAgregarEmpleado">
            <div class="form-group">
                <label for="cui">Cui</label>
                <input type="text" name="cui" id="cui" class="form-control" placeholder="Digite cui del empleado" aria-describedby="helpId">
            </div>

            <div class="form-group">
                <label for="Nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Digite nombre del empleado" aria-describedby="helpId">
            </div> 

            <div class="form-group">
                <label for="Apellido">Apellido</label>
                <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Digite apellido del empleado" aria-describedby="helpId">
            </div> 
              
            <div class="form-group">
                <label for="fec_nac">Fecha de Nacimiento</label>
                <input type="date" name="fecnac" id="fecnac" class="form-control" placeholder="" aria-describedby="helpId">
            </div>

            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" placeholder="********" aria-describedby="helpId">  
            </div>

            <div class="form-group">
              <label for="Apellido">Puesto</label>
              <select name="puesto" id="puesto" class="form-control">
                <option value="0">Seleccione</option>
                  <?php 
                    require_once('datos_tablas.php');
                    $datos = new obtenerDatos();
                    $puesto = $datos->consultaPuesto();
                    foreach ($puesto as $key => $valor) {
                      echo '<option value='.$valor['id_puesto'].'>'.$valor['Descripcion'].'</option>';
                    }
                  ?> 
                </select>
              </div>
            
            <div class="form-group">
              <label for="Apellido">Escuela</label>
              <select name="escuela" id="escuela" class="form-control">
                <option value="0">Seleccione</option>
                  <?php 
                    require_once('datos_tablas.php');
                    $datos = new obtenerDatos();
                    $Escuela = $datos->consultaEscuela();
                    $i = 0;
                    foreach ($Escuela as $key => $valor) {
                      echo '<option value='.$valor['id_escuela'].'>'.$valor['descripcion'].'</option>';
                    }
                  ?> 
                </select>
              </div>

              <input type="text" hidden="" id="estado" name="estado" value="1">
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarEmpleado">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal para editar empleado-->
<div class="modal fade" id="editarEmpleadoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-users"></i>Actualizar Empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form id="frmEditarEmpleado">
            <input type="text" hidden="" id="idEmpleado" name="idEmpleado">
            <div class="form-group">
                <label for="cui">Cui</label>
                <input type="text" name="cuiU" id="cuiU" class="form-control" placeholder="Digite cui del empleado" aria-describedby="helpId">
            </div>

            <div class="form-group">
                <label for="Nombre">Nombre</label>
                <input type="text" name="nombreU" id="nombreU" class="form-control" placeholder="Digite nombre del empleado" aria-describedby="helpId">
            </div> 

            <div class="form-group">
                <label for="Apellido">Apellido</label>
                <input type="text" name="apellidoU" id="apellidoU" class="form-control" placeholder="Digite apellido del empleado" aria-describedby="helpId">
            </div> 
              
            <div class="form-group">
                <label for="fec_nac">Fecha de Nacimiento</label>
                <input type="date" name="fecnacU" id="fecnacU" class="form-control" placeholder="" aria-describedby="helpId">
            </div>

            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" name="telefonoU" id="telefonoU" class="form-control" placeholder="********" aria-describedby="helpId">  
            </div>

            <div class="form-group">
              <label for="puesto">Puesto</label>
              <select name="puestoU" id="puestoU" class="form-control">
                <option value="0">Seleccione</option>
                  <?php 
                    require_once('datos_tablas.php');
                    $datos = new obtenerDatos();
                    $puesto = $datos->consultaPuesto();
                    foreach ($puesto as $key => $valor) {
                      echo '<option value='.$valor['id_puesto'].'>'.$valor['Descripcion'].'</option>';
                    }
                  ?> 
                </select>
              </div>
            
            <div class="form-group">
              <label for="escuela">Escuela</label>
              <select name="escuelaU" id="escuelaU" class="form-control">
                <option value="0">Seleccione</option>
                  <?php 
                    require_once('datos_tablas.php');
                    $datos = new obtenerDatos();
                    $Escuela = $datos->consultaEscuela();
                    $i = 0;
                    foreach ($Escuela as $key => $valor) {
                      echo '<option value='.$valor['id_escuela'].'>'.$valor['descripcion'].'</option>';
                    }
                  ?> 
                </select>
              </div>
              
              <input type="text" hidden="" id="estado" name="estadoU" value="1">
              
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
        $('#guardarEmpleado').click(function(){
          datos = $('#frmAgregarEmpleado').serialize();
            $.ajax({
              type: "POST",
              url: "agregar.php",
              data: datos,
              success: function (response) {
                if(response==1){
                  $('#tablaDatatable').load('tableEmpleado.php');
                  alertify.success("Agregado Correctamente");
                }else{
                  alertify.error("Revisar datos insertados , <br>1.recuerde que no es posible tener 2 cui iguales, <br>2. Los datos estan incompletos");
                }
              }
            });
        });

        $('#btnActualizar').click(function(){
          datos = $('#frmEditarEmpleado').serialize();
            $.ajax({
              type: "POST",
              url: "actualizar.php",
              data: datos,
              success: function (response) {
                if(response==1){
                  $('#tablaDatatable').load('tableEmpleado.php');
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
        $('#tablaDatatable').load('tableEmpleado.php');
    });
</script>

<script type="text/javascript">

    function agregarfrmActualizar(idEmpleado) {
        $.ajax({
          type: "POST",
          data:"idEmpleado="+ idEmpleado,
          url: "obtenerDatos.php",
          success: function (response) {
            datos = jQuery.parseJSON(response);
            $('#idEmpleado').val(datos['id_empleado']);
            $('#cuiU').val(datos['cui']);
            $('#nombreU').val(datos['nombre']);
            $('#apellidoU').val(datos['apellido']);
            $('#fecnacU').val(datos['fec_nac']);
            $('#telefonoU').val(datos['telefono']);
            $('#puestoU').val(datos['id_puesto']);
            $('#escuelaU').val(datos['id_escuela']);
          }
        });
    }

    function eliminarEmpleado(idEmpleado) {
      alertify.confirm('Elimnar Empleado', '¿Esta seguro de eliminar este Empleado?', 
            function(){ 
              $.ajax({
              type: "POST",
              data:"idEmpleado="+ idEmpleado,
              url: "eliminar.php",
              success: function (response) {
                if(response==1){
                  $('#tablaDatatable').load('tableEmpleado.php');
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

