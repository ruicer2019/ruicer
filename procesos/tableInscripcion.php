<?php
    session_start();
    $cursos = array();
    if(isset($_SESSION['cursos'])){
        $cursos = $_SESSION['cursos'];
    }
?>


    <table class="table table-hover table-condensed table-bordered" style="font-size: 13px;" id="iddatatabledetalle">
        <thead style="background-color: #190BF5; color: white; font-ewight: bold;">
            <tr>
                <td>Codigo del Curso</td>
                <td>Curso Descripcion</td>
                <td>Horario de Curso</td>
            </tr>
        </thead>
        
        <tfoot style="background-color: #918FA3; color: white; font-ewight: bold;">
            <tr>
                <td>Codigo del Curs</td>
                <td>Curso Descripcion</td>
                <td>Horario de Curso</td>
            </tr>
        </tfoot>  

        <tbody  style="background-color: white;">
            
                <?php foreach ($cursos as $valor) { ?>
                   <tr>
                   <td><?php echo $valor['codigo_curso'];?></td>
                   <td><?php echo $valor['descripcion'];?></td>
                   <td><?php echo $valor['horario'];?></td>
                   </tr>
                <?php } ?>
                
            
        </tbody>
    </table>

    <form id="enca_Inscripcion">

<div>
    <table class="table table-hover table-condensed table-bordered" style="font-size: 13px;" id="iddatatable">
        <thead style="background-color: #190BF5; color: white; font-ewight: bold;">
            <tr>
                <td>Estudiante</td>
                <td>Grado</td>
                <td>Escuela</td>
                <td>Fecha de Asignacion</td>
                <td>Salon</td>
                <td>Periodo</td>
            </tr>
        </thead>
        
        <tfoot style="background-color: #918FA3; color: white; font-ewight: bold;">
            <tr>
                <td>Estudiante</td>
                <td>Grado</td>
                <td>Escuela</td>
                <td>Fecha De Asignacion</td>
                <td>Salon</td>
                <td>Periodo</td>
            </tr>
        </tfoot>  

        <tbody  style="background-color: white;">
       
            <tr>
            
                <td>
                
                    <div class="form-group">
                        <select name="estudiante" id="estudiante" class="form-control">
                        <option value="0">Seleccione</option>
                        <?php 
                        require_once('datos_tablas.php');
                        $datos = new obtenerDatos();
                        $estudiante = $datos->consultaEstudiante();
                        foreach ($estudiante as $key => $valor) {
                        echo '<option value='.$valor['id_estudiante'].'>'.$valor['nombre'].'</option>';
                        }
                        ?> 
                        </select>
                    </div>
                </td>

                <td>
                    <div class="form-group">
                        <select name="grado" id="grado" class="form-control">
                        <option value="0">Seleccione</option>
                        <?php 
                        require_once('datos_tablas.php');
                        $datos = new obtenerDatos();
                        $grado = $datos->consultaGrado();
                        foreach ($grado as $key => $valor) {
                        echo '<option value='.$valor['id_grado'].'>'.$valor['descripcion'].'</option>';
                        }
                        ?> 
                        </select>
                    </div>
                </td>
                
                <td>
                    <div class="form-group">
                        <select name="escuela" id="escuela" class="form-control">
                        <option value="0">Seleccione</option>
                        <?php 
                        require_once('datos_tablas.php');
                        $datos = new obtenerDatos();
                        $escuela = $datos->consultaEscuela();
                        foreach ($escuela as $key => $valor) {
                        echo '<option value='.$valor['id_escuela'].'>'.$valor['descripcion'].'</option>';
                        }
                        ?> 
                        </select>
                    </div>
                </td>

                <td>
                <div class="form-group">
                        <input type="date" name="fecha" id="fecha" class="form-control" placeholder="" aria-describedby="helpId">
                </td>

                <td>
                    <div class="form-group">
                        <select name="salon" id="salon" class="form-control">
                        <option value="0">Seleccione</option>
                        <?php 
                        require_once('datos_tablas.php');
                        $datos = new obtenerDatos();
                        $salon = $datos->consultaSalon();
                        foreach ($salon as $key => $valor) {
                        echo '<option value='.$valor['id_salon'].'>'.$valor['descripcion'].'</option>';
                        }
                        ?> 
                        </select>
                    </div>
            
                </td>

                <td>
                    <div class="form-group">
                        <select name="periodo" id="periodo" class="form-control">
                        <option value="0">Seleccione</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        </select>
                    </div>
            
                </td>
             
            </tr>
    
        </tbody>
    </table>
    </div>
    </form>


</div>

<script type="text/javascript">
$(document).ready(function() {
    //$('#iddatatable').DataTable();
    $('#iddatatabledetalle').DataTable();
} );
</script>