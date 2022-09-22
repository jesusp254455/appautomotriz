<?php
    require_once "modelo/clientes_modelo.php";
    require_once "modelo/coches_modelo.php";
    class coches_controlador{

        public function __construct(){
        
                if(isset($_SESSION["id"])){
                    $this->vista = new estructura();
                         }else{
                            header("location: ?controlador=inicio&accion=principal");  
                         }
        }

        public function index(){
            if($_SESSION["rol"] == "secretaria" || $_SESSION["rol"] == "administra" ) { 
            $this->vista->unircontenido("coche/principal");
        }else{
            header("location: ?controlador=inicio&accion=principal");
        }
        }

        public function frmregistrar(){
            if($_SESSION["rol"] == "secretaria" || $_SESSION["rol"] == "administra" ) { 
            $this->vista->unircontenido("coche/registrar");
        }else{
            header("location: ?controlador=inicio&accion=principal");
        }
        }

        public function registrar(){
            if($_SESSION["rol"] == "secretaria" || $_SESSION["rol"] == "administra" ) { 
            extract($_POST);
            $r = clientes_modelo::consid($documento);
            if ($r > 0) {
                $datos["documento"] = $r["CLI_ID"];
                $datos["marca"]      = $marca;
                $datos["color"]      = $color;
                $datos["precio"]     = $precio;
                $datos["modelo"]     = $modelo;
                $datos["matricula"]  = $matricula;
                $datos["fch_compra"] = $fch_compra;
                $datos["estado"]     = 1;
                $r1 = coches_modelo::registrar($datos);
                if ($r1 > 0) {
                    echo json_encode(array("mensaje" => "registrado","icono" => "success"));
                } else {
                    echo json_encode(array("mensaje" => "error de registro","icono" => "error"));
                }      
            }else{
                echo json_encode(array("mensaje" => "no se encontro este cliente","icono" => "error"));
            }
        }else{
            header("location: ?controlador=inicio&accion=principal");
        }
        }
        public function consultarmarca(){
            if($_SESSION["rol"] == "secretaria" || $_SESSION["rol"] == "administra" ) {
            extract($_POST);
            $datos = coches_modelo::consultarmarca($marca);
            $tbl   = "<table class='table'>";
            $tbl   .= "<tr>";
            $tbl   .= "<td>Documento </td>";
            $tbl   .= "<td>marca</td>";
            $tbl   .= "<td>color</td>";
            $tbl   .= "</tr>";
            foreach($datos as $v){
            $id= $v["CO_ID"];
            $e = "<button  class='btn bg-gradient-dark'><a href='?controlador=coches&accion=eliminar&id=$id' class='eliminar'>Eliminar</a></button>";
            $ed = "<a href='?controlador=coches&accion=act&id=$id'
            class='btn bg-gradient-primary'>Editar</a>";
            $d = "<a href='?controlador=coches&accion=detalles&id=$id'
            class='btn bg-gradient-primary'>detalles</a>";
            $tbl   .= "<tr>";
            $tbl   .= "<td>".$v["CLI_DOCUMENTO"]."</td>";
            $tbl   .= "<td>".$v["CO_MARCA"]."</td>";
            $tbl   .= "<td>".$v["CO_COLOR"]."</td>";
            $tbl   .= "<td>$ed</td>";
            $tbl   .= "<td>$e</td>";
            $tbl   .= "<td>$d<td>";
            $tbl   .= "</tr>";
        }
            $tbl   .= "</table>";
            echo json_encode(array("mensaje"=>$tbl));
        }else{
            header("location: ?controlador=inicio&accion=principal");
        }
        }
        
        public function detalles(){
            if($_SESSION["rol"] == "secretaria" || $_SESSION["rol"] == "administra" ) {
            $co_id = $_GET["id"];
            $this->vista->dta = coches_modelo::detalles($co_id);
            $this->vista->unircontenido("coche/detalle");
        }else{
            header("location: ?controlador=inicio&accion=principal");
        }
        }  
        
        public function act(){
            if($_SESSION["rol"] == "secretaria" || $_SESSION["rol"] == "administra" ) {
            $cod = $_GET["id"];
            $this->vista->dato = coches_modelo::actu($cod);
            $this->vista->unircontenido("coche/actualizar");
        }else{
            header("location: ?controlador=inicio&accion=principal");
        }
        }
        public function editar(){
            if($_SESSION["rol"] == "secretaria" || $_SESSION["rol"] == "administra" ) {
            extract($_POST);
            $r = clientes_modelo::consid($documento);
            if ($r > 0) {
                $datos["documento"] = $r["CLI_ID"];
                $datos["marca"]      = $marca;
                $datos["color"]      = $color;
                $datos["precio"]     = $precio;
                $datos["modelo"]     = $modelo;
                $datos["matricula"]  = $matricula;
                $datos["fch_compra"] = $fch_compra;
                $datos["estado"]     = 1;
                $datos["coche_id"]  = $coche_id;
                $r1 = coches_modelo::editar($datos);
                if ($r1 > 0) {
                    echo json_encode(array("mensaje" => "registro actualizado","icono" => "success"));
                } else {
                    echo json_encode(array("mensaje" => "error de actualizacion","icono" => "error"));
                }      
            }else{
                echo json_encode(array("mensaje" => "no se encontro este cliente","icono" => "error"));
            }
            }else{
                header("location: ?controlador=inicio&accion=principal");
            }
        }
        public function eliminar(){
            if($_SESSION["rol"] == "secretaria" || $_SESSION["rol"] == "administra" ) {
            $codigo = $_GET["id"];
            $r   = coches_modelo::eliminar($codigo);
            if ($r > 0) {
              echo json_encode(array("mensaje" => "registro eliminado"));
            } else {
              echo json_encode(array("mensaje" => " registro no eliminado"));
            }
        }else{
            header("location: ?controlador=inicio&accion=principal");
        }
        }



    }

?>