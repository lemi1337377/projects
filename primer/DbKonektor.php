<?php

require_once "SystemVar.php";

class DbKonektor extends SystemVar{
    var $upit;
    var $link;


    function DbKonektor(){
          $sysvar = SystemVar::getSystemVar();

          $host = $sysvar["dbhost"];
          $baza = $sysvar["dpname"];
          $user = $sysvar["dbuser"];
          $password = $sysvar["dbpass"];
          
          $this->link = mysqli_connect($host,$user,$password,$baza);
    }

    function upit($upit){
        $this->upit=$upit;
        return mysqli_query($upit,$this->link);
    }

    function fetchArray($rezultat){
        return mysqli_fetch_array($rezultat);
    }

    function close(){
        mysqli_close($this->link);
    }
}