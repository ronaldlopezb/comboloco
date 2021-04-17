<?php
   class Productos{

      //Todos los campos de mi Tabla AvUsuario
      private $IdProducto;
      private $Producto;
      private $Descripcion;
      private $Precio;     
      private $Foto;
      private $Orden;
      
      private $db;

      public function __construct(){
         $this->db = Database::Connect();
      }

      
      //GETTERS
      function getIdProducto() {
         return $this->IdProducto;
      }

      function getProducto() {
         return $this->Producto;
      }

      function getDescripcion() {
         return $this->Descripcion;
      }

      function getPrecio() {
         return $this->Precio;
      }

      function getFoto() {
         return $this->Foto;
      }

      function getOrden() {
         return $this->Orden;
      }

      

      //SETTERS
      function setIdProducto($IdProducto) {
         $this->IdProducto = $IdProducto;
      }

      function setProducto($Producto) {
         $this->Producto = $Producto;
      }

      function setDescripcion($Descripcion) {
         $this->Descripcion = $Descripcion;
      }

      function setPrecio($Precio) {
         $this->Precio = $Precio;
      }

      function setFoto($Foto) {
         $this->Foto = $Foto;
      }

      function setOrden($Orden) {
         $this->Orden = $Orden;
      }

      
      

      
      //Método para trader los productos por LIKE multiples
      public function getAllTo($QueProducto){
         $listaproductos = explode(",", $QueProducto);

         if ($listaproductos[0] == '' ){

            $sql = "SELECT * FROM cbProductos ORDER BY orden";

         }else if (count($listaproductos) == 1 and $listaproductos[0] != ''){

            $sql = "SELECT * FROM cbProductos WHERE Producto LIKE '%$listaproductos[0]%' ORDER BY orden";

         }else if (count($listaproductos) > 1){

            $sql = "SELECT * FROM cbProductos WHERE (";

            $total = count($listaproductos);

            for ($x = 0; $x != $total; $x++){
               $sql .= " Producto LIKE '%$listaproductos[$x]%' OR ";
            }
            $sql = substr($sql, 0, -3);

            $sql .= ") ORDER BY orden";
         }
         //echo $sql;
         
         $productos = $this->db->query($sql);
         return $productos;
      }


      //Método para traer 1 productos por su ID
      public function getOne(){
         $sql = " SELECT * FROM cbproductos WHERE IdProducto = {$this->getIdProducto()} ORDER BY orden";
         $producto = $this->db->query($sql);
         return $producto->fetch_object();
      }



   }

