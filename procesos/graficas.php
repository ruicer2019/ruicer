
    <?php 

        include '../Clases/conexion.php';
        $cnn = new conectar();
        $enlace = $cnn->conexion(); 
        
        $sql='Select count(*) as Activos, (select count(*)  from empleado where estado =0) as Inactivos from empleado where estado =1';
        $consulta = $enlace->prepare($sql);
        $consulta->execute();
        $activos = $consulta->fetch(PDO::FETCH_ASSOC);

        ?>


<div id="container"></div>

<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'variablepie'
    },
    title: {
        text: 'Empleados Activos en la escuela Mariano Galvez'
    },
    tooltip: {
        headerFormat: '',
        pointFormat: '<span style="color:{point.color}">\u25CF</span> <b> {point.name}</b><br/>' +
            'Activos (total): <b>{point.y}</b><br/>'
    },
    series: [{
        minPointSize: 50,
        innerSize: '80%',
        zMin: 0,
        name: 'Empleado',
        data: [{
            name: 'Empleado Activos',
            y: <?php echo $activos['Activos']; ?>,
        }, {
            name: 'Empleado Inactivos',
            y: <?php echo $activos['Inactivos']; ?>
        }]
    }]
});
</script>