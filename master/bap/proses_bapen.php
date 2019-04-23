<?php
session_start();
ob_start();
include ('../../auth.php');
?>
<!DOCTYPE html>
<html>
<head>
    <?php
    include '../../head_html.php';
    ?>

    <title>Proses BAPEN</title>
    <style>
        table {border: none;}
        hasilBAP
        {
            display: none !important;
        }
    </style>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="../../ckeditor/js/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#tanggal" ).datepicker({ dateFormat: 'yy-mm-dd' });

        } );
    </script>
</head>
<body>





<?php
include '../../config.php';

if (!isset($_GET['id'])){
    header('Location: proses_bap.php');
    exit();
}else{
    $id=$_GET['id'];
}

//simpan bap ke database
if (isset($_POST['simpan'])){

    $nomor=$_POST['nomor'];
    $tanggal=$_POST['tanggal'];

    if($nomor=='' || $tanggal==''){

        $err=-1;

    }else{

        //hapus saja
        //record yang bersangkutan
        $sql = "delete from formulir_bapen where id_proses_bap = :id_proses_bap";
        $stmt = $db->prepare($sql);
        $param = array(
            ":id_proses_bap" => $id
        );
        $stmt->execute($param);

        //insert yang baru
        //$myeditor = filter_input(INPUT_POST, 'myeditor', FILTER_SANITIZE_STRING);
        $myeditor=$_POST['hasilBAPEN'];
        $id_proses_bap = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
        $nomor=$_POST['nomor'];
        $tanggal=$_POST['tanggal'];
        $pendapat=$_POST['radio'];
        $alasan = $_POST['txtAlasan'];

        if ($myeditor == ''){

        } else {

            $sql = "insert into formulir_bapen (id_proses_bap,keterangan,nomor,tanggal,pendapat,alasan) VALUES (:id_proses_bap, :keterangan, :nomor, :tanggal, :pendapat, :alasan)";
            $stmt = $db->prepare($sql);

            $param = array(
                ":id_proses_bap" => $id_proses_bap,
                ":keterangan" => $myeditor,
                ":nomor" => $nomor,
                ":tanggal" => $tanggal,
                ":pendapat" => $pendapat,
                ":alasan" => $alasan
            );
            $saved = $stmt->execute($param);
        }

        $err=1;

    }

}

?>

<?php
include '../../config.php';
include '../../head_utama.php';
include '../../report/master/terbilang.php';
?>


