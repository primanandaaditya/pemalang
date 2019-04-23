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

    <style>
    ul.timeline {
  list-style-type: none;
  position: relative;
}
ul.timeline:before {
  content: ' ';
  background: #d4d9df;
  display: inline-block;
  position: absolute;
  left: 29px;
  width: 2px;
  height: 100%;
  z-index: 400;
}
ul.timeline > li {
  margin: 20px 0;
  padding-left: 20px;
}
ul.timeline > li:before {
  content: ' ';
  background: white;
  display: inline-block;
  position: absolute;
  border-radius: 50%;
  border: 3px solid #22c0e8;
  left: 20px;
  width: 20px;
  height: 20px;
  z-index: 400;
}
    </style>
    <title>Progres pemohon</title>
    <script src="../../ckeditor/js/ckeditor.js"></script>
</head>

<body>

<?php
include '../../config.php';
include '../../head_utama.php';
?>

<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-md-6 offset-md-3">


        <h1 class="display-4">Progres Pemohon</h1>

        <br>
        <br>

        <form method="post">
          <div class="input-group mb-3">
            <select name="id_pemohon" class="custom-select" id="inputGroupSelect02">
              <option selected>Pilih pemohon</option>

              <?php
              $sql = "select * from pemohon order by nama";
              $stmt = $db->query($sql);

              while ($pemohon = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo '<option value="'.$pemohon['id'].'">'.$pemohon['nama'].'</option>';
              }

              ?>

            </select>
            <div class="input-group-append">
              <input class="input-group-text" type="submit" name="tampilkan" value="Tampilkan">
            </div>
          </div>

        </form>

        <br>
        <br>

        <?php

        $jumlah=0;

        if(isset($_POST['tampilkan'])){
          $id_pemohon = $_POST['id_pemohon'];

          //cari detail pemohon
          $sql = 'select pemohon.id, pemohon.nomor,pemohon.nomor_splp,pemohon.keluaran_splp,DATE_FORMAT(pemohon.tgl_terbit_splp,"%d %M %Y") as tgl_terbit_splp,DATE_FORMAT(pemohon.tgl_habis_splp,"%d %M %Y") as tgl_habis_splp, ';
          $sql = $sql . 'pemohon.nama, pemohon.nik, pemohon.jk,pemohon.nomor_surat,pemohon.keterangan,DATE_FORMAT(pemohon.tgl_penetapan,"%d %M %Y") as tgl_penetapan, ';
          $sql = $sql . 'pemohon.alamat,DATE_FORMAT(pemohon.tanggal_lahir,"%d %M %Y") as tanggal_lahir,DATE_FORMAT(pemohon.created_date,"%d %M %Y") as tgl, ';
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
              ":id" => $id_pemohon
          );
          $saved = $stmt->execute($param);
          $pemohon = $stmt->fetch(PDO::FETCH_ASSOC);

        

            if($pemohon){
                $jumlah=$jumlah+1;

                  if($pemohon['jk']=='P'){
                        $jk='Perempuan';
                  }else {
                        $jk='Laki-laki';
                  }

              echo "<h4>".$pemohon['nama']."</h4>";
              echo '<ul class="timeline">';

                echo '<li>';
                echo '<a href="#">Input Sistem</a>';
                echo '<a href="#" class="float-right">'.$pemohon['tgl'].'</a>';
                echo '<dl class="row text-left">
                    <dt class="col-sm-4">Nama pemohon</dt>
                    <dd class="col-sm-8">:  '.$pemohon['nama'].'</dd>
                    <dt class="col-sm-4">NIK</dt>
                    <dd class="col-sm-8">:  '.$pemohon['nik'].'</dd>
                    <dt class="col-sm-4">Jenis kelamin</dt>
                    <dd class="col-sm-8">:  '.$jk.'</dd>
                    <dt class="col-sm-4">Tempat/tanggal lahir</dt>
                    <dd class="col-sm-8">:  '.$pemohon['tempat_lahir'].', '.$pemohon['tanggal_lahir'].'</dd>
                    <dt class="col-sm-4">Alamat</dt>
                    <dd class="col-sm-8">:  '.$pemohon['alamat'].'</dd>
                    <dt class="col-sm-4">Agama</dt>
                    <dd class="col-sm-8">:  '.$pemohon['agama_pemohon'].'</dd>
                    <dt class="col-sm-4">Status kawin</dt>
                    <dd class="col-sm-8">:  '.$pemohon['status_kawin'].'</dd>
                    <dt class="col-sm-4">Pekerjaan</dt>
                    <dd class="col-sm-8">:  '.$pemohon['pekerjaan_pemohon'].'</dd>
                    <dt class="col-sm-4">Kewarganegaraan</dt>
                    <dd class="col-sm-8">:  '.$pemohon['kewarganegaraan'].'</dd>
                </dl>';
                echo '</li>';
                echo '<br>';
                echo '<br>';








                //jadwal BAP
                //cari detail pemohon
                $sql = 'select jadwal_bap.id, DATE_FORMAT(jadwal_bap.tanggal,"%d %M %Y") as tanggal, ';
                $sql = $sql . ' petugas.nama as nama_petugas, jadwal_bap.keterangan ';
                $sql = $sql . 'from ';
                $sql = $sql . 'jadwal_bap ';
                $sql = $sql . 'inner join ';
                $sql = $sql . 'petugas ';
                $sql = $sql . 'on petugas.id = jadwal_bap.id_petugas ';
                $sql = $sql . 'where jadwal_bap.id_pemohon =:id';
                $stmt = $db->prepare($sql);
                $param = array(
                    ":id" => $id_pemohon
                );
                $saved = $stmt->execute($param);
                $jadwal = $stmt->fetch(PDO::FETCH_ASSOC);

                echo '<li>';
                echo '<a href="#">Jadwal BAP</a>';
                if($jadwal){
                    $jumlah=$jumlah+1;
                

                  echo '<a href="#" class="float-right">'.$jadwal['tanggal'].'</a>';
                  echo '<dl class="row text-left">
                      <dt class="col-sm-4">Nama petugas</dt>
                      <dd class="col-sm-8">:  '.$jadwal['nama_petugas'].'</dd>
                      <dt class="col-sm-4">Keterangan</dt>
                      <dd class="col-sm-8">:  '.$jadwal['keterangan'].'</dd>

                  </dl>';

                }else {

                  echo '<a href="#" class="float-right">-</a>';
                  echo '<dl class="row text-left">
                      <dt class="col-sm-4">Nama petugas</dt>
                      <dd class="col-sm-8">: - </dd>
                      <dt class="col-sm-4">Keterangan</dt>
                      <dd class="col-sm-8">: - </dd>

                  </dl>';
                }
                echo '</li>';
                echo '<br>';
                  echo '<br>';








                //proses
                //cari dulu id_jadwal_bap
                $id_jadwal_bap = $jadwal['id'];

                //query di tabel proses_bap
                $sql = 'select id, DATE_FORMAT(tanggal_proses_bap,"%d %M %Y") as tanggal, ';
                $sql = $sql . ' keterangan from proses_bap where id_jadwal_bap =:id';
                $stmt = $db->prepare($sql);
                $param = array(
                    ":id" => $id_jadwal_bap
                );
                $saved = $stmt->execute($param);
                $proses_bap = $stmt->fetch(PDO::FETCH_ASSOC);
                $id_proses_bap = $proses_bap['id'];
                //echo $id_proses_bap;












                //cari proses_bap
                $sql = "SELECT proses_bap.id, DATE_FORMAT(proses_bap.tanggal_proses_bap, '%d %M %Y') as tanggal_proses_bap, ";
                $sql = $sql . " proses_bap.keterangan as keterangan_proses_bap, formulir_bap.nomor, formulir_bap.keterangan as form_bap ";
                $sql = $sql . " FROM formulir_bap ";
                $sql = $sql . " INNER JOIN proses_bap on proses_bap.id = formulir_bap.id_proses_bap ";
                $sql = $sql . " WHERE proses_bap.id = :id_proses_bap";
                $stmt = $db->prepare($sql);

                $param = array(
                    ":id_proses_bap" => $id_proses_bap
                );

                $stmt->execute($param);
                $proses = $stmt->fetch(PDO::FETCH_ASSOC);

                echo '<li>';
                echo '<a href="#">Proses BAP</a>';
                if($proses){
                     $jumlah=$jumlah+1;
                  echo '<a href="#" class="float-right">'.$proses['tanggal_proses_bap'].'</a>';
                  echo '<dl class="row text-left">
                      <dt class="col-sm-4">Nomor form BAP</dt>
                      <dd class="col-sm-8">:  '.$proses['nomor'].'</dd>
                      <dt class="col-sm-4">Keterangan</dt>
                      <dd class="col-sm-8">:  '.$proses['keterangan_proses_bap'].'</dd>

                  </dl>';

                  //tampilkan tombol untuk menunjukkan foto dan video
                  echo '  <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#fotoModal">
                            Tampilkan foto
                        </button>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#videoModal">
                            Tampilkan video
                        </button>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#formBAPModal">
                            Tampilkan form BAP
                        </button>
                    </div>';

                  //tampilkan modal foto_bap
                  echo '<div class="modal fade" id="fotoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Foto</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">';


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

                  echo '  </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>';

                 //tampilkan modal video_bap
                echo '  <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Video</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">';

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


                      echo '</div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      </div>
                  </div>
              </div>
          </div>';

                //tampilkan $form_bap
                echo '  <div class="modal fade" id="formBAPModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Form BAP</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">';

                echo '<textarea name="formBAP" id="formBAP">';

                   if ($proses){
                       //jika ada
                       //masukkan isinya
                       echo $proses['form_bap'];

                   } else{
                       //jika tidak ada
                       //isi dengan format standard
                       //include_once "../../report/master/CKEditorBAP.php";
                       echo "Belum ada";
                   }

             echo '</textarea>';




                }else {
                  echo '<a href="#" class="float-right">-</a>';
                  echo '<dl class="row text-left">
                      <dt class="col-sm-4">Nomor form BAP</dt>
                      <dd class="col-sm-8">: -</dd>
                      <dt class="col-sm-4">Keterangan</dt>
                      <dd class="col-sm-8">: - </dd>

                  </dl>';
                }
                echo '</li>';


                echo '<br>';
                  echo '<br>';




















                  //proses BAPEN
                  $sql = "SELECT id, DATE_FORMAT(tanggal, '%d %M %Y') as tanggal, ";
                  $sql = $sql . " keterangan as form_bapen, pendapat, alasan, nomor ";
                  $sql = $sql . " FROM formulir_bapen where ";
                  $sql = $sql . " id_proses_bap = :id_proses_bap";
                  $stmt = $db->prepare($sql);

                  $param = array(
                      ":id_proses_bap" => $id_proses_bap
                  );

                  $stmt->execute($param);
                  $bapen = $stmt->fetch(PDO::FETCH_ASSOC);

                  echo '<li>';
                  echo '<a href="#">Bapen</a>';


                  if($bapen){
                       $jumlah=$jumlah+1;

                    if($bapen['pendapat']=='S'){
                      $pendapat = 'Setuju';
                    }else {
                      $pendapat ='Tidak setuju';
                    }
                    echo '<a href="#" class="float-right">'.$bapen['tanggal'].'</a>';
                    echo '<dl class="row text-left">
                        <dt class="col-sm-4">Nomor BAPEN</dt>
                        <dd class="col-sm-8">:  '.$bapen['nomor'].'</dd>
                        <dt class="col-sm-4">Pendapat</dt>
                        <dd class="col-sm-8">:  '.$pendapat.'</dd>
                        <dt class="col-sm-4">Alasan</dt>
                        <dd class="col-sm-8">:  '.$bapen['alasan'].'</dd>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#formBAPENModal">
                            Tampilkan form BAPEN
                        </button>

                    </dl>';

                    //tampilkan form bapen
                    //tampilkan $form_bap
                    echo '  <div class="modal fade" id="formBAPENModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Form BAPEN</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">';

                    echo '<textarea name="formBAPEN" id="formBAPEN">';

                       if ($bapen){
                           //jika ada
                           //masukkan isinya
                           echo $bapen['form_bapen'];

                       } else{
                           //jika tidak ada
                           //isi dengan format standard
                           //include_once "../../report/master/CKEditorBAP.php";
                           echo "Belum ada";
                       }

                 echo '</textarea>';

                  }else {
                    echo '<a href="#" class="float-right">-</a>';
                    echo '<dl class="row text-left">
                        <dt class="col-sm-4">Pendapat</dt>
                        <dd class="col-sm-8">: - </dd>
                        <dt class="col-sm-4">Alasan</dt>
                        <dd class="col-sm-8">: - </dd>

                    </dl>';
                  }
                  echo '</li>';
                  echo '<br>';
                    echo '<br>';




























                    //proses SK
                    $sql = "SELECT formulir_sk.id, DATE_FORMAT(formulir_sk.tanggal, '%d %M %Y') as tanggal, ";
                    $sql = $sql . " formulir_sk.keterangan as form_sk, formulir_sk.nomor, jenis_sk.nama as status_sk ";
                    $sql = $sql . " FROM formulir_sk INNER JOIN jenis_sk where ";
                    $sql = $sql . " id_proses_bap = :id_proses_bap";
                    $stmt = $db->prepare($sql);

                    $param = array(
                        ":id_proses_bap" => $id_proses_bap
                    );

                    $stmt->execute($param);
                    $sk = $stmt->fetch(PDO::FETCH_ASSOC);

                    echo '<li>';
                    echo '<a href="#">SK</a>';

                    if($sk){
                         $jumlah=$jumlah+1;

                      
                      echo '<a href="#" class="float-right">'.$sk['tanggal'].'</a>';
                      echo '<dl class="row text-left">
                          <dt class="col-sm-4">Nomor SK</dt>
                          <dd class="col-sm-8">:  '.$sk['nomor'].'</dd>
                          <dt class="col-sm-4">Status SK</dt>
                          <dd class="col-sm-8">:  '.$sk['status_sk'].'</dd>
                         
                          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#formSKModal">
                              Tampilkan form SK
                          </button>

                      </dl>';

                      //tampilkan form bapen
                      //tampilkan $form_bap
                      echo '  <div class="modal fade" id="formSKModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Form SK</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">';

                      echo '<textarea name="hasilSK" id="hasilSK">';

                         if ($sk){
                             //jika ada
                             //masukkan isinya
                             echo $sk['form_sk'];

                         } else{
                             //jika tidak ada
                             //isi dengan format standard
                             //include_once "../../report/master/CKEditorBAP.php";
                             echo "Belum ada";
                         }

                   echo '</textarea>';

                    }else {
                      echo '<a href="#" class="float-right">-</a>';
                      echo '<dl class="row text-left">
                          <dt class="col-sm-4">Pendapat</dt>
                          <dd class="col-sm-8">: - </dd>
                          <dt class="col-sm-4">Alasan</dt>
                          <dd class="col-sm-8">: - </dd>

                      </dl>';
                    }
                    echo '</li>';
                    echo '<br>';
                      echo '<br>';

              echo '</ul>';

              echo '<h5>Progres Total</h5>';
              echo '<div class="progress">';

              switch ($jumlah) {
                case 1:
                    echo '<div class="progress-bar" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20%</div>';
                    break;
                case 2:
                    echo '<div class="progress-bar" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">40%</div>';
                    break;
                case 3:
                    echo '<div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>';
                    break;
                case 4:
                    echo '<div class="progress-bar" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80%</div>';
                    break;
                case 5:
                    echo '<div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>';
                    break;
                default:
                    echo '<div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0">0%</div>';
                    break;
            }
              echo '</div>';

            }else {
              echo "Data tidak ditemukan.";
            }

        }else {

        }

         ?>
</div>
</div>
</div>

<script type="text/javascript">
    //CKEDITOR.replace('myeditor');
    var editor = CKEDITOR.replace("formBAP", {

        toolbar: [
            { name: 'document', items: [ 'Preview', '-', 'Print' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
        ],
        height: 1000,
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



    var ediSK = CKEDITOR.replace("hasilSK", {

        toolbar: [
            { name: 'document', items: [ 'Preview', '-', 'Print' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
        ],
        height: 1000,
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






    var editor = CKEDITOR.replace("formBAPEN", {

        toolbar: [
            { name: 'document', items: [ 'Preview', '-', 'Print' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
        ],
        height: 1000,
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

    var ediBapen = CKEDITOR.replace("hasilBAPEN", {


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


<!------ Include the above in your HEAD tag ---------->
