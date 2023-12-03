<?php
    include_once("wordix.php");



    /**************************************/
    /***** DATOS DE LOS INTEGRANTES *******/
    /**************************************/

    /* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
    /* Fernandez Rocio FAI-4123 TUDW rayelen.fernandez@est.fi.uncoma.edu.ar Rocio-Ayelen-Fernandez */
    /* Russo Florencia FAI-4911 TUDW russoflorencia96@est.fi.uncoma.edu.ar FlorenciaRusso9606 */
    



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
        //ARRAY $coleccionPalabras
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

    /**
    * Muestra un mensaje con las opciones, lee una opcion ingresada y retorna el valor
    * @return INT 
    */
    function seleccionarOpcion(){
        //INT $opcion
        echo "\n*************Menu de opciones************\n";
        echo "1. Jugar Wordix con una palabra elegida\n";
        echo "2. Jugar Wordix con una palabra aleatoria\n";
        echo "3. Mostrar una partida\n";
        echo "4. Mostrar la primer partida ganadora\n";
        echo "5. Mostrar resumen de jugador\n";
        echo "6. Mostrar listado de partidas\n";
        echo "7. Agregar una palabra\n";
        echo "8. Salir\n";
        echo "*****************************************\n";
        echo "\nIngrese una opcion: ";
        
        $opcion = solicitarNumeroEntre(1, 8);
        
        return $opcion;
    }

    /** Solicita al usuario el nombre de un jugador y retorna el nombre en minúsculas, 
     * asegurándose que dicho nombre comience con una letra 
     * @return STRING
     */
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

    /**
     * Agrega una palabra un arreglo
     * @param ARRAY $coleccion
     * @param STRING $palabra
     * @return ARRAY
     */
    function agregarPalabra($coleccion, $palabra){
        
        $coleccion[count($coleccion)] = $palabra;
        return $coleccion;
    }


    /**
     * Dada una coleccion de partidas y el nombre de un jugador 
     * retorna la primera partida ganada, sino -1
     * @param ARRAY $coleccion 
     * @param STRING $nombre
     * @return INT
     */
    function primerPartidaGanada($coleccion, $nombre){
        //INT $indice, $i

        $nombre = strtolower($nombre);
        $indice = -1;
        $i=0;
        do{
            if(($coleccion[$i]["jugador"])==$nombre && ($coleccion[$i]["puntaje"]) > 0 ){
                $indice = $i;
            }
            $i++;
        }while($i < count($coleccion) && $indice == -1);

        return $indice;
    }



    /**
     * Devuelve el resumen de un jugador dado su nombre
     * @param ARRAY $coleccion 
     * @param STRING $nombre
     */
    function mostrarResumen($coleccion, $nombre){
        //INT $j, $puntaje, $partidas, $victorias, $i1, $i2, $i3, $i4, $i5, $i6
        $puntaje=0;
        $partidas=0;
        $victorias=0;
        $i1=0;
        $i2=0;
        $i3=0;
        $i4=0;
        $i5=0;
        $i6=0;
        $j=0;
        
        for($j=0;$j< count($coleccion); $j++){
            if($coleccion[$j]["jugador"]==$nombre){
                $puntaje= $puntaje + $coleccion[$j]["puntaje"];
                $partidas++;
                if($coleccion[$j]["puntaje"] >0){
                    $victorias++;
                }
                switch($coleccion[$j]["intentos"]){
                    case 1: 
                        $i1++;
                        break;
                    case 2:
                        $i2++;
                        break;
                    case 3: 
                        $i3++;
                        break;
                    case 4: 
                        $i4++;
                        break;
                    case 5: 
                        $i5++;
                        break;
                    case 6: 
                        $i6++;
                        break;    
                }
            }
        }
        
        echo "\n**********************************\n";
        echo "Jugador: ".$nombre."\n";
        echo "Partidas: ".$partidas."\n";
        echo "Puntaje total: ".$puntaje."\n";
        echo "Victorias: ".$victorias."\n";
        echo "Porcentaje victorias: ".(($victorias*100)/$partidas)."%\n";
        echo "Adivinadas: \n";
        echo "  Intento 1: ".$i1."\n";
        echo "  Intento 2: ".$i2."\n";
        echo "  Intento 3: ".$i3."\n";
        echo "  Intento 4: ".$i4."\n";
        echo "  Intento 5: ".$i5."\n";
        echo "  Intento 6: ".$i6."\n";
        echo "**********************************\n";
        
    }



    /**
     * Funcion que compara los elementos "jugador" y "palabraWordix" alfabeticamente de un arreglo
     * @param ARRAY $a
     * @param ARRAY $b
     * @return INT
     */
    function compararJugador($a, $b){
        //INT $orden 

        if ($a["jugador"] == $b["jugador"]){
            if ($a["palabraWordix"] == $b["palabraWordix"]){
                $orden = 0;
            }elseif($a["palabraWordix"] < $b["palabraWordix"]){
                $orden = -1;
            }else{
                $orden = 1;
            };

        }elseif($a["jugador"] < $b["jugador"]){
            $orden = -1;
        }else{
            $orden = 1;
        }
        return $orden;
    }

    /**
     * Funcion que ordena las partidas de un arreglo utilizando uasort()
     * y muestra las partidas ordenadas utilizando print_r()
     * @param ARRAY $coleccion
     */
    function mostrarPartidasOrdenadas($coleccion){
        uasort($coleccion, 'compararJugador');
        print_r($coleccion);
    }


    
    


    /**
     * Verifica que la palabra ingresada no haya sido utilizada anteriormente
     * @param ARRAY $colPalabras
     * @param ARRAY $colPartidas
     * @param INT $indice
     * @param STRING $nombre
     * @return BOOLEAN
     */
    function palabraUtilizada($colPalabras, $colPartidas, $indice, $nombre){
        //INT $i
        //BOOLEAN $encontrada
        $encontrada= false;
        $i=0;
        $palabra = $colPalabras[$indice];

        do{
            if(($colPartidas[$i]["jugador"]) ==$nombre){
                if(($colPartidas[$i]["palabraWordix"])==$palabra){
                    $encontrada = true; 
                }
            }
            $i++;
        }while($i < count($colPartidas) && $encontrada==false);
            
        return $encontrada;
    }


    /**************************************/
    /*********** PROGRAMA PRINCIPAL *******/
    /**************************************/

    //Declaración de variables:
    //ARRAY $coleccionPartidas, $coleccionPalabras
    //STRING $partida, $texto
    //INT $opcion, $indice, $i
    //BOOLEAN $encontrado


    //Inicialización de variables
    $i=0;
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
        
                do{
                    $indice= (solicitarNumeroEntre(1, (count($coleccionPalabras))) - 1);
                    $encontrado= palabraUtilizada($coleccionPalabras, $coleccionPartidas, $indice, $texto);
                    if($encontrado==true){
                        echo "La palabra ya fue utilizada\n";
                        echo "Ingrese otro numero\n";
                    }
                }while($encontrado==true);

                $coleccionPartidas[count($coleccionPartidas)]=jugarWordix($coleccionPalabras[$indice], $texto);
                
                echo "\nLa palabra de esta partida fue ".$coleccionPalabras[$indice]."\n";
                
                break;
            case 2: // Seleccionaste la opción 2: Jugar al wordix con una palabra aleatoria

                echo "\nOpcion elegida: 2. Jugar Wordix con una palabra aleatoria\n";
                $texto = solicitarJugador();
                
                do{
                    $indice= array_rand($coleccionPalabras, 1);
                    $encontrado= palabraUtilizada($coleccionPalabras, $coleccionPartidas, $indice, $texto);
                }while($encontrado==true);

                $coleccionPartidas[count($coleccionPartidas)]=jugarWordix($coleccionPalabras[$indice], $texto);
                echo "\nLa palabra de esta partida fue ".$coleccionPalabras[$indice]."\n";
                
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
                    mostrarPartidas($indice, $coleccionPartidas);
                }else{
                    echo "El jugador ".$texto." no gano ninguna partida\n";
                }
                break;

            case 5: 
                //Seleccionaste la opción 5: Mostrar resumen de Jugador

                echo "\nOpcion elegida: 5. Mostrar resumen de jugador\n";
                do{ 
                    $encontrado=false;
                    $texto = solicitarJugador();
                    for($i=0;$i<count($coleccionPartidas); $i++) {
                        
                        if(($coleccionPartidas[$i]["jugador"]) == $texto){
                            $encontrado=true;
                        }
                    }
                    if($encontrado==true){
                        mostrarResumen($coleccionPartidas, $texto);
                    }else{
                        echo "El nombre ingresado no se encuentra en la lista\n";
                    }
                }while($encontrado==false);
            
                
                break;
            case 6: 
                //Seleccionaste la opción 6: Mostrar listado de partdias ordenadas por Jugador y por palabra
                
                echo "\nOpcion elegida: 6. Mostrar listado de partidas\n";
                mostrarPartidasOrdenadas($coleccionPartidas);

                break;
            case 7:  
                //Seleccionaste la opción 7: Agregar una palabra de 5 letras a Wordix

                echo "\nOpcion elegida: 7. Agregar una palabra\n";
                $encontrado = false;
                $texto= leerPalabra5Letras();
                do{
                    if(in_array($texto, $coleccionPalabras)){
                        $encontrado = true;
                        echo "La palabra ingresada ya se encuentra en la lista\n";
                        $texto= leerPalabra5Letras();
                        
                    }else{
                        $encontrado = false;
                    }                                    
                }while($encontrado == true);

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
