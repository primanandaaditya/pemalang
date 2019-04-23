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

    <title>Dokumen Proses BAP</title>
</head>
<body>

<?php
include '../../config.php';
include '../../head_utama.php';
include '../../report/master/terbilang.php';
?>


<div class="container">
    <div class="container-fluid">

        <h1 class="display-4">Dokumen Proses BAP</h1>

        <br>
        <?php $id_proses_bap = $_GET['id']; ?>


            <a href="ambil_foto_bap.php?id=<?php echo $id_proses_bap; ?>" class="btn btn-primary">Tambah foto...</a>
            <a href="ambil_video_bap.php?id=<?php echo $id_proses_bap; ?>" class="btn btn-primary">Tambah video...</a>
            <a href="formulir_bap.php?id=<?php echo $id_proses_bap; ?>" class="btn btn-info">Formulir BAP</a>
            <a href="proses_bap.php" class="btn btn-secondary">Kembali</a>


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

        <br>
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" id="jadwal-tab" data-toggle="tab" href="#jadwal" role="tab" aria-controls="jadwal" aria-selected="true">Jadwal BAP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pemohon-tab" data-toggle="tab" href="#pemohon" role="tab" aria-controls="pemohon" aria-selected="false">Detail pemohon</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="fotovideo-tab" data-toggle="tab" href="#fotovideo" role="tab" aria-controls="fotovideo" aria-selected="false">Foto & video</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="jadwal" role="tabpanel" aria-labelledby="jadwal-tab">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Tanggal jadwal
                                <span class="font-weight-light"><?php echo $detail_tgl_jadwal_bap; ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Tanggal proses
                                <span class="font-weight-light"><?php echo $detail_tgl_proses_bap; ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Nama petugas
                                <span class="font-weight-light"><?php echo $detail_nama_petugas; ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Keterangan
                                <span class="font-weight-light"><?php echo $detail_keterangan; ?></span>
                            </li>
                        </ul>

                    </div>
                    <div class="tab-pane fade" id="pemohon" role="tabpanel" aria-labelledby="pemohon-tab">
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
                                <br>
                                <dl class="row text-left">

                                    <dt class="col-sm-3">Nama pemohon</dt>
                                    <dd class="col-sm-9">: <?php echo $nama;?></dd>

                                    <dt class="col-sm-3">NIK</dt>
                                    <dd class="col-sm-9">: <?php echo $nik;?></dd>

                                    <dt class="col-sm-3">Jenis kelamin</dt>
                                    <dd class="col-sm-9">: <?php
                                        if ($jk == 'P'){
                                            echo 'Perempuan';
                                        }else{
                                            echo 'Laki-laki';
                                        }
                                        ?></dd>

                                    <dt class="col-sm-3">Tempat/tanggal lahir</dt>
                                    <dd class="col-sm-9">: <?php echo $tempat_lahir.', '.$tanggal_lahir; ?></dd>

                                    <dt class="col-sm-3">Alamat</dt>
                                    <dd class="col-sm-9">: <?php echo $alamat;?></dd>

                                    <dt class="col-sm-3">Agama</dt>
                                    <dd class="col-sm-9">: <?php echo $agama_pemohon;?></dd>

                                    <dt class="col-sm-3">Status kawin</dt>
                                    <dd class="col-sm-9">: <?php echo $status_kawin;?></dd>

                                    <dt class="col-sm-3">Pekerjaan</dt>
                                    <dd class="col-sm-9">: <?php echo $pekerjaan_pemohon;?></dd>

                                    <dt class="col-sm-3">Kewarganegaraan</dt>
                                    <dd class="col-sm-9">: <?php echo $kewarganegaraan;?></dd>

                                </dl>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <br>
                                <dl class="row text-left">

                                    <dt class="col-sm-3">Nomor SPLP</dt>
                                    <dd class="col-sm-9">: <?php echo $nomor_splp; ?></dd>

                                    <dt class="col-sm-3">Keluaran</dt>
                                    <dd class="col-sm-9">: <?php echo $keluaran_splp;?></dd>

                                    <dt class="col-sm-3">Tanggal terbit SPLP</dt>
                                    <dd class="col-sm-9">: <?php echo $tgl_terbit_splp;?></dd>

                                    <dt class="col-sm-3">Tanggal habis SPLP</dt>
                                    <dd class="col-sm-9">: <?php echo $tgl_habis_splp;?></dd>

                                </dl>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <br>
                                <dl class="row text-left">

                                    <dt class="col-sm-3">Jenis BAP</dt>
                                    <dd class="col-sm-9">: <?php echo $id_jenis_bap; ?></dd>

                                    <dt class="col-sm-3">Nomor surat</dt>
                                    <dd class="col-sm-9">: <?php echo $nomor_surat;?></dd>

                                    <dt class="col-sm-3">Surat laporan kehilangan/penetapan pengadilan</dt>
                                    <dd class="col-sm-9">: <?php echo $keterangan;?></dd>

                                    <dt class="col-sm-3">Tanggal penetapan</dt>
                                    <dd class="col-sm-9">: <?php echo $tgl_penetapan;?></dd>

                                </dl>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="fotovideo" role="tabpanel" aria-labelledby="fotovideo">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        Foto
                                    </div>
                                   <div class="card-body">

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
                                               echo '<form action="delete_foto.php?id='.$foto['id'].'&filename='.$foto['nama_file'].'" method="post">';
                                               echo '<input type="submit" onclick="return confirm(\'Hapus data ini?\');" value="Hapus" class="btn btn-outline-danger btn-sm">';
                                               echo '</form>';
                                               echo '</figcaption>';
                                               echo '</figure>';
                                           }
                                       }


                                       ?>
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        Video
                                    </div>

                                    <div class="card-body">

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
                                                echo '<form action="delete_video.php?id='.$video['id'].'&filename='.$video['nama_file'].'" method="post">';
                                                echo '<input type="submit" onclick="return confirm(\'Hapus data ini?\');" value="Hapus" class="btn btn-outline-danger btn-sm">';
                                                echo '</form>';
                                                echo '</figcaption>';
                                                echo '</figure>';
                                            }
                                        }


                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
