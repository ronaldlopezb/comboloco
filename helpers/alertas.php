<?php
    class Alertas{

        public static function mostrarAlerta($Sesion,$Tipo,$Icon="",$Cerrar=true){
            //Valido la sesión->Si existe
            if (isset($_SESSION[$Sesion]) && $_SESSION[$Sesion] != "") { //Si la sesion existe y es diferene de vacio
                //Debo hacer un switch que busque la sesion y dentro busque el error
                $Alert = "";
                $msg = "";
                $icono = "";
                $close = '<button type="button" class="close text-white" data-dismiss="alert" aria-hidden="true">×</button>';
                
                /////////////////////////////////////////
                // --------------- MENSAJES -----------//
                
                //mensajes DE LOGIN
                if (isset($_SESSION['ErrorDatosCliente'])){
                    switch ($_SESSION['ErrorDatosCliente']) {
                        case 'failed':
                            $msg = "Los datos <strong>Nombre Completo</strong> y <strong>Celular</strong> son obligatorios";
                            break;
                    }
                }


                //MENSAJES DE USUARIO->REGISTRAR
                if (isset($_SESSION['RegistroUsuario'])){
                    switch ($_SESSION['RegistroUsuario']) {
                        case 'failed-file':
                            $msg = "El archivo debe ser una imágen";
                            break;
                        
                        case 'failed-email':
                            $msg = "El Email ingresado ya pertenece a otra cuenta.";
                            break;
                        
                        case 'failed-pass':
                            $msg = "Los contraseñas ingresadas no coincidenpssssss.";
                            break;
                            
                        case 'failed-save':
                            $msg = "Se produjo un error al tratar de guardar el usuario. Intente nuevamente.";
                            break;
                        
                        case 'complete':
                            $msg = "El usuario fue registrado correctamente";
                            break;
                    }
                }
                

                ////////////////////////////////////////////////
                // --------------- TIPOS DE CUADRO -----------//
                switch ($Tipo) {
                    case 'verde':
                        $Tipo = 'success';
                        break;
                    case 'rojo':
                        $Tipo = 'danger';
                        break;
                    case 'amarillo':
                        $Tipo = 'warning';
                        break;
                }

                ////////////////////////////////////////////////
                // --------------- BOTON DE CERRAR -----------//
                if ($Cerrar == false){ $close = '';}

                ////////////////////////////////////////////////
                // --------------- ICONOS --------------------//
                if ($Icon == 'User-X'){ $icono = 'fe fe-user-x';}
                if ($Icon == 'Check'){ $icono = 'fe fe-check';}
                if ($Icon == 'X'){ $icono = 'fe fe-x';}
                
                /////////////////////////////////////////////////
                // --------------- ARMANDO ALERATA -----------//
                $Alert = '
                    <div class="alert alert-'.$Tipo.'" role="alert">
                        '.$close.'
                        <span class="alert-inner--icon"><i class="'.$icono.'"></i></span> '.
                        $msg.'
                    </div>';

                /////////////////////////////////////////
                // --------------- ENVIAR -----------//
                echo $Alert;
            }
        }
    }
?>