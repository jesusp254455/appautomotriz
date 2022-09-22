<?php

    class revision_modelo{

        public static function registrar($datos){
                $o  = new conexion;
                $c  = $o->getConexion();
                $sql = "INSERT INTO t_revision (REV_CO_ID,REV_CODIGO,REV_FECHA,REV_OBS,REV_ESTADO)
                VALUES
                (?,?,?,?,?)";
                $p =$c->prepare($sql);
                $v = array($datos["cod_coh"],$datos["rev_fecha"],$datos["rev_fecha"],$datos["rev_des"],$datos["rev_estado"]);
                return $p->execute($v);
        }
        public static function consultarplaca($placa){
            $o = new conexion();
            $c = $o->getConexion();
            $sql = "SELECT CO_MATRICULA,REV_CODIGO,REV_FECHA,REV_ID,REV_ESTADO FROM t_coche
                    INNER JOIN t_revision on REV_CO_ID  = CO_ID 
                    WHERE  CO_MATRICULA LIKE '$placa%' AND REV_ESTADO = 1";
            $s = $c->prepare($sql);
            $s->execute();        
            return $s->fetchAll();
        }
        public static function editar($cod){
            $o = new conexion;
            $c = $o->getConexion();
            $sql = "SELECT CO_MATRICULA,REV_ID,REV_CODIGO,REV_FECHA,REV_ESTADO,REV_OBS FROM t_revision inner join t_coche ON REV_CO_ID = CO_ID WHERE REV_ID = ?";
            $p = $c->prepare($sql);
            $v = array($cod);
             $p->execute($v);
             return $p->fetch();
        }
      public static function act($datos){
            $o = new conexion;
            $c =$o->getConexion();
            $sql = "UPDATE t_revision set REV_CO_ID  = ?, REV_CODIGO = ?, REV_FECHA = ?, REV_OBS = ? WHERE REV_ID = ?";
            $p =$c->prepare($sql);
            $v = array($datos["cod_coh"],$datos["codigo"],$datos["rev_fecha"],$datos["rev_des"],$datos["rev_id"]);
            return $p->execute($v);
      }
        public static function elim($rev){
            $o = new conexion;
            $c = $o->getConexion();
            $Sql = "UPDATE t_revision SET REV_ESTADO = 2 where REV_ID  = ?";
            $p = $c->prepare($Sql);
            $vec = array($rev);
           return $p->execute($vec);
        }

        public static function detalles($rev){
            $o = new conexion;
            $c =$o->getConexion();
            $sql = " SELECT CO_MATRICULA,CO_MARCA,REV_CO_ID,REV_CODIGO,REV_FECHA,REV_OBS,REV_ESTADO,REV_CODIGO FROM t_revision INNER JOIN t_coche on  REV_CO_ID = CO_ID where REV_ID = ?";
            $p =$c->prepare($sql);
            $vec = array($rev);
            $p->execute($vec);
            return $p->fetch();

        }
        public static function detalles1($rev){
            $o = new conexion;
            $c = $o->getConexion();
            $sql = "SELECT * FROM  t_tp_revision where TPREV_REV_ID  = ? ";
            $p =$c->prepare($sql);
            $vec = array($rev);
            $p->execute($vec);
            return $p->fetchAll();
        }
        public static function busca($cod){
            $o = new conexion;
            $c = $o->getConexion();
            $sql = "SELECT * FROM t_revision WHERE REV_CODIGO = ? ";
            $p = $c->prepare($sql);
            $v = array($cod);
            $p->execute($v);
            return $p->fetch();
        }
    }