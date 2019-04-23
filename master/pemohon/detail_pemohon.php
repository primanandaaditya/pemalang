<?php
session_start();
ob_start();
include ('../../auth.php');
?>

<?php

require_once ('../../config.php');

if (isset($_GET['id'])){

    $id = $_GET['id'];

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
        ":id" => $id
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
}
?>




<!DOCTYPE html>
<html>
<head>
    <?php
        include '../../head_html.php';
    ?>
    <title>Detail pemohon</title>
</head>
<body>


<?php
include '../../head_utama.php';
?>


<div class="container">
    <div class="container-fluid">

        <h1 class="display-4">Detail Pemohon</h1>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Biodata</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Persyaratan tambahan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">BAP</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Nama pemohon</h5>
                        </div>
                        <p class="mb-1"><?php echo $nama;?></p>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">NIK</h5>
                        </div>
                        <p class="mb-1"><?php echo $nik;?></p>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Jenis kelamin</h5>
                        </div>
                        <p class="mb-1">
                            <?php
                            if ($jk == 'P'){
                                echo 'Perempuan';
                            }else{
                                echo 'Laki-laki';
                            }
                            ?>
                        </p>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Tempat/tanggal lahir</h5>
                        </div>
                        <p class="mb-1"><?php echo $tempat_lahir.', '.$tanggal_lahir; ?></p>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Alamat</h5>
                        </div>
                        <p class="mb-1"><?php echo $alamat;?></p>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Agama</h5>
                        </div>
                        <p class="mb-1"><?php echo $agama_pemohon;?></p>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Status kawin</h5>
                        </div>
                        <p class="mb-1"><?php echo $status_kawin;?></p>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Pekerjaan</h5>
                        </div>
                        <p class="mb-1"><?php echo $pekerjaan_pemohon;?></p>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Kewarganegaraan</h5>
                        </div>
                        <p class="mb-1"><?php echo $kewarganegaraan;?></p>
                    </a>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Nomor SPLP</h5>
                        </div>
                        <p class="mb-1"><?php echo $nomor_splp;?></p>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Keluaran</h5>
                        </div>
                        <p class="mb-1"><?php echo $keluaran_splp;?></p>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Tanggal terbit SPLP</h5>
                        </div>
                        <p class="mb-1"><?php echo $tgl_terbit_splp;?></p>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Tanggal habis SPLP</h5>
                        </div>
                        <p class="mb-1"><?php echo $tgl_habis_splp;?></p>
                    </a>
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Jenis BAP</h5>
                        </div>
                        <p class="mb-1"><?php echo $id_jenis_bap;?></p>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Nomor surat</h5>
                        </div>
                        <p class="mb-1"><?php echo $nomor_surat;?></p>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Surat laporan kehilangan/penetapan pengadilan</h5>
                        </div>
                        <p class="mb-1"><?php echo $keterangan;?></p>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Tanggal penetapan</h5>
                        </div>
                        <p class="mb-1"><?php echo $tgl_penetapan;?></p>
                    </a>
                </div>
            </div>
        </div>

        <br>

        <div class="text-center">
            <a class="btn btn-primary" href="edit_pemohon.php?id=<?php echo $_GET['id'];?>">Ubah</a>
            <a href="daftar_pemohon.php">Kembali</a>
        </div>


    </div>
</div>



</body>
</html>


<!------ Include the above in your HEAD tag ---------->
