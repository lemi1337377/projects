<?php

class SystemVar{
    var $sysvar;

    function getSystemVar(){
        $sysvar["dbhost"] = "localhost";
        $sysvar["dbuser"] = "root";
        $sysvar["dbpass"] = "";
        $sysvar["dbname"] = "primerbaza"; 
        return $sysvar;
    }
}
