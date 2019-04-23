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

    <title>Formulir BAP</title>
    <style>
        table {border: none;}
    </style>
    <script src="../../ckeditor/js/ckeditor.js"></script>
</head>
<body>

<?php
include '../../config.php';
include '../../head_utama.php';
if (!isset($_GET['id'])){
    header('Location: proses_bap.php');
    exit();
}else{
    $id=$_GET['id'];
}

//simpan bap ke database
if (isset($_POST['simpan'])){

    $nomor=$_POST['nomor'];
    if ($nomor==''){

        $err=-1;

    }else{

        //hapus saja
        //record yang bersangkutan
        $sql = "delete from formulir_bap where id_proses_bap = :id_proses_bap";
        $stmt = $db->prepare($sql);
        $param = array(
            ":id_proses_bap" => $id
        );
        $stmt->execute($param);

        //insert yang baru
        //$myeditor = filter_input(INPUT_POST, 'myeditor', FILTER_SANITIZE_STRING);
        $myeditor=$_POST['myeditor'];
        $id_proses_bap = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

        if ($myeditor == ''){

        } else {

            $sql = "insert into formulir_bap (id_proses_bap,nomor,keterangan) VALUES (:id_proses_bap,:nomor,:keterangan)";
            $stmt = $db->prepare($sql);

            $param = array(
                ":id_proses_bap" => $id_proses_bap,
                ":nomor" => $nomor,
                ":keterangan" => $myeditor
            );
            $saved = $stmt->execute($param);

        }
        $err=1;

    }


}

?>

<?php
//cek dulu apakah
//ada record di tabel formulir_bap

$sql = "select * from formulir_bap where id_proses_bap = :id_proses_bap";
$stmt = $db->prepare($sql);
$param = array(
    ":id_proses_bap" => $id
);

$stmt->execute($param);
$keterangan = $stmt->fetch(PDO::FETCH_ASSOC);


//cari id jenis bap
//cek dulu di proses_bap
//untuk cari id_pemohon=========================

$sql = "select * from proses_bap where id = :id_proses_bap";
$stmt = $db->prepare($sql);
$param = array(
    ":id_proses_bap" => $id
);

$stmt->execute($param);
$proses_bap = $stmt->fetch(PDO::FETCH_ASSOC);



//cari di tabel jadwal_bap=======================
$sql = "select * from jadwal_bap where id = :id_jadwal_bap";
$stmt = $db->prepare($sql);
$param = array(
    ":id_jadwal_bap" => $proses_bap['id_jadwal_bap']
);

$stmt->execute($param);
$jadwal_bap = $stmt->fetch(PDO::FETCH_ASSOC);




//cari di tabel pemohon========================
$sql = "select * from pemohon where id = :id_pemohon";
$stmt = $db->prepare($sql);
$param = array(
    ":id_pemohon" => $jadwal_bap['id_pemohon']
);

$stmt->execute($param);
$pemohon = $stmt->fetch(PDO::FETCH_ASSOC);

//tinggal cari id_jenis_bap
//dengan $pemohon['

?>

<div class="container">
    <div class="container-fluid">

        <h1 class="display-4">Formulir BAP</h1>
        <br>
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

        <form method="post">

            <div class="form-group">
                Nomor
                <input type="text" value="<?php echo $keterangan['nomor'] ?>" placeholder="contoh: W.13.IMI.IMI.5-GR.02.01-199/BAP/A/2018" class="form-control" name="nomor" id="nomor">
            </div>
            <!-- creating a text area for my editor in the form -->
            <textarea name="myeditor" id="myeditor">


                <?php
                //jika user terdaftar
                if ($keterangan){
                    //jika ada
                    //masukkan isinya
                    echo $keterangan['keterangan'];

                } else{

                    //jika tidak ada
                    //isi dengan format standard
                    switch ($pemohon['id_jenis_bap']){
                        case '1':
                            include "../../report/master/templateBAP_hilang.php";
                            break;

                        case '2':
                            include "../../report/master/templateBAP_rusak.php";
                            break;

                        case '3':
                            include "../../report/master/templateBAP_bedadata.php";
                            break;

                        case '4':
                            include "../../report/master/templateBAP_splp.php";
                            break;


                    }

                }

                ?>
	        </textarea>

            <br>
            <input type="submit" id="simpan" name="simpan" value="Simpan" class="btn btn-primary">
            <?php
            if ($keterangan){
                echo '<a class="btn btn-secondary" href="../../report/master/rptBAP.php?online=true&report_name=BAP.doc&tipe=word&id_proses_bap='.$id.'">Salin ke MS Word (harus disimpan dulu)</a>';
            }else{

            }
            ?>
            <a href="detail_proses_bap.php?id=<?php echo $id; ?>" class="btn btn-secondary">Kembali ke detail</a>
            <br>
            <br>
        </form>
    </div>
</div>

<!-- creating a CKEditor instance called myeditor -->
<script type="text/javascript">
    //CKEDITOR.replace('myeditor');
    var editor = CKEDITOR.replace("myeditor", {
        height: 500,
        extraPlugins: 'colordialog,tableresize',
        allowedContent: true,
        qtBorder: '0',
        startupShowBorders: false,
        ////pasteFilter: 'semantic-content',
        //// Custom stylesheet for editor content.
        //// contentsCss: ['content/css/html-email.css'],

        //// Do not load the default Styles configuration.
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

