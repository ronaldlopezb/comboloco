<?php
   class Configuracion{

      //Todos los campos de mi Tabla AvUsuario
      private $IdConfig;
      private $NombreEmpresa;
      private $Logo;
      private $Email;
      private $Propietario;     
      private $Telefono;

      private $Facebook;
      private $Twitter;
      private $Instagram;

      private $LugarEntrega;
      private $NotaImportante;

      private $MonedaSigno;
      private $MonedaTexto;

      
      
      private $db;

      public function __construct(){
         $this->db = Database::Connect();
      }

      
      //GETTERS
      function getIdConfig() {
         return $this->IdConfig;
      }

      function getNombreEmpresa() {
         return $this->NombreEmpresa;
      }

      function getLogo() {
         return $this->Logo;
      }

      function getEmail() {
         return $this->Email;
      }

      function getPropietario() {
         return $this->Propietario;
      }

      function getTelefono() {
         return $this->Telefono;
      }

      function getFacebook() {
         return $this->Facebook;
      }

      function getTwitter() {
         return $this->Twitter;
      }

      function getInstagram() {
         return $this->Instagram;
      }

      function getLugarEntrega() {
         return $this->LugarEntrega;
      }

      function getNotaImportante() {
         return $this->NotaImportante;
      }

      function getMonedaSigno() {
         return $this->MonedaSigno;
      }

      function getMonedaTexto() {
         return $this->MonedaTexto;
      }


       
      
      //SETTERS
      function setIdConfig($IdConfig) {
         $this->IdConfig = $IdConfig;
      }

      function setNombreEmpresa($NombreEmpresa) {
         $this->NombreEmpresa = $NombreEmpresa;
      }

      function setLogo($Logo) {
         $this->Logo = $Logo;
      }

      function setEmail($Email) {
         $this->Email = $Email;
      }

      function setPropietario($Propietario) {
         $this->Propietario = $Propietario;
      }

      function setTelefono($Telefono) {
         $this->Telefono = $Telefono;
      }

      function setFacebook($Facebook) {
         $this->Facebook = $Facebook;
      }

      function setTwitter($Twitter) {
         $this->Twitter = $Twitter;
      }

      function setInstagram($Instagram) {
         $this->Instagram = $Instagram;
      }

      function setLugarEntrega($LugarEntrega) {
         $this->LugarEntrega = $LugarEntrega;
      }

      function setNotaImportante($NotaImportante) {
         $this->NotaImportante = $NotaImportante;
      }

      function setMonedaSigno($MonedaSigno) {
         $this->MonedaSigno = $MonedaSigno;
      }

      function setMonedaTexto($MonedaTexto) {
         $this->MonedaTexto = $MonedaTexto;
      }


         





      //Método para tener los datos de configuracion de la Web
      public function getConfiguracion(){
         $sql = " SELECT * FROM cbconfig";
         $config = $this->db->query($sql);
         return $config;
      }



   }

