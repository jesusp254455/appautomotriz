<?php

class rutas {
    public static function cargarContenido($cnt, $acc){

        $archivo = "controlador/".$cnt."_controlador.php";
       if(file_exists($archivo)){
        require_once $archivo;
        $clase   = $cnt."_controlador";
        $o       =  new $clase;
        if(method_exists($o, $acc)){
            $o->$acc();
        }else{
            echo " <br> metodo no $accion existe";
        }
       }else {
        echo "<br>el controlador no existe";
       }
    }
    
}

?>