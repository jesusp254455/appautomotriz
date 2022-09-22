<?php

    class clientes_modelo{

        public static function registrar($datos){
            $o = new conexion;
            $c = $o->getConexion();
            $sql = " INSERT INTO t_clientes (CLI_DOCUMENTO,CLI_NOMBRES,CLI_APELLIDOS,CLI_CODIGO,CLI_ESTADO,CLI_ROL,CLI_CONTRASENA)
            VALUES
            (?,?,?,?,?,?,?)";
            $p =$c->prepare($sql);
            $v = array($datos["documento"],$datos["nombres"],$datos["apellidos"],$datos["codigo"],$datos["estado"],$datos["rol"],sha1($datos["cont"]));
            return $p->execute($v);
        }

        public static function consid($documento){
            $o = new conexion;
            $c = $o->getConexion();
            $sql = "SELECT * FROM t_clientes  where CLI_DOCUMENTO   = ?";
            $p   = $c->prepare($sql);
            $v   =array($documento);
            $p->execute($v);
            return $p->fetch();
        }
        public static function act($id){
            $o = new conexion;
            $c = $o->getConexion();
            $sql = "SELECT * FROM t_clientes where CLI_ID  = ? ";
            $p = $c->prepare($sql);
            $v = array($id);
            $p->execute($v);
            return $p->fetch();
        }
        public static function editar($datos){
            $o = new conexion;
            $c = $o->getConexion();
            $sql = " UPDATE t_clientes SET  CLI_DOCUMENTO = ?, CLI_NOMBRES = ?,CLI_APELLIDOS = ?, CLI_CODIGO = ?, CLI_ROL = ?,CLI_CONTRASENA = ? WHERE CLI_ID = ?";
            $p   = $c->prepare($sql);
            $v   =array($datos["documento"],$datos["nombres"],$datos["apellidos"],$datos["codigo"],$datos["rol"],sha1($datos["cont"]),$datos["id"]);
            return $p->execute($v);
        }
        public static function buscarape($apellidos){
            $o  = new conexion; 
            $c  = $o->getConexion();
            $sql= "SELECT * FROM t_clientes  where CLI_APELLIDOS like '$apellidos%' AND CLI_ESTADO = 1";
            $p =$c->prepare($sql);
            $p->execute();
            return $p->fetchAll(); 
        }

        public static function eliminar($ide){
            $o = new conexion;
            $c = $o->getConexion();
            $Sql = "UPDATE t_clientes set CLI_ESTADO = 2  where CLI_ID = ?";
            $p = $c->prepare($Sql);
            $vec = array($ide);
           return $p->execute($vec);
        }
        
        public static function vali($datos){
            $o = new conexion;
            $c = $o->getConexion();
            $sql = "SELECT * FROM t_clientes WHERE CLI_DOCUMENTO = ? AND CLI_CONTRASENA =  ?";
            $p =$c->prepare($sql);
            $vec = array($datos["doc"],sha1($datos["cont"]));
            $p->execute($vec);
            return $p->fetch();
        }

        public static function vali1(){
            $o = new conexion;
            $c = $o->getConexion();
            $sql = "SELECT * FROM t_clientes where CLI_ESTADO  = 2 ";
            $p = $c->prepare($sql);
            $p->execute();
            return $p->fetch();
    }
}
    ?>