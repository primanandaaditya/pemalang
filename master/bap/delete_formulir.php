<?php
include '../../config.php';
$id = $_GET['id'];

//pastikan mendapat id yang benar
$sql = "select * from formulir_bap where id = :id";
$stmt = $db->prepare($sql);
$param = array(
    ":id" => $id
);

$stmt->execute($param);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if ($data){
    //untuk query string
    //dapatkan id dulu
    $id_queryString=$data['id_proses_bap'];
}

//hapus formulir_bap
$sql = "delete from formulir_bap where id = :id";
$stmt = $db->prepare($sql);
$param = array(
    ":id" => $id
);

$stmt->execute($param);
header('Location: formulir_bap.php?id='.$id_queryString);
exit(0);

?>
