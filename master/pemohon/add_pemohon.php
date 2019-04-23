<?php
    session_start();
    ob_start();
    include ('../../auth.php');
?>
<?php

require_once ('../../config.php');

if (isset($_POST['simpan'])){

    $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
    $nik = filter_input(INPUT_POST, 'nik', FILTER_SANITIZE_STRING);
    $alamat = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING);
    $id_kota = filter_input(INPUT_POST, 'tempat', FILTER_SANITIZE_STRING);
    $tgllahir = filter_input(INPUT_POST, 'tgllahir', FILTER_SANITIZE_STRING);
    $jk = filter_input(INPUT_POST, 'jk', FILTER_SANITIZE_STRING);
    $id_agama = filter_input(INPUT_POST, 'id_agama', FILTER_SANITIZE_STRING);
    $id_nikah = filter_input(INPUT_POST, 'id_nikah', FILTER_SANITIZE_STRING);
    $id_pekerjaan = filter_input(INPUT_POST, 'id_pekerjaan', FILTER_SANITIZE_STRING);
    $id_negara = filter_input(INPUT_POST, 'id_negara', FILTER_SANITIZE_STRING);

    $nomor_splp = filter_input(INPUT_POST,'nomor_splp', FILTER_SANITIZE_STRING);
    $keluaran_splp = filter_input(INPUT_POST, 'keluaran_splp', FILTER_SANITIZE_STRING);
    $tgl_terbit_splp = filter_input(INPUT_POST,'tgl_terbit_splp', FILTER_SANITIZE_STRING);
    $tgl_habis_splp = filter_input(INPUT_POST, 'tgl_habis_splp', FILTER_SANITIZE_STRING);

    $id_jenis_bap = filter_input(INPUT_POST, 'id_jenis_bap', FILTER_SANITIZE_STRING);
    $nomor_surat = filter_input(INPUT_POST, 'nomor_surat', FILTER_SANITIZE_STRING);
    $keterangan = filter_input(INPUT_POST,'keterangan',FILTER_SANITIZE_STRING);
    $tgl_penetapan = filter_input(INPUT_POST,'tgl_penetapan', FILTER_SANITIZE_STRING);


    if ($nama == '' || $nik =='' || $id_kota == '' || $id_agama == '' || $id_nikah == '' || $id_pekerjaan == '' || $id_negara == ''){
        $err = -1;
    } else {


        //cek dulu apakah pemohon
        //dengan nik dan nama yang sama
        //sudah ada

        $sql = "select * from pemohon where nama = :nama and nik = :nik";
        $stmt = $db->prepare($sql);
        $param = array(
            ":nama" => $nama,
            ":nik" => $nik
        );
        $stmt->execute($param);
        $pemohon = $stmt->fetch(PDO::FETCH_ASSOC);

        //jika sudah ada
        if ($pemohon){
            $err =-2;


        }else{
            //jika belum ada
            //tambahkan

            $sql = "insert into pemohon (nama,nik,jk,id_kota,tanggal_lahir,alamat,id_agama,id_nikah,id_pekerjaan,id_negara,nomor_splp,keluaran_splp,tgl_terbit_splp,tgl_habis_splp,id_jenis_bap,nomor_surat,keterangan,tgl_penetapan) VALUES (:nama,:nik,:jk,:id_kota,:tanggal_lahir,:alamat,:id_agama,:id_nikah,:id_pekerjaan,:id_negara,:nomor_splp,:keluaran_splp,:tgl_terbit_splp,:tgl_habis_splp,:id_jenis_bap,:nomor_surat,:keterangan,:tgl_penetapan)";
            $stmt = $db->prepare($sql);

            $param = array(
                ":nama" => $nama,
                ":nik" => $nik,
                ":jk" => $jk,
                ":id_kota" => $id_kota,
                ":tanggal_lahir" => $tgllahir,
                ":alamat" => $alamat,
                ":id_agama" => $id_agama,
                ":id_nikah" => $id_nikah,
                ":id_pekerjaan" => $id_pekerjaan,
                ":id_negara" => $id_negara,
                ":nomor_splp" => $nomor_splp,
                ":keluaran_splp" => $keluaran_splp,
                ":tgl_terbit_splp" => $tgl_terbit_splp,
                ":tgl_habis_splp" => $tgl_habis_splp,
                ":id_jenis_bap" => $id_jenis_bap,
                ":nomor_surat" => $nomor_surat,
                ":keterangan" => $keterangan,
                ":tgl_penetapan" =>$tgl_penetapan

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
    <script>
        $( function() {
            $( "#inputTglLahir" ).datepicker({ dateFormat: 'yy-mm-dd' });
            $( "#inputTglHabisSPLP" ).datepicker({ dateFormat: 'yy-mm-dd' });
            $( "#inputTglTerbitSPLP" ).datepicker({ dateFormat: 'yy-mm-dd' });
            $( "#inputTglPenetapan" ).datepicker({ dateFormat: 'yy-mm-dd' });
        } );
    </script>

    <title>Pemohon baru</title>
</head>
<body>

<?php
include '../../config.php';
include '../../head_utama.php';
?>


<div class="container">
    <div class="container-fluid">

        <h1 class="display-4">Pemohon Baru</h1>

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

                $pesan = "Nama dan NIK ini sudah ada";

                echo '<div class="alert alert-danger" role="alert">';
                echo $pesan;
                echo '</div>';
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
                                    <input name="nama" class="form-control" autofocus id="inputNama">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputNIK">NIK</label>
                                    <input name="nik" class="form-control" id="inputNIK">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAlamat">Alamat</label>
                                <input type="text" name="alamat" class="form-control" id="inputAlamat">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputTempat">Tempat lahir</label>
                                    <select id="inputTempat" name="tempat" class="form-control">
                                        <?php
                                        $sql = "select * from kota order by nama";
                                        $stmt = $db->query($sql);

                                        while ($kota = $stmt->fetch(PDO::FETCH_ASSOC)){
                                            echo '<option value="'.$kota['id'].'">'.$kota['nama'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputTglLahir">Tanggal lahir</label>
                                    <input name="tgllahir" placeholder="tahun-bulan-tanggal" class="form-control" autocomplete="off" id="inputTglLahir">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputJK">Jenis kelamin</label>
                                    <select name="jk" class="form-control" id="inputJK">
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
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
                                            echo '<option value="'.$agama['id'].'">'.$agama['nama'].'</option>';
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
                                            echo '<option value="'.$nikah['id'].'">'.$nikah['nama'].'</option>';

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
                                            echo '<option value="'.$pek['id'].'">'.$pek['nama'].'</option>';

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
                                            echo '<option value="'.$negara['id'].'">'.$negara['nama'].'</option>';

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
                                <input type="text" name="nomor_splp" class="form-control" id="inputSPLP">
                            </div>

                            <div class="form-group">
                                <label for="inputKeluaran">Keluaran</label>
                                <input type="text" name="keluaran_splp" class="form-control" id="inputKeluaran">
                            </div>

                            <div class="form-group">
                                <label for="inputTglTerbitSPLP">Tanggal terbit</label>
                                <input type="text" placeholder="tahun-bulan-tanggal" autocomplete="off" name="tgl_terbit_splp" class="form-control" id="inputTglTerbitSPLP">
                            </div>

                            <div class="form-group">
                                <label for="inputTglHabisSPLP">Tanggal habis</label>
                                <input type="text" placeholder="tahun-bulan-tanggal" autocomplete="off" name="tgl_habis_splp" class="form-control" id="inputTglHabisSPLP">
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
                                        echo '<option value="'.$jenis['id'].'">'.$jenis['nama'].'</option>';
                                    }
                                    ?>
                                </select>

                            </div>

                            <div class="form-group">
                                <label for="inputKeterangan">Surat/laporan dikeluarkan di</label>
                                <input type="text" name="keterangan" class="form-control" id="inputKeterangan">
                            </div>

                            <div class="form-group">
                                <label for="inputNomorSurat">Nomor</label>
                                <input type="text" name="nomor_surat" class="form-control" id="inputNomorSurat">
                            </div>

                            <div class="form-group">
                                <label for="inputTglPenetapan">Tanggal penetapan</label>
                                <input type="text" placeholder="tahun-bulan-tanggal" autocomplete="off" name="tgl_penetapan" class="form-control" id="inputTglPenetapan">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <br>
            <br>
            <div class="text-center">
                <input name="simpan" type="submit" value="Simpan" class="btn btn-primary">
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
