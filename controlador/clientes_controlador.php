<?php
        require_once "modelo/clientes_modelo.php";
        class clientes_controlador{


            public function __construct(){
                    $this->vista = new estructura();
                    if(isset($_SESSION["id"])){
                        $this->vista = new estructura();
                         }
            }

            public function principal(){
                if($_SESSION["rol"] == "administra" || $_SESSION["rol"] == "secretaria"){
                    $this->vista->Unircontenido("clientes/principal");
                } 
                else {
                    header("location: ?controlador=inicio&accion=principal");
                } 
                
                }

            public function frmregistrar(){
                if($_SESSION["rol"] == "administra" || $_SESSION["rol"] == "secretaria"){
                $this->vista->unircontenido("clientes/registrar");
                } 
                else {
                header("location: ?controlador=inicio&accion=principal");
                } 
                
                }
            public function registrar(){
                extract($_POST);
                $datos["documento"] = $documento;
                $datos["nombres"]   = $nombres;
                $datos["apellidos"] = $apellidos;
                $datos["codigo"]    = $codigo;
                $datos["estado"]    = 1;
                $datos["rol"]       = $rol;
                $datos["cont"]          =$documento;
                $r = clientes_modelo::registrar($datos);
                if ($r > 0) {
                echo json_encode(array("mensaje" => "registro","icono" => "success"));
                } else {
                echo json_encode(array("mensaje" => "error al registrar","icono" => "error"));
                } 
            }
            
            public function act(){
                if($_SESSION["rol"] == "secretaria" || $_SESSION["rol"] == "administra" ) { 
                $id = $_GET["id"];
                $this->vista->dato = clientes_modelo::act($id);
                $this->vista->unircontenido("clientes/actualizar");
                 } else{
                    header("location: ?controlador=inicio&accion=principal");
                }  
            }
            public function editar(){
                extract($_POST);
                $datos["documento"] = $documento;
                $datos["nombres"]   = $nombres;
                $datos["apellidos"]   = $apellidos;
                $datos["codigo"]   = $codigo;
                $datos["rol"]       = $rol;
                $datos["cont"] = $documento;
                $datos["id"]       = $id;
                $r = clientes_modelo::editar($datos);
                if ($r > 0) {
                echo json_encode(array("mensaje" => "registro actualizado","icono" => "success"));
                } else {
                echo json_encode(array("mensaje" => "error al actualizar el registro","icono" => "error"));
                      }  
                
                }
                
                public function consultarxape(){
                    if($_SESSION["rol"] == "secretaria" || $_SESSION["rol"] == "administra" ) {
                    extract($_POST);
                    $datos = clientes_modelo::buscarape($apellidos);
                    
                    $tbl   = "<table class='table table-hover'>";
                    $tbl   .= "<tr>";
                            $tbl .="<td>nombres</td>";
                            $tbl .="<td>apellidos</td>";
                            $tbl .="<td>documento</td>";
                            $tbl .="<td>codigo</td>";
                            $tbl .="<td>rol</td>";
                    $tbl   .= "</tr>";
                    foreach($datos as $v){
                        $id = $v["CLI_ID"];
                        $e  = "<button  class='btn bg-gradient-dark'><a href='?controlador=clientes&accion=eliminar&id=$id' class='eliminar'>eliminar</a></button>";
                        $ed  = "<a href='?controlador=clientes&accion=act&id=$id'  class='btn bg-gradient-primary'>editar</a>";
                        $tbl .="<tr>";
                            $tbl .="<td>".$v["CLI_NOMBRES"]."</td>";
                            $tbl .="<td>".$v["CLI_APELLIDOS"]."</td>";
                            $tbl .="<td>".$v["CLI_DOCUMENTO"]."</td>";
                            $tbl .="<td>".$v["CLI_CODIGO"]."</td>";
                            $tbl .="<td>".$v["CLI_ROL"]."</td>";
                            $tbl .="<td>$e</td>";
                            $tbl .="<td>$ed</td>";
                        $tbl .="</tr>";
                    }
                    $tbl .="</table";
                    echo json_encode(array("mensaje" => $tbl));
                }else{
                        header("location: ?controlador=inicio&accion=principal");
                    }  
                }

                public function eliminar(){
                    if($_SESSION["rol"] == "secretaria" || $_SESSION["rol"] == "administra" ) {
                      $ide = $_GET["id"];
                      $r   = clientes_modelo::eliminar($ide);
                      if ($r > 0) {
                        echo json_encode(array("mensaje" => " cliente eliminado"));
                      } else {
                        echo json_encode(array("mensaje" => " cliente no eliminado"));
                      }
                    }else{
                        header("location: ?controlador=clientes&accion=salir");
                    } 
                    }

                    
                    public function validar(){
                        extract($_POST);
                        $datos["doc"] = $documento;
                        $datos["cont"] = $password;
                        $r = clientes_modelo::vali($datos);
                        if($r > 0){
                            $_SESSION["nombres"] = $r["CLI_NOMBRES"];
                            $_SESSION["apellidos"] = $r["CLI_APELLIDOS"];
                            $_SESSION["rol"] = $r["CLI_ROL"];
                            $_SESSION["id"] = $r["CLI_ID"];
                            $rta = clientes_modelo::vali1();
                            if($rta > 0){
                                    echo json_encode(array(
                                        "mensaje" => "usuario no registrado"
                                        , "icono" => "error"));
                            }else {
                                echo json_encode(array(
                                    "mensaje" => "usuario registrado"
                                    , "icono" => "succes",
                                    "URL" => "?controlador=inicio&accion=principal"));
                            }
                        }else{
                            echo json_encode(array(
                                "mensaje" => "usuario no registrado"
                                , "icono" => "error"));
                        }
                        
                    }

                public function salir(){
                    session_destroy();
                    header("location: /appautomotriz");
                }
            }
        
    ?>