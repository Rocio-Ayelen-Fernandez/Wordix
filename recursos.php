<?php
    /**
     * ****COMPLETAR***** documentación de la intefaz
     */
    function obtenerPuntajeWordix($intento, $palabra)  /* ****COMPLETAR***** parámetros formales necesarios */{
        //INT $puntaje
        switch($intento){
            case 1:
                $puntaje = 6 + puntajeLetra($palabra);
                break;
            case 2:
                $puntaje = 5 + puntajeLetra($palabra);
                break;                
            case 3:
                $puntaje = 4 + puntajeLetra($palabra);
                break;
            case 4:
                $puntaje = 3 + puntajeLetra($palabra);
                break;
            case 5:
                $puntaje = 2 + puntajeLetra($palabra);
                break;
            case 6:
                $puntaje = 1 + puntajeLetra($palabra);
                break;
        }

        return $puntaje;
        /* ****COMPLETAR***** cuerpo de la función*/
        return 0;
    }
    /**
     * Devuelve el puntaje dependiendo el tipo de letra en la palabra
     * @param STRING $palabra
     * @return INT
     */
    function puntajeLetra($palabra){
        //INT $largo, $puntaje
        //STRING $letraActual
        $largo = strlen($palabra);
        $puntaje = 0;

        for ($i=0; $i< $largo; $i++){
            $letraActual = $palabra[$i];
            echo $letraActual."\n";
            if($letraActual == "A" ||$letraActual == "E"||$letraActual == "I"||$letraActual == "O"||$letraActual == "U"){
                $puntaje= $puntaje+1;
                echo $puntaje." Vocal\n";
            }elseif($letraActual <= "M"){
                $puntaje =$puntaje +2;
                echo $puntaje." Menor a M\n";
            }else{
                $puntaje = $puntaje+3;
                echo $puntaje." Mayor a M\n";
            }
        }
        return $puntaje;
        
    }

    /**
     * Una función que dada la colección de partidas y el nombre de un jugador, retorne el resumen del
     * jugador 
     * @param ARRAY $colPartidas
     * @param ARRAY $nombreJugador
     * @return ARRAY*/
    function resumenJugador($colPartidas, $nombreJugador){ 
        // STRING $nombre
        // INT $partidas, $totalPuntaje, $victorias, $cantIntentos
        // FLOAT $porcentajeVictorias
        // ARRAY $adivinadas, $resumenJugador
        $resumenJugador=[];
        $nombre = $nombreJugador;
        $partidas = 0;
        $totalPuntaje = 0;
        $victorias= 0;
        $palabra ="";
        $adivinadas = [];
        $cantIntentos = 0;
        $intento =0;
        $puntajeIntento = 0;
        for($i=0; $i<count($colPartidas); $i++){
            if ($colPartidas[$i]["jugador"]== $nombreJugador){
                $partidas = $colPartidas[$i]["partidas"] +$partidas;
                $totalPuntaje =  $colPartidas[$i]["puntaje"] +$totalPuntaje;
                $intento = $colPartidas[$i]["intentos"];
                $palabra = $colPartidas[$i]["palabraWordix"];
                if ($colPartidas[$i]["partidas"]>0){
                  $victorias= $victorias + 1;
                }
                $puntajeIntento= obtenerPuntajeWordix($intento, $palabra);
                $adivinadas[]= $puntajeIntento;
                $cantIntentos = count($colPartidas[$i]["intentos"]);
                $porcentajeVictorias= ($victorias/$cantIntentos)/100;        
                $resumenJugador[]= ["nombre" => $nombre, "partidas"=> $partidas, "victorias" => $victorias, "porcentajeVictorias"=>$porcentajeVictorias, "adivinadas"=> $adivinadas];
            } 
                 
        }
     
    }

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

    /**          Punto 10        */
    /** Solicita al usuario el nombre de un jugador y retorna el nombre en minúsculas, asegurándose que dicho nombre comience con una letra */
    function solicitarJugador(){
        // STRING $nombreJugador, $letra
        echo "Ingrese su nombre:\n";
        $nombreJugador = trim(fgets(STDIN));
        $letra = $nombreJugador[0];
        while(!ctype_alpha($letra)){
            echo "Error, el nombre del jugador no comienza con una
            letra. Ingrese de vuelta su nombre: \n";
            $nombreJugador = trim(fgets(STDIN));
            $letra = $nombreJugador[0];
        }
        $nombreJugador = strtolower($nombreJugador);
        return $nombreJugador;            
    }
    
$nombre =solicitarJugador(); 
echo $nombre;
?>