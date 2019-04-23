<?php

$tipe=$_GET['tipe'];
include "../../config.php";
include "../template_".$tipe."/top.php";

echo '<td colspan="2"><table id="ftable">';
echo '<tr id="ftr">';
echo '<td id="ftd">No.</td>';
echo '<td id="ftd">Nama</td>';
echo '<td id="ftd">NIK</td>';
echo '<td id="ftd">Alamat</td>';
echo '<td id="ftd">Gender</td>';
echo '<td id="ftd">Tanggal lahir</td>';
echo '</tr>';

$sql = "select * from pemohon order by nama";
$stmt = $db->query($sql);
$i=0;

while ($petugas = $stmt->fetch(PDO::FETCH_ASSOC)){
    $i = $i + 1;
    echo '<tr id="ftr">';
    echo '<td id="ftd">'.$i.'</td>';
    echo '<td id="ftd">'.$petugas["nama"].'</td>';
    echo '<td id="ftd">'.$petugas["nik"].'</td>';
    echo '<td id="ftd">'.$petugas["alamat"].'</td>';
    echo '<td id="ftd">'.$petugas["jk"].'</td>';
    echo '<td id="ftd">'.$petugas["tanggal_lahir"].'</td>';
    echo '</tr>';
}

echo '</table></td>';
include "../template_".$tipe."/bottom.php";

?>