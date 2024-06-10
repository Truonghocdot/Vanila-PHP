<?php
    session_start();
    //format product
    $thumbnail = '';
    $title = '';
    $quantity = '';
    $price = '';
    $description = '';
    $cat = '';
    //format users
    $uid = '';
    $nameUser = '';
    $email= '';
    $avatar = '';
    $role = '';
    $passwordUser = '';
    //connect to database
    try{
        $host = 'localhost';
        $dbname = "shop";
        $username = 'root';
        $password = '';
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);  
    }catch(PDOException $e){
        die('Lỗi: '.$e->getMessage());
    }
?>
