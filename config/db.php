<?php
class Database{
    public static function Connect(){
        $server = 'localhost';
        $user = 'root';
        $pass = '123456';
        $basedatos = 'comboloco';
        
        $db = new mysqli($server,$user,$pass,$basedatos); //Creo un Objeto llamado $db con los parametros de conexión
        $db->query("SET NAMES 'utf8'"); //Le digo que traiga los datos con UT8
        RETURN $db; //Retorno $db cuando lleme a DataBase->Connect
    }
}
?>