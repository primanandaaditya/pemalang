<?php
session_start();
ob_start();
include ('../../auth.php');
?>
<?php
require_once ('../../config.php');


//proses GET
if (!isset($_GET['id'])){
    header('location: jadwal_bap.php');
}else{

    //dapatkan data user
    // dari id di atas
    $id = $_GET['id'];
    $sql = "select * from jadwal_bap where id = :id";
    $stmt = $db->prepare($sql);
    $param = array(
        ":id" => $id
    );

    $stmt->execute($param);
    $jadwal = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($jadwal){
        $tanggal = $jadwal['tanggal'];
        $id_pemohon = $jadwal['id_pemohon'];
        $id_petugas = $jadwal['id_petugas'];
        $keterangan = $jadwal['keterangan'];
    }
}



if (isset($_POST['simpan'])){

    $id = $_GET['id'];
    $get_tanggal = filter_input(INPUT_POST, 'tanggal', FILTER_SANITIZE_STRING);
    $get_id_pemohon = filter_input(INPUT_POST, 'id_pemohon', FILTER_SANITIZE_STRING);
    $get_id_petugas = filter_input(INPUT_POST, 'id_petugas', FILTER_SANITIZE_STRING);
    $get_keterangan = filter_input(INPUT_POST, 'keterangan', FILTER_SANITIZE_STRING);

    if ($tanggal == '' || $id_pemohon =='' || $id_petugas == ''){
        $err = -1;
    } else {

        $sql = "update jadwal_bap ";
        $sql = $sql . " set tanggal =:tanggal, ";
        $sql = $sql . " id_pemohon =:id_pemohon, ";
        $sql = $sql . " id_petugas =:id_petugas, ";
        $sql = $sql . " keterangan =:keterangan ";
        $sql = $sql . " where id =:id";
        $stmt = $db->prepare($sql);

        $param = array(
            ":tanggal" => $get_tanggal,
            ":id_pemohon" => $get_id_pemohon,
            ":id_petugas" => $get_id_petugas,
            ":keterangan" => $get_keterangan,
            ":id" => $id
        );
        $saved = $stmt->execute($param);
        $err = 1;
        header('location:jadwal_bap.php');
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <?php
    include '../../head_html.php';
    ?>


    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>



    <script>
        $( function() {
            $( "#tanggal" ).datepicker({ dateFormat: 'yy-mm-dd' });
        } );

        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

    </script>

    <title>Ubah Jadwal</title>
</head>
<body>

<?php
include '../../config.php';
include '../../head_utama.php';
?>


<div class="container">
    <div class="container-fluid">

        <h1 class="display-4">Ubah Jadwal</h1>
        <hr>


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

            } elseif ($err == -2){

                $pesan = "Data ini sudah ada";

                echo '<div class="alert alert-danger" role="alert">';
                echo $pesan;
                echo '</div>';
            }
        }
        ?>


        <form action="" method="post">

            <input type="hidden" value="<?php echo $id; ?>">

            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input value="<?php echo $tanggal; ?>" autocomplete="off" autofocus="true" placeholder="tahun-bulan-tanggal" type="text" name="tanggal" class="form-control form-control-sm" id="tanggal">
            </div>


            <div class="form-group">
                <label for="id_pemohon">Pilih pemohon</label>
                <select class="js-example-basic-single form-control form-control-sm" id="id_pemohon" name="id_pemohon">
                    <?php
                    $sql = "select * from pemohon order by nama";
                    $stmt = $db->query($sql);

                    while ($pemohon = $stmt->fetch(PDO::FETCH_ASSOC)){
                        if ($id_pemohon == $pemohon['id']){
                            //echo '<option value="'.$pemohon['id'].'" selected>'.$pemohon['nama'].'</option>';
                            echo '<option value="'.$pemohon['id'].'" selected>'.$pemohon['nama']. ' &diams; NIK ('. $pemohon['nik'] .')</option>';
                        }else{
                            echo '<option value="'.$pemohon['id'].'">'.$pemohon['nama']. ' &diams; NIK ('. $pemohon['nik'] .')</option>';
                            //echo '<option value="'.$pemohon['id'].'">'.$pemohon['nama'].'</option>';
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="id_petugas">Pilih petugas</label>
                <select name="id_petugas" id="id_petugas" class="js-example-basic-single form-control form-control-sm">

                    <?php
                    $sql = "select * from petugas order by nama";
                    $stmt = $db->query($sql);

                    while ($petugas = $stmt->fetch(PDO::FETCH_ASSOC)){
                        if ($id_petugas == $petugas['id']){
                            echo '<option value="'.$petugas['id'].'" selected>'.$petugas['nama'].'</option>';
                        }else{
                            echo '<option value="'.$petugas['id'].'">'.$petugas['nama'].'</option>';
                        }
                    }
                    ?>
                </select>
            </div>



            <div class="form-group">
                <label for="inputKeterangan">Keterangan</label>
                <input value="<?php echo $keterangan; ?>" type="text" name="keterangan" class="form-control form-control-sm" id="inputKeterangan">
            </div>


            <input name="simpan" type="submit" value="Ubah" class="btn btn-primary">
            <a href="jadwal_bap.php">Kembali</a>
        </form>

    </div>
</div>



</body>
</html>


<!------ Include the above in your HEAD tag ---------->
