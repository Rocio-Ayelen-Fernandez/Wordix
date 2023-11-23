<?php

    /*
    La librería JugarWordix posee la definición de constantes y funciones necesarias
    para jugar al Wordix.
    Puede ser utilizada por cualquier programador para incluir en sus programas.
    */

    /**************************************/
    /***** DEFINICION DE CONSTANTES *******/
    /**************************************/
    const CANT_INTENTOS = 6;

    /*
    disponible: letra que aún no fue utilizada para adivinar la palabra
    encontrada: letra descubierta en el lugar que corresponde
    pertenece: letra descubierta, pero corresponde a otro lugar
    descartada: letra descartada, no pertence a la palabra
    */
    const ESTADO_LETRA_DISPONIBLE = "disponible";
    const ESTADO_LETRA_ENCONTRADA = "encontrada";
    const ESTADO_LETRA_DESCARTADA = "descartada";
    const ESTADO_LETRA_PERTENECE = "pertenece";

    /**************************************/
    /***** DEFINICION DE FUNCIONES ********/
    /**************************************/

    /**
     * Una función que dada la colección de partidas y el nombre de un jugador, retorne el resumen del
     * jugador 
     * @param ARRAY $colPartidas
     * @param STRING $nombreJugador
     * @param INT $totalPuntaje
     * @param INT $intento
     * @return ARRAY*/
    function resumenJugador($colPartidas, $nombreJugador, $totalPuntaje, $intento){
        // INT $indice
        // ARRAY

        $indice = primerPartidaGanada($colPartidas, $nombreJugador);

        if($indice != -1){ //Si encuentra una partida ya creada
            
            $colPartidas[$indice]["partidas"] ++;
            $colPartidas[$indice]["puntaje"]= $colPartidas[$indice]["puntaje"] + $totalPuntaje;
            if( ($colPartidas[$indice]["puntaje"])>0 ){
                $colPartidas[$indice]["victorias"] ++;
            }
            switch($intento){
                case 1: 
                    $colPartidas[$indice]["intento1"] ++;
                    break;
                case 2: 
                    $colPartidas[$indice]["intento2"] ++;
                    break;
                case 3: 
                    $colPartidas[$indice]["intento3"] ++;
                    break;
                case 4: 
                    $colPartidas[$indice]["intento4"] ++;
                    break;
                case 5: 
                    $colPartidas[$indice]["intento5"] ++;
                    break;
                case 6: 
                    $colPartidas[$indice]["intento6"] ++;
                    break;
            }

        }else{ //Si no hay partida creada (Va a crear una basada en los parametros de entrada)
            $indice = count($colPartidas);
            $colPartidas[$indice]["jugador"] = $nombreJugador;
            $colPartidas[$indice]["partidas"] = 1;
            $colPartidas[$indice]["puntaje"] = $totalPuntaje;
            if( ($colPartidas[$indice]["puntaje"])>0 ){
                $colPartidas[$indice]["victorias"] = 1;
            }else{
                $colPartidas[$indice]["victorias"] = 0;
            }
            $colPartidas[$indice]["intento1"]=0;
            $colPartidas[$indice]["intento2"]=0;
            $colPartidas[$indice]["intento3"]=0;
            $colPartidas[$indice]["intento4"]=0;
            $colPartidas[$indice]["intento5"]=0;
            $colPartidas[$indice]["intento6"]=0;
            
            switch($intento){
                case 1: 
                    $colPartidas[$indice]["intento1"] ++;
                    break;
                case 2: 
                    $colPartidas[$indice]["intento2"] ++;
                    break;
                case 3: 
                    $colPartidas[$indice]["intento3"] ++;
                    break;
                case 4: 
                    $colPartidas[$indice]["intento4"] ++;
                    break;
                case 5: 
                    $colPartidas[$indice]["intento5"] ++;
                    break;
                case 6: 
                    $colPartidas[$indice]["intento6"] ++;
                    break;
            }

        }
        return $colPartidas;
    }





    function existePalabraColeccion($coleccion, $palabra){
        //INT $i
        $encontrado = -1;
        $i=0;

        while($i<count($coleccion) && $encontrado == -1 ){
            if(($coleccion[$i])==$palabra){
                $encontrado = 1;
            }
            $i++;
        }
        return $encontrado;
    }


    /**
     * Funcion que ordena alfabeticamente los nombres de los jugadores y las palabras de las partidas de cada uno de ellos
     * @param ARRAY $a
     * @param ARRAY $b
     * @return ARRAY
     */
    function compararJugador($a, $b){
        if ($a["jugador"] == $b["jugador"]){
            if ($a["palabraWordix"] == $b["palabraWordix"]){
                $orden = 0;
            }elseif($a["palabraWordix"] < $b["palabraWordix"]){
                $orden = -1;
            }else{
            $orden = 1;};

        }elseif($a["jugador"] < $b["jugador"]){
            $orden = -1;
        }else{
        $orden = 1;}
        return $orden;
    }
    /**
     * Funcion que muestra las partidas ordenadas
     * @param ARRAY $coleccion
     */
    function mostrarPartidasOrdenadas($coleccion){
        uasort($coleccion, 'compararJugador');
        print_r($coleccion);
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
     * Calcula los puntajes obtenidos en base a la cantidad de intestos y la palabra
     * @param INT $intento
     * @param STRING $palabra
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
            if($letraActual == "A" ||$letraActual == "E"||$letraActual == "I"||$letraActual == "O"||$letraActual == "U"){
                $puntaje= $puntaje+1;
            }elseif($letraActual <= "M"){
                $puntaje =$puntaje +2;
            }else{
                $puntaje = $puntaje+3;
            }
        }
        return $puntaje;
        
    }


    /**
     * Devuelve el resumen de un jugador dado su nombre
     * @param ARRAY $coleccion 
     * @param STRING $nombre
     */
    function mostrarResumen($coleccion, $nombre){
        //INT $indice
        
        $indice = primerPartidaGanada($coleccion, $nombre);

        if ($indice != -1){
            echo "*************************************************\n";
            echo "Jugador: ".$coleccion[$indice]["jugador"]."\n";
            echo "Partidas: ".$coleccion[$indice]["partidas"]."\n";
            echo "Puntaje Total: ".$coleccion[$indice]["puntaje"]."\n";
            echo "Victoras: ".$coleccion[$indice]["victorias"]."\n";
            echo "Porcentaje victorias: ".(($coleccion[$indice]["victorias"])*100)/($coleccion[$indice]["partidas"])." % \n";
            echo "Adivinadas:\n"
                ."Intento 1: ".$coleccion[$indice]["intento1"]."\n"
                ."Intento 2: ".$coleccion[$indice]["intento2"]."\n"
                ."Intento 3: ".$coleccion[$indice]["intento3"]."\n"
                ."Intento 4: ".$coleccion[$indice]["intento4"]."\n"
                ."Intento 5: ".$coleccion[$indice]["intento5"]."\n"
                ."Intento 6: ".$coleccion[$indice]["intento6"]."\n"
            ;
        }else{
            echo "No hay jugador con ese nombre\n";
        }
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
        while($i < count($coleccion) && $indice == -1){
            if(($coleccion[$i]["jugador"])==$nombre && ($coleccion[$i]["puntaje"]) > 0 ){
                $indice = $i;
            }
            $i++;
        }

        return $indice;
    }


    /**
     * Verifica que la palabra ingresada no haya sido utilizada anteriormente
     * @param ARRAY $colPalabras
     * @param ARRAY $colPartidas
     * @param INT $indice
     * @return INT
     */
    function palabraUtilizada($colPalabras, $colPartidas, $indice){
        //INT $i
        //INT $encontrada
        $encontrada= -1;
        $i=0;
        $palabra = $colPalabras[$indice];
        while($i < count($colPartidas)){
            if(($colPartidas[$i]["palabraWordix"])==$palabra){
                $encontrada = 1; 
            }
            
            $i++;
        }
        return $encontrada;
    }


    /** Solicita al usuario el nombre de un jugador y retorna el nombre en minúsculas, 
     * asegurándose que dicho nombre comience con una letra 
     * @return STRING
     * */
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
    * Lee una opcion ingresada y retorna el valor
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
    /**
    * Lee una entrada y verifica si es un numero
    * y si esta en el rango de numeros dispuestos por los parametros formales
    * @param INT $min
    * @param INT $max
    * @return INT
    */
    function solicitarNumeroEntre($min, $max){
        //INT $numero

        $numero = trim(fgets(STDIN));

        if (is_numeric($numero)) { //determina si un string es un número. puede ser float como entero.
            $numero  = $numero * 1; //con esta operación convierto el string en número.
        }
        while (!(is_numeric($numero) && (($numero == (int)$numero) && ($numero >= $min && $numero <= $max)))) {
            echo "Debe ingresar un número entre " . $min . " y " . $max . ": ";
            $numero = trim(fgets(STDIN));
            if (is_numeric($numero)) {
                $numero  = $numero * 1;
            }
        }
        return $numero;
    }

    /**
    * Escrbir un texto en color ROJO
    * @param string $texto)
    */
    function escribirRojo($texto){
        echo "\e[1;37;41m $texto \e[0m";
    }

    /**
    * Escrbir un texto en color VERDE
    * @param string $texto)
    */
    function escribirVerde($texto){
        echo "\e[1;37;42m $texto \e[0m";
    }

    /**
    * Escrbir un texto en color AMARILLO
    * @param string $texto)
    */
    function escribirAmarillo($texto){
        echo "\e[1;37;43m $texto \e[0m";
    }

    /**
    * Escrbir un texto en color GRIS
    * @param string $texto)
    */
    function escribirGris($texto){
        echo "\e[1;34;47m $texto \e[0m";
    }

    /**
    * Escrbir un texto pantalla.
    * @param string $texto)
    */
    function escribirNormal($texto){
        echo "\e[0m $texto \e[0m";
    }

    /**
    * Escribe un texto en pantalla teniendo en cuenta el estado.
    * @param string $texto
    * @param string $estado
    */
    function escribirSegunEstado($texto, $estado){
        switch ($estado) {
            case ESTADO_LETRA_DISPONIBLE:
                escribirNormal($texto);
                break;
            case ESTADO_LETRA_ENCONTRADA:
                escribirVerde($texto);
                break;
            case ESTADO_LETRA_PERTENECE:
                escribirAmarillo($texto);
                break;
            case ESTADO_LETRA_DESCARTADA:
                escribirRojo($texto);
                break;
            default:
                echo " $texto ";
                break;
        }
    }

    /**
     * Da la bienvenida al usuario y llama a la función escribirAmarillo para pintar el nombre del usuario en amarillo
     * @param STRING $usuario
    */
    function escribirMensajeBienvenida($usuario){
        echo "***************************************************\n";
        echo "** Hola ";
        escribirAmarillo($usuario);
        echo " Juguemos una PARTIDA de WORDIX! **\n";
        echo "***************************************************\n";
    }


    /** 
     * Verifica si la palabra ingresada tiene solo caracteres alfabéticos
     * @param STRING $cadena
     * @return BOOLEAN
    */
    function esPalabra($cadena){
        //INT $cantCaracteres, $i, 
        //BOOLEAN $esLetra
        $cantCaracteres = strlen($cadena); //Devuelve la cantidad de caracters en la palabra
        $esLetra = true;
        $i = 0;
        while ($esLetra && $i < $cantCaracteres) {
            $esLetra =  ctype_alpha($cadena[$i]);//ctype_alpha verifica que los caracteres sea alpha numericos
            $i++;
        }
        return $esLetra;
    }

    /**
     *  Solicita al usuario que ingrese una palabra de 5 letras y luego llama a la función esPalabra para comprobar que la palabra solo contenga caracteres alfabéticos
     * @return STRING
    */
    function leerPalabra5Letras(){
        //STRING $palabra
        echo "Ingrese una palabra de 5 letras: ";
        $palabra = trim(fgets(STDIN));
        $palabra  = strtoupper($palabra);

        while ((strlen($palabra) != 5) || !esPalabra($palabra)) {
            echo "Debe ingresar una palabra de 5 letras:";
            $palabra = strtoupper(trim(fgets(STDIN)));
        }
        return $palabra;
    }


    /** 
     * Inicia una estructura de datos Teclado. La estructura es de tipo asociativo cuyas claves son las letras del alfabeto
     * @return ARRAY
     */
    function iniciarTeclado(){
        //ARRAY $teclado 
        $teclado = [
            "A" => ESTADO_LETRA_DISPONIBLE, "B" => ESTADO_LETRA_DISPONIBLE, "C" => ESTADO_LETRA_DISPONIBLE, "D" => ESTADO_LETRA_DISPONIBLE, "E" => ESTADO_LETRA_DISPONIBLE,
            "F" => ESTADO_LETRA_DISPONIBLE, "G" => ESTADO_LETRA_DISPONIBLE, "H" => ESTADO_LETRA_DISPONIBLE, "I" => ESTADO_LETRA_DISPONIBLE, "J" => ESTADO_LETRA_DISPONIBLE,
            "K" => ESTADO_LETRA_DISPONIBLE, "L" => ESTADO_LETRA_DISPONIBLE, "M" => ESTADO_LETRA_DISPONIBLE, "N" => ESTADO_LETRA_DISPONIBLE, "Ñ" => ESTADO_LETRA_DISPONIBLE,
            "O" => ESTADO_LETRA_DISPONIBLE, "P" => ESTADO_LETRA_DISPONIBLE, "Q" => ESTADO_LETRA_DISPONIBLE, "R" => ESTADO_LETRA_DISPONIBLE, "S" => ESTADO_LETRA_DISPONIBLE,
            "T" => ESTADO_LETRA_DISPONIBLE, "U" => ESTADO_LETRA_DISPONIBLE, "V" => ESTADO_LETRA_DISPONIBLE, "W" => ESTADO_LETRA_DISPONIBLE, "X" => ESTADO_LETRA_DISPONIBLE,
            "Y" => ESTADO_LETRA_DISPONIBLE, "Z" => ESTADO_LETRA_DISPONIBLE
        ];
        return $teclado;
    }

    /**
     * Escribe en pantalla el estado del teclado. Acomoda las letras en el orden del teclado QWERTY
     * @param ARRAY $teclado
     */
    function escribirTeclado($teclado){
        //ARRAY $ordenTeclado (arreglo indexado con el orden en que se debe escribir el teclado en pantalla)
        //STRING $letra, 

        
        /////$estado???????????
        $ordenTeclado = [
            "salto",
            "Q", "W", "E", "R", "T", "Y", "U", "I", "O", "P", "salto",
            "A", "S", "D", "F", "G", "H", "J", "K", "L", "salto",
            "Z", "X", "C", "V", "B", "N", "M", "salto"
        ];

        foreach ($ordenTeclado as $letra) {
            switch ($letra) {
                case 'salto':
                    echo "\n";
                    break;
                default:
                    $estado = $teclado[$letra];
                    escribirSegunEstado($letra, $estado);
                    break;
            }
        }
        echo "\n";
    };


    /**
     * Escribe en pantalla los intentos de Wordix para adivinar la palabra
     * @param array $estruturaIntentosWordix
     */
    function imprimirIntentosWordix($estructuraIntentosWordix){
        $cantIntentosRealizados = count($estructuraIntentosWordix);
        //ARRAY $cantIntentosFaltantes = CANT_INTENTOS - $cantIntentosRealizados;
        //INT $i

        for ($i = 0; $i < $cantIntentosRealizados; $i++) {
            $estructuraIntento = $estructuraIntentosWordix[$i];
            echo "\n" . ($i + 1) . ")  ";
            foreach ($estructuraIntento as $intentoLetra) {
                escribirSegunEstado($intentoLetra["letra"], $intentoLetra["estado"]);
            }
            echo "\n";
        }

        for ($i = $cantIntentosRealizados; $i < CANT_INTENTOS; $i++) {
            echo "\n" . ($i + 1) . ")  ";
            for ($j = 0; $j < 5; $j++) {
                escribirGris(" ");
            }
            echo "\n";
        }
        //echo "\n" . "Le quedan " . $cantIntentosFaltantes . " Intentos para adivinar la palabra!";
    }

    /**
     * Dada la palabra wordix a adivinar, la estructura para almacenar la información del intento 
     * y la palabra que intenta adivinar la palabra wordix.
     * devuelve la estructura de intentos Wordix modificada con el intento.
     * @param string $palabraWordix
     * @param array $estruturaIntentosWordix
     * @param string $palabraIntento
     * @return array estructura wordix modificada
     */
    function analizarPalabraIntento($palabraWordix, $estruturaIntentosWordix, $palabraIntento){
        //ARRAY $estructuraPalabraIntento
        //INT $cantCaractere, $i
        //STRING $letraIntento, $estado
        //BOOl $posicion
        $cantCaracteres = strlen($palabraIntento);
        $estructuraPalabraIntento = []; /*almacena cada letra de la palabra intento con su estado */
        for ($i = 0; $i < $cantCaracteres; $i++) {
            $letraIntento = $palabraIntento[$i];
            $posicion = strpos($palabraWordix, $letraIntento);
            if ($posicion === false) {
                $estado = ESTADO_LETRA_DESCARTADA;
            } else {
                if ($letraIntento == $palabraWordix[$i]) {
                    $estado = ESTADO_LETRA_ENCONTRADA;
                } else {
                    $estado = ESTADO_LETRA_PERTENECE;
                }
            }
            array_push($estructuraPalabraIntento, ["letra" => $letraIntento, "estado" => $estado]);
        }

        array_push($estruturaIntentosWordix, $estructuraPalabraIntento);
        return $estruturaIntentosWordix;
    }

    /**
     * Actualiza el estado de las letras del teclado. 
     * Teniendo en cuenta que una letra sólo puede pasar:
     * de ESTADO_LETRA_DISPONIBLE a ESTADO_LETRA_ENCONTRADA, 
     * de ESTADO_LETRA_DISPONIBLE a ESTADO_LETRA_DESCARTADA, 
     * de ESTADO_LETRA_DISPONIBLE a ESTADO_LETRA_PERTENECE
     * de ESTADO_LETRA_PERTENECE a ESTADO_LETRA_ENCONTRADA
     * @param array $teclado
     * @param array $estructuraPalabraIntento
     * @return array el teclado modificado con los cambios de estados.
     */
    function actualizarTeclado($teclado, $estructuraPalabraIntento)
    {
        //STRING $estado
        foreach ($estructuraPalabraIntento as $letraIntento) {
            $letra = $letraIntento["letra"];
            $estado = $letraIntento["estado"];
            switch ($teclado[$letra]) {
                case ESTADO_LETRA_DISPONIBLE:
                    $teclado[$letra] = $estado;
                    break;
                case ESTADO_LETRA_PERTENECE:
                    if ($estado == ESTADO_LETRA_ENCONTRADA) {
                        $teclado[$letra] = $estado;
                    }
                    break;
            }
        }
        return $teclado;
    }

    /**
     * Determina si se ganó una palabra intento posee todas sus letras "Encontradas".
     * @param array $estructuraPalabraIntento
     * @return bool
     */
    function esIntentoGanado($estructuraPalabraIntento){
        //INT $cantLetras, $i
        //BOOL $ganado
        $cantLetras = count($estructuraPalabraIntento);
        $i = 0;

        while ($i < $cantLetras && $estructuraPalabraIntento[$i]["estado"] == ESTADO_LETRA_ENCONTRADA) {
            $i++;
        }

        if ($i == $cantLetras) {
            $ganado = true;
        } else {
            $ganado = false;
        }

        return $ganado;
    }


    /**
     * Dada una palabra para adivinar, juega una partida de wordix intentando que el usuario adivine la palabra.
     * @param string $palabraWordix
     * @param string $nombreUsuario
     * @return array estructura con el resumen de la partida, para poder ser utilizada en estadísticas.
     */
    function jugarWordix($palabraWordix, $nombreUsuario){
        /*Inicialización*/
        // ARRAY $arregloDeIntentosWordix, $teclado, $partida 
        // INT $nroIntento, $indiceIntento, $puntaje
        // STRING $palabraIntento
        //BOOL $ganoElIntento
        // COMPLETARRRR

        $arregloDeIntentosWordix = [];
        $teclado = iniciarTeclado();
        escribirMensajeBienvenida($nombreUsuario);
        $nroIntento = 1;
        do {

            echo "Comenzar con el Intento " . $nroIntento . ":\n";
            $palabraIntento = leerPalabra5Letras();
            $indiceIntento = $nroIntento - 1;
            $arregloDeIntentosWordix = analizarPalabraIntento($palabraWordix, $arregloDeIntentosWordix, $palabraIntento);
            $teclado = actualizarTeclado($teclado, $arregloDeIntentosWordix[$indiceIntento]);
            /*Mostrar los resultados del análisis: */
            imprimirIntentosWordix($arregloDeIntentosWordix);
            escribirTeclado($teclado);
            /*Determinar si la plabra intento ganó e incrementar la cantidad de intentos */

            $ganoElIntento = esIntentoGanado($arregloDeIntentosWordix[$indiceIntento]);
            $nroIntento++;
        } while ($nroIntento <= CANT_INTENTOS && !$ganoElIntento);

        //Añadir funcion que cargue resumen partida


        if ($ganoElIntento) {
            $nroIntento--;
            $puntaje = obtenerPuntajeWordix($nroIntento, $palabraWordix);
            echo "Adivinó la palabra Wordix en el intento " . $nroIntento . "!: " . $palabraIntento . " Obtuvo $puntaje puntos!";
        } else {
            $nroIntento = 0; //reset intento
            $puntaje = 0;
            echo "Seguí Jugando Wordix, la próxima será! ";
        }

        $partida = [
            "palabraWordix" => $palabraWordix,
            "jugador" => $nombreUsuario,
            "intentos" => $nroIntento,
            "puntaje" => $puntaje
        ];

        return $partida;
    }
