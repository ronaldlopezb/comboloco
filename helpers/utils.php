<?php
    class Utils{

        //Borrar Sesiones
        public static function deleteSession($NombreSesion){
            if (isset($_SESSION[$NombreSesion])){
                $_SESSION[$NombreSesion] = null;
                unset ($_SESSION['$NombreSesion']);
            }
            return $NombreSesion;
        }




        //CPUEDO USARLA PARA BORRAR LAS SESIONES CUANDO TERMINA EL PEDIDO
        public static function logOut(){
            if (isset($_SESSION['LoginAdmin'])){
                $_SESSION['LoginAdmin'] = null;
                unset ($_SESSION['LoginAdmin']);
                header("location:".base_url.'login/index');
            }
        }



        //Llamar Configuracion de la Web
        public static function Config($dato){
            //Llamar al Modelo de Configuracion
            require_once 'models/configuracion.php';

            //Traer Dato
            $Config = new Configuracion();
            $ConfigObj = $Config->getConfiguracion();
            
            //Lo vuelvo datos manejables
            $ConfigDatos = $ConfigObj->fetch_object();
            //$ConfigDatos = $ConfigObj;

            //var_dump($ConfigDatos);
            //die;
            
            //Obtengo los Datos
            $NombreEmpresa = $ConfigDatos->NombreEmpresa;
            $Logo = $ConfigDatos->Logo;
            $Email = $ConfigDatos->Email;
            $Propietario = $ConfigDatos->Propietario;
            $Telefono = $ConfigDatos->Telefono;


            $Facebook = $ConfigDatos->Facebook;
            $Twitter = $ConfigDatos->Twitter;
            $Instagram = $ConfigDatos->Instagram;

            $LugarEntrega = $ConfigDatos->LugarEntrega;
            $NotaImportante = $ConfigDatos->NotaImportante;

            $MonedaSigno = $ConfigDatos->MonedaSigno;
            $MonedaTexto = $ConfigDatos->MonedaTexto;

            


            //Valido el Resultado
            if ($dato =='NombreEmpresa'){ $respuesta = $NombreEmpresa; }
            if ($dato =='Logo'){ $respuesta = $Logo; }
            if ($dato =='Email'){ $respuesta = $Email; }
            if ($dato =='Propietario'){ $respuesta = $Propietario; }
            if ($dato =='Telefono'){ $respuesta = $Telefono; }
            
            if ($dato =='Facebook'){ $respuesta = $Facebook; }
            if ($dato =='Twitter'){ $respuesta = $Twitter; }
            if ($dato =='Instagram'){ $respuesta = $Instagram; }

            if ($dato =='LugarEntrega'){ $respuesta = $LugarEntrega; }
            if ($dato =='NotaImportante'){ $respuesta = $NotaImportante; }

            if ($dato =='MonedaSigno'){ $respuesta = $MonedaSigno; }
            if ($dato =='MonedaTexto'){ $respuesta = $MonedaTexto; }

            //Enviado Respuesta
            return $respuesta;
        }
        

        //Mostrar todos los Productos en el Index
        public static function showProductos($QueProducto){
            require_once 'models/productos.php';
            $prod = new Productos();
            $produc = $prod->getAllTo($QueProducto);
            return $produc;
        }

        //Mostrar todas las cremas
        public static function showCremas(){
            require_once 'models/cremas.php';
            $Crema = new Crema();
            $Cremas = $Crema->getCremas();
            return $Cremas;
        }

        public static function MostrarPedido(){
            echo '<h1>Recorriendo toda la Session</h1>';

            echo '<ul>';
            for ($i=0; $i <count($_SESSION['carrito']); $i++){
                echo '<li> - ID: '.$_SESSION['carrito'][$i]['id_producto'].'</li>';
                echo '<li> - Producto: '.$_SESSION['carrito'][$i]['ProductoNombre'].'</li>';
                echo '<li> - Foto: '.$_SESSION['carrito'][$i]['Foto'].'</li>';
                echo '<li> - Precio: '.$_SESSION['carrito'][$i]['Precio'].'</li>';
                echo '<li> - Cantidad: '.$_SESSION['carrito'][$i]['Cantidad'].'</li>';
                echo '<li> - Subtotal: '.$_SESSION['carrito'][$i]['SubTotal'].'</li>';


                echo '<ul>';
                    for ($a=0; $a <count($_SESSION['carrito'][$i]['Cremas']); $a++){
                        echo '<strong>Cremas '.($a).'</strong>';
                        echo '<ul>';
                            echo '<li>   * Mayonesa: '.$_SESSION['carrito'][$i]['Cremas'][$a]['Mayonesa'].'</li>';
                            echo '<li>   * Mostaza: '.$_SESSION['carrito'][$i]['Cremas'][$a]['Mostaza'].'</li>';
                            echo '<li>   * Ketchup: '.$_SESSION['carrito'][$i]['Cremas'][$a]['Ketchup'].'</li>';
                            echo '<li>   * Ocopa: '.$_SESSION['carrito'][$i]['Cremas'][$a]['CremaOcopa'].'</li>';
                            echo '<li>   * Aceituna: '.$_SESSION['carrito'][$i]['Cremas'][$a]['CremaAceituna'].'</li>';
                            echo '<li>   * Chimichurri: '.$_SESSION['carrito'][$i]['Cremas'][$a]['Chimichurri'].'</li>';
                        echo '</ul>';
                    }
                echo '</ul>';
            }
            echo '</ul>';
        }

        //Mostrar Datos de cliente
        public static function DatoCliente($dato){
            $respuesta = "";
            if (isset($_SESSION['DatosCliente'])){
                if ($dato =='Nombre'){ $respuesta = $_SESSION['DatosCliente']['Nombre']; }
                if ($dato =='Celular'){ $respuesta = $_SESSION['DatosCliente']['Celular']; }
                if ($dato =='Email'){ $respuesta = $_SESSION['DatosCliente']['Email']; }
                if ($dato =='Mensaje'){ $respuesta = $_SESSION['DatosCliente']['Mensaje']; }
            }
            
            return $respuesta;
        }
      
    }
?>