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

    <title>Proses SK</title>
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
    <script src="../../ckeditor/js/ckeditor.js"></script>
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

//simpan sk ke database
if (isset($_POST['simpan'])){

    $nomor=$_POST['nomor'];
    $tanggal=$_POST['tanggal'];

    if($nomor=='' || $tanggal=='' ){

        $err=-1;

    }else{

        //hapus saja
        //record yang bersangkutan
        $sql = "delete from formulir_sk where id_proses_bap = :id_proses_bap";
        $stmt = $db->prepare($sql);
        $param = array(
            ":id_proses_bap" => $id
        );
        $stmt->execute($param);

        //insert yang baru
        //$myeditor = filter_input(INPUT_POST, 'myeditor', FILTER_SANITIZE_STRING);
        $myeditor=$_POST['hasilSK'];
        $id_proses_bap = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
        $nomor=$_POST['nomor'];
        $tanggal=$_POST['tanggal'];
        $statusSK=$_POST['radio'];


        if ($myeditor == ''){

        } else {

            $sql = "insert into formulir_sk (id_proses_bap,keterangan,nomor,tanggal,id_jenis_sk) VALUES (:id_proses_bap, :keterangan, :nomor, :tanggal, :statusSK)";
            $stmt = $db->prepare($sql);

            $param = array(
                ":id_proses_bap" => $id_proses_bap,
                ":keterangan" => $myeditor,
                ":nomor" => $nomor,
                ":tanggal" => $tanggal,
                ":statusSK" => $statusSK
            );
            $saved = $stmt->execute($param);
        }

        $err=1;

    }

}

?>

<?php
include '../../head_utama.php';
include '../../report/master/terbilang.php';
?>


