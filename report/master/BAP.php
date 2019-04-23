<?php
include "../../config.php";
include "terbilang.php";

$tipe=$_GET['tipe'];
$id_proses_bap =$_GET['id_proses_bap'];

//cari jadwal bap
//dari proses bap
$sql = "select * from proses_bap where id =:id_proses_bap";
$stmt = $db->prepare($sql);
$param = array(
    ":id_proses_bap" => $id_proses_bap
);

$stmt->execute($param);
$jadwal_bap = $stmt->fetch(PDO::FETCH_ASSOC);
if ($jadwal_bap){
    //jika jadwal ditemukan
    $jadwal_bap_id = $jadwal_bap['id_jadwal_bap'];

    //cari detail jadwal bap
    $sql = "select * from jadwal_bap where id =:id";
    $stmt = $db->prepare($sql);
    $param = array(
        ":id" => $jadwal_bap_id
    );

    $stmt->execute($param);
    $jadwal_bapx = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($jadwal_bapx){
        $jadwal_bap_tanggal = $jadwal_bapx['tanggal'];
        $jadwal_bap_id_pemohon = $jadwal_bapx['id_pemohon'];
        $jadwal_bap_id_petugas = $jadwal_bapx['id_petugas'];
        $jadwal_bap_keterangan = $jadwal_bapx['keterangan'];
        $jadwal_bap_created_date = $jadwal_bapx['created_date'];


        //cari identitas pemohon
        $sql = "select pemohon.id, pemohon.nama as nama_pemohon,  ";
        $sql = $sql . "kota.nama as tempat_lahir, pemohon.tanggal_lahir, ";
        $sql = $sql . "negara.nama as kewarganegaraan, pemohon.jk, ";
        $sql = $sql . "pekerjaan.nama as pekerjaan, nikah.nama as status_nikah, ";
        $sql = $sql . "pemohon.alamat, agama.nama as agama ";
        $sql = $sql . "from pemohon ";
        $sql = $sql . "inner join kota ";
        $sql = $sql . "inner join negara ";
        $sql = $sql . "inner join pekerjaan ";
        $sql = $sql . "inner join nikah ";
        $sql = $sql . "inner join agama ";
        $sql = $sql . "on pemohon.id_kota = kota.id ";
        $sql = $sql . "and pemohon.id_negara = negara.id ";
        $sql = $sql . "and pemohon.id_pekerjaan = pekerjaan.id ";
        $sql = $sql . "and pemohon.id_nikah = nikah.id ";
        $sql = $sql . "and pemohon.id_agama = agama.id ";
        $sql = $sql . "where pemohon.id = :pemohon_id";

        $stmt = $db->prepare($sql);
        $param = array(
            ":pemohon_id" => $jadwal_bap_id_pemohon
        );

        $stmt->execute($param);
        $pem = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($pem){
            $pemohon_id = $pem['id'];
            $pemohon_nama = strtoupper($pem['nama_pemohon']);
            $pemohon_tempat_lahir=$pem['tempat_lahir'];
            $pemohon_tanggal_lahir=$pem['tanggal_lahir'];
            $pemohon_kewarganegaraan=$pem['kewarganegaraan'];
            $pemohon_pekerjaan=$pem['pekerjaan'];
            $pemohon_status_nikah=$pem['status_nikah'];
            $pemohon_alamat=$pem['alamat'];
            $pemohon_agama=$pem['agama'];
            if ($pem=='L'){
                $pemohon_jk="Laki-laki";
            }else{
                $pemohon_jk="Perempuan";
            }
        }


        //cari detail petugas
        $sql = "select * from petugas where id =:id";
        $stmt = $db->prepare($sql);
        $param = array(
            ":id" => $jadwal_bap_id_petugas
        );

        $stmt->execute($param);
        $petugaz = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($petugaz){
            $petugas_nama = strtoupper($petugaz['nama']);
            $petugas_nip = $petugaz['nip'];
            $petugas_jabatan = $petugaz['jabatan'];
            $petugas_pangkat = $petugaz['pangkat'];
            $petugas_golongan = $petugaz['golongan'];
        }
    }

}else{

}



//generate report
//include "../template_".$tipe."/top.php";

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

<body>
<table width="100%" border="0">
  <tr>
    <td width="20%"><div align="center"><img src="http://localhost/image/simbol/kumham.png" width="100" height="100" /></div></td>
    <td colspan="3"><div align="center">KEMENTERIAN  HUKUM  DAN  HAK ASASI  MANUSIA RI<br />
      KANTOR  WILAYAH JAWA TENGAH<br />
      <strong>KANTOR IMIGRASI KELAS II PEMALANG</strong><br />
      Jalan Perintis Kemerdekaan No. 110, Pemalang<br />
      Telepon (0284) 325010 Faksimili (0284) 324219<br />
    </div></td>
  </tr>';



