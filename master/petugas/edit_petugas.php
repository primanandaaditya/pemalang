<?php
session_start();
ob_start();
include ('../../auth.php');
include ('../../config.php');
?>

<?php
    //get
    $id = $_GET['id'];

    $sql = "select * from petugas where id = :id";
    $stmt = $db->prepare($sql);
    $param = array(
        ":id" => $id
    );

    $stmt->execute($param);
    $petugas = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($petugas){
        $get_nama = $petugas['nama'];
        $get_nip = $petugas['nip'];
        $get_jabatan = $petugas['jabatan'];
        $get_pangkat = $petugas['pangkat'];
        $get_golongan = $petugas['golongan'];
    }

?>

<?php

require_once ('../../config.php');

if (isset($_POST['simpan'])){

    $id = $_GET['id'];
    $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
    $nip = filter_input(INPUT_POST, 'nip', FILTER_SANITIZE_STRING);
    $jabatan = filter_input(INPUT_POST, 'jabatan', FILTER_SANITIZE_STRING);
    $pangkat = filter_input(INPUT_POST, 'pangkat', FILTER_SANITIZE_STRING);
    $golongan = filter_input(INPUT_POST,'golongan', FILTER_SANITIZE_STRING);

    if ($nama == '' || $nip =='' || $jabatan == '' || $pangkat == ''){
        $err = -1;
    } else {

        $sql = "update petugas set nama = :nama, nip = :nip, jabatan = :jabatan, pangkat = :pangkat, golongan =:golongan where id = :id";
        $stmt = $db->prepare($sql);

        $param = array(
            ":nama" => $nama,
            ":nip" => $nip,
            ":jabatan" => $jabatan,
            ":pangkat" => $pangkat,
            ":golongan" => $golongan,
            ":id" => $id
        );
        $saved = $stmt->execute($param);
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=daftar_petugas.php">';
        exit;

        $err = 1;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <?php
    include '../../head_html.php';

    ?>
    <title>Ubah Petugas</title>
</head>
<body>

<?php
include '../../config.php';
include '../../head_utama.php';
?>


<div class="container">
    <div class="container-fluid">

        <h1 class="display-4">Ubah Petugas</h1>
        <hr>


        <?php

        if (isset($_POST['simpan'])){
            if ($err == -1){
                $pesan = "Mohon isi semua kolom dengan benar";

                echo '<div class="alert alert-danger" role="alert">';
                echo $pesan;
                echo '</div>';


            } elseif ($err == 1) {
                $pesan = "Data berhasil diubah";

                echo '<div class="alert alert-success" role="alert">';
                echo $pesan;
                echo '</div>';

            }
        }
        ?>


        <form action="" method="post">
            <input type="hidden" value="">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputNama">Nama petugas</label>
                    <input name="nama" value="<?php echo $get_nama; ?>" class="form-control" autofocus id="inputNama">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputNIP">NIP</label>
                    <input name="nip" value="<?php echo $get_nip; ?>" class="form-control" id="inputNIP">
                </div>
            </div>
            <div class="form-group">
                <label for="inputJabatan">Jabatan</label>
                <input type="text" name="jabatan" value="<?php echo $get_jabatan; ?>" class="form-control" id="inputJabatan">
            </div>
            <div class="form-group">
                <label for="inputPangkat">Pangkat</label>
                <input type="text" name="pangkat" value="<?php echo $get_pangkat; ?>" class="form-control" id="inputPangkat">
            </div>
            <div class="form-group">
                <label for="inputGolongan">Golongan</label>
                <input type="text" name="golongan" value="<?php echo $get_golongan; ?>" class="form-control" id="inputPangkat">
            </div>

            <input name="simpan" type="submit" value="Ubah" class="btn btn-primary">
            <a href="daftar_petugas.php">Kembali</a>
        </form>

    </div>
</div>



</body>
</html>


<!------ Include the above in your HEAD tag ---------->
