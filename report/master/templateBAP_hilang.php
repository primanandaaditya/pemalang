
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
        $sql = "select pemohon.id, pemohon.nama as nama_pemohon, pemohon.nomor_splp, pemohon.tgl_terbit_splp, pemohon.tgl_habis_splp, ";
        $sql = $sql . "pemohon.nomor_surat, pemohon.keterangan, pemohon.tgl_penetapan, ";
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
            $pemohon_nomor_splp=$pem['nomor_splp'];
            $pemohon_tgl_terbit_splp=$pem['tgl_terbit_splp'];
            $pemohon_tgl_habis_splp=$pem['tgl_habis_splp'];
            $pemohon_nomor_surat=$pem['nomor_surat'];
            $pemohon_keterangan=$pem['keterangan'];
            $pemohon_tgl_penetapan=$pem['tgl_penetapan'];

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
    <div style="text-align:center"><strong><p>BERITA ACARA PEMERIKSAAN</p></strong></div>
    <div style="text-align:center"><strong><p>Nomor..................</p></strong></div>
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
    <td colspan="4"><div style="text-align:justify">-----Yang bersangkutan dimintai keterangan sehubungan 
    dengan peristiwa hilangnya dokumen negara berupa Paspor RI miliknya 
    atas nama '. $pemohon_nama .' dengan Nomor '. $pemohon_nomor_splp .' yang diterbitkan 
    Kantor Imigrasi Pemalang pada tanggal '. tanggalIndonesia($pemohon_tgl_terbit_splp) .' berlaku 
    sampai dengan '. tanggalIndonesia($pemohon_tgl_habis_splp) .', sesuai 
    Surat Keterangan Tanda Laporan Kehilangan Nomor : '.$pemohon_nomor_surat .' , yang diterbitkan '.$pemohon_keterangan .' tanggal '. tanggalIndonesia($pemohon_tgl_penetapan) .'.---------------------------------</div>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><div style="text-align:justify">-------------------
    Selanjutnya atas pertanyaan Pemeriksa yang bersangkutan menjawab 
    dan memberi keterangan sebagai berikut :
     ---------------------------------------------------------</div></td>
  </tr>';

