<?php
    require_once 'models/productos.php';

    class CarritoController{

        public function index(){
            require_once 'views/carrito/index.php';            
        }

        public function datoscliente(){
            require_once 'views/carrito/datoscliente.php';            
        }

        public function confirmarpedido(){
            require_once 'views/carrito/confirmarpedido.php';            
        }

        public function realizarpedido(){
            //TODO EL PEDIDO ESTA BIEN

            //1.- Guardar la informacion del pedido en la BD

            //2.- Borrar la Sesion de PEDIDO
            Utils::deleteSession('carrito');

            //3.- Borrar la Sesion de TOTAL GENERAL
            $_SESSION['TotalGeneral'] = 0;
            
            //4.- Enviar A FELICITACIONES
            require_once 'views/carrito/realizarpedido.php';            
        }




        //Verificar Pedido
        public function verificarpedido(){
            //Recibir datos POST
            if (isset($_POST)){
                $NombreCompleto = isset($_POST['TxtNombreCompleto']) ? $_POST['TxtNombreCompleto'] : false;
                $CelularWhatsapp = isset($_POST['TxtCelularWhatsapp']) ? $_POST['TxtCelularWhatsapp'] : false;
                $CorreoElectronico = isset($_POST['TxtCorreoElectronico']) ? $_POST['TxtCorreoElectronico'] : false;
                $MensajeAdicional = isset($_POST['TxtMensajeAdicional']) ? $_POST['TxtMensajeAdicional'] : false;

                if ($NombreCompleto && $CelularWhatsapp){
                    //Guardar datos en una Session
                    $_SESSION['DatosCliente']['Nombre'] = $NombreCompleto;
                    $_SESSION['DatosCliente']['Celular'] = $CelularWhatsapp;
                    $_SESSION['DatosCliente']['Email'] = $CorreoElectronico;
                    $_SESSION['DatosCliente']['Mensaje'] = $MensajeAdicional;
                    header('location:'.base_url.'carrito/confirmarpedido');
                }else{
                    $_SESSION['ErrorDatosCliente'] = 'failed';
                    header('location:'.base_url.'carrito/datoscliente');
                }
            }
        }


        //Add -> Agregar productos al Carrito
        public function add(){
            //Utils::deleteSession('carrito');
            if(isset($_GET['id'])){
                $producto_id = $_GET['id'];
            }else{
                header ('location:'.base_url);
            }
            
            
            if (isset($_SESSION['carrito'])){
                //Si la session de carrito ya existe
                $counter = 0;
                //Recorro el session y pregunto si el ID que recibo en GET es igual al indice de algun contenido en mi session.. de ser asi  aumento la cantidad
                foreach($_SESSION['carrito'] as $indice => $elemento) {
                    if ($elemento['id_producto'] == $producto_id){
                        
                        //Aumento la cantidad y actualizo el SubTotal
                        $_SESSION['carrito'][$indice]['Cantidad']++;
                        $_SESSION['carrito'][$indice]['SubTotal'] += $_SESSION['carrito'][$indice]['Precio'];

                        //Array de Cremas
                        $ArrayCremas = array();
                        $Crems = Utils::showCremas();
                        while ($crema = $Crems->fetch_object()) {
                            //$ArrayCremas[$crema->Crema][] = 'NO-Sin '.$crema->Crema;
                            $ArrayCremas[$crema->Crema] = '';
                        }

                        //$TotalCantidad =  $_SESSION['carrito'][$indice]['Cantidad'];
                        //Agrega el Array de cremas 
                        $_SESSION['carrito'][$indice]['Cremas'][] = $ArrayCremas;
                        //var_dump($_SESSION['carrito']);
                        //echo $_SESSION['carrito'][$indice]['Cremas'][0]['Mayonesa']; -->Sirve para mostrar el valor de una crema
                        $counter++;
                    }
                }   
            }

            //Si el contador no existe o es cero quiere decir que el producto es nuevo
            if(!isset($counter) || $counter == 0){
                //traemos los datos del productos
                $producto = new Productos();
                $producto->setIdProducto($producto_id);
                $prodObj = $producto->getOne();

                //echo '<br>--------------------------<br>de aqui para abajo es el objeto del controlador';
                //var_dump($prodObj);
                if (is_object($prodObj)){
                    //Objeto Array -> producto
                    $prod = array();

                    $id_producto = $prodObj->IdProducto;
                    $ProductoNombre=$prodObj->Producto;
                    $Foto=$prodObj->Foto;
                    $Precio=$prodObj->Precio;
                    $Cantidad=1;
                    $SubTotal = $Precio * $Cantidad;
                    
                    //Array de Cremas
                    $ArrayCremas = array();

                    $Crems = Utils::showCremas();
                    while ($crema = $Crems->fetch_object()) {
                        //$ArrayCremas[$crema->Crema] = 'Sin '.$crema->Crema;
                        $ArrayCremas[$crema->Crema] = '';
                    }
                                                               
                    //Dar valores al array de producto
                    $prod['id_producto'] = $id_producto;
                    $prod['ProductoNombre'] = $ProductoNombre;
                    $prod['Foto'] = $Foto;
                    $prod['Precio'] = $Precio;
                    $prod['Cantidad'] = $Cantidad;
                    $prod['SubTotal'] = $SubTotal;
                    $prod['Cremas'][] = $ArrayCremas;

                    // Dar valores al carrito
                    $_SESSION['carrito'][]= $prod;
                    //var_dump($_SESSION['carrito']);
                    //print_r($_SESSION['carrito']);
                } 
            }
            
            //echo '<br>--------------------------<br>de aqui para abajo es el $_SESSION[carrito]';
            //var_dump($_SESSION['carrito']);
            print_r($_SESSION['carrito']);
            header('location:'.base_url.'carrito/index');
        }



        public function remove(){
            if(isset($_GET['ip'])){
                $IndiceProducto = $_GET['ip'];
                if(isset($_GET['ic'])){
                    $IndiceCrema = $_GET['ic'];

                    //Obtener el Total de Productos
                    $TotalProductos = count($_SESSION['carrito']);
                    //echo 'Total de Productos: '.$TotalProductos.'<br>';

                    //Obtener el Total de Cremas de el prodcuto
                    $TotalCremas = count($_SESSION['carrito'][$IndiceProducto]['Cremas']);
                    //echo 'Total de Cremas: '.$TotalCremas.'<br>';

                    //Si se debe borrar todo el array
                    if ($TotalProductos == 1 && $TotalCremas == 1){
                        //echo '<h1>se borrará todo el array</h1>';
                        unset($_SESSION['carrito']);
                    }else{
                        //Si hay varios productos pero una sola crema
                        if ($TotalProductos > 1 && $TotalCremas == 1){
                            //echo '<h1>Se borrara todo este producto pero se dejará lo demas</h1>';
                            unset($_SESSION['carrito'][$IndiceProducto]);
                        }else{
                            //echo '<h1>Se borrará las cremas</h1>';
                            //Aumento la cantidad y actualizo el SubTotal
                            $_SESSION['carrito'][$IndiceProducto]['Cantidad'] -=1;
                            $_SESSION['carrito'][$IndiceProducto]['SubTotal'] -= $_SESSION['carrito'][$IndiceProducto]['Precio'];

                            //Borrar el Elemento
                            unset($_SESSION['carrito'][$IndiceProducto]['Cremas'][$IndiceCrema]);
                            $_SESSION['carrito'][$IndiceProducto]['Cremas'] = array_values($_SESSION['carrito'][$IndiceProducto]['Cremas']);
                        }
                    }
                    
                    ///////////////////////////////////////////////////////
                    //Reindexar Carrito
                    $_SESSION['carrito'] = array_values($_SESSION['carrito']);
                    //Enviar al Carrito
                    header('location:'.base_url.'carrito/index');

                }else{
                    header ('location:'.base_url);
                    //echo 'ERROR: No existe IC';
                }
            }else{
                header ('location:'.base_url);
                //echo 'ERROR: No existe IP';
            }
            
        }



        public function delete_all(){
            unset($_SESSION['carrito']);
            header('location:'.base_url.'carrito/index');
        }
        
    }
?>

