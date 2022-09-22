<?php

        class coches_modelo{

            public static function registrar($datos){
                $o  = new conexion;
                $c  = $o->getConexion();
                $sql = "INSERT INTO t_coche (CO_CLI_ID,CO_MARCA,CO_COLOR,CO_PRECIO,CO_MODELO, CO_MATRICULA,CO_FECHA_COMPRA,CO_ESTADO)
                VALUES
                (?,?,?,?,?,?,?,?)";
                $p =$c->prepare($sql);
                $v = array($datos["documento"],$datos["marca"],$datos["color"],$datos["precio"],$datos["modelo"],$datos["matricula"],$datos["fch_compra"],$datos["estado"]);
                return $p->execute($v);
            }
            public static function consultarmarca($marca){
                $o = new conexion();
                $c = $o->getConexion();
                $sql = "SELECT CLI_DOCUMENTO,CO_ID,CO_MARCA,CO_COLOR FROM t_coche 
                        INNER JOIN t_clientes on CO_CLI_ID = CLI_ID WHERE  
                        CO_MARCA LIKE '$marca%' AND CO_ESTADO = 1";
                $s = $c->prepare($sql);
                $s->execute();        
                return $s->fetchAll();
              }
            
            public static function busca($mat){
                $o = new conexion;
                $c = $o->getConexion();
                $sql = " SELECT * FROM t_coche WHERE CO_MATRICULA  = ?";
                $p  =$c->prepare($sql);
                $v = array($mat);
                $p->execute($v);
                return $p->fetch();
            }
            public static function actu($cod){
                $o = new conexion;
                $c = $o->getConexion();
                $sql = "SELECT CLI_DOCUMENTO,CO_ID,CO_MARCA,CO_COLOR,CO_PRECIO,CO_MODELO,CO_MATRICULA,CO_FECHA_COMPRA,CO_ESTADO FROM t_clientes INNER JOIN t_coche ON CO_CLI_ID = CLI_ID WHERE CO_ID = ? ";
                $p = $c->prepare($sql);
                $v = array($cod);
                $p->execute($v);
                return $p->fetch();
            }
            public static function editar($datos){
                $o = new conexion;
            $c = $o->getConexion();
            $sql = " UPDATE t_coche SET CO_CLI_ID = ?, CO_MARCA = ?,CO_COLOR = ?,CO_PRECIO = ?, CO_MODELO = ?, CO_MATRICULA = ?, CO_FECHA_COMPRA = ? WHERE CO_ID  = ? ";
            $p   = $c->prepare($sql);
            $v   =array($datos["documento"],$datos["marca"],$datos["color"],$datos["precio"],$datos["modelo"],$datos["matricula"],$datos["fch_compra"],$datos["coche_id"]);
            return $p->execute($v);
            }
            public static function eliminar($codigo){
            $o = new conexion;
            $c = $o->getConexion();
            $Sql = "UPDATE t_coche SET CO_ESTADO = 2 where CO_ID = ?";
            $p = $c->prepare($Sql);
            $vec = array($codigo);
           return $p->execute($vec);
            }
        
            public static function detalles($co_id){
                $o = new conexion();
                $c = $o->getConexion();
                $sql = "SELECT CLI_DOCUMENTO,CLI_NOMBRES,CO_ID,CO_MARCA,CO_COLOR,CO_PRECIO,CO_MODELO,CO_MATRICULA,CO_FECHA_COMPRA,CO_ESTADO FROM t_coche 
                        INNER JOIN t_clientes on CO_CLI_ID = CLI_ID WHERE  
                        CO_ID = ?"; 
                $p = $c->prepare($sql);
                $v = array($co_id);
                $p->execute($v);        
                return $p->fetch();
            }
        }

?>