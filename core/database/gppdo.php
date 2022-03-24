<?php
    $dsn = 'mysql:host=localhost; dbname=cgpadb';
    $user = 'root';
    $password = '';

    try {
        $pdo = new PDO($dsn, $user, $password);
        //echo '<script>alert("Database Connection Successful");</script>';
    } catch(PDOException $e) {
        echo 'Connection error! ' . $e->getMessage();
        echo '<script>alert("Database Error Connection");</script>';
    }
