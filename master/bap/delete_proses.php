<?php
/**
 * Created by PhpStorm.
 * User: Aku
 * Date: 9/1/2018
 * Time: 11:52 AM
 */

include '../../config.php';

$id = $_GET['id'];

$sql = "delete from formulir_bap where id_proses_bap = :id";
$stmt = $db->prepare($sql);
$param = array(
    ":id" => $id
);
$stmt->execute($param);

$sql = "delete from foto_bap where id_proses_bap = :id";
$stmt = $db->prepare($sql);
$param = array(
    ":id" => $id
);
$stmt->execute($param);

$sql = "delete from video_bap where id_proses_bap = :id";
$stmt = $db->prepare($sql);
$param = array(
    ":id" => $id
);
$stmt->execute($param);

$sql = "delete from proses_bap where id = :id";
$stmt = $db->prepare($sql);
$param = array(
    ":id" => $id
);

$stmt->execute($param);
header('Location: proses_bap.php');


?>
