<?php


include 'Clases/conexion.php';
$cnn = new conectar();
$enlace = $cnn->conexion(); 
$usuario = $_POST['usuario'];
$password = $_POST['password'];

sleep(2);
session_start();

$sql = "SELECT Usuario, Password, Tipo_usuario FROM USUARIO where Usuario = :usuario AND Password = :password";
$resultado = $enlace->prepare($sql);
$resultado -> bindParam(':usuario',$usuario,PDO::PARAM_STR);
$resultado -> bindParam(':password',$password,PDO::PARAM_STR);
$resultado->execute();
$cuenta = $resultado->rowCount();

if($cuenta == 1){
    $row = $resultado->fetch(PDO::FETCH_ASSOC);
    $_SESSION['usuario'] = $row;
    echo json_encode(array('error' => false, 'Tipo'=>$row['Tipo_usuario']));
}else{
    echo json_encode(array('error' => true));
}


//$resultado->debugDumpParams(); Muestra la sentencia SQL con los parametros ya trasladados por BindParam


/*
$resultado = $enlace->prepare($sql);
$resultado->execute();

while ($row = $resultado->fetch(PDO::FETCH_ASSOC)){
    echo "ID: ". $row['id_usuario']." | Nombre: ". $row['Nombre']." | . Usuario: ". $row['Usuario']." | Password: ". $row['Password']." | Tipo_Usuario: ". $row['Tipo_usuario']."<br>";
}*/


$resultado->closeCursor();