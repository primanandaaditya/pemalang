
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
    dengan perbedaan data Paspor RI miliknya 
    atas nama '. $pemohon_nama .' dengan Nomor '. $pemohon_nomor_splp .' yang diterbitkan 
    Kantor Imigrasi Pemalang pada tanggal '. tanggalIndonesia($pemohon_tgl_terbit_splp) .' berlaku 
    sampai dengan '. tanggalIndonesia($pemohon_tgl_habis_splp) .'</div>&nbsp;</td>
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

            <p>1. Apakah Saudari dalam keadaan sehat jasmani dan rohani ?-----------------------------<br />
            ----------------- 1. Ya, saya dalam keadaan sehat jasmani dan rohani.------------------</p>

            <p>2. Apakah Saudara mengetahui mengapa Saudara dihadirkan dan diperiksa di sini?-<br />
            ----------------- 2. Ya, karena data ..........&nbsp;pada paspor saya berbeda dengan data pada ........saya.---------------------------------------------</p>

            <p>2a. Apakah Saudara mengetahui mengapa Saudara dihadirkan dan diperiksa di sini?----------------------------------------------------------------------------------------------<br />
            ----------------- 2a. Tidak tahu.-----------------------------------------------------------------------<br />
            Saudara dihadirkan di sini dalam rangka pemeriksaan terkait .....................&nbsp;atas nama Saudara.----------------------------------------------------------------------</p>

            <p>3. Bersediakah Saudara&nbsp;untuk dimintai keterangan dan sanggup memberikan keterangan dengan benar dan jujur sehubungan dengan perbedaan data&nbsp;Paspor RI atas nama Saudara&nbsp;yang pernah diperoleh sebelumnya?------------------------------------------------------<br />
            ----------------- 3. ----- Ya, saya bersedia dan sanggup memberikan keterangan dengan benar dan jujur.------------------------------------------------------------------</p>

            <p>4. Bersediakah Saudari menceritakan riwayat hidup yang dimiliki?------------------------------------------------------------------------------<br />
            ----------------- 4. ------------------------ Ya, nama saya .....................&nbsp;dilahirkan di ........&nbsp;pada tanggal ..................... Pendidikan terakhir ............. Menikah pada tahun ....&nbsp;dengan ............................. dan dikaruniai .....&nbsp;orang anak. Anak ......&nbsp;dari ....&nbsp;bersudara. Dari orang tua ......&nbsp;dan ..... Saat ini bertempat tinggal di ................., Kecamatan ........Kabupaten ........, Propinsi .........Nomor HP : 08........-------------------</p>

            <p>5. Apakah Saudara&nbsp;pernah dalam mengajukan permohonan Paspor RI baru atau penggantian Paspor RI di Kantor Imigrasi manapun dengan dikenakan sanksi dibatalkan dan/atau ditangguhkan?--------------------------------------------------------------<br />
            ----------------- 5. Tidak Pernah.--------------------------------------------------------------------</p>

            <p>6. Berapa kali Saudara&nbsp;pernah memperoleh dokumen Paspor RI?------------------------- -----------------<br />
            --------------- 6. ----- Satu kali, yaitu tahun ......&nbsp;diterbitkan Kantor Imigrasi .......------------------------------------------------------------------------</p>

            <p>7. Apakah Saudari pernah menggunakan Paspor RI milik Saudari untuk ke luar negeri?--------------------------------------------------------------------------------------------------- -------------------------------- 7. ----- Saya menggunakannya untuk ......... di .........&nbsp;dari tahun .......hingga...........-------------------------------------------------------------</p>

            <p>8. Bekerja sebagai apakah Saudara&nbsp;di ..........?------------------------------------------------<br />
            ------------&nbsp;8. ---- Saya bekerja di ..............................................................-------------------------</p>

            <p>9. Melalui perusahaan penyalur tenaga kerja manakah Saudara&nbsp;bekerja di luar negeri pada tahun .....?------------------------------------------------------------------------------------- -----------------------------------<br />
            ------------- 9. ---------- Saya bekerja melalui perusahaan .......................&nbsp;yang berada di ....... .-------------------------------------------------------------</p>

            <p>10. Setelah kembali ke Indonesia pada tahun ....&nbsp;apa yang Saudara&nbsp;kerjakan?-------- ----------------------------<br />
            -------------------- 10. ---------- Saya bekerja di ...............................................................................-------------------------------------------------------------------------------</p>

            <p>11. Berdasarkan dokumen terlampir diketahui bahwa data&nbsp;Saudara&nbsp;berbeda dengan data&nbsp;pada Paspor RI lama milik Saudara. Apakah Saudara&nbsp;mengetahuinya?---------------------------------------------------------------------------- --------------------------------<br />
            ---------------- 11. ---------- Ya, saya mengetahuinya. Pada Paspor RI tertera ...................&nbsp;sedangkan yang sebenarnya adalah.....................-----------------------------------------------------------------------</p>

            <p>12. Diketahui saat ini Saudara&nbsp;sedang mengajukan permohonan perubahan data serta penggantian Paspor RI di Kantor Imigrasi Kelas II Pemalang, kapan permohonan tersebut Saudara&nbsp;ajukan?---------------------------------------------------------<br />
            ---------------- 12. Pada tanggal .........................--------------------------------------------</p>

            <p>13. Apa tujuan Saudara&nbsp;melakukan perubahan data?---------------------- -<br />
            ------------------------------- 13. ----- Saya ingin data saya pada Paspor RI sesuai dengan yang sebenarnya dan dokumen diri saya lainnya.----------------------------</p>

            <p>14. Mengapa baru sekarang Saudara&nbsp;melakukan perubahan data?--------------------------<br />
            -------------------------------- 13. ---- Setelah kembali dari ........&nbsp;saya tidak berpikir akan keluar negeri.-----------------------------------------------------------------------------</p>

            <p>15. Dokumen apa saja yang sudah Saudara&nbsp;serahkan guna melengkapi persyaratan formal permohonan penggantian Paspor RI dan perbedaan data di Kantor Imigrasi Kelas II Pemalang pada tanggal .........?----------------------------------------- ------------------------------------------------------------<br />
            -------------------- 15. -------------------- Saya menyerahkan dokumen asli dan fotokopi diantaranya berupa Paspor RI, KTP, Kartu Keluarga, Akte Lahir, ...............................---------------------------------------------------------------</p>

            <p>16. Apakah semua dokumen identitas diri yang tertera pada persyaratan formil atas nama Saudara&nbsp;diterbitkan oleh instansi yang berwenang?--------------------------------<br />
            -------------------------------- 16. ----- Ya. Semua dokumen tersebut diterbitkan oleh instansi yang berwenang.-----------------------------------------------------------------------</p>

            <p>17. Jelaskan Kronologis terjadinya perbedaan data&nbsp;pada Paspor RI atas nama Saudari dengan dokumen Saudara !---------------------------------------------------- -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br />
            ----------- 17. --------------------Pada tahun ......&nbsp;...........................-----------------</p>

            <p>18. Yang manakah data diri Saudara&nbsp;yang sebenarnya?---------------------------------------- -------------<br />
            ------------------- 18. ----- Nama saya adalah ......................... sesuai dengan ..............-------------</p>

            <p>19. Apa yang Saudari lakukan ketika mengetahui bahwa data kelahiran pada Paspor RI milik Saudari berbeda dengan data&nbsp;Saudara&nbsp;yang sebenarnya?------- ------------------------------------------------ 19. ---------- Saya mengajukan penetapan pengadilan di Pengadilan Negeri ..........&nbsp;untuk menetapkan data&nbsp;saya yang sebenarnya.----------------------------------------------------------------------</p>

            <p>20. Dalam pengajuan penggantian Paspor RI karena perubahan data memiliki konsekuensi ditolak/ditangguhkan. Apakah Saudara&nbsp;mengerti dan mengetahuinya?---------------------------------------------------------------------------------------<br />
            -------------------------------- 20. ----- Saya tidak mengetahui hal tersebut. Setelah dijelaskan pada pemeriksaan hari ini baru saya mengetahuinya .----------------------</p>

            <p>21. Apakah dalam waktu dekat Saudara&nbsp;akan melakukan perjalanan ke luar negeri?&mdash; --------------------------------<br />
            21. ----- Ya/Tidak...................................-------------------------------------------</p>

            <p>22. Apakah Saudara&nbsp;merasa tertekan dan/atau mendapat paksaan dalam pemeriksaan saat ini baik dari pemeriksa maupun pihak lain?---------------------------- ----------------<br />
            ---------------- 22. ---- Saya tidak merasa mendapatkan tekanan ataupun paksaan dari pihak manapun dalam pemeriksaan saat ini.---------------------------</p>

            <p>23. Apakah semua keterangan yang Saudara&nbsp;berikan tersebut benar?---------------------<br />
            ---------------- 23. Ya, semua keterangan yang saya berikan adalah benar.------------</p>

            <p>24. Apakah Saudara&nbsp;bersedia untuk diproses sesuai dengan peraturan yang berlaku apabila keterangan yang telah Saudara&nbsp;berikan tidak benar?-----------------------------<br />
            ---------------- 24. Ya, saya bersedia.-------------------------------------------------------------</p>

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