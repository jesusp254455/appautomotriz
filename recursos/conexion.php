<?php
class conexion{
   private $c;  				     // tendra la conexion hacia la BD
   private $usuario  = "";      // usuario de la base de datos
   private $password = "";          // password mysql
   private $host     = "mysql:host=localhost;dbname=apptaller;port=3307";

   private $usuario1  = "id19588659_jesusp2345";      // usuario de la base de datos
   private $password1 = "/$%e2kmt3S&R&SCT";          // password mysql
   private $host1     = "mysql:host=localhost;dbname=id19588659_bd";
   public function __construct(){
   		try{
            if ($_SERVER["SERVER_NAME"] == "localhost") {
               $this->c = new PDO($this->host , $this->usuario , $this->password);
            } else {
               $this->c = new PDO($this->host1 , $this->usuario1 , $this->password1);
            }
         $this->c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         }catch(PDOException $e){
   			echo "Error:".$e->getMessage();
   		}
   }

   public function getConexion(){ // get-> obtener, retorname
   	 	return $this->c;
   }
}
?>