<?php

class Vest
{
    public $id = null;
    public $datumObjave = null;
    public $naslov = null;
    public $rezime = null;
    public $sadrzaj = null;

    public function __construct($podaci = array()){
        if(isset($podaci['id'])) $this->id = (int)$podaci['id'];
        if(isset($podaci['datumObjave'])) $this->datumObjave = (int)$podaci['datumObjave'];
        if(isset($podaci['naslov'])) $this->naslov = $podaci['naslov'];
        if(isset($podaci['rezime'])) $this->rezime = $podaci['rezime'];
        if(isset($podaci['sadrzaj'])) $this->sadrzaj = $podaci['sadrzaj'];
    }

    public function staviVrednostiForme($parametri){
        $this->__construct($parametri);
        if(isset($parametri['datumObjave'])){
            $datumObjave = explode ('-',$parametri['datumObjave']);
            if(count($datumObjave) == 3){
                list($y,$m,$d) = $datumObjave;
                 $this->datumObjave = mktime(0,0,0,$m,$d,$y);
            }
        }
    }
    public static function dajVestPoId($id){
        $conn = new PDO(DB_DSN, DB_USERNAME,DB_PASSWORD);
        $sql = "SELECT *, UNIX TIMESTAMP(datumObjave) AS datumObjave FROM vesti WHERE id=:id";
        $st = $conn->prepare($sql);
        $st->bindValue(":id",$id,PDO::PARAM_INT);
        $st->execute();
        $row = $st->fetch();
        $conn = null; 
        if($row) return new Vest($row);
        
    }

    public static function dajListu($numRows = 1000000,$redosled = "datumObjave DESC"){

        $conn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
        $sql = "SELECT SQL_CALC_FOUND_ROWS *, UNIX TIMESTAMP(datumObjave) AS datumObjave FROM vesti ORDER BY "
        .$redosled."LIMIT :numRows";
        $st=$conn->prepare($sql);
        $st->bindValue(":numRows",$numRows,PDO::PARAM_INT);
        $st->execute();
        $list = array();

        while($row = $st->fetch()){
            $vest = new Vest($row);
            $list[] = $vest;
        }   

        $sql = "SELECT FOUND ROWS() AS ukupnoSlogova";
        $ukupnoSlogova = $conn->query($sql)->fetch();
        $conn = null;
        return(array ("rezultat" => $list, "ukupnoSlogova" =>$ukupnoSlogova[0]));

    }

    public function insert(){
        if(!is_null($this->id))
        trigger_error("Vest::insert(): Vest sa ovim ID vec postoji u bazi podataka($this->id).",E_USER_ERROR);
        
    }
}
