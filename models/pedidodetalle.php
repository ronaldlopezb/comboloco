<?php
   class PedidoDetalle{

      //Todos los campos de mi Tabla AvUsuario
      private $IdDetalle;
      private $CodigoPedido;
      
      private $ProductoNombre;
      private $PrecioUnitario;     
      private $Cantidad;
      private $Subtotal;

      private $Mayonesa;
      private $Mostaza;
      private $Ketchup;
      private $CremaOcopa;
      private $CremaAceituna;
      private $Chimichurri;
      
      private $db;

      public function __construct(){
         $this->db = Database::Connect();
      }

      
      //GETTERS
      function getIdDetalle() {
         return $this->IdDetalle;
      }

      function getCodigoPedido() {
         return $this->CodigoPedido;
      }

      function getProductoNombre() {
         return $this->ProductoNombre;
      }

      function getPrecioUnitario() {
         return $this->PrecioUnitario;
      }

      function getCantidad() {
         return $this->Cantidad;
      }

      function getSubtotal() {
         return $this->Subtotal;
      }

      function getMayonesa() {
         return $this->Mayonesa;
      }

      function getMostaza() {
         return $this->Mostaza;
      }

      function getKetchup() {
         return $this->Ketchup;
      }

      function getCremaOcopa() {
         return $this->CremaOcopa;
      }

      function getCremaAceituna() {
         return $this->CremaAceituna;
      }

      function getChimichurri() {
         return $this->Chimichurri;
      }

      

      //SETTERS
      function setIdDetalle($IdDetalle) {
         $this->IdDetalle = $IdDetalle;
      }

      function setCodigoPedido($CodigoPedido) {
         $this->CodigoPedido = $CodigoPedido;
      }

      function setProductoNombre($ProductoNombre) {
         $this->ProductoNombre = $ProductoNombre;
      }

      function setPrecioUnitario($PrecioUnitario) {
         $this->PrecioUnitario = $PrecioUnitario;
      }

      function setCantidad($Cantidad) {
         $this->Cantidad = $Cantidad;
      }

      function setSubtotal($Subtotal) {
         $this->Subtotal = $Subtotal;
      }

      function setMayonesa($Mayonesa) {
         $this->Mayonesa = $Mayonesa;
      }

      function setMostaza($Mostaza) {
         $this->Mostaza = $Mostaza;
      }

      function setKetchup($Ketchup) {
         $this->Ketchup = $Ketchup;
      }

      function setCremaOcopa($CremaOcopa) {
         $this->CremaOcopa = $CremaOcopa;
      }

      function setCremaAceituna($CremaAceituna) {
         $this->CremaAceituna = $CremaAceituna;
      }

      function setChimichurri($Chimichurri) {
         $this->Chimichurri = $Chimichurri;
      }

      
      

      
      
      
      
      

      //Método para llamar al Footer
      public function getFooter(){
         $sql = " SELECT AvFooter FROM avconfiguracion";
         $configfooter = $this->db->query($sql);
         return $configfooter;
      }




      //Método para tener los datos de configuracion primaria
      public function getConfiguracionPrimaria(){
         $sql = " SELECT AvNombreWeb, AvMetaDescription, AvMetaKeyWords, AvFavico, AvFooter FROM avconfiguracion";
         $configPri = $this->db->query($sql);
         return $configPri;
      }



   }