<div class="container">
    <div class="container-fluid">

        <h1 class="display-4">Proses BAPEN</h1>

        <br>

        <?php
        if (isset($_POST['simpan'])){

            if ($err == -1){
                $pesan = "Mohon isi semua kolom dengan benar";

                echo '<div class="alert alert-danger" role="alert">';
                echo $pesan;
                echo '</div>';


            } elseif ($err == 1) {
                $pesan = "Data berhasil disimpan";

                echo '<div class="alert alert-success" role="alert">';
                echo $pesan;
                echo '</div>';

            }

        }

        ?>


        <?php $id_proses_bap = $_GET['id']; ?>


        <br>
        <?php
        if (isset($_GET['id'])){

            $id_proses_bap = $_GET['id'];

            $sql = "SELECT proses_bap.id, DATE_FORMAT(proses_bap.tanggal_proses_bap, '%d-%m-%Y') as tanggal, proses_bap.tanggal_proses_bap as start,";
            $sql = $sql . " DATE_FORMAT(jadwal_bap.tanggal, '%d-%m-%Y') as tanggal_jadwal_bap,";
            $sql = $sql . " pemohon.id as id_pemohon, pemohon.nama as nama_pemohon, pemohon.nik as NIK, ";
            $sql = $sql . " petugas.nama as nama_petugas,";
            $sql = $sql . " proses_bap.keterangan as keterangan";
            $sql = $sql . " FROM proses_bap";
            $sql = $sql . " INNER JOIN jadwal_bap on jadwal_bap.id = proses_bap.id_jadwal_bap";
            $sql = $sql . " INNER JOIN pemohon on pemohon.id = jadwal_bap.id_pemohon";
            $sql = $sql . " INNER JOIN petugas on petugas.id = jadwal_bap.id_petugas";
            $sql = $sql . " WHERE proses_bap.id = :id_proses_bap";
            $stmt = $db->prepare($sql);

            $param = array(
                ":id_proses_bap" => $id_proses_bap
            );

            $stmt->execute($param);
            $proses = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($proses){
                //dapatkan info bap
                $detail_id_pemohon = $proses['id_pemohon'];
                $detail_tgl_jadwal_bap = $proses['tanggal_jadwal_bap'];
                $detail_tgl_proses_bap = $proses['tanggal'];
                $detail_nama_petugas = $proses['nama_petugas'];
                $detail_keterangan = $proses['keterangan'];


                //cari detail pemohon
                $sql = 'select pemohon.id, pemohon.nomor,pemohon.nomor_splp,pemohon.keluaran_splp,pemohon.tgl_terbit_splp,pemohon.tgl_habis_splp, ';
                $sql = $sql . 'pemohon.nama, pemohon.nik, pemohon.jk,pemohon.nomor_surat,pemohon.keterangan,pemohon.tgl_penetapan, ';
                $sql = $sql . 'pemohon.alamat, pemohon.tanggal_lahir, ';
                $sql = $sql . 'kota.nama as tempat_lahir, ';
                $sql = $sql . 'agama.nama as agama_pemohon, ';
                $sql = $sql . 'nikah.nama as status_kawin, ';
                $sql = $sql . 'pekerjaan.nama as pekerjaan_pemohon,';
                $sql = $sql . 'negara.nama as kewarganegaraan, ';
                $sql = $sql . 'jenis_bap.nama as jenis_bap ';

                $sql = $sql . 'from pemohon ';
                $sql = $sql . 'inner join kota on pemohon.id_kota = kota.id ';
                $sql = $sql . 'inner join agama on pemohon.id_agama = agama.id ';
                $sql = $sql . 'inner join nikah on pemohon.id_nikah = nikah.id ';
                $sql = $sql . 'inner join pekerjaan on pemohon.id_pekerjaan = pekerjaan.id ';
                $sql = $sql . 'inner join negara on pemohon.id_negara = negara.id ';
                $sql = $sql . 'inner join jenis_bap on pemohon.id_jenis_bap = jenis_bap.id ';

                $sql = $sql . 'where pemohon.id = :id';
                $stmt = $db->prepare($sql);

                $param = array(
                    ":id" => $detail_id_pemohon
                );
                $saved = $stmt->execute($param);
                $pemohon = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($pemohon){
                    $nomor = $pemohon['nomor'];
                    $nama = $pemohon['nama'];
                    $nik=$pemohon['nik'];
                    $jk=$pemohon['jk'];
                    $alamat=$pemohon['alamat'];
                    $tanggal_lahir=$pemohon['tanggal_lahir'];
                    $tempat_lahir=$pemohon['tempat_lahir'];
                    $agama_pemohon=$pemohon['agama_pemohon'];
                    $status_kawin=$pemohon['status_kawin'];
                    $pekerjaan_pemohon=$pemohon['pekerjaan_pemohon'];
                    $kewarganegaraan=$pemohon['kewarganegaraan'];
                    $nomor_splp=$pemohon['nomor_splp'];
                    $keluaran_splp=$pemohon['keluaran_splp'];
                    $tgl_terbit_splp=$pemohon['tgl_terbit_splp'];
                    $tgl_habis_splp=$pemohon['tgl_habis_splp'];
                    $id_jenis_bap=$pemohon['jenis_bap'];
                    $nomor_surat=$pemohon['nomor_surat'];
                    $keterangan=$pemohon['keterangan'];
                    $tgl_penetapan=$pemohon['tgl_penetapan'];
                }

            }else{

            }
        }else{
            header('Location:proses_bap.php');
        }

        ?>



        <div class="btn-group" role="group" aria-label="Basic example">

            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#fotoModal">
                Tampilkan foto
            </button>
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#videoModal">
                Tampilkan video
            </button>

            <!-- Modal -->

        </div>

        <div class="modal fade" id="fotoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Foto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <?php
                        //path untuk foto_bap
                        $path_foto = "../../image/bap/foto/";

                        $sql = "select * from foto_bap where id_proses_bap = ".$id_proses_bap;
                        $stmt = $db->query($sql);
                        $jml = $stmt->rowCount();

                        if ($jml == 0){
                            echo "Belum ada foto";
                        }else{
                            while ($foto = $stmt->fetch(PDO::FETCH_ASSOC)){
                                echo '<figure class="figure">';
                                echo '<img src="'.$path_foto.$foto['nama_file'].'" class="figure-img img-fluid rounded">';
                                echo '<figcaption class="figure-caption text-right">';

                                echo '</figcaption>';
                                echo '</figure>';
                            }
                        }


                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Video</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <?php
                        //path untuk video_bap
                        $path_video = "../../image/bap/video/";

                        $sql = "select * from video_bap where id_proses_bap = ".$id_proses_bap;
                        $stmt = $db->query($sql);
                        $jml = $stmt->rowCount();

                        if ($jml == 0){
                            echo "Belum ada video";
                        }else{
                            while ($video = $stmt->fetch(PDO::FETCH_ASSOC)){
                                echo '<figure class="figure">';
                                echo '<video class="figure-img img-fluid rounded"';
                                echo ' controls';
                                echo ' src="'.$path_video.$video['nama_file'].'">';
                                echo '</video>';
                                echo '<figcaption class="figure-caption text-right">';

                                echo '</figcaption>';
                                echo '</figure>';
                            }
                        }


                        ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>



        <?php
        //cek dulu apakah
        //ada record di tabel formulir_bap

        $sql = "select * from formulir_bap where id_proses_bap = :id_proses_bap";
        $stmt = $db->prepare($sql);
        $param = array(
            ":id_proses_bap" => $id_proses_bap
        );

        $stmt->execute($param);
        $form_bap = $stmt->fetch(PDO::FETCH_ASSOC);


        //cek apakah ada record
        //di tabel formulir_bapen
        $sql = "select * from formulir_bapen where id_proses_bap = :id_proses_bap";
        $stmt = $db->prepare($sql);
        $param = array(
            ":id_proses_bap" => $id_proses_bap
        );

        $stmt->execute($param);
        $form_bapen = $stmt->fetch(PDO::FETCH_ASSOC);



        //ini kita mau cari
        //id jenis bap
        //cari di tabel proses_bap
        $sql = "select * from proses_bap where id = :id";
        $stmt = $db->prepare($sql);
        $param = array(
            ":id" => $id_proses_bap
        );

        $stmt->execute($param);
        $proses_bap = $stmt->fetch(PDO::FETCH_ASSOC);


         //cari di tabel jadwal_bap
         $sql = "select * from jadwal_bap where id = :id";
         $stmt = $db->prepare($sql);
         $param = array(
             ":id" => $proses_bap['id_jadwal_bap']
         );

         $stmt->execute($param);
         $jadwal_bap = $stmt->fetch(PDO::FETCH_ASSOC);


         //cari di tabel pemohon
         $sql = "select * from pemohon where id = :id";
         $stmt = $db->prepare($sql);
         $param = array(
             ":id" => $jadwal_bap['id_pemohon']
         );

         $stmt->execute($param);
         $pemohon = $stmt->fetch(PDO::FETCH_ASSOC);


        ?>

        <div class="row">
            <div class="col-md-6">

                <div class="card">
                    <div class="card-header">
                        Hasil BAP
                    </div>
                    <div class="card-body">
                         <textarea name="hasilBAP" id="hasilBAP">
                            <?php

                            if ($form_bap){
                                //jika ada
                                //masukkan isinya
                                echo $form_bap['keterangan'];

                            } else{
                                //jika tidak ada
                                //isi dengan format standard
                                include_once "../../report/master/CKEditorBAP.php";
                            }

                ?>
	                    </textarea>
                    </div>
                </div>

            </div>
            <div class="col-md-6">

                <div class="card">
                    <div class="card-header">
                        BAPEN
                    </div>
                    <div class="card-body">


                        <form method="post">

                            <div class="form-group">
                                Nomor Bapen
                                <input value="<?php echo $form_bapen['nomor']; ?>" type="text" placeholder="contoh: W.13.IMI.IMI.5-GR.02.01-199/BAP/A/2018" class="form-control" id="nomor" name="nomor">
                            </div>

                            <div class="form-group">
                                Tanggal Bapen
                                <input autocomplete="off" value="<?php echo $form_bapen['tanggal']; ?>" type="text"  class="form-control" id="tanggal" name="tanggal">
                            </div>

                             <textarea name="hasilBAPEN" id="hasilBAPEN">

                             <?php

                             if ($form_bapen){
                                 //jika ada
                                 //masukkan isinya
                                 echo $form_bapen['keterangan'];

                             } else{


                                switch ($pemohon['id_jenis_bap']) {
                                    case "1":
                                        include_once "../../report/master/templateBAPEN_hilang.php";
                                        break;
                                    case "2":
                                        include_once "../../report/master/templateBAPEN_rusak.php";
                                        break;
                                    case "3":
                                        include_once "../../report/master/templateBAPEN_bedadata.php";
                                        break;
                                    case "4":
                                        include_once "../../report/master/templateBAPEN_splp.php";
                                        break;

                                    default:
                                    include_once "../../report/master/templateBAPEN_hilang.php";
                                }


                                 //jika tidak ada
                                 //isi dengan format standard

                             }

                             ?>
	                    </textarea>

                            <br>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio" id="radio1" value="S"
                                    <?php
                                        if ($form_bapen['pendapat'] == 'S'){
                                            echo ' checked';
                                        }
                                    ?>
                                >
                                <label class="form-check-label" for="radio1">
                                    Setuju
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio" id="radio2" value="T"

                                    <?php
                                    if ($form_bapen['pendapat'] == 'T'){
                                        echo ' checked';
                                    }
                                    ?>
                                >
                                <label class="form-check-label" for="radios2">
                                    Tidak setuju
                                </label>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="taAlasan">Alasan</label>
                                <textarea name="txtAlasan" class="form-control" id="taAlasan" rows="10"> <?php echo $form_bapen['alasan'] ?> </textarea>
                            </div>



                            <input type="submit" id="simpan" name="simpan" value="Simpan" class="btn btn-primary">
                            <?php

                            echo '<a class="btn btn-secondary" href="../../report/master/rptBapen.php?online=true&report_name=BAPEN.doc&tipe=word&id_proses_bap='.$id.'">Salin ke Word (harus disimpan dulu)</a>';
                            echo ' <a class="btn btn-secondary" href="bapen.php">Kembali</a>';

                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    //CKEDITOR.replace('myeditor');
    var editor = CKEDITOR.replace("hasilBAP", {

        toolbar: [
            { name: 'document', items: [ 'Preview', '-', 'Print' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
        ],
        height: 1000,
        allowedContent: true,
        qtBorder: '0',
        startupShowBorders: false,

        stylesSet: [],
        on: {
            instanceReady: function() {
                this.document.appendStyleSheet('http://localhost/ckeditor/main.css');
            }
        }

    });

    var edi = CKEDITOR.replace("hasilBAPEN", {


        height: 750,
        allowedContent: true,
        qtBorder: '0',
        startupShowBorders: false,

        stylesSet: [],
        on: {
            instanceReady: function() {
                this.document.appendStyleSheet('http://localhost/ckeditor/main.css');
            }
        }

    });
</script>
</body>
</html>
