<?php
    session_start();
    //print_r($_SESSION['usuario']['Tipo_usuario']);

    if(isset($_SESSION['usuario'])){
        if($_SESSION['usuario']['Tipo_usuario']!= 1){
            header('Location: ../usuario/'); 
        }
    }else{
        header('Location: ../../');
    }

?>



<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Plataforma Usuario</title>
        <link rel="stylesheet" href="../librerias/Bootstrap/bootstrap.min.css">

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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Vincit</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" 
          data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
          aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" 
           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Mantenimientos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="../vista_empleado.php">Empledos</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../vista_curso.php">Cursos</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../vista_inscripcion.php">Incripcion</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" 
           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Reportes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="../reportes/reporteAsignacionPorAlumno.php">Reporte asignacion por Alumno</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"></a>
        </div>
      </li>
      
  </div>
</nav>

<br><br><br>
<a href="../Cerrar_sesion.php"><button type="button" class="btn btn-default"><i class="fas fa-times-circle"></i> Cerrar Sesion</button></a>
    </body>
</html>

