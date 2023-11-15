<?php

    /*         Punto 5        */
    // solicitarNumeroEntre()
    //wordix.php

    /*         Punto 6        */
    /**
     * Muestra una partida dependiendo del numero ingresado
     * @param INT $num
     * @param ARRAY $coleccion
     */
    function mostrarPartidas($num, $coleccion){
        
        echo "*********************** Partida WORDIX N°".($num+1)." ***********************\n";
        echo "Palabra: ".$coleccion[$num]["palabraWordix"].".\n";
        echo "Jugador: ".$coleccion[$num]["jugador"].".\n";
        echo "Puntaje: ".$coleccion[$num]["puntaje"].".\n";
        echo "Intento:";
        if (($coleccion[$num]["puntaje"])>0){
            echo " Adivino la palabra en ".$coleccion[$num]["intentos"]." intentos.\n";
        }else{
            echo " El jugador ".$coleccion[$num]["jugador"]." no divino la palabra.\n";
        } 
        echo "******************************************************************\n";
        
    }


    /*         Punto 7        */
    /**
     * Agrega una palabra un arreglo
     * @param ARRAY $coleccion
     * @param STRING $palabra
     * @return ARRAY
     */
    function agregarPalabra($coleccion, $palabra){

        $coleccion[] = $palabra;//array_push

        return $coleccion;
    }
    
    
    
    /*         Punto 8          */
    /**
     * Dada una coleccion de partidas y el nombre de un jugador 
     * retorna la primera partida ganada, sino -1
     * @param ARRAY $coleccion 
     * @param STRING $nombre
     * @return INT
     */
    function primerPartida($coleccion, $nombre){
        //INT $indice, $i

        $nombre = strtolower($nombre);
        $indice = -1;
        $i=0;

        while($i < count($coleccion) && $indice == -1){
            if(($coleccion[$i]["jugador"])==$nombre){
                $indice = $i;
            }
            $i++;
        }

        return $indice;
    }

    /**          Punto 9        */
?>