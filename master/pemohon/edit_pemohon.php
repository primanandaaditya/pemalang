<?php
session_start();
ob_start();
include ('../../auth.php');
?>

<?php

require_once ('../../config.php');


//Proses GET
if (!isset($_GET['id'])){
    header('location: daftar_pemohon.php');
}else{

    //dapatkan data user
    // dari id di atas
    $id = $_GET['id'];
    $sql = "select * from pemohon where id = :id";
    $stmt = $db->prepare($sql);
    $param = array(
        ":id" => $id
    );

    $stmt->execute($param);
    $pemohon = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($pemohon){
        $nomor = $pemohon['nomor'];
        $nama = $pemohon['nama'];
        $nik=$pemohon['nik'];
        $jk=$pemohon['jk'];
        $alamat=$pemohon['alamat'];
        $tanggal_lahir=$pemohon['tanggal_lahir'];
        $id_kota=$pemohon['id_kota'];
        $id_agama=$pemohon['id_agama'];
        $id_nikah=$pemohon['id_nikah'];
        $id_pekerjaan=$pemohon['id_pekerjaan'];
        $id_negara=$pemohon['id_negara'];
        $nomor_splp=$pemohon['nomor_splp'];
        $keluaran_splp=$pemohon['keluaran_splp'];
        $tgl_terbit_splp=$pemohon['tgl_terbit_splp'];
        $tgl_habis_splp=$pemohon['tgl_habis_splp'];
        $id_jenis_bap=$pemohon['id_jenis_bap'];
        $nomor_surat=$pemohon['nomor_surat'];
        $keterangan=$pemohon['keterangan'];
        $tgl_penetapan=$pemohon['tgl_penetapan'];
    }
}


//Proses UPDATE
if (isset($_POST['simpan'])){

    $get_id = $id;
    $get_nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
    $get_nik = filter_input(INPUT_POST, 'nik', FILTER_SANITIZE_STRING);
    $get_alamat = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING);
    $get_id_kota = filter_input(INPUT_POST, 'tempat', FILTER_SANITIZE_STRING);
    $get_tgllahir = filter_input(INPUT_POST, 'tgllahir', FILTER_SANITIZE_STRING);
    $get_jk = filter_input(INPUT_POST, 'jk', FILTER_SANITIZE_STRING);
    $get_id_agama = filter_input(INPUT_POST, 'id_agama', FILTER_SANITIZE_STRING);
    $get_id_nikah = filter_input(INPUT_POST, 'id_nikah', FILTER_SANITIZE_STRING);
    $get_id_pekerjaan = filter_input(INPUT_POST, 'id_pekerjaan', FILTER_SANITIZE_STRING);
    $get_id_negara = filter_input(INPUT_POST, 'id_negara', FILTER_SANITIZE_STRING);
    $get_nomor_splp = filter_input(INPUT_POST,'nomor_splp', FILTER_SANITIZE_STRING);
    $get_keluaran_splp = filter_input(INPUT_POST, 'keluaran_splp', FILTER_SANITIZE_STRING);
    $get_tgl_terbit_splp = filter_input(INPUT_POST,'tgl_terbit_splp', FILTER_SANITIZE_STRING);
    $get_tgl_habis_splp = filter_input(INPUT_POST, 'tgl_habis_splp', FILTER_SANITIZE_STRING);
    $get_id_jenis_bap=filter_input(INPUT_POST,'id_jenis_bap', FILTER_SANITIZE_STRING);
    $get_nomor_surat=filter_input(INPUT_POST,'nomor_surat',FILTER_SANITIZE_STRING);
    $get_keterangan=filter_input(INPUT_POST,'keterangan',FILTER_SANITIZE_STRING);
    $get_tgl_penetapan=filter_input(INPUT_POST,'tgl_penetapan',FILTER_SANITIZE_STRING);

    if ($get_nama == '' || $get_nik ==''){
        $err = -1;
    } else {

        $sql = "update pemohon set nama =:nama, ";
        $sql = $sql . 'nik = :nik, ';
        $sql = $sql . 'jk = :jk, ';
        $sql = $sql . 'id_kota = :id_kota, ';
        $sql = $sql . 'tanggal_lahir = :tanggal_lahir, ';
        $sql = $sql . 'alamat = :alamat, ';
        $sql = $sql . 'id_agama = :id_agama, ';
        $sql = $sql . 'id_nikah = :id_nikah, ';
        $sql = $sql . 'id_pekerjaan = :id_pekerjaan, ';
        $sql = $sql . 'id_negara = :id_negara, ';
        $sql = $sql . 'nomor_splp = :nomor_splp, ';
        $sql = $sql . 'keluaran_splp = :keluaran_splp, ';
        $sql = $sql . 'tgl_terbit_splp = :tgl_terbit_splp, ';
        $sql = $sql . 'tgl_habis_splp = :tgl_habis_splp, ';
        $sql = $sql . 'id_jenis_bap = :id_jenis_bap, ';
        $sql = $sql . 'nomor_surat = :nomor_surat, ';
        $sql = $sql . 'keterangan = :keterangan, ';
        $sql = $sql . 'tgl_penetapan =:tgl_penetapan ';
        $sql = $sql . 'where id =:id';

        $stmt = $db->prepare($sql);

        $param = array(
            ":nama" => $get_nama,
            ":nik" => $get_nik,
            ":jk" => $get_jk,
            ":id_kota" => $get_id_kota,
            ":tanggal_lahir" => $get_tgllahir,
            ":alamat" => $get_alamat,
            ":id_agama" => $get_id_agama,
            ":id_nikah" => $get_id_nikah,
            ":id_pekerjaan" => $get_id_pekerjaan,
            ":id_negara" => $get_id_negara,
            ":nomor_splp" => $get_nomor_splp,
            ":keluaran_splp" => $get_keluaran_splp,
            ":tgl_terbit_splp" => $get_tgl_terbit_splp,
            ":tgl_habis_splp" => $get_tgl_habis_splp,
            ":id_jenis_bap" => $get_id_jenis_bap,
            ":nomor_surat" => $get_nomor_surat,
            ":keterangan" => $get_keterangan,
            ":tgl_penetapan" => $get_tgl_penetapan,
            ":id" => $get_id
        );
        $saved = $stmt->execute($param);
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

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#inputTglLahir" ).datepicker({ dateFormat: 'yy-mm-dd' });
            $( "#inputTglHabisSPLP" ).datepicker({ dateFormat: 'yy-mm-dd' });
            $( "#inputTglTerbitSPLP" ).datepicker({ dateFormat: 'yy-mm-dd' });
            $( "#inputTglPenetapan" ).datepicker({ dateFormat: 'yy-mm-dd' });
        } );
    </script>

    <title>Ubah pemohon</title>
