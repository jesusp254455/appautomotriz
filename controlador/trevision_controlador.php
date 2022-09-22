<?php   
        require_once "modelo/revision_modelo.php";
        require_once "modelo/trevision_modelo.php";
    class trevision_controlador{

        public function __construct(){
            if(isset($_SESSION["id"])){
                $this->vista = new estructura();
                     }
        }
        public function principal(){
            if($_SESSION["rol"] == "administra" || $_SESSION["rol"] == "mecanico" ){
            $this->vista->unircontenido("tip_revision/principal");
        } else{
            header("location: ?controlador=inicio&accion=principal");
        }
        }
        
        public function registrar(){
            if($_SESSION["rol"] == "administra" || $_SESSION["rol"] == "mecanico" ){
            $this->vista->unircontenido("tip_revision/registrar");
        } else{
            header("location: ?controlador=inicio&accion=principal");
        }
        } 
        
        public function frmregistrar(){
            if($_SESSION["rol"] == "administra" || $_SESSION["rol"] == "mecanico" ){
          extract($_POST);
          $r = revision_modelo::busca($cod);
          if ($r > 0) {
            $datos["co_id"] = $r["REV_ID"];
            $datos["fec_rev"] = $fec_rev;
            $datos["tip_rev"] = $tip_rev;
            $datos["osb"] =     $osb;
            $datos["tip_est"] = 1;
            $r1 = trevision_modelo::registrar($datos);
            if ($r1 > 0) {
                echo json_encode(array("mensaje" => "registro exitoso","icono" => "success"));
            } else {
                echo json_encode(array("mensaje" => " error de registro ","icono" => "error"));
            }
            
          } else {
            echo json_encode(array("mensaje" => "codigo no existe", "icono" => "error"));
          }
        } else{
            header("location: ?controlador=inicio&accion=principal");
        }
        }
        public function consultarxcod(){
            if($_SESSION["rol"] == "administra" || $_SESSION["rol"] == "mecanico" ){
            extract($_POST);
            $datos  = trevision_modelo::consultarcod($codigo);
            $tbl    = "<table class='table'>";
            $tbl    .="<tr>";
                $tbl .= "<th>codigo de revision</th>";
                $tbl .= "<th>fecha de revision</th>";
                $tbl .= "<th>tipo de revision </th>";
            $tbl    .="</tr>";
            foreach ($datos as $value) {
               $rev_tip =  $value["TPREV_ID"];
               $eli = "<button class='btn bg-gradient-dark'><a href='?controlador=trevision&accion=eliminar&rtip=$rev_tip' class='eliminar' >Eliminar</a></button>";
               $edi = "<a class='btn bg-gradient-primary' href='?controlador=trevision&accion=act&retip=$rev_tip'>editar</a>";
               $tbl    .="<tr>";
                    $tbl .="<td>".$value["REV_CODIGO"]."</td>";
                    $tbl .="<td>".$value["TPREV_FECHA"]."</td>";
                    $tbl .="<td>".$value["TPREV_TIPO"]."</td>";
                    $tbl .="<td>$edi</td>";
                    $tbl .="<td>$eli</td>";
               $tbl    .="</tr>";
            }
                $tbl .="</table>";
                echo json_encode(array("mensaje" => $tbl));
            } else{
                header("location: ?controlador=inicio&accion=principal");
            }
        }
        public function act(){
            if($_SESSION["rol"] == "administra" || $_SESSION["rol"] == "mecanico" ){
            $r = $_GET["retip"];
            $this->vista->dto =trevision_modelo::act($r);
            $this->vista->unircontenido("tip_revision/editar");
        } else{
            header("location: ?controlador=inicio&accion=principal");
        }
        }
        public function editar(){
            if($_SESSION["rol"] == "administra" || $_SESSION["rol"] == "mecanico" ){
            extract($_POST);
          $r = revision_modelo::busca($cod);
          if ($r > 0) {
            $datos["co_id"] = $r["REV_ID"];
            $datos["fec_rev"] = $fec_rev;
            $datos["tip_rev"] = $tip_rev;
            $datos["osb"] =     $osb;
            $datos["id"]      = $id;
            $r1 = trevision_modelo::editar($datos);
            if ($r1 > 0) {
                echo json_encode(array("mensaje" => "registro actualizado","icono" => "success"));
            } else {
                echo json_encode(array("mensaje" => " registro no actualizado ","icono" => "error"));
            }
            
          } else {
            echo json_encode(array("mensaje" => "codigo no existe", "icono" => "error"));
          }
        } else{
            header("location: ?controlador=inicio&accion=principal");
        }
        }
        public function eliminar(){
            if($_SESSION["rol"] == "administra" || $_SESSION["rol"] == "mecanico" ){
            $id = $_GET["rtip"];
            $r = trevision_modelo::elim($id);
            if ($r > 0) {
                echo json_encode(array("mensaje" => "registro eliminado"));
            } else {
                echo json_encode(array("mensaje" => "registro no eliminado"));
            }
        } else{
            header("location: ?controlador=clientes&accion=salir");
        }
        }
    }
?>