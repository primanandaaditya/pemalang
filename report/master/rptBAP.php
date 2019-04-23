<?php
include "../../config.php";

$tipe=$_GET['tipe'];
$id_proses_bap =$_GET['id_proses_bap'];
$report_name = $_GET["report_name"];

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=".$report_name);

echo '<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=Windows-1252">
<style>

#ftable {
    border-collapse: collapse;
    width: 100%;
}

#ftd, #ftr {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>

<body>';

$sql = "select * from formulir_bap where id_proses_bap = :id_proses_bap";
$stmt = $db->prepare($sql);
$param = array(
    ":id_proses_bap" => $id_proses_bap
);

$stmt->execute($param);
$keterangan = $stmt->fetch(PDO::FETCH_ASSOC);

//jika user terdaftar
if ($keterangan){
    //jika ada
    //masukkan isinya
    echo $keterangan['keterangan'];

} else{
    //jika tidak ada
    //isi dengan format standard
    include "CKEditorBAP.php";
}

echo
'</body>
</html>';

?>