<?php

    function CrearTablaHTML(){
        session_start();
        $IdCheckBox = $_POST['id'];
        $valorCheck = $_POST['value'];

        //echo '<h3>Se recibe</h3>';
        //echo '<strong>Se recibió el IdCheckBox: </strong>'.$IdCheckBox.'<br>';
        //echo '<strong>Se recibió el Valor: </strong>'.$valorCheck;
        //echo '<br><br>';

        if ($valorCheck == 'true'){
            $checkeado = 'checked';
        }else{
            $checkeado = '';
        }
        
        //echo '<h3>Nuevo Dato que debe ponerse</h3>';
        //echo '<strong>Se pondrá este dato: </strong>'.$checkeado;
        //echo '<br><br>';

        
        //echo '<h3>Desglosando la Candena</h3>';
        //$cadena_de_texto = 'primary-switch-0-0-CremaAceituna';
        $cadena_de_texto = $IdCheckBox;
        $totalcaracteres = strlen($cadena_de_texto);
        $Quitar = 15; // "primary-switch-"
        $NuevaCadena = substr($cadena_de_texto, $Quitar, $totalcaracteres);  
        $totalcaracteres = strlen($NuevaCadena);
        $pos = strpos($NuevaCadena, '-'); // $pos = 7, no 0
        $Id01 = substr($NuevaCadena, 0, $pos);  
        //echo '<strong>El Índice de Producto es: </strong>'.$Id01;
        //echo '<br>';
        $Quitar = strlen($Id01);
        $NuevaCadena = substr($NuevaCadena, $Quitar+1, $totalcaracteres);  
        $pos = strpos($NuevaCadena, '-'); // $pos = 7, no 0
        $Id02 = substr($NuevaCadena, 0, $pos);  
        //echo '<strong>El Índice de Cremas es: </strong> '.$Id02;
        //echo '<br>';
        $Quitar = strlen($Id02);
        $NombreCrema = substr($NuevaCadena, $Quitar+1, $totalcaracteres);  
        //echo '<strong>La Crema es: </strong> '.$NombreCrema;
        //echo '<br><br>';

        
        //Mostramos todo el array




        $_SESSION['carrito'][$Id01]['Cremas'][$Id02][$NombreCrema] = $checkeado;
        //echo '<h3>Datos Asignado</h3>';
        //echo 'El dato asignado es: '.$checkeado.'<br>';


        //echo '<h3>Sacando Dato Asignado</h3>';
        //$dato = $_SESSION['carrito'][$Id01]['Cremas'][$Id02][$NombreCrema];
        //echo 'El dato sacado del array es: '. ($dato).'<br>';
        
        //echo '<br><br>carrito completo<br<br>';
        //var_dump ($_SESSION['carrito'][$Id01]['Cremas'][$Id02][$NombreCrema]);
        
        //$resultadohtml = $IdCheckBox.'<br>'.$valorCheck;


        //$_SESSION['carrito'][0]['Cremas'][0]['Ketchup'] ;
        //return $resultadohtml;
    }

    echo CrearTablaHTML();
