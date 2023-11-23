<?php
    include_once("wordix.php");



    /**************************************/
    /***** DATOS DE LOS INTEGRANTES *******/
    /**************************************/

    /* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
    /* Fernandez Rocio FAI-4123 TUDW rayelen.fernandez@est.fi.uncoma.edu.ar Rocio-Ayelen-Fernandez */
    /* Russo Florencia FAI-4911 TUDW russoflorencia96@est.fi.uncoma.edu.ar FlorenciaRusso9606 */
    /* ****COMPLETAR***** */



    $coleccionPartidas=[];


    /**************************************/
    /***** DEFINICION DE FUNCIONES ********/
    /**************************************/

    /**
     * Una función llamada cargarColeccionPalabras, que inicialice una estructura de datos con ejemplos de 
     * Palabras de 5 letras en mayúsculas y que retorne la colección de palabras descripta en la 
     * sección EXPLICACION 2. Mínimo debe cargar 15 palabras.
     * @return ARRAY
     */
    function cargarColeccionPalabras(){
        $coleccionPalabras = [
            "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
            "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
            "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
            "RATAS", "PERRO", "HILOS", "PALAS", "ERIZO", 
            "PILAR", "GANZO", "RATON", "CARGO", "PASTO"
            
        ];

        return ($coleccionPalabras);
    }
    

    /**
     * Función llamada cargarPartidas, que inicialice una estructura de datos con ejemplos de Partidas y que
     * retorne la colección de partidas descripta 
     * @param ARRAY $colPartidas
     * @return ARRAY
     */
    function cargarPartidas($colPartidas){
        //
        // Partida 0
        $partida0 = ["palabraWordix "=> "QUESO" , "jugador" => "Majo", "intentos"=> 0, "puntaje" => 0];
        
        // Partida 1
        $partida1 = ["palabraWordix "=> "CASAS" , "jugador" => "Flor", "intentos"=> 3, "puntaje" => 14];

        // Partida 2
        $partida2 = ["palabraWordix "=> "QUESO" , "jugador" => "Matias", "intentos"=> 6, "puntaje" => 10];

        // Partida 3
        $partida3 = ["palabraWordix" => "MUJER", "jugador" => "Flor", "intentos" => 4, "puntaje" => 12];

        // Partida 4
        $partida4 = ["palabraWordix" => "FUEGO", "jugador" => "Fede", "intentos" => 5, "puntaje" => 15];

        // Partida 5
        $partida5= ["palabraWordix" => "GATOS", "jugador" => "Majo", "intentos" => 3, "puntaje" => 14];

        // Partida 6
        $partida6 = ["palabraWordix" => "RASGO", "jugador" => "Ayelen", "intentos" => 4, "puntaje" => 10];

        // Partida 7
        $partida7 = ["palabraWordix" => "GOTAS", "jugador" => "Rocio", "intentos" => 4, "puntaje" => 12];

        // Partida 8
        $partida8 = ["palabraWordix" => "HUEVO", "jugador" => "Fede", "intentos" => 5, "puntaje" => 15];

        // Partida 9
        $partida9 = ["palabraWordix" => "TINTO", "jugador" => "Lolo", "intentos" => 3, "puntaje" => 18];

        // Partida 10
        $partida10 = ["palabraWordix" => "NAVES", "jugador" => "Pato", "intentos" => 5, "puntaje" => 16];

        $colPartidas[0]= $partida0;
        $colPartidas[1]= $partida1;
        $colPartidas[2]= $partida2;
        $colPartidas[3]= $partida3;
        $colPartidas[4]= $partida4;
        $colPartidas[5]= $partida5;
        $colPartidas[6]= $partida6;
        $colPartidas[7]= $partida7;
        $colPartidas[8]= $partida8;
        $colPartidas[9]= $partida9;
        $colPartidas[10]= $partida10;

        return $colPartidas;

    }


    /* ****COMPLETAR***** */



    /**************************************/
    /*********** PROGRAMA PRINCIPAL *******/
    /**************************************/

    //Declaración de variables:
    //ARRAY $coleccionPartidas, $ColPal
    //STRING $partida
    //INT $opcion


    //Inicialización de variables:
    $coleccionPartidas = cargarPartidas($coleccionPartidas);
    $coleccionPalabras = cargarColeccionPalabras();

    //Proceso:
    
    //$partida = jugarWordix("MELON", strtolower("Aye"));
    //print_r($partida);
    //imprimirResultado($partida);

    /**La estructura switch es utilizada para comparar la misma variable (en este caso sería la variable $opcion) con muchos valores diferentes (las distintas opciones que existen en la función menu), y ejecuta una parte de código dependiendo el valor que coincide con el valor de la expresión. Switch ejecuta sentencia por sentencia hasta el final del bloque o hasta la primera vez que vea una sentencia break. Si no se escribe una sentencia break al final de la lista de sentencias de un caso, PHP seguirá ejecutando las sentencias del caso siguiente.
     * 
     Esta estructura de control de selección múltiple se utiliza cuando se desea tomar decisiones basadas en el valor de una expresión. En lugar de escribir varias declaraciones if anidadas, puedes utilizar switch para hacer el código más limpio y estructurado.
    */
    $nombre = solicitarJugador();
    do {
        $opcion = seleccionarOpcion(1, 8);

    
        switch ($opcion) {
            case 1: // Seleccionaste la opción 1: Jugar al wordix con una palabra elegida
                              
                echo "\nOpcion elegida: 1. Jugar Wordix con una palabra elegida\n";
                echo "Ingrese un numero de palabra";
                $numPalabra= solicitarNumeroEntre(0, (count($coleccionPalabras))-1);
                $encontrado= palabraUtilizada($coleccionPalabras, $coleccionPartidas, $numPalabra);

                while($encontrado==1){
                    echo "La palabra ya fue utilizada\n";
                    echo "Ingrese otro numero\n";
                    $numPalabra= solicitarNumeroEntre(0, (count($coleccionPalabras))-1);
                    $encontrado= palabraUtilizada($coleccionPalabras, $coleccionPartidas, $numPalabra);
                }
                $coleccionPartidas[count([$coleccionPartidas])]=jugarWordix($coleccionPalabras[$numPalabra], $nombre);
                
                break;
            case 2: // Seleccionaste la opción 2: Jugar al wordix con una palabra aleatoria

                
                echo "\nOpcion elegida: 2. Jugar Wordix con una palabra aleatoria\n";
                $indiceArreglo= array_rand($coleccionPalabras, 1);
                $encontrado= palabraUtilizada($coleccionPalabras, $coleccionPartidas, $indiceArreglo);

                while($encontrado==1){
                    $indiceArreglo= array_rand($coleccionPalabras, 1);
                    $encontrado= palabraUtilizada($coleccionPalabras, $coleccionPartidas, $indiceArreglo);
                }

                $coleccionPartidas[count([$coleccionPartidas])]=jugarWordix($coleccionPalabras[$indiceArreglo], $nombre);
                break;

            case 3:  // Seleccionaste la opción 3: Mostrar partida

                echo "\nOpcion elegida: 3. Mostrar Partida\n";

                echo "Ingrese un numero de partida";
                $indiceArreglo=solicitarNumeroEntre(0, (count([$coleccionPartidas]))-1);
                mostrarPartidas($indiceArreglo, $coleccionPartidas);

                break;
            case 4://Seleccionaste la opción 4: Mostrar la primer partida ganadora

                echo "\nOpcion elegida: 4. Mostrar la primera partida ganadora\n";
                $nombre = solicitarJugador();
                $indice = primerPartidaGanada($coleccionPartidas, $nombre);

                if ($indice != -1){
                    echo "Partida WORDIX ".(($indice)+1).": palabra ".$coleccionPartidas[$indice]["palabraWordix"]."\n";
                    echo "Jugador: ".$coleccionPartidas[$indice]["jugador"]."\n";
                    echo "Puntaje: ".$coleccionPartidas[$indice]["puntaje"]." puntos\n";
                    echo "Intento: Adivino la palabra en ".$coleccionPartidas[$indice]["intentos"]." intentos\n";
                }else{
                    echo "El jugador ".$nombre." no gano ninguna partida\n";
                }
                break;

            case 5: //Seleccionaste la opción 5: Mostrar resumen de Jugador
                $nombre = solicitarJugador();
                $indice = primerPartidaGanada($coleccionPartidas, $nombre);
                
                mostrarResumen($resumenJug, $nombre);
                
                break;
            case 6: //Seleccionaste la opción 6: Mostrar listado de partdias ordenadas por Jugador y por palabra
                
                //cargarPartidas($coleccionPartidas);

                break;
            case 7:  //Seleccionaste la opción 7: Agregar una palabra de 5 letras a Wordix
                $colPal= cargarColeccionPalabras();
                print_r($colPal);
                break;
            case 8: //Seleccionaste la opción 8:Salir
                break;
            default:
                echo "Error";
                break;
        }
    } while ($opcion !=8);
  
?>
