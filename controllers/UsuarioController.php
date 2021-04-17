<?php
//Cargamos el Modelo de Usuario
require_once 'models/usuario.php';

//Creo mi Controlador de Usuario
class UsuarioController{

    //Se ejecuta siempre
    public function __construct(){
        Utils::BloquearPagina();
    }


    
    public function index(){
        //llamamos a ListarUsuarios que se encuentra en mi modelo
        $user = new Usuario();
        $users = $user->getAll();
        $userscount = $user->getContarUsuarios();

        require_once 'views/usuario/index.php';
    }



    public function registro(){
        require_once 'views/usuario/registro.php';
    }

    

    public function save(){
        //Esto guardará el registro de nuevo usuario
        if (isset($_POST)){
            $Nombre = isset($_POST['TxtNombre']) ? $_POST['TxtNombre'] : false;
            $Apellido = isset($_POST['TxtApellido']) ? $_POST['TxtApellido'] : false;

            $Sexo = isset($_POST['TxtSexo']) ? $_POST['TxtSexo'] : false;
            $FechaNacimiento = isset($_POST['TxtFechaNacimiento']) ? $_POST['TxtFechaNacimiento'] : false;

            $Email = isset($_POST['TxtEmail']) ? $_POST['TxtEmail'] : false;
            $Clave = isset($_POST['TxtClave']) ? $_POST['TxtClave'] : false;
            $ClaveRe = isset($_POST['TxtClaveRe']) ? $_POST['TxtClaveRe'] : false;

            $IdNivel = isset($_POST['TxtNivel']) ? $_POST['TxtNivel'] : false;
            $IdEstado = isset($_POST['TxtEstado']) ? $_POST['TxtEstado'] : false;
            
            $Telefono = isset($_POST['TxtTelefono']) ? $_POST['TxtTelefono'] : false;
            $Biografia = isset($_POST['TxtBiografia']) ? $_POST['TxtBiografia'] : false;
            $SitioWeb = isset($_POST['TxtSitioWeb']) ? $_POST['TxtSitioWeb'] : false;

            $Facebook = isset($_POST['TxtFacebook']) ? $_POST['TxtFacebook'] : false;
            $Twitter = isset($_POST['TxtTwitter']) ? $_POST['TxtTwitter'] : false;
            $Youtube = isset($_POST['TxtYoutube']) ? $_POST['TxtYoutube'] : false;
            $Linkedin = isset($_POST['TxtLinkedin']) ? $_POST['TxtLinkedin'] : false;
            $Instagram = isset($_POST['TxtInstagram']) ? $_POST['TxtInstagram'] : false;
            $Pinterest = isset($_POST['TxtPinterest']) ? $_POST['TxtPinterest'] : false;

            if ($Nombre && $Apellido && $Sexo && $Email && $Clave && $ClaveRe && $IdNivel && $IdEstado){
                //DEBO VALIDAR SI LAS CLAVES SON IGUALES CASO CONTRARIO ENVIAR ERROR
                if($Clave != $ClaveRe){
                    $_SESSION['RegistroUsuario'] = 'failed-pass';
                    header("location:".base_url.'administrator/usuario/registro');
                    die();
                }

                //DEBO VALIDAR SI EL CORREO NO PERTENECE A OTRA CUENTA
                $UsuDupl = Utils::emailDuplicado($Email);
                if($UsuDupl == 1 ){
                    $_SESSION['RegistroUsuario'] = 'failed-email';
                    header("location:".base_url.'administrator/usuario/registro');
                    die();
                }

                //Creo Objeto usuario
                $usuario = new Usuario(); 
            
                //Le doy los Datos del Formulario usando los GETTERS
                $usuario->setNombre($Nombre);
                $usuario->setApellido($Apellido);

                $usuario->setSexo($Sexo);

                $usuario->setEmail($Email);
                $usuario->setClave($Clave);

                $usuario->setIdnivel($IdNivel);
                $usuario->setIdestado($IdEstado);

                $usuario->setTelefono($Telefono);

                $usuario->setBiografia($Biografia);
                $usuario->setSitioWeb($SitioWeb);

                $FecNac = date("Y-m-d",strtotime($FechaNacimiento));
                $usuario->setFechanacimiento($FecNac);
                
                

    
                $UserIdInterno = sha1(mt_rand().time().mt_rand().$_SERVER['REMOTE_ADDR']);
                $usuario->setCodigointerno($UserIdInterno);


                $usuario->setFacebook($Facebook);
                $usuario->setTwitter($Twitter);
                $usuario->setYoutube($Youtube);
                $usuario->setLinkedin($Linkedin);
                $usuario->setInstagram($Instagram);
                $usuario->setPinterest($Pinterest);


                //GUARDAR LA IMAGEN
                $CarpetaUser = '../imagenes/usuario/'.$UserIdInterno;
                
                $Archivo = $_FILES['TxtFoto'];
                $ArchivoNombre = $Archivo['name'];
                $ArchivoTipo = $Archivo['type'];
                
                if ($ArchivoNombre != ''){
                    //Si el nombre del archivo NO es vacio
                    if($ArchivoTipo == "image/jpg" || $ArchivoTipo == "image/jpeg" || $ArchivoTipo =="image/png" || $ArchivoTipo =="image/gif" ){
                        if (!is_dir($CarpetaUser)){
                            mkdir($CarpetaUser,0777,true);
    
                            move_uploaded_file($Archivo['tmp_name'],$CarpetaUser.'/'.$ArchivoNombre);
                            $usuario->setFotografia($ArchivoNombre);
                        }
                    }else{
                        //El archivo es incorrecto
                        $_SESSION['RegistroUsuario'] = 'failed-file';
                        header("location:".base_url.'administrator/usuario/registro');
                        die();
                    }
                }else{
                    mkdir($CarpetaUser,0777,true);
                    $usuario->setFotografia('');
                }

                //Guardar mi Usuario en la BD
                $save = $usuario->save();

                if($save){
                    $_SESSION['RegistroUsuario'] = 'complete';
                    header("location:".base_url.'administrator/usuario/index');
                }else{
                    $_SESSION['RegistroUsuario'] = 'failed-save';
                    header("location:".base_url.'administrator/usuario/registro');
                }
            }else{
                $_SESSION['RegistroUsuario'] = 'failed-post';
                header("location:".base_url.'administrator/usuario/registro');
            }
        }
    }


}
