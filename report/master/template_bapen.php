
<?php
include_once "../../config.php";
include_once "terbilang.php";


$id_proses_bap=$_GET['id'];
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


if(isset($_GET['online'])){
    $report_name = $_GET["report_name"];
    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment; filename=".$report_name);

}else{

}

echo '
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="20%">
    <div style="text-align:center">
    <img src="http://www.baktiku.xyz/image/simbol/kumham.png" width="100" height="100"/>
    </div>
    </td>
    <td colspan="3">
    <div style="text-align:center">KEMENTERIAN HUKUM DAN HAK ASASI MANUSIA RI<br />
			KANTOR WILAYAH JAWA TENGAH<br />
			<strong>KANTOR IMIGRASI KELAS II PEMALANG</strong><br />
			Jalan Perintis Kemerdekaan No. 110, Pemalang<br />
			Telepon (0284) 325010 Faksimili (0284) 324219</div>
    </td>
  </tr>';



echo '
  <tr>
    <td colspan="4">
    <div style="text-align:center"><strong><p>BERITA ACARA PENDAPAT</p></strong></div>
    <div style="text-align:center"><strong><p>Nomor ../../../.. </p></strong></div>
    </td>
  </tr>
  <tr>
    <td colspan="4"><div style="text-align:justify">--------Pada hari ini, '. sebutTanggal() .', Saya: </div></td>
  </tr>
  <tr>
    <td colspan="4"><div style="text-align:center">--------<b>'.$petugas_nama.'</b>--------</div>
    <div style="text-align:center">&nbsp;</div>
    </td>
  </tr>
  <tr>
    <td colspan="4"><div style="text-align:justify">Pangkat/Golongan: Penata Muda Tk. I (III/b); 
    NIP: '.$petugas_nip.'; 
    Jabatan: '.$petugas_jabatan.' 
    pada Seksi Pengawasan dan Penindakan Kantor Imigrasi Kelas II Pemalang, telah melakukan pemeriksaan terhadap seseorang yang belum pernah saya kenal sebelumnya, 
    mengaku bernama:-----------</div></td>
  </tr>
  <tr>
    <td colspan="4"><div style="text-align:center">---------<b>'.$pemohon_nama.'</b>----------</div><div style="text-align:center">&nbsp;</div></td>
  </tr>
  <tr>
    <td colspan="4"><div style="text-align:justify">---------Kewarganegaraan: '.$pemohon_kewarganegaraan.'; 
    Tempat dan Tanggal Lahir: '.$pemohon_tempat_lahir.', '.tanggalIndonesia($pemohon_tanggal_lahir).'; 
    Jenis Kelamin: '.$pemohon_jk.'; 
    Pekerjaan: '.$pemohon_pekerjaan.'; 
    Agama: '.$pemohon_agama.'; 
    Status Perkawinan: '.$pemohon_status_nikah.'; 
    Alamat Tempat Tinggal di Indonesia: '.$pemohon_alamat.'
    </div>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><div style="text-align:justify">-----Yang bersangkutan....----------</div>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><div style="text-align:justify">-----Setelah meneliti dan mempelajari Berita Acara Pemeriksaan, selanjutnya dalam Berita Acara Pendapat ini saya uraikan fakta sebagai berikut:--------------------------------
     ---------------------------------------------------------</div></td>
  </tr>';




echo '
<tr>
    <td colspan="4"><div style="text-align:justify">-------------Demikian Berita Acara Pendapat ini dibuat dengan sebenarnya, kemudian ditutup dan ditandatangani pada hari, tanggal, bulan serta tahun tersebut di atas di Pemalang.---------------------------------------------------------------------------------------------------
                                                                                                   
</div></td>
  </tr>';



echo '
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
    <td>
    <p style="text-align:center">Pejabat Imigrasi,</p>
	<p style="text-align:center">&nbsp;</p>
	<p style="text-align:center"><strong>'.'....................'.'</strong></p>
	<p style="text-align:center"><strong>NIP. '.'..................'.'</strong></p>
    </td>
  </tr>
</table>';


echo '<p>&nbsp;</p>

<table border="1" cellpadding="0" cellspacing="0" style="width:50%;">
	<tbody>
		<tr>
			<td colspan="2">Persetujuan Kakanim</td>
		</tr>
		<tr>
			<td>Setuju</td>
			<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</td>
		</tr>
		<tr>
			<td>Tidak setuju</td>
			<td>&nbsp;</td>
		</tr>
	</tbody>
</table>

<p>&nbsp;</p>';

?>