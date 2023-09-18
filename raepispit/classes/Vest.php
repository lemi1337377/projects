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

}
