<?php
    //Cargamos el Modelo de Usuario
    require_once 'models/usuario.php';

    //Creo mi Controlador de Login
    class LoginController{

        public function __construct(){
            if (isset($_SESSION['LoginAdmin'])){
                header("location:".base_url.'administrator');
            }
        }
        
        public function index(){
            require_once 'views/login/index.php';
        }


        public function identificacion(){
            ////SESION DIRECTA
            //$_SESSION['LoginAdmin'] = "LOGEOADO";            
            //header("location:".base_url.'administrator');

            ///////////////////////////////////////////////////
            /// SCRITP DE LOGUEO CORRECTO
            $Correo = isset($_POST['TxtCorreo']) ? $_POST['TxtCorreo'] : false;
            $Pass = isset($_POST['TxtPass']) ? $_POST['TxtPass'] : false;
            

            if ($Correo && $Pass){
                //Creo Objeto usuario
                $usuario = new Usuario(); 
            
                //Le doy los Datos del Formulario usando los GETTERS
                $usuario->setEmail($Correo);
                $usuario->setClave($Pass);

                //Validar Login
                $login = $usuario->login();


                if($login && is_object($login)){
                    //$_SESSION['LoginAdmin'] = "LOGEOADO";
                    $_SESSION['LoginAdmin'] = $login;

                    //Si es SuperAdmin
                    if ($login->IdNivel == 1){
                        $_SESSION['LoginSuperAdmin'] = true;
                    }
                    
                    //Enviar
                    header("location:".base_url.'administrator');
                }else{
                    $_SESSION['LoginUsuario'] = 'login-failed';
                    header("location:".base_url.'administrator');
                }
            }else{
                $_SESSION['LoginUsuario'] = 'login-failed';
                header("location:".base_url.'administrator');
            }

        
            ////////--------------------------------------------
            //Enviar mensaje error
            //$_SESSION['LoginUsuario'] = 'login-failed';
            //header("location:".base_url.'administrator');
            //die();
        }




        /// CERRAR SESION
        public function logout(){
            unset ($_SESSION['LoginAdmin']);
            $_SESSION['LoginAdmin'] = null;
            header("location:".base_url.'administrator/login/index');            
        }

    }
?>