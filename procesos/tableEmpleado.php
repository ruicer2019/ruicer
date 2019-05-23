<?php
    session_start();

    ?>

<div>
    <table class="table table-hover table-condensed table-bordered" style="font-size: 13px;" id="iddatatable">
        <thead style="background-color: #190BF5; color: white; font-ewight: bold;">
            <tr>
                <td>Cui</td>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Fec_Nac</td>
                <td>Telefono</td>
                <td>Puesto</td>
                <td>Escuela</td>
                <td>Editar</td>
                <?php if($_SESSION['usuario']['Tipo_usuario']!= 2){?>
                <td>Eliminar</td>
                <?php }?>
            </tr>
        </thead>
        
        <tfoot style="background-color: #918FA3; color: white; font-ewight: bold;">
            <tr>
                <td>Cui</td>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Fec_Nac</td>
                <td>Telefono</td>
                <td>Puesto</td>
                <td>Escuela</td>
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
            $empleado = $datos->obtenerEmpleados();
            foreach($empleado as $key => $valor){
            ?>
            <tr>
                <td><?php echo $empleado[$key]['cui'];?></td>
                <td><?php echo $empleado[$key]['nombre'];?></td>
                <td><?php echo $empleado[$key]['apellido'];?></td>
                <td><?php echo $empleado[$key]['fec_nac'];?></td>
                <td><?php echo $empleado[$key]['telefono'];?></td>
                <td><?php echo $empleado[$key]['puesto'];?></td>
                <td><?php echo $empleado[$key]['escuela'];?></td>
                <td style="text-align: center;"><button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editarEmpleadoModal" onclick="agregarfrmActualizar('<?php echo $empleado[$key]['id_empleado'];?>')"><i class="fas fa-pencil-alt"></i></button></td>

                <?php if($_SESSION['usuario']['Tipo_usuario']!= 2){?>
                    <td style="text-align: center;"><button class="btn btn-danger btn-sm" onclick="eliminarEmpleado('<?php echo $empleado[$key]['id_empleado'];?>')"><i class="fas fa-trash-alt"></i></button></td>    
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