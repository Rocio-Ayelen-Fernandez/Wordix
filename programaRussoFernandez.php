<?php
    include_once("wordix.php");



    /**************************************/
    /***** DATOS DE LOS INTEGRANTES *******/
    /**************************************/

    /* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
    /* ****COMPLETAR***** */


    /**************************************/
    /***** DEFINICION DE FUNCIONES ********/
    /**************************************/

    /**
     * Obtiene una colección de palabras
     * @return array
     */
    function cargarColeccionPalabras(){
        $coleccionPalabras = [
            "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
            "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
            "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
            "RATAS", "PERRO", "HILOS", "PALAS", "ERIZO"
        ];

        return ($coleccionPalabras);
    }

    /* ****COMPLETAR***** */



    /**************************************/
    /*********** PROGRAMA PRINCIPAL *******/
    /**************************************/

    //Declaración de variables:
    //ARRAY $coleccionPartidas, $ColPal, $partida, $opcion



    //Inicialización de variables:
    $coleccionPartidas = [];
    $coleccionPartidas[0]=["palabraWordix" => "QUESO", "jugador" => "majo", "intentos" => 0, "puntaje" => 0];
    $coleccionPartidas[1]=["palabraWordix" => "CASAS", "jugador" => "rudolf", "intentos" => 3, "puntaje" => 14];
    $coleccionPartidas[2]=["palabraWordix" => "QUESO", "jugador" => "pink2000", "intentos" => 6, "puntaje" => 0];


    //Proceso:

    $partida = jugarWordix("MELON", strtolower("Aye"));
    //print_r($partida);
    //imprimirResultado($partida);


    /*do {
        $opcion = menu();

    
        switch ($opcion) {
            case 1: 
                //Jugar al wordix con ua palabra elegida
                break;
            case 2: 
                //Jugar al wordix con una palabra aleatoria
                break;
            case 3:
                //Mostrar partida
                break;
            case 4:
                //Mostrar la primer partida ganadora
                break;
            case 5: 
                //Mostrar resumen de Jugador
                break;
            case 6: 
                //Mostrar listado de partdias ordenadas por Jugador y por palabra

                cargarPartidas($coleccionPartidas);

                break;
            case 7:
                //Agregar una palabra de 5 letras a Wordix
                $colPal= cargarColeccionPalabras();
                print_r($colPal);
                break;
            case 8:
                //Salir
                break;
            default:
                //Mensaje de error
                break;
        }
    } while ($opcion != 3);
    */
?>
