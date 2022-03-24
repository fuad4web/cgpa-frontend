<?php 
    include 'database/gppdo.php';
    include 'class/Gpa.php';

    global $pdo;

    session_start();

    $getFromG = new Gpa($pdo);

    define("BASE_URL", "http://localhost/gpform/");

    //echo "<script>alert('Jo');</script>";
?>
