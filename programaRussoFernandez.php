<?php
    include_once("wordix.php");



    /**************************************/
    /***** DATOS DE LOS INTEGRANTES *******/
    /**************************************/

    /* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
    /* Fernandez Rocio FAI-4123 TUDW rayelen.fernandez@est.fi.uncoma.edu.ar Rocio-Ayelen-Fernandez */
    /* Russo Florencia FAI-4911 TUDW russoflorencia96@est.fi.uncoma.edu.ar FlorenciaRusso9606 */
    /* ****COMPLETAR***** */



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
        $colPartidas[0]=["palabraWordix"=> "QUESO" , "jugador" => "majo", "intentos"=> 0, "puntaje" => 0];
        
        // Partida 1
        $colPartidas[1]= ["palabraWordix"=> "CASAS" , "jugador" => "flor", "intentos"=> 3, "puntaje" => 14];

        // Partida 2
        $colPartidas[2] = ["palabraWordix"=> "QUESO" , "jugador" => "matias", "intentos"=> 6, "puntaje" => 10];

        // Partida 3
        $colPartidas[3] = ["palabraWordix" => "MUJER", "jugador" => "flor", "intentos" => 4, "puntaje" => 12];

        // Partida 4
        $colPartidas[4] = ["palabraWordix" => "FUEGO", "jugador" => "fede", "intentos" => 5, "puntaje" => 15];

        // Partida 5
        $colPartidas[5]= ["palabraWordix" => "GATOS", "jugador" => "majo", "intentos" => 3, "puntaje" => 14];

        // Partida 6
        $colPartidas[6] = ["palabraWordix" => "RASGO", "jugador" => "ayelen", "intentos" => 4, "puntaje" => 10];

        // Partida 7
        $colPartidas[7] = ["palabraWordix" => "GOTAS", "jugador" => "rocio", "intentos" => 4, "puntaje" => 12];

        // Partida 8
        $colPartidas[8] = ["palabraWordix" => "HUEVO", "jugador" => "fede", "intentos" => 5, "puntaje" => 15];

        // Partida 9
        $colPartidas[9] = ["palabraWordix" => "TINTO", "jugador" => "lolo", "intentos" => 3, "puntaje" => 18];

        // Partida 10
        $colPartidas[10] = ["palabraWordix" => "NAVES", "jugador" => "pato", "intentos" => 5, "puntaje" => 16];

        return $colPartidas;

    }


    /**************************************/
    /*********** PROGRAMA PRINCIPAL *******/
    /**************************************/

    //Declaración de variables:
    //ARRAY $coleccionPartidas, $coleccionResumenJugador $coleccionPalabras
    //STRING $partida, $texto
    //INT $opcion, $indice
    //BOOLEAN $encontrado


    //Inicialización de variables

    $coleccionResumenJugador=[];
    echo count($coleccionResumenJugador)."\n";
    
    $coleccionPartidas=[];
    $coleccionPartidas = cargarPartidas($coleccionPartidas);
    $coleccionPalabras = cargarColeccionPalabras();
    
    /**La estructura switch es utilizada para comparar la misma variable (en este caso sería la variable $opcion) con muchos valores diferentes (las distintas opciones que existen en la función menu), y ejecuta una parte de código dependiendo el valor que coincide con el valor de la expresión. Switch ejecuta sentencia por sentencia hasta el final del bloque o hasta la primera vez que vea una sentencia break. Si no se escribe una sentencia break al final de la lista de sentencias de un caso, PHP seguirá ejecutando las sentencias del caso siguiente.
     * 
     Esta estructura de control de selección múltiple se utiliza cuando se desea tomar decisiones basadas en el valor de una expresión. En lugar de escribir varias declaraciones if anidadas, puedes utilizar switch para hacer el código más limpio y estructurado.
    */
    
    do {
        $opcion = seleccionarOpcion(1, 8);

    
        switch ($opcion) {
            case 1: // Seleccionaste la opción 1: Jugar al wordix con una palabra elegida
                              
                echo "\nOpcion elegida: 1. Jugar Wordix con una palabra elegida\n";
                $texto = solicitarJugador();
                echo "Ingrese un numero de palabra: ";
                $indice= (solicitarNumeroEntre(1, (count($coleccionPalabras))) - 1);
                $encontrado= palabraUtilizada($coleccionPalabras, $coleccionPartidas, $indice);

                while($encontrado==true){
                    echo "La palabra ya fue utilizada\n";
                    echo "Ingrese otro numero\n";
                    $indice= solicitarNumeroEntre(0, (count($coleccionPalabras))-1);
                    $encontrado= palabraUtilizada($coleccionPalabras, $coleccionPartidas, $indice);
                }
                $coleccionPartidas[count($coleccionPartidas)]=jugarWordix($coleccionPalabras[$indice], $texto);
                
                echo "\nLa palabra de esta partida fue ".$coleccionPalabras[$indice]."\n";
                
                $coleccionResumenJugador = resumenJugador($coleccionResumenJugador, $texto, ($coleccionPartidas[(count($coleccionPartidas)-1)]["puntaje"]), ($coleccionPartidas[(count($coleccionPartidas)-1)]["intentos"]) );
                
                break;
            case 2: // Seleccionaste la opción 2: Jugar al wordix con una palabra aleatoria

                echo "\nOpcion elegida: 2. Jugar Wordix con una palabra aleatoria\n";
                $texto = solicitarJugador();
                $indice= array_rand($coleccionPalabras, 1);
                $encontrado= palabraUtilizada($coleccionPalabras, $coleccionPartidas, $indice);

                while($encontrado==true){
                    $indice= array_rand($coleccionPalabras, 1);
                    $encontrado= palabraUtilizada($coleccionPalabras, $coleccionPartidas, $indice);
                }

                $coleccionPartidas[count($coleccionPartidas)]=jugarWordix($coleccionPalabras[$indice], $texto);
                $coleccionResumenJugador = resumenJugador($coleccionResumenJugador, $texto, ($coleccionPartidas[(count($coleccionPartidas)-1)]["puntaje"]), ($coleccionPartidas[(count($coleccionPartidas)-1)]["intentos"]) );

                break;

            case 3:  // Seleccionaste la opción 3: Mostrar partida

                echo "\nOpcion elegida: 3. Mostrar una partida\n";

                echo "Ingrese un numero de partida: ";
                $indice = (solicitarNumeroEntre(1, (count($coleccionPartidas))) - 1);
                mostrarPartidas($indice, $coleccionPartidas);

                break;
            case 4://Seleccionaste la opción 4: Mostrar la primer partida ganadora

                echo "\nOpcion elegida: 4. Mostrar la primera partida ganadora\n";
                $texto = solicitarJugador();
                $indice = primerPartidaGanada($coleccionPartidas, $texto);

                if ($indice != -1){
                    echo "Partida WORDIX ".(($indice)+1).": palabra ".$coleccionPartidas[$indice]["palabraWordix"]."\n";
                    echo "Jugador: ".$coleccionPartidas[$indice]["jugador"]."\n";
                    echo "Puntaje: ".$coleccionPartidas[$indice]["puntaje"]." puntos\n";
                    echo "Intento: Adivino la palabra en ".$coleccionPartidas[$indice]["intentos"]." intentos\n";
                }else{
                    echo "El jugador ".$texto." no gano ninguna partida\n";
                }
                break;

            case 5: 
                //Seleccionaste la opción 5: Mostrar resumen de Jugador

                echo "\nOpcion elegida: 5. Mostrar resumen de jugador\n";
                $texto = solicitarJugador();
                $indice = primerPartidaGanada($coleccionPartidas, $texto);
                
                mostrarResumen($coleccionResumenJugador, $texto);
                
                break;
            case 6: 
                //Seleccionaste la opción 6: Mostrar listado de partdias ordenadas por Jugador y por palabra
                
                echo "\nOpcion elegida: 6. Mostrar listado de partidas\n";
                mostrarPartidasOrdenadas($coleccionPartidas);

                break;
            case 7:  
                //Seleccionaste la opción 7: Agregar una palabra de 5 letras a Wordix

                echo "\nOpcion elegida: 7. Agregar una palabra\n";
                $texto= leerPalabra5Letras();
                $encontrado = existePalabraColeccion($coleccionPalabras, $texto);
                while($encontrado==true){
                    echo "La palabra ya existe en la coleccion \n";
                    $texto= leerPalabra5Letras();
                }
                $coleccionPalabras = agregarPalabra($coleccionPalabras, $texto);

                echo "La palabra ".$texto." fue agregada a la coleccion\n";
                break;

            case 8: 
                //Seleccionaste la opción 8: Salir

                echo "\nOpcion elegida: 8. Salir\n";

                break;
            default:
                echo "Error";
                break;
        }
    } while ($opcion !=8);
  
?>