echo '<tr>
            <td colspan="4">
            <div style="text-align:center"><b>PERTANYAAN / JAWABAN</b></div>

            <p>1.&nbsp;Apakah Anda sehat jasmani?<br />
            ------------ 1. Ya, saya dalam keadaan sehat jasmani dan rohani.------------------</p>

            <p>2.Apakah Saudara mengetahui mengapa Saudara dihadirkan dan diperiksa di sini?-<br />
            ------------ 2. Ya, karena paspor saya hilang.---------------------------------------------</p>

            <p>3. Bersediakah Saudara untuk dimintai keterangan dan sanggup memberikan keterangan dengan benar dan jujur sehubungan dengan hilangnya Paspor RI atas nama Saudara yang pernah diperoleh sebelumnya?----------------------------------------<br />
            ------------ 3. Ya, saya bersedia dan sanggup memberikan keterangan dengan benar dan jujur.------------------------------------------------------------------</p>

            <p>4. Bersediakah Saudara menceritakan riwayat hidup yang dimiliki?------------------------<br />
            ------------ 4. Ya, nama saya ------dilahirkan di Batang pada tanggal --------. Pendidikan terakhir ------. Menikah pada tahun ----dengan perempuan bernama -----dan dikaruniai -orang anak. Anak Ke-----dari -----bersaudara. Dari orang tua ------dan -----. Saat ini bertempat tinggal di -----------------------------------------------------------------------.Nomor HP : 08--------.-------------------</p>

            <p>5. Apakah Saudara pernah dalam mengajukan permohonan Paspor RI baru atau penggantian Paspor RI di Kantor Imigrasi manapun dengan dikenakan sanksi dibatalkan dan/atau ditangguhkan?--------------------------------------------------------------<br />
            ------------ 5. Tidak pernah.---------------------------------------------------------------------</p>

            <p>5.1. Apakah Saudara pernah dalam mengajukan permohonan Paspor RI baru atau penggantian Paspor RI di Kantor Imigrasi manapun dengan dikenakan sanksi dibatalkan dan/atau ditangguhkan?-----------------------------<br />
            ------------ 5.1. Pernah.----------------------------------------------------------------------------</p>

            <p>5.2 Di Kantor Imigrasi mana Saudara mengajukan permohonan tersebut?------<br />
            ------------ 5.2 Kantor Imigrasi Semarang.-------------------------------------------------</p>

            <p>5.3 Kapan Saudara mengajukan permohonan tersebut?------------------------------<br />
            ------------ 5.3 Tanggal -----------.-------------------------------------------------</p>

            <p>5.4 Kenapa permohonan Saudara dikenakan sanksi ditangguhkan dan / atau dibatalkan?------------------------------------------------------------------------------<br />
            ------------ 5.4 Karena persyaratan yang saya lampirkan tidak sah/ valid.------</p>

            <p>6. Berapa kali Saudara pernah memperoleh dokumen Paspor RI?-------------------------<br />
            ------------- 6. Saya pernah memiliki 1 (satu) kali pada tahun ----yang diterbitkan oleh Kantor Imigrasi ------.------------------------------</p>

            <p>7. Apakah Saudara pernah menggunakan Paspor RI yang pernah Saudara peroleh untuk melakukan perjalanan ke luar negeri?--------------------------------------------------<br />
            -------------7. Saya pernah ------------------------------------------</p>

            <p>7.1 Apakah Saudara pernah menggunakan Paspor RI yang pernah Saudara peroleh untuk melakukan perjalanan ke luar negeri?------------------------------<br />
            ------------- 7.1 Belum pernah.------------------------------------------</p>

            <p>7.2 Mengapa Saudara belum pernah menggunakan Paspor RI yang pernah Saudara peroleh untuk melakukan perjalanan ke luar negeri?------------------<br />
            ---------------- 7.2 Karena ....--------------------------</p>

            <p>8. Melalu penyalur tenaga kerja mana Saudara bekerja di luar negeri?--------------------<br />
            ---------------- 8. Saya .................................---------------------------------------------------</p>

            <p>9. Kapan Saudara terakhir kali pulang ke Indonesia?-------------------------------------------<br />
            ---------------- 9. Pada tahun .....---------------------------------------------------</p>

            <p>10. Melalui Tempat Pemeriksaan Imigrasi mana Saudara ?-----------------------------------<br />
            ---------------- 10. Melalui TPI Entikong.---------------------------------------------------</p>

            <p>11. Apa pekerjaan Saudara saat ini?------------------------------------------------------------------<br />
            ---------------- 11. Saya seorang ......---------------------------------------------------</p>

            <p>12. Diketahui saat ini Saudara sedang mengajukan permohonan penggantian Paspor RI karena hilang di Kantor Imigrasi Kelas II Pemalang, kapan permohonan tersebut Saudara ajukan?---------------------------------------------------------------------------<br />
            ---------------- 12. Pada tanggal ..............-------------------------------------------------</p>

            <p>13. Mengertikah Saudara bahwa dokumen Paspor RI yang pernah Saudara peroleh adalah dokumen milik negara, bagi setiap pemegang diwajibkan dapat menjaga dan menyimpannya dengan baik agar tidak rusak atau hilang ?-------------------------<br />
            ---------------- 13. Maaf, Saya tidak mengetahui hal tersebut sebelumnya.-------------</p>

            <p>13.1 Mengertikah Saudara bahwa dokumen Paspor RI yang pernah Saudara peroleh adalah dokumen milik negara, bagi setiap pemegang diwajibkan dapat menjaga dan menyimpannya dengan baik agar tidak rusak atau hilang ?-------------------------<br />
            ---------------- 13.1 Ya, Saya mengetahui hal tersebut sebelumnya.-------------</p>

            <p>14. Dokumen apa saja yang sudah Saudara serahkan guna melengkapi persyaratan formal permohonan penggantian Paspor RI karena hilang di Kantor Imigrasi Kelas II Pemalang pada tanggal 03 April 2018?-------------------------------------------------------<br />
            ---------------- 14. Saya menyerahkan ......... ..........................................</p>

            <p>15. Apakah semua dokumen identitas diri yang tertera pada persyaratan formil atas nama Saudara diterbitkan oleh instansi yang berwenang?-------------------------------- ----------------<br />
            --------------15. Ya. Semua dokumen tersebut diterbitkan oleh instansi yang berwenang.-----------------------------------------------------------------------</p>

            <p>16. Apakah Saudara mengetahui bahwa dalam mengajukan permohonan penggantian Paspor RI karena hilang/rusak memiliki konsekuensi dapat dikenakan sanksi ditolak serta ditangguhkan?-------------------------------------------------<br />
            ---------------- 16. Tidak, Saya tidak mengetahui konsekuensi tersebut.-----------------</p>

            <p>17. Kapan kejadian hilangnya Paspor RI atas nama Saudara yang diperoleh sebelumnya terjadi?----------------------------------------------------------------------------------<br />
            ---------------- 17. Seingat saya sewaktu ............................-------------------------------------------------------------------------------</p>

            <p>18. Kapan Saudara mengetahui jika Paspor RI milik Saudara telah hilang?---------------<br />
            ---------------- 18. Saya baru mengetahuinya ketika ............................-------------------------------------------------------</p>

            <p>19. Apakah yang Saudara lakukan setelah mengetahui paspor milik Saudara hilang?--<br />
            ----------------- 19. Saya menanyakan .........................-----------------------------------</p>

            <p>20. Apakah atas kehilangan tersebut telah Saudara laporkan ke pihak berwajib?--------<br />
            ----------------- 20. Saat itu saya............................----------------------</p>

            <p>21. Coba ceritakan kembali kejadian hilangnya Paspor RI atas nama Saudara?--------- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br />
            ----------------- 21.........-------------------------------</p>

            <p>22. Apakah dalam waktu dekat Saudara akan melakukan perjalanan ke luar negeri?&mdash;<br />
            --------------- 22. Ya, saya ................................................--------</p>

            <p>23. Apabila Saudara diperkenankan untuk memperoleh paspor pengganti, apakah Saudara bersedia untuk menjaga dan menyimpan dokumen paspor dengan baik agar tidak hilang kembali di kemudian hari? ---------------------------------------------------<br />
            --------------- 23. Ya, apabila diperkenankan untuk memperoleh Paspor pengganti, saya akan menjaganya lebih baik agar tidak hilang kembali.-------</p>

            <p>24. Apakah Saudara merasa tertekan dan/atau mendapat paksaan dalam pemeriksaan saat ini baik dari pemeriksa maupun pihak lain?----------------------------<br />
            ---------------- 24. Saya tidak merasa mendapatkan tekanan ataupun paksaan dari pihak manapun dalam pemeriksaan saat ini.---------------------------</p>

            <p>25. Apakah semua keterangan yang Saudara berikan tersebut benar?---------------------<br />
            ---------------- 25. Ya, semua keterangan yang saya berikan adalah benar.------------</p>

            <p>26. Apakah Saudara bersedia untuk diproses sesuai dengan peraturan yang berlaku apabila keterangan yang telah Saudara berikan tidak benar?----------------------------- ---------------- -----------&nbsp; 26. Ya, saya bersedia.-------------------------------------------------------------</p>

            <p>&nbsp;</p>

            <p>&nbsp;</p>
            </td>
        </tr>';


