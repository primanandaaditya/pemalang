<?php

//$dari=$_GET['dari'];
//$sampai=$_GET['sampai'];
$tipe=$_GET['tipe'];
include "../../config.php";
include "../template_".$tipe."/top.php";

echo '<td colspan="2"><table id="ftable">';
echo '<tr id="ftr">';
echo '<td id="ftd">No.</td>';
echo '<td id="ftd">Tanggal</td>';
echo '<td id="ftd">Pemohon</td>';
echo '<td id="ftd">Petugas</td>';
echo '</tr>';

//untuk  nomor urut
$i = 1;
$sql = "select jadwal_bap.id, DATE_FORMAT(jadwal_bap.tanggal, '%d-%M-%Y') as tanggal, pemohon.nama as nama_pemohon, petugas.nama as nama_petugas, jadwal_bap.keterangan";
$sql = $sql . " FROM jadwal_bap";
$sql = $sql . " INNER JOIN pemohon on jadwal_bap.id_pemohon = pemohon.id ";
$sql = $sql . " INNER JOIN petugas on jadwal_bap.id_petugas = petugas.id ";
$sql = $sql . " ORDER by jadwal_bap.tanggal DESC";


$stmt = $db->query($sql);

while ($jadwal = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo '<tr>';
    echo "<td>".$i."</td>";
    echo "<td>".$jadwal['tanggal']."</td>";
    echo "<td>".$jadwal['nama_pemohon']."</td>";
    echo "<td>".$jadwal['nama_petugas']."</td>";

    //cari tahu
    //apakah sudah ada prosesnya
    //$cari = "select * from proses_bap where id_jadwal_bap = :id";
    //$stm = $db->prepare($cari);
    //$paramb = array(
    //    ":id" => $jadwal['id']
    //);
    //$stm->execute($paramb);
    //$proses_bap = $stm->fetch(PDO::FETCH_ASSOC);

    //jika ada jadwal
    //if ($proses_bap){
    //    echo "<td>Sudah</td>";
    //} else{
    //    echo "<td>Belum</td>";
    //}

    $i = $i + 1;
}

echo '</table></td>';
include "../template_".$tipe."/bottom.php";

?>
