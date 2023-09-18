<?php
include "dbCred.php";

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password); //"mysql:host=$;dbname=$,charset=utf-8",$username,$password
    if ($dbh) { //conn check
        echo "PDO KONEKCIJA USPELA! <br>";
    } else {
        echo "PDO KONEKCIJA NIJE USPELA";
    }
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Attributes set to error mode to be handled through exceptions 
    $stmt = $dbh->prepare("SELECT * FROM klijenti WHERE id<=:id"); //prepare a query string 

    $stmt->bindParam(":id", $id, PDO::PARAM_INT); //binding params with placeholders


    $id=4;
    $stmt->execute();

    $result=$stmt->fetchAll();
    
} catch (PDOException $e) {
    echo $e->getMessage();
}