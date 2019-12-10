<?php
session_start ();

try {
        $conn = new PDO("mysql:host=localhost;dbname=camagru", "root", 'password');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        $e->getMessage();
        
    }

if ($_GET['name']) {
    $right = $_GET["name"];
   

    $stmt = $conn->prepare("UPDATE users SET `ACTIVATION` = '1' WHERE (`Uhash` = '$right')");
    $stmt->execute();

    header ("location: ../landing/landing.php");
};

?>