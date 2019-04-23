<?php
include_once "../../config.php";
include_once "terbilang.php";

$sekarang=date('Y-m-d');
$id_proses_bap=$_GET['id'];

//cari nomor proses bap
//di tabel formulir_bap
$sql = "select * from formulir_bap where id_proses_bap =:id_proses_bap";
$stmt = $db->prepare($sql);
$param = array(
    ":id_proses_bap" => $id_proses_bap
);

$stmt->execute($param);
$formulir_bap = $stmt->fetch(PDO::FETCH_ASSOC);


//cari nomor bapen
//di tabel formulir_bapen
$sql = "select * from formulir_bapen where id_proses_bap =:id_proses_bap";
$stmt = $db->prepare($sql);
$param = array(
    ":id_proses_bap" => $id_proses_bap
);

$stmt->execute($param);
$formulir_bapen = $stmt->fetch(PDO::FETCH_ASSOC);



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
        $sql = "select pemohon.id, pemohon.nik, pemohon.nama as nama_pemohon, pemohon.nomor_surat, pemohon.keterangan, pemohon.tgl_penetapan,  ";
        $sql = $sql . "kota.nama as tempat_lahir, pemohon.tanggal_lahir, pemohon.nomor_splp, pemohon.keluaran_splp, pemohon.tgl_terbit_splp, pemohon.tgl_habis_splp, ";
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
            $pemohon_nik= $pem['nik'];
            $pemohon_nama = strtoupper($pem['nama_pemohon']);
            $pemohon_tempat_lahir=$pem['tempat_lahir'];
            $pemohon_tanggal_lahir=$pem['tanggal_lahir'];
            $pemohon_kewarganegaraan=$pem['kewarganegaraan'];
            $pemohon_pekerjaan=$pem['pekerjaan'];
            $pemohon_status_nikah=$pem['status_nikah'];
            $pemohon_alamat=$pem['alamat'];
            $pemohon_agama=$pem['agama'];
            $pemohon_nomor_surat=$pem['nomor_surat'];

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

