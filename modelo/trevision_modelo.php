<?php
    class trevision_modelo {
        
        public static function registrar($datos){
            $o = new conexion;
            $c = $o->getConexion();
            $sql = "INSERT INTO t_tp_revision(TPREV_REV_ID,TPREV_FECHA,TPREV_TIPO,TPREV_OBS,TPREV_EST)
            VALUES  
             (?,?,?,?,?)";
            $p =$c->prepare($sql);
            $v = array($datos["co_id"],$datos["fec_rev"],$datos["tip_rev"],$datos["osb"],$datos["tip_est"]);
            return $p->execute($v);
        }
        public static function consultarcod($codigo){
            $o = new conexion;
            $c = $o->getConexion();
            $sql = "SELECT REV_CODIGO,TPREV_ID,TPREV_FECHA,TPREV_TIPO FROM t_tp_revision INNER JOIN t_revision ON TPREV_REV_ID  = REV_ID 
            WHERE REV_CODIGO LIKE '$codigo%' AND TPREV_EST = 1 ";
            $p = $c->prepare($sql);
            $p->execute();
            return $p->fetchALL();
        }
        public static function act($r){
            $o = new conexion;
            $c = $o->getConexion();
            $sql = "SELECT REV_CODIGO,TPREV_ID,TPREV_FECHA,TPREV_TIPO,TPREV_OBS FROM t_tp_revision INNER JOIN t_revision ON TPREV_REV_ID  = REV_ID where TPREV_ID = ? ";
            $p = $c->prepare($sql);
            $v = array($r);
            $p->execute($v);
            return $p->fetch();
        }
        public static function editar($datos){
            $o = new conexion;
            $c = $o->getConexion();
            $sql = "UPDATE t_tp_revision set TPREV_REV_ID = ?,TPREV_FECHA = ?,TPREV_TIPO = ?,TPREV_OBS = ? where TPREV_ID  = ?";
            $p =$c->prepare($sql);
            $v = array($datos["co_id"],$datos["fec_rev"],$datos["tip_rev"],$datos["osb"],$datos["id"]);
            return $p->execute($v);
        }
        public static function elim($id){
            $o = new conexion;
            $c = $o->getConexion();
            $sql = "UPDATE t_tp_revision SET TPREV_EST = 2 where TPREV_ID  = ?";
            $p =$c->prepare($sql);
            $v = array($id);
            return $p->execute($v);
        }
    }
?>