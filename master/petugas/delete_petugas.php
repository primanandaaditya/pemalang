<?php


include '../../config.php';

$id = $_GET['id'];

$sql = "delete from petugas where id = :id";
$stmt = $db->prepare($sql);
$param = array(
    ":id" => $id
);

$stmt->execute($param);
header('Location: daftar_petugas.php');
?>
