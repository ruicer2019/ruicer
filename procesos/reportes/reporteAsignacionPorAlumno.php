<?php 
    require_once "../../Clases/conexion.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Asignacion por Alumno</title>
    <link rel="stylesheet" href="../../librerias/Bootstrap/bootstrap.min.css">

        <!-- //
        // ──────────────────────────────────────────────────────────────────────────────────── I ──────────
        //   :::::: E S T I L O   D E   L A   D A T A T A B L E : :  :   :    :     :        :          :
        // ──────────────────────────────────────────────────────────────────────────────────────────────
        // -->

        <link rel="stylesheet" href="../../librerias/datatable/bootstrap.css">
        <link rel="stylesheet" href="../../librerias/datatable/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../../css/estilos.css">


        <!-- //
        // ────────────────────────────────────────────────────────────────────────────────────── I ──────────
        //   :::::: L I B R E R I A S   P A R A   A L E R T I F Y : :  :   :    :     :        :          :
        // ────────────────────────────────────────────────────────────────────────────────────────────────
        // -->
        <link rel="stylesheet" href="../../librerias/alertify/css/alertify.css">
        <link rel="stylesheet" href="../../librerias/alertify/css/themes/bootstrap.css">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <!-- //
        // ────────────────────────────────────────────────────────────────────────────── I ──────────
        //   :::::: L I B R E R I A S   G E N E R A L E S : :  :   :    :     :        :          :
        // ────────────────────────────────────────────────────────────────────────────────────────
        // -->


        <script src="../../librerias/jquery.min.js"></script>

        <script src="../../librerias/Bootstrap/popper.min.js"></script>

        <script src="../../librerias/Bootstrap/bootstrap.min.js"></script>

        <!-- //
        // ────────────────────────────────────────────────────────────────────────────────── I ──────────
        //   :::::: S C R I P T R S   D E   D A T A T A B L E : :  :   :    :     :        :          :
        // ────────────────────────────────────────────────────────────────────────────────────────────
        // -->

        <script src="../../librerias/datatable/jquery.dataTables.min.js"></script>
        <script src="../../librerias/datatable/dataTables.bootstrap4.min.js"></script>

        <!-- //
        // ────────────────────────────────────────────────────────────────────────────── I ──────────
        //   :::::: S C R I P T S   D E   A L E R T I F Y : :  :   :    :     :        :          :
        // ────────────────────────────────────────────────────────────────────────────────────────
        // -->

        <script src="../../librerias/alertify/alertify.js"></script>
</head>
<body>
    <div class="container">
        <form id="reporteAsignacionPorAlumno">
        <div class="form-group">
                        <label for="periodo">Periodo</label>
                        <select name="periodo" id="periodo" class="form-control">
                        <option value="0">Seleccione</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="estudiante">Estuante</label>
                        <select name="estudiante" id="estudiante" class="form-control">
                        <option value="0">Seleccione</option>
                        <?php 
                        
                        $cnn = new conectar();
                        $enlace = $cnn->conexion();
                        $sql = "Select * from estudiante where estado=1";
                        $resultado = $enlace->prepare($sql);
                        $resultado->execute();
                        $estudiante=$resultado->fetchAll(PDO::FETCH_ASSOC);
            
                        foreach ($estudiante as $key => $valor) {
                        echo '<option value='.$valor['cui'].'>'.$valor['nombre'].'</option>';
                        }
                        ?> 
                        </select>
                    </div>
        </form>
        <button class="btn btn-primary btn-sm" id="BuscarAsignacion">Consultar</button>
    </div>
    <br>
    <hr>
        <table class="table table-hover table-condensed table-bordered" style="font-size: 13px;" id="iddatatable">
        <thead style="background-color: #190BF5; color: white; font-ewight: bold;">
            <tr>
                <td>Cui Estudiante</td>
                <td>Nombre Estudiante</td>
                <td>Carne Estudiante</td>
                <td>Fecha signacion</td>
                <td>Codigo Curso</td>
                <td>nombre Curso</td>
                <td>Periodo</td>
            </tr>
        </thead>
        
        <tfoot style="background-color: #918FA3; color: white; font-ewight: bold;">
            <tr>
            <td>Cui Estudiante</td>
                <td>Nombre Estudiante</td>
                <td>Carne Estudiante</td>
                <td>Fecha signacion</td>
                <td>Codigo Curso</td>
                <td>nombre Curso</td>
                <td>Periodo</td>
            </tr>
            </tr>
        </tfoot>  

        <tbody  style="background-color: white;" id="tableBody">
       
        </tbody>
    </table>
<br>
<br>
<br>
<a href="../usuario/index.php"><button type="button" class="btn btn-default"><i class="fas fa-times-circle"></i> Inicio</button></a>
                      
</body>
</html>

<script type="text/javascript">
$(document).ready(function(){
    $('#BuscarAsignacion').click(function(){
        datos = $('#reporteAsignacionPorAlumno').serialize();
        $.ajax({
            type: "POST",
            url: "../obtenerDatos.php",
            data: datos,
            success: function (response) {
                //alert(response);
                if(response != 0){
                data = jQuery.parseJSON(response);
                var valor = '';
                var i=0;
                   data.forEach(product => {
                    
                    valor += "<tr>"+
                    '<td>' + data[i].cui + '</td>' +
                    '<td>' + data[i].nombre + '</td>' +
                    '<td>' + data[i].carne + '</td>' +
                    '<td>' + data[i].fecha + '</td>' +
                    '<td>' + data[i].codigo_curso + '</td>' +
                    '<td>' + data[i].descripcion + '</td>' +
                    '<td>' + data[i].periodo + '</td>' +
                    '</tr>';
                    i++;
                  $("#tableBody").html(valor);
            });
            }else{
                alertify.error("Sin datos de Alumno segun los fitros establecidos");
            }
            }
        });
    });
});
</script>