<div class="container">
    <div class="container-fluid">

        <h1 class="display-4">Proses SK</h1>

        <br>


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


        //cek apakah ada record
        //di tabel formulir_sk
        $sql = "select * from formulir_sk where id_proses_bap = :id_proses_bap";
        $stmt = $db->prepare($sql);
        $param = array(
            ":id_proses_bap" => $id_proses_bap
        );

        $stmt->execute($param);
        $form_sk = $stmt->fetch(PDO::FETCH_ASSOC);


        //cek jenis bap
        //cari id_jadwal bap dulu di tabel proses bap
        $sql = "select * from proses_bap where id = :id_proses_bap";
        $stmt = $db->prepare($sql);
        $param = array(
            ":id_proses_bap" => $id_proses_bap
        );

        $stmt->execute($param);
        $ska = $stmt->fetch(PDO::FETCH_ASSOC);

        //cari id_pemohon di tabel jadwal_bap
        $sql = "select * from jadwal_bap where id = :id_proses_bap";
        $stmt = $db->prepare($sql);
        $param = array(
            ":id_proses_bap" => $ska['id_jadwal_bap']
        );

        $stmt->execute($param);
        $skb = $stmt->fetch(PDO::FETCH_ASSOC);


        //cari id_jenis_bap di tabel pemohon
        //apakah hilang/rusak/dsb
        //juga kolom lain
        $sql = "select * from pemohon where id = :id_pemohon";
        $stmt = $db->prepare($sql);
        $param = array(
            ":id_pemohon" => $skb['id_pemohon']
        );

        $stmt->execute($param);
        $skc = $stmt->fetch(PDO::FETCH_ASSOC);




        ?>

        <div class="row">
            <div class="col-md-6">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="BAP-tab" data-toggle="tab" href="#BAP" role="tab" aria-controls="BAP" aria-selected="true">BAP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="BAPEN-tab" data-toggle="tab" href="#BAPEN" role="tab" aria-controls="BAPEN" aria-selected="true">BAPEN</a>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="BAP" role="tabpanel" aria-labelledby="BAP-tab">
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
                    <div class="tab-pane fade show" id="BAPEN" role="tabpanel" aria-labelledby="BAPEN-tab">
                          <textarea name="hasilBAPEN" id="hasilBAPEN">

                             <?php

                             if ($form_bapen){
                                 //jika ada
                                 //masukkan isinya
                                 echo $form_bapen['keterangan'];

                             } else{
                                 //jika tidak ada
                                 //isi dengan format standard
                                 include_once "../../report/master/template_bapen.php";
                             }

                             ?>
	                    </textarea>

                    </div>

                </div>

            </div>
            <div class="col-md-6">

                <ul class="nav nav-tabs" id="skTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="sk-tab" data-toggle="tab" href="#sk" role="tab" aria-controls="sk" aria-selected="true">SK</a>
                    </li>

                </ul>
                <div class="tab-content" id="skContent">
                    <div class="tab-pane fade show active" id="sk" role="tabpanel" aria-labelledby="sk-tab">
                        <form method="post">

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
                            <br>

                            <div class="form-group">
                                Nomor SK
                                <input type="text" value="<?php echo $form_sk['nomor']; ?>" placeholder="contoh: W.13.IMI.IMI.5-GR.02.01-199/BAP/A/2018" class="form-control" id="nomor" name="nomor">
                            </div>

                            <div class="form-group">
                                Tanggal SK
                                <input autocomplete="off" value="<?php echo $form_sk['tanggal']; ?>" type="text"  class="form-control" id="tanggal" name="tanggal">
                            </div>

                            <textarea name="hasilSK" id="hasilSK">
                            <?php

                            if ($form_sk){
                                //jika ada
                                //masukkan isinya
                                echo $form_sk['keterangan'];

                            } else{
                                //jika tidak ada
                                //isi dengan format standard
                                //disesuaikan dengan jenis_bap
                                //apakah hilang/rusak/dsb
                                switch ($skc['id_jenis_bap']){

                                    case '1':
                                        include_once "../../report/master/templateSK_hilang.php";
                                        break;

                                    case '2':
                                        include_once "../../report/master/templateSK_rusak.php";
                                        break;

                                    case '3':
                                        include_once "../../report/master/templateSK_bedadata.php";
                                        break;

                                    case '4':
                                        include_once "../../report/master/templateSK_splp.php";
                                        break;

                                    default:
                                        include_once "../../report/master/templateSK_hilang.php";
                                }

                            }

                            ?>
	                    </textarea>


                            <br>

                            Status SK:
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio" id="radio1" value="1"
                                    <?php
                                    if ($form_sk['id_jenis_sk'] == 1){
                                        echo ' checked';
                                    }
                                    ?>
                                >
                                <label class="form-check-label" for="radio1">
                                    Persetujuan
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio" id="radio2" value="2"

                                    <?php
                                    if ($form_sk['id_jenis_sk'] == '2'){
                                        echo ' checked';
                                    }
                                    ?>
                                >
                                <label class="form-check-label" for="radios2">
                                    Penangguhan
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio" id="radio3" value="3"

                                    <?php
                                    if ($form_sk['id_jenis_sk'] == '3'){
                                        echo ' checked';
                                    }
                                    ?>
                                >
                                <label class="form-check-label" for="radios3">
                                    Penolakan
                                </label>
                            </div>



                            <br>




                            <input type="submit" id="simpan" name="simpan" value="Simpan" class="btn btn-primary">
                            <?php

                            echo '<a class="btn btn-secondary" href="../../report/master/rptSK.php?online=true&report_name=SK.doc&tipe=word&id_proses_bap='.$id.'">Salin ke Word (harus disimpan dulu)</a>';
                            echo ' <a class="btn btn-secondary" href="bapen.php">Kembali</a>';

                            ?>
                            <br>
                            <br>
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

    var edi = CKEDITOR.replace("hasilBAPEN", {
        toolbar: [
            { name: 'document', items: [ 'Preview', '-', 'Print' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
        ],
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

    var editorSK = CKEDITOR.replace("hasilSK", {

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
