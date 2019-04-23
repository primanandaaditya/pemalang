<?php

$tipe=$_GET['tipe'];
include "../../config.php";
include "../template_".$tipe."/top.php";

echo '<td colspan="2"><table id="ftable">';
echo '<tr id="ftr">';
echo '<td id="ftd">No.</td>';
echo '<td id="ftd">Nama</td>';
echo '<td id="ftd">NIP</td>';
echo '<td id="ftd">Jabatan</td>';
echo '<td id="ftd">Pangkat</td>';
echo '<td id="ftd">Golongan</td>';
echo '</tr>';

$sql = "select * from petugas order by nama";
$stmt = $db->query($sql);
$i=0;

while ($petugas = $stmt->fetch(PDO::FETCH_ASSOC)){
    $i = $i + 1;
    echo '<tr id="ftr">';
    echo '<td id="ftd">'.$i.'</td>';
    echo '<td id="ftd">'.$petugas["nama"].'</td>';
    echo '<td id="ftd">'.$petugas["nip"].'</td>';
    echo '<td id="ftd">'.$petugas["jabatan"].'</td>';
    echo '<td id="ftd">'.$petugas["pangkat"].'</td>';
    echo '<td id="ftd">'.$petugas["golongan"].'</td>';
    echo '</tr>';
}

echo '</table></td>';
include "../template_".$tipe."/bottom.php";

?>