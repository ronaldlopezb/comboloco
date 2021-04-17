<?php
   class Crema{

      //Todos los campos de mi Tabla AvUsuario
      private $IdCrema;
      private $Crema;
      private $Activo;
      
      private $db;

      public function __construct(){
         $this->db = Database::Connect();
      }

      
      //GETTERS
      function getIdCrema() {
         return $this->IdCrema;
      }

      function getCrema() {
         return $this->Crema;
      }

      function getActivo() {
         return $this->Activo;
      }

      

       
      
      //SETTERS
      function setIdCrema($IdCrema) {
         $this->IdCrema = $IdCrema;
      }

      function setCrema($Crema) {
         $this->Crema = $Crema;
      }

      function setActivo($Activo) {
         $this->Activo = $Activo;
      }

      


         





      //Método para obtener todas las cremas activas
      public function getCremas(){
         $sql = " SELECT * FROM cbcremas WHERE Activo = 1";
         $Crem = $this->db->query($sql);
         return $Crem;
      }



   }