</head>
<body>

<?php
include '../../config.php';
include '../../head_utama.php';
?>


<div class="container">
    <div class="container-fluid">

        <h1 class="display-4">Ubah Pemohon</h1>
        <?php

        if (isset($_POST['simpan'])){
            if ($err == -1){
                $pesan = "Mohon isi semua kolom dengan benar";

                echo '<div class="alert alert-danger" role="alert">';
                echo $pesan;
                echo '</div>';

            } elseif ($err == 1) {
               header('location:daftar_pemohon.php');
            }
        }
        ?>


        <form action="" method="post">

            <div class="row">
                <div class="col-sm">


                    <div class="card">
                        <div class="card-header">
                            Biodata
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputNama">Nama pemohon</label>
                                    <input name="nama" value="<?php echo $nama;?>" class="form-control" autofocus id="inputNama">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputNIK">NIK</label>
                                    <input name="nik" value="<?php echo $nik;?>" class="form-control" id="inputNIK">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAlamat">Alamat</label>
                                <input type="text" name="alamat" value="<?php echo $alamat;?>" class="form-control" id="inputAlamat">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputTempat">Tempat lahir</label>
                                    <select id="inputTempat" name="tempat" class="form-control">
                                        <?php
                                        $sql = "select * from kota order by nama";
                                        $stmt = $db->query($sql);

                                        while ($kota = $stmt->fetch(PDO::FETCH_ASSOC)){
                                            if ($id_kota == $kota['id']){
                                                echo '<option value="'.$kota['id'].'" selected>'.$kota['nama'].'</option>';
                                            }else{
                                                echo '<option value="'.$kota['id'].'">'.$kota['nama'].'</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputTglLahir">Tanggal lahir</label>
                                    <input name="tgllahir" placeholder="tahun-bulan-tanggal" value="<?php echo $tanggal_lahir?>" class="form-control" autocomplete="off" id="inputTglLahir">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputJK">Jenis kelamin</label>
                                    <select name="jk" class="form-control" id="inputJK">
                                        <?php
                                        if ($jk == 'L'){
                                            echo '<option value="L" selected>Laki-laki</option>';
                                            echo '<option value="P">Perempuan</option>';
                                        }else{
                                            echo '<option value="L">Laki-laki</option>';
                                            echo '<option value="P" selected>Perempuan</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAgama">Agama</label>
                                    <select id="inputAgama" name="id_agama" class="form-control">
                                        <?php
                                        $sql = "select * from agama order by nama";
                                        $stmt = $db->query($sql);

                                        while ($agama = $stmt->fetch(PDO::FETCH_ASSOC)){
                                            if ($id_agama == $agama['id']){
                                                echo '<option value="'.$agama['id'].'" selected>'.$agama['nama'].'</option>';
                                            }else{
                                                echo '<option value="'.$agama['id'].'">'.$agama['nama'].'</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputidnikah">Status kawin</label>
                                    <select id="inputidnikah" name="id_nikah" class="form-control">
                                        <?php
                                        $sql = "select * from nikah order by nama";
                                        $stmt = $db->query($sql);

                                        while ($nikah = $stmt->fetch(PDO::FETCH_ASSOC)){
                                            if ($id_nikah == $nikah['id']){
                                                echo '<option value="'.$nikah['id'].'" selected>'.$nikah['nama'].'</option>';
                                            }else{
                                                echo '<option value="'.$nikah['id'].'">'.$nikah['nama'].'</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>



                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputidpekerjaan">Pekerjaan</label>
                                    <select id="inputidpekerjaan" name="id_pekerjaan" class="form-control">
                                        <?php
                                        $sql = "select * from pekerjaan order by nama";
                                        $stmt = $db->query($sql);

                                        while ($pek = $stmt->fetch(PDO::FETCH_ASSOC)){
                                            if ($id_pekerjaan == $pek['id']){
                                                echo '<option value="'.$pek['id'].'" selected>'.$pek['nama'].'</option>';
                                            }else{
                                                echo '<option value="'.$pek['id'].'">'.$pek['nama'].'</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputidnegara">Kewarganegaraan</label>
                                    <select id="inputidnegara" name="id_negara" class="form-control">
                                        <?php
                                        $sql = "select * from negara order by nama";
                                        $stmt = $db->query($sql);

                                        while ($negara = $stmt->fetch(PDO::FETCH_ASSOC)){


                                            if ($id_negara == $negara['id']){
                                                echo '<option value="'.$negara['id'].'" selected>'.$negara['nama'].'</option>';
                                            }else{
                                                echo '<option value="'.$negara['id'].'">'.$negara['nama'].'</option>';
                                            }

                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <br>
            <br>

            <div class="row">

                <div class="col-sm">


                    <div class="card">
                        <div class="card-header">
                            Persyaratan tambahan
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputSPLP">Nomor passpor lama/SPLP</label>
                                <input type="text" value="<?php echo $nomor_splp; ?>" name="nomor_splp" class="form-control" id="inputSPLP">
                            </div>

                            <div class="form-group">
                                <label for="inputKeluaran">Keluaran</label>
                                <input type="text" value="<?php echo $keluaran_splp; ?>" name="keluaran_splp" class="form-control" id="inputKeluaran">
                            </div>

                            <div class="form-group">
                                <label for="inputTglTerbitSPLP">Tanggal terbit</label>
                                <input type="text" placeholder="tahun-bulan-tanggal" value="<?php echo $tgl_terbit_splp; ?>" autocomplete="off" name="tgl_terbit_splp" class="form-control" id="inputTglTerbitSPLP">
                            </div>

                            <div class="form-group">
                                <label for="inputTglHabisSPLP">Tanggal habis</label>
                                <input type="text" placeholder="tahun-bulan-tanggal" value="<?php echo $tgl_habis_splp; ?>" autocomplete="off" name="tgl_habis_splp" class="form-control" id="inputTglHabisSPLP">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm">


                    <div class="card">
                        <div class="card-header">
                            BAP
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputJenisBAP">Jenis BAP</label>
                                <select name="id_jenis_bap" id="inputJenisBAP" class="form-control">

                                    <?php
                                    $sql = "select * from jenis_bap order by nama";
                                    $stmt = $db->query($sql);

                                    while ($jenis = $stmt->fetch(PDO::FETCH_ASSOC)){
                                        if ($id_jenis_bap == $jenis['id']){
                                            echo '<option value="'.$jenis['id'].'" selected>'.$jenis['nama'].'</option>';
                                        }else{
                                            echo '<option value="'.$jenis['id'].'">'.$jenis['nama'].'</option>';
                                        }
                                    }
                                    ?>
                                </select>

                            </div>

                            <div class="form-group">
                                <label for="inputKeterangan">Surat/laporan dikeluarkan di</label>
                                <input type="text" value="<?php echo $keterangan; ?>" name="keterangan" class="form-control" id="inputKeterangan">
                            </div>

                            <div class="form-group">
                                <label for="inputNomorSurat">Nomor</label>
                                <input type="text" value="<?php echo $nomor_surat; ?>" name="nomor_surat" class="form-control" id="inputNomorSurat">
                            </div>

                            <div class="form-group">
                                <label for="inputTglPenetapan">Tanggal penetapan</label>
                                <input type="text" placeholder="tahun-bulan-tanggal" value="<?php echo $tgl_penetapan;?>" autocomplete="off" name="tgl_penetapan" class="form-control" id="inputTglPenetapan">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <br>
            <br>
            <div class="text-center">
                <input name="simpan" type="submit" value="Ubah" class="btn btn-primary">
                <a href="daftar_pemohon.php">Kembali</a>
            </div>

        </form>

        <br>
        <br>

    </div>
</div>

</body>
</html>


<!------ Include the above in your HEAD tag ---------->
