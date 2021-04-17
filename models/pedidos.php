<?php
   class Pedidos{

      //Todos los campos de mi Tabla AvUsuario
      private $IdPedido;
      private $PedidoFechaHora;
      private $ClienteNombre;
      private $ClienteTelefono;     
      private $ClienteCorreo;

      private $FechaRecojo;
      private $HoraRecojo;
      private $Total;
      
      private $db;

      public function __construct(){
         $this->db = Database::Connect();
      }

      
      //GETTERS
      function getIdPedido() {
         return $this->IdPedido;
      }

      function getPedidoFechaHora() {
         return $this->PedidoFechaHora;
      }

      function getClienteNombre() {
         return $this->ClienteNombre;
      }

      function getClienteTelefono() {
         return $this->ClienteTelefono;
      }

      function getClienteCorreo() {
         return $this->ClienteCorreo;
      }

      function getFechaRecojo() {
         return $this->FechaRecojo;
      }

      function getHoraRecojo() {
         return $this->HoraRecojo;
      }

      function getTotal() {
         return $this->Total;
      }

      

      //SETTERS
      function setIdPedido($IdPedido) {
         $this->IdPedido = $IdPedido;
      }

      function setPedidoFechaHora($PedidoFechaHora) {
         $this->PedidoFechaHora = $PedidoFechaHora;
      }

      function setClienteNombre($ClienteNombre) {
         $this->ClienteNombre = $ClienteNombre;
      }

      function setClienteTelefono($ClienteTelefono) {
         $this->ClienteTelefono = $ClienteTelefono;
      }

      function setClienteCorreo($ClienteCorreo) {
         $this->ClienteCorreo = $ClienteCorreo;
      }

      function setFechaRecojo($FechaRecojo) {
         $this->FechaRecojo = $FechaRecojo;
      }

      function setHoraRecojo($HoraRecojo) {
         $this->HoraRecojo = $HoraRecojo;
      }

      function setTotal($Total) {
         $this->Total = $Total;
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

