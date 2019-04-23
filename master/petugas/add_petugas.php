<?php
session_start();
ob_start();
include ('../../auth.php');
?>
<?php

require_once ('../../config.php');

if (isset($_POST['simpan'])){

    $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
    $nip = filter_input(INPUT_POST, 'nip', FILTER_SANITIZE_STRING);
    $jabatan = filter_input(INPUT_POST, 'jabatan', FILTER_SANITIZE_STRING);
    $pangkat = filter_input(INPUT_POST, 'pangkat', FILTER_SANITIZE_STRING);
    $golongan = filter_input(INPUT_POST, 'golongan',FILTER_SANITIZE_STRING);


    if ($nama == '' || $nip =='' || $jabatan == '' || $pangkat == ''){
        $err = -1;
    } else {


        //cek dulu apakah pemohon
        //dengan nik dan nama yang sama
        //sudah ada

        $sql = "select * from petugas where nama = :nama and nip = :nip";
        $stmt = $db->prepare($sql);
        $param = array(
            ":nama" => $nama,
            ":nip" => $nip
        );
        $stmt->execute($param);
        $petugas = $stmt->fetch(PDO::FETCH_ASSOC);

        //jika sudah ada
        if ($petugas){
            $err =-2;


        }else{
            //jika belum ada
            //tambahkan

            $sql = "insert into petugas (nama,nip,jabatan,pangkat,golongan) VALUES (:nama,:nip,:jabatan,:pangkat,:golongan)";
            $stmt = $db->prepare($sql);

            $param = array(
                ":nama" => $nama,
                ":nip" => $nip,
                ":jabatan" => $jabatan,
                ":pangkat" => $pangkat,
                ":golongan" => $golongan
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
    <title>Petugas Baru</title>
</head>
<body>

<?php
include '../../config.php';
include '../../head_utama.php';
?>


<div class="container">
    <div class="container-fluid">

        <h1 class="display-4">Petugas Baru</h1>
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

                $pesan = "Nama dan NIP ini sudah ada";

                echo '<div class="alert alert-danger" role="alert">';
                echo $pesan;
                echo '</div>';
            }
        }
        ?>


        <form action="" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputNama">Nama petugas</label>
                    <input name="nama" class="form-control" autofocus id="inputNama">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputNIP">NIP</label>
                    <input name="nip" class="form-control" id="inputNIP">
                </div>
            </div>
            <div class="form-group">
                <label for="inputJabatan">Jabatan</label>
                <input type="text" name="jabatan" class="form-control" id="inputJabatan">
            </div>
            <div class="form-group">
                <label for="inputPangkat">Pangkat</label>
                <input type="text" name="pangkat" class="form-control" id="inputPangkat">
            </div>
            <div class="form-group">
                <label for="inputGolongan">Golongan</label>
                <input type="text" name="golongan" class="form-control" id="inputGolongan">
            </div>


            <input name="simpan" type="submit" value="Simpan" class="btn btn-primary">
            <a href="daftar_petugas.php">Kembali</a>
        </form>

    </div>
</div>



</body>
</html>


<!------ Include the above in your HEAD tag ---------->
