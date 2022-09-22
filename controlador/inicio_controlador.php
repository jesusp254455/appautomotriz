<?php
    class inicio_controlador {

        public function __construct(){
            $this->vista = new estructura();   
        }

        public function index(){
            if(!isset($_SESSION["id"])){
                $this->vista->unircontenido("inicio/pagina",false);
            }else{
                $this->vista->unircontenido("inicio/principal");
            }

        }
        public function principal(){
            if(!isset($_SESSION["id"])){
                header("location: /appautomotriz");
            }
            $this->vista->unircontenido("inicio/principal");
        }

        public  function login(){
            $this->vista->contenido("inicio/login");
        }
    }
?>