echo '
<tr>
    <td colspan="4"><div style="text-align:justify">--------------Setelah Berita Acara Pemeriksaan ini selesai dibuat kemudian dibacakan kembali dihadapan yang diperiksa dan yang diperiksa menyatakan setuju dan membenarkan semua keterangannya yang telah diberikan. Kemudian untuk menguatkan semua keterangannya tersebut yang bersangkutan membubuhkan tanda tangannya sebagaimana tertera dibawah ini.----------------------------------------------</div></td>
  </tr>';


echo '
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
    <td>
    <p style="text-align:center">Yang diperiksa,</p>
	<p style="text-align:center">&nbsp;</p>
	<p style="text-align:center"><strong>'.$pemohon_nama.'</strong></p>
  </tr>';

echo '
  <tr>
    <td colspan="4"><div align="justify">-------------Demikian Berita Acara Pemeriksaan ini dibuat dengan sesungguhnya diatas kekuatan sumpah jabatan, kemudian ditutup dan ditanda tangani pada hari, tanggal, bulan serta tahun tersebut diatas di Pemalang.---------------------------------------</div></td>
  </tr>';


echo '
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
    <td>
    <p style="text-align:center">Yang memeriksa,</p>
	<p style="text-align:center">&nbsp;</p>
	<p style="text-align:center"><strong>'.$petugas_nama.'</strong></p>
	<p style="text-align:center"><strong>NIP. '.$petugas_nip.'</strong></p>
    </td>
  </tr>
</table>';

?>