<?php
    class PedidosController{

        public function mipedido(){
            //Antes de mostrar la pagina de pedido debo verificar 
            //que producto se esta agregando para meterlo en la SESSION de PEDIDO
            require_once 'views/pedidos/mipedido.php';            
        }

        public function especiales(){
            require_once 'views/pedidos/especiales.php';
        }

        public function addCarrito(){
            
        }
        
    }
?>