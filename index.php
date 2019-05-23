<?php
    session_start();
    //print_r($_SESSION['usuario']['Tipo_usuario']);
    if(isset($_SESSION['usuario'])){
        if($_SESSION['usuario']['Tipo_usuario']==1){
            header('Location:procesos/admin/');

        }else if($_SESSION['usuario']['Tipo_usuario']==2){
            header('Location:procesos/usuario/');
        }
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    

    <title>Login - School</title>
</head>
<body>
    <div class="error" >
        Datos de Ingreso no Validos, Intentelo Nuevamente
    </div>
<div class="container">
    <div class="main">
        
        <form method="POST" id="formlogin">
            <legend>Datos de Ingreso</legend>
            <div class="form-group">
                <label for="">Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingresar Usuario" required pattern="[A-Za-z0-9_-]{1,15}" >
                <label for="">Contraseña</label>
                <input type="password" class="form-control" id="Password" name="password" placeholder="Ingresar Contraseña" required pattern="[A-Za-z0-9_-]{1,15}">
            </div>
            <input type="submit" class="btn btn-primary" id="boton" value="Iniciar Sesion">
            <i class="fa fa-refresh fa-spin"></i>
        </form>
        
    </div>
    </div>

    <script src="js/jquery-3.4.0.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>