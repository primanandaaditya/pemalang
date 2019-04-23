<?php
/**
 * Created by PhpStorm.
 * User: Aku
 * Date: 9/1/2018
 * Time: 11:52 AM
 */

include '../../config.php';

$id = $_GET['id'];

$sql = "delete from formulir_sk where id = :id";
$stmt = $db->prepare($sql);
$param = array(
    ":id" => $id
);

$stmt->execute($param);
header('Location: daftar_sk.php');


?>
