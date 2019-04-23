<?php
    if (!isset($_SESSION['user'])){
        $login = substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT'])).'/index.php';
        header('Location: '.$login);
    }
?>