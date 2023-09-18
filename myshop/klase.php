<?php

class Dbconn 
{
    public function connmysqli()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "myshop";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error)
        {
            die("Konekcija nije uspela: " . $conn->connect_error);
        }
        return $conn;
    }

    function connpdo()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "myshop";
    try
    {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        return $conn;
    }
    catch(PDOException $e)
    {
        echo "Konekcija nije uspela: " . $e->getMessage();
    }
    }

}


