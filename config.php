<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "bapen";


$rootpath = substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT']));
$link_logo = "http://localhost/image/simbol/kumham.png";

try {
    //create PDO connection
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch(PDOException $e) {
    //show error
    die("Terjadi masalah: " . $e->getMessage());
}

