<?php
        require_once "modelo/coches_modelo.php";
        require_once "modelo/revision_modelo.php";
    class revision_controlador{

        public function __construct(){
            $this->vista = new estructura();
                    if(!isset($_SESSION["id"])){
                        header("location: /appautomotriz");
                         }
                     
        }

        public function principal(){
            if($_SESSION["rol"] == "administra" || $_SESSION["rol"] == "cliente" || $_SESSION["rol"] == "mecanico" ){
            $this->vista->unircontenido("revision/principal");
           } else{
                header("location: ?controlador=clientes&accion=salir");
            }
        }


        public function registrar(){
            if($_SESSION["rol"] == "administra" || $_SESSION["rol"] == "mecanico" ){
                $this->vista->unircontenido("revision/registrar");
            } else{
                header("location: ?controlador=clientes&accion=salir");
            }
        }

        public function frmregistrar(){
            if($_SESSION["rol"] == "administra" || $_SESSION["rol"] == 
            "mecanico" ){
            extract ($_POST);
            $r   = coches_modelo::busca($mat);
            if ($r > 0) {
                $datos["cod_coh"] = $r["CO_ID"];
                $datos["codigo"]  = $cod;
                $datos["rev_fecha"] = $rev_fecha;
                $datos["rev_des"] = $rev_des;
                $datos["rev_estado"] = 1;
                $r1 = revision_modelo::registrar($datos);
                if ($r1 > 0) {
                    echo json_encode(array("mensaje" => "registro","icono" => "success"));
                } else {
                    echo json_encode(array("mensaje" => "error al registrar","icono" => "error"));
                }
            }else{
                echo json_encode(array("mensaje" => "no se encontro esta placa","icono" => "error"));
        }
        } else{
            header("location: ?controlador=clientes&accion=salir");
        }
        
    }
        public function consultarplaca(){
            if($_SESSION["rol"] == "administra" || $_SESSION["rol"] == "cliente" || $_SESSION["rol"] == 
            "mecanico" ){
            extract($_POST);
            $datos = revision_modelo::consultarplaca($placa);
            $tbl   = "<table class='table'>";
                $tbl   .= "<tr>";
                $tbl   .= "<th>placa </th>";
                $tbl   .= "<th>codigo de la revision</th>";
                $tbl   .= "<th>fecha de revision</th>";
            $tbl   .= "</tr>";
            foreach($datos as $v){
            $rev= $v["REV_ID"];
            $e = "<button class='btn bg-gradient-dark'> <a  href='?controlador=revision&accion=eliminar&rev=$rev' class='eliminar'>Eliminar</a></button> ";
            $ed = "<a class='btn bg-gradient-primary' href='?controlador=revision&accion=act&rev=$rev'>Editar</a>";
            $d = "<a class='btn bg-gradient-primary' href='?controlador=revision&accion=detalles&rev=$rev'>detalles</a>";
            $tbl   .= "<tr>";
                $tbl   .= "<td>".$v["CO_MATRICULA"]."</td>";
                $tbl   .= "<td>".$v["REV_CODIGO"]."</td>";
                $tbl   .= "<td>".$v["REV_FECHA"]."</td>";
             if($_SESSION["rol"] == "mecanico" || $_SESSION["rol"] == "administra" ){
                $tbl   .= "<td>$ed</td>";
                $tbl   .= "<td>$e</td>";
                }
                $tbl   .= "<td>$d<td>";
            $tbl   .= "</tr>";
        }
            $tbl   .= "</table>";
            echo json_encode(array("mensaje"=>$tbl));
        } else{
            header("location: ?controlador=clientes&accion=salir");
        }
        
        }
        public function detalles(){
            if($_SESSION["rol"] == "administra" || $_SESSION["rol"] == "cliente" || $_SESSION["rol"] == 
            "mecanico" ){
            $rev = $_GET["rev"];
            $this->vista->datos = revision_modelo::detalles($rev);
            $this->vista->dato = revision_modelo::detalles1($rev);
            $this->vista->unircontenido("revision/detalles");
        } else{
            header("location: ?controlador=clientes&accion=salir");
        }
        
        }
        public function act(){
            if($_SESSION["rol"] == "administra"  || $_SESSION["rol"] == 
            "mecanico" ){
            $cod = $_GET["rev"];
            $this->vista->datos = revision_modelo::editar($cod);
            $this->vista->unircontenido("revision/actualizar");
            }else{
                header("location: ?controlador=clientes&accion=salir");
            }
        
        }
        public function editar(){
            if($_SESSION["rol"] == "administra" ||  $_SESSION["rol"] ==  "mecanico" ){
            extract ($_POST);
            $r   = coches_modelo::busca($mat);
            if ($r > 0) {
                $datos["cod_coh"] = $r["CO_ID"];
                $datos["codigo"]  = $codigo;
                $datos["rev_fecha"] = $rev_fecha;
                $datos["rev_des"] = $rev_des;
                $datos["rev_id"] = $id;
                $r1 = revision_modelo::act($datos);
                if ($r1 > 0) {
                    echo json_encode(array("mensaje" => "registro actualizado","icono" => "success"));
                } else {
                    echo json_encode(array("mensaje" => "registro no actualizado","icono" => "error"));
                }   
            }else{
                echo json_encode(array("mensaje" => "no se encontro esta placa","icono" => "error"));
        } 
        }else{
        header("location: ?controlador=clientes&accion=salir");
        }   
        }
        public function eliminar(){
            if($_SESSION["rol"] == "administra" || $_SESSION["rol"] == "mecanico"){
            $rev = $_GET["rev"];
            $r   = revision_modelo::elim($rev);
            if ($r > 0) {
                echo json_encode(array("mensaje" => " registro eliminado"));
              } else {
                echo json_encode(array("mensaje" => " registro no eliminado"));
              }
            }else{
                header("location: ?controlador=clientes&accion=salir");
                }  
        }
    }
?>