echo '
  <tr>
    <td colspan="4"><div align="center">BERITA ACARA PEMERIKSAAN</div><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td colspan="4"><div align="justify">--------Pada hari ini, '. sebutTanggal() .', Saya: </div><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td colspan="4"><div align="center">--------<b>'.$petugas_nama.'</b>--------</div><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td colspan="4"><div align="justify">Pangkat/Golongan: Penata Muda Tk. I (III/b); 
    NIP: '.$petugas_nip.'; 
    Jabatan: '.$petugas_jabatan.' 
    pada Seksi Pengawasan dan Penindakan Kantor Imigrasi Kelas II Pemalang, telah melakukan pemeriksaan terhadap seseorang yang belum pernah saya kenal sebelumnya, 
    mengaku bernama:-----------</div><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td colspan="4"><div align="center">---------<b>'.$pemohon_nama.'</b>----------</div><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td colspan="4"><div align="justify">---------Kewarganegaraan: '.$pemohon_kewarganegaraan.'; 
    Tempat dan Tanggal Lahir: '.$pemohon_tempat_lahir.', '.tanggalIndonesia($pemohon_tanggal_lahir).'; 
    Jenis Kelamin: '.$pemohon_jk.'; 
    Pekerjaan: '.$pemohon_pekerjaan.'; 
    Agama: '.$pemohon_agama.'; 
    Status Perkawinan: '.$pemohon_status_nikah.'; 
    Alamat Tempat Tinggal di Indonesia: '.$pemohon_alamat.'
    </div><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td colspan="4"><div align="justify">-----Ia (<b>'.$pemohon_nama.'</b>) diperiksa dan didengar 
    keterangannya sehubungan dengan ... pada Kantor Imigrasi Kelas II Pemalang.----------</div><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td colspan="4"><div align="justify">-------------------
    Selanjutnya atas pertanyaan Pemeriksa yang bersangkutan menjawab 
    dan memberi keterangan sebagai berikut :
     ---------------------------------------------------------</div></td>
  </tr>';




echo '
  <tr>
    <td colspan="2"><div align="center"><b>PERTANYAAN</b></div></td>
    <td colspan="2"><div align="center"><b>JAWABAN</b></div></td>
  </tr>';





//echo '<table width="100%" border="0">';

$sql = "select * from formulir_bap WHERE id_proses_bap =:id_proses_bap order by nomor";
$stmt = $db->prepare($sql);
$param = array(
    ":id_proses_bap" => $id_proses_bap
);
$stmt->execute($param);

while ($formulir = $stmt->fetch(PDO::FETCH_ASSOC)){

    echo '<tr>
    <td colspan="3"><div align="left">'.$formulir['nomor'].'. '.$formulir['pertanyaan'].'
    </div></td>
  </tr>
  <tr>
    <td></td>
    <td width="5%"><div align="right">'.$formulir['nomor'].'. '.'</div></td>
    <td width="90%">'.$formulir['jawaban'].'</td>
  </tr>';
}
//echo '</table>';





echo '
<tr>
    <td colspan="4"><div align="justify">--------------Setelah Berita Acara Pemeriksaan ini selesai dibuat kemudian dibacakan kembali dihadapan yang diperiksa dan yang diperiksa menyatakan setuju dan membenarkan semua keterangannya yang telah diberikan. Kemudian untuk menguatkan semua keterangannya tersebut yang bersangkutan membubuhkan tanda tangannya sebagaimana tertera dibawah ini.----------------------------------------------</div></td>
  </tr>';


echo '
  <tr>
    <td width="20%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
    <td width="20%" align="center"><p>Yang diperiksa,</p>
      <p>&nbsp;</p>
      <p><b>'.$pemohon_nama.'</b></p>
    </td>
  </tr>';




echo '
  <tr>
    <td colspan="4"><div align="justify">-------------Demikian Berita Acara Pemeriksaan ini dibuat dengan sesungguhnya diatas kekuatan sumpah jabatan, kemudian ditutup dan ditanda tangani pada hari, tanggal, bulan serta tahun tersebut diatas di Pemalang.---------------------------------------</div></td>
  </tr>';


echo '
  <tr>
    <td width="20%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
    <td width="20%" align="center"><p>Yang memeriksa,</p>
      <p>&nbsp;</p>
      <p><b>'.$petugas_nama.'</b></p>
      <p><b>NIP. '.$petugas_nip.'</b></p>
    </td>
  </tr>
</table>';

echo
'</body>
</html>';

?>