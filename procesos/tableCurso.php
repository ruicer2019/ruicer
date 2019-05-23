<?php
    session_start();

    ?>

<div>
    <table class="table table-hover table-condensed table-bordered" style="font-size: 13px;" id="iddatatable">
        <thead style="background-color: #190BF5; color: white; font-ewight: bold;">
            <tr>
                <td>Codigo Curso</td>
                <td>Descripcion</td>
                <td>Horario</td>
                <td>Estado</td>
                <td>Editar</td>
                <?php if($_SESSION['usuario']['Tipo_usuario']!= 2){?>
                <td>Eliminar</td>
                <?php }?>
            </tr>
        </thead>
        
        <tfoot style="background-color: #918FA3; color: white; font-ewight: bold;">
            <tr>
                <td>Codigo Curso</td>
                <td>Descripcion</td>
                <td>Horario</td>
                <td>Estado</td>
                <td>Editar</td>
                <?php if($_SESSION['usuario']['Tipo_usuario']!= 2){?>
                <td>Eliminar</td>
                <?php }?>
            </tr>
        </tfoot>

        <tbody  style="background-color: white;">
        <?php
            require_once 'datos_tablas.php';
            $datos = new obtenerDatos();
            $curso = $datos->obtenerCursos();
            foreach($curso as $key => $valor){
            ?>
            <tr>
                <td><?php echo $curso[$key]['codigo_curso'];?></td>
                <td><?php echo $curso[$key]['descripcion'];?></td>
                <td><?php echo $curso[$key]['horario'];?></td>
                
                <td><?php if($curso[$key]['estado']==1){echo "Activo";} ;?></td>
        
                <td style="text-align: center;"><button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editarEmpleadoModal" onclick="agregarfrmActualizar('<?php echo $curso[$key]['id_curso'];?>')"><i class="fas fa-pencil-alt"></i></button></td>

                <?php if($_SESSION['usuario']['Tipo_usuario']!= 2){?>
                    <td style="text-align: center;"><button class="btn btn-danger btn-sm" onclick="eliminarCurso('<?php echo $curso[$key]['id_curso'];?>')"><i class="fas fa-trash-alt"></i></button></td>    
                <?php }?>
                
            </tr>
            <?php }?>
        </tbody>

    </table>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#iddatatable').DataTable();
} );
</script>