<?php
    class estructura {
        public function unircontenido($contenido,$cargar=true){
            if($cargar == true ){
            require_once "vista/header.php";
            require_once "vista/$contenido".".php";
            require_once "vista/footer.php";
            }
            else{
                require_once "vista/$contenido".".php";
            }
        }

        public function contenido($contenido){
            require_once "vista/inicio/login".".php";
        }
    }
?>