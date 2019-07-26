<?php

/* Chiphysi programación suscribete */
/* V 0.1 original */
/* Autor: Chiphysi  Autor: Jhonatan Cardona   */
/* Derechos de autor(Suscribete) */
 


include 'config.php'; 


$sql="SELECT * FROM eventos"; 


if ($conexion->query($sql)->num_rows)
{ 


    $datos = array(); 


    $i=0; 


    $e = $conexion->query($sql); 

    while($row=$e->fetch_array()) 
    {
        
        $datos[$i] = $row; 
        $i++;
    }

    
        echo json_encode(
                array(
                    "success" => 1,
                    "result" => $datos
                )
            );

    }
    else
    {
        
        echo "No hay datos"; 
    }


?>