echo '<table width="100%" border="0" align="center">
  <tr>
    <td colspan="5"><p align="center"><img src="http://www.baktiku.xyz/image/simbol/kumham.png" width="100" height="100" /></p>
      <p align="center">KEMENTERIAN HUKUM DAN HAK ASASI MANUSIA RI<br />
        KANTOR WILAYAH JAWA TENGAH <br />
  <strong>KANTOR IMIGRASI KELAS II  PEMALANG</strong></p>
      <p align="center">KEPUTUSAN KEPALA KANTOR IMIGRASI KELAS II PEMALANG<br />
  NOMOR: _____________ &nbsp;TAHUN '. date('Y') .' </p>
      <p align="center">TENTANG<br />
        PENANGGUHAN  / PERSETUJUAN PENGGANTIAN PASPOR RI KARENA HILANG HABIS BERLAKU BAGI WARGA NEGARA INDONESIA <br />
        ATAS NAMA '. $pemohon_nama .' </p>
    <p align="center">KEPALA KANTOR IMIGRASI KELAS II PEMALANG,</p>      
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="180" valign="top">Menimbang</td>
    <td width="14" valign="top">:</td>
    <td width="32" valign="top"> a. </td>
    <td colspan="2" valign="top"><div align="justify">Berita Acara Pemeriksaan Nomor: '. $formulir_bap['nomor'] .'  tanggal '. tanggalIndonesia($jadwal_bap['tanggal_proses_bap']) .' dan Berita Acara Pendapat Nomor: '. $formulir_bapen['nomor'] .'  tanggal '. tanggalIndonesia($formulir_bapen['tanggal']) .' atas nama '.$pemohon_nama.';</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">  b. </td>
    <td colspan="2" valign="top"><div align="justify">Surat Keterangan Hilang dari  Kepolisian Nomor: '.$pem['nomor_surat'].' , yang  diterbitkan '.$pem['keterangan'] .' tanggal '. tanggalIndonesia($pem['tgl_penetapan']) .' atas nama '.$pem['nama_pemohon'].';</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>c. </td>
    <td colspan="2" valign="top">
    <div align="justify">Bahwa berdasarkan hal sebagaimana dimaksud pada huruf a dan b, kepada yang bersangkutan dapat diberikan  penggantian Paspor RI karena hilang sesuai dengan peraturan perundang-undangan yang berlaku; </div></td>
  </tr>
  <tr>
    <td>Mengingat</td>
    <td>:</td>
    <td>1. </td>
    <td colspan="2" valign="top"><div align="justify">Undang-Undang Nomor 6 Tahun 2011 tentang Keimigrasian (Lembaran  Negara Republik Indonesia Tahun 2011 Nomor 52, Tambahan Lembaran Negara  Republik Indonesia Nomor 5216);</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>2. </td>
    <td colspan="2" valign="top"><div align="justify">Peraturan Pemerintah Nomor 31 Tahun 2013 tentang Peraturan  Pelaksanaan Undang-Undang Nomor 6 Tahun 2011 tentang Keimigrasian (Lembaran  Negara Republik Indonesia Tahun 2013 Nomor 68, Tambahan Lembaran Negara  Republik Indonesia Nomor 5409);</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>3.</td>
    <td colspan="2">
    <div align="justify">Peraturan Menteri Hukum dan Hak Asasi Manusia Republik  Indonesia Nomor 8 Tahun 2014 tentang Paspor Biasa dan Surat Perjalanan Laksana  Paspor;</div></td>
  </tr>
  <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5"><div align="center">MEMUTUSKAN:</div></td>
  </tr>
  <tr>
    <td valign="top">Menetapkan</td>
    <td valign="top">:</td>
    <td>&nbsp;</td>
    <td colspan="2" valign="top"><div align="justify">KEPUTUSAN KEPALA KANTOR IMIGRASI KELAS II PEMALANG TENTANG PENANGGUHAN / PERSETUJUAN PENGGANTIAN PASPOR RI KARENA HILANG HABIS BERLAKU BAGI WARGA NEGARA INDONESIA ATAS NAMA '.$pem['nama_pemohon'].';</div></td>
  </tr>
  <tr>
    <td valign="top">KESATU</td>
    <td valign="top">:</td>
    <td>&nbsp;</td>
    <td colspan="2" valign="top"><div align="justify">Menyatakan bahwa nama: '.$pemohon_nama.'; Kewarganegaraan: '.$pemohon_kewarganegaraan.'; Jenis  Kelamin: '.$pemohon_jk.'; Tempat dan Tanggal Lahir: '.$pemohon_tempat_lahir.', '.tanggalIndonesia($pemohon_tanggal_lahir).'; Pekerjaan: '.$pemohon_pekerjaan.'; Agama: '.$pemohon_agama.';  Status Perkawinan: '.$pemohon_status_nikah.'; NIK: '.$pemohon_nik.'; Alamat Tempat Tinggal: '.$pemohon_alamat.', disetujui diberikan penggantian Paspor RI karena  hilang habis berlaku <strong><em>(/ diberikan penangguhan selama 6 (enam) bulan )</em></strong> sesuai dengan peraturan  perundang-undangan yang berlaku;</div></td>
  </tr>
  <tr>
    <td valign="top">KEDUA</td>
    <td valign="top">:</td>
    <td>&nbsp;</td>
    <td colspan="2" valign="top"><div align="justify">Membatalkan Paspor RI atas nama '.$pemohon_nama.' dengan Nomor '.$pem['nomor_splp'].' yang diterbitkan '.$pem['keluaran_splp'].' pada tanggal '.tanggalIndonesia($pem['tgl_terbit_splp']).' berlaku sampai dengan '.tanggalIndonesia($pem['tgl_habis_splp']).';</div></td>
  </tr>
  <tr>
    <td valign="top">KETIGA</td>
    <td valign="top">:</td>
    <td>&nbsp;</td>
    <td colspan="2" valign="top"><div align="justify">Mewajibkan kepada yang bersangkutan untuk menjaga Paspor RI  pengganti dengan baik agar dokumen negara tersebut tidak rusak/hilang;</div></td>
  </tr>
  <tr>
    <td valign="top">KEEMPAT</td>
    <td valign="top">:</td>
    <td>&nbsp;</td>
    <td colspan="2" valign="top"><div align="justify">Keputusan ini mulai berlaku sejak tanggal ditetapkan,  dengan ketentuan apabila dikemudian hari terdapat kekeliruan akan diadakan perbaikan sebagaimana mestinya.</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="619">&nbsp;</td>
    <td width="395">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><p align="center">Ditetapkan di Pemalang<br />
      pada tanggal '.tanggalIndonesia($sekarang).' <br />
    Plh. Kepala Kantor,</p>
    <p align="center">&nbsp;</p>
    <p align="center">&nbsp;</p>
    <p align="center">&nbsp;</p>
    <p align="center">-----------------------------------<br />
NIP. --------------------- </p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><p><strong>Tembusan kepada Yth.</strong>:</p>      <ol>
        <li>Direktur Pengawasan dan Penindakan Keimigrasian;</li>
        <li>Direktur Intelijen Keimigrasian;</li>
        <li>Kepala Kantor Wilayah Kementerian  Hukum dan Ham Jawa Tengah u.p. Kepala Divisi Keimigrasian;</li>
        <li>Yang bersangkutan. </li>
    </ol></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>';


?>