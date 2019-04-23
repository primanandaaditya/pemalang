<?php
session_start();
ob_start();
include ('../../auth.php');
?>
<?php

require_once ('../../config.php');

if (isset($_POST['simpan'])){

    $tanggal = filter_input(INPUT_POST, 'tanggal', FILTER_SANITIZE_STRING);
    $id_pemohon = filter_input(INPUT_POST, 'id_pemohon', FILTER_SANITIZE_STRING);
    $id_petugas = filter_input(INPUT_POST, 'id_petugas', FILTER_SANITIZE_STRING);
    $keterangan = filter_input(INPUT_POST, 'keterangan', FILTER_SANITIZE_STRING);

    if ($tanggal == '' || $id_pemohon =='' || $id_petugas == ''){
        $err = -1;
    } else {

      //cek dulu di tabel jadwal_bap
      //apakah ada duplikat
      $sql = "select * from jadwal_bap where tanggal =:tanggal AND id_pemohon=:id_pemohon AND id_petugas=:id_petugas";
      $stmt = $db->prepare($sql);

      $param = array(
          ":tanggal" => $tanggal,
          ":id_pemohon" => $id_pemohon,
          ":id_petugas" => $id_petugas
      );
      $stmt->execute($param);
      $jdw = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($jdw){
        //duplikat
        $err = -2;
      }else {

        $sql = "insert into jadwal_bap (tanggal,id_pemohon,id_petugas,keterangan) VALUES (:tanggal,:id_pemohon,:id_petugas,:keterangan)";
        $stmt = $db->prepare($sql);

        $param = array(
            ":tanggal" => $tanggal,
            ":id_pemohon" => $id_pemohon,
            ":id_petugas" => $id_petugas,
            ":keterangan" => $keterangan
        );
        $saved = $stmt->execute($param);
        $err = 1;
      }

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

    <title>Jadwal BAP Baru</title>
</head>
<body>

<?php
include '../../config.php';
include '../../head_utama.php';
?>


<div class="container">
    <div class="container-fluid">

        <h1 class="display-4">Jadwal BAP Baru</h1>
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

            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input autocomplete="off" autofocus="true" placeholder="tahun-bulan-tanggal" type="text" name="tanggal" class="form-control form-control-sm" id="tanggal">
            </div>


            <div class="form-group">
                <label for="id_pemohon">Pilih pemohon</label>
                    <select class="js-example-basic-single form-control form-control-sm" id="id_pemohon" name="id_pemohon">
                        <?php
                        $sql = "select * from pemohon order by nama";
                        $stmt = $db->query($sql);

                        while ($kota = $stmt->fetch(PDO::FETCH_ASSOC)){
                            echo '<option value="'.$kota['id'].'">'.$kota['nama']. ' &diams; NIK ('. $kota['nik'] .')</option>';
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

                    while ($kota = $stmt->fetch(PDO::FETCH_ASSOC)){
                        echo '<option value="'.$kota['id'].'">'.$kota['nama'].'</option>';
                    }
                    ?>
                </select>
            </div>



            <div class="form-group">
                <label for="inputKeterangan">Keterangan</label>
                <input type="text" name="keterangan" class="form-control form-control-sm" id="inputKeterangan">
            </div>


            <input name="simpan" type="submit" value="Simpan" class="btn btn-primary">
            <a href="jadwal_bap.php">Kembali</a>
        </form>

    </div>
</div>



</body>
</html>


<!------ Include the above in your HEAD tag ---------->
