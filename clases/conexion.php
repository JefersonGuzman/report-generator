<?php

    class conectar {
        public function conexion(){
            $servidor='localhost';
            $usuario='jguzman07';
            $clave='';
            $bd='BASE_DE_DATO';
            $conexion=mysqli_connect($servidor,$usuario,$clave,$bd);
            
            return $conexion;
        }
    }
  /*  $obj = new conectar();
    if ($obj->conexion()){
        echo "Conectado";
    }*/

?>