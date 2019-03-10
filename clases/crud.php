<?php
        class crud{
            
            public function obtenDatos($numero_solicitud_sd){
                echo $num_sd;
                $obj = new conectar();
                $conexion = $obj->conexion();
                
                $sql= "SELECT * FROM Olas WHERE numero_solicitud_sd = '$numero_solicitud_sd'";
                
                $result=mysqli_query($conexion,$sql);
                $ver =mysqli_fetch_row($result);
                
                $datos=array(
                    'num_sd'=>$ver[1],
                    'estado'=>$ver[2],
                    'servicio'=>$ver[3],
                    'grupo'=>$ver[4],
                    'fecha_programada'=>$ver[5],
                    'fecha_apertura_lla'=>$ver[6],
                    'numinicidente'=>$ver[7],
                    'empresa'=>$ver[8],
                    'fecha_solucion'=>$ver[9],
                    'update_time'=>$ver[10],
                    'cumplio_ans'=>$ver[11],
                    'asignatario_inc'=>$ver[12],
                    'fecha_cierre_inc'=>$ver[13],
                    'fecha_apertura_inc'=>$ver[14],
                    'tiempo_escalamiento'=>$ver[15],
                    'cumple_escalamiento'=>$ver[16],
                        
                );

                return $datos;
            }
        }


?>