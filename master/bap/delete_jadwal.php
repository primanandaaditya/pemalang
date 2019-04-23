<?php

include '../../config.php';

$id = $_GET['id'];

$sql = "delete from jadwal_bap where id = :id";
$stmt = $db->prepare($sql);
$param = array(
    ":id" => $id
);

$stmt->execute($param);
header('Location: jadwal_bap.php');


?>
