<?php 
    class conectar
    {
        public function conexion(){
            $server = "localhost";
            $usuario = "root";
            $contraseña= "";
            $db_name = "escuela";
            try {
                $cnn = new PDO('mysql:host='.$server.';dbname='.$db_name.'',$usuario,$contraseña);         

            } catch (\Throwable $th) {
                print "Fallo en conexion erro: " . $th->getmessage(). "<br/>";
            }
            
            return $cnn;
        } 
    }

    // $prueba_conexion = new conectar();
    // $prueba = $prueba_conexion->conexion();
    // if($prueba){
    //     echo "conectado";
    // }else{
    //     echo "error";
    // }
    
?>