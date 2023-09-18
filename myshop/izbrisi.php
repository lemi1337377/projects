<?php
    include 'klase.php';
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $conn = new Dbconn();
        $conn = $conn->connmysqli();
        $sql = "DELETE FROM klijenti WHERE id = $id";
        $result = $conn->query($sql);
    }
    header("Location: index.php");
    exit;