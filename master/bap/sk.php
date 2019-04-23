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

    <title>SK</title>
</head>
<body>

<?php
include '../../config.php';
include '../../head_utama.php';
?>


<div class="container">
    <div class="container-fluid">

        <h1 class="display-4">Proses SK</h1>


        <br>
        <br>

        Pilih dari data berikut (klik tombol kuning)
        <br>
        <br>
        <table id="tabel" class="table table-bordered">
            <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal Bapen</th>
                <th>Nomor Bapen</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            <?php

            //untuk  nomor urut
            $i = 1;

            $sql = "select formulir_bapen.id, formulir_bapen.nomor,  ";
            $sql = $sql . " DATE_FORMAT(formulir_bapen.tanggal, '%d-%m-%Y') as tanggal_bapen, ";
            $sql = $sql . " formulir_bapen.keterangan, formulir_bapen.pendapat, formulir_bapen.alasan, ";
            $sql = $sql . " proses_bap.id as id_proses_bap, DATE_FORMAT(proses_bap.tanggal_proses_bap, '%d-%m-%Y') as tanggal_proses_bap, ";
            $sql = $sql . " DATE_FORMAT(jadwal_bap.tanggal, '%d-%m-%Y') as tanggal_jadwal_bap, ";
            $sql = $sql . " pemohon.nama as nama_pemohon, pemohon.nik as nik_pemohon, ";
            $sql = $sql . " petugas.nama as nama_petugas ";
            $sql = $sql . " from formulir_bapen ";
            $sql = $sql . " inner join proses_bap ";
            $sql = $sql . " on formulir_bapen.id_proses_bap = proses_bap.id ";
            $sql = $sql . " inner join jadwal_bap ";
            $sql = $sql . " on proses_bap.id_jadwal_bap = jadwal_bap.id ";
            $sql = $sql . " inner join pemohon ";
            $sql = $sql . " on jadwal_bap.id_pemohon = pemohon.id ";
            $sql = $sql . " inner join petugas ";
            $sql = $sql . " on jadwal_bap.id_petugas = petugas.id ";
            $sql = $sql . " order by formulir_bapen.tanggal desc ";
            $stmt = $db->query($sql);

            //untuk kalender
            $hasil_array = Array();

            while ($proses = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo '<tr>';
                echo "<td>".$i."</td>";

                //untuk accordion
                echo "<td>";

                //untuk pemicu accordion
                //echo '<p>';
                //echo '<a data-toggle="collapse" href="#collapseExample'.$proses["id"].'" role="button" aria-expanded="false" aria-controls="collapseExample'.$proses["id"].'">';
                echo $proses['tanggal_bapen'];
                //echo '</a>';
                //echo '</p>';

                //untuk content/isi accordion
                //echo '<div class="collapse" id="collapseExample'.$proses["id"].'">';
                echo '<ul class="list-group">';

                echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                echo 'Proses BAP';
                echo '<span class="badge badge-primary badge-pill">'.$proses["tanggal_proses_bap"].'</span>';
                echo '</li>';

                echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                echo 'Jadwal BAP';
                echo '<span class="badge badge-primary badge-pill">'.$proses["tanggal_jadwal_bap"].'</span>';
                echo '</li>';

                echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                echo 'Nama pemohon';
                echo '<span class="badge badge-primary badge-pill">'.$proses["nama_pemohon"].'</span>';
                echo '</li>';

                echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                echo 'NIK pemohon';
                echo '<span class="badge badge-primary badge-pill">'.$proses["nik_pemohon"].'</span>';
                echo '</li>';

                echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                echo 'Nama petugas';
                echo '<span class="badge badge-primary badge-pill">'.$proses["nama_petugas"].'</span>';
                echo '</li>';



                echo '</ul>';
                //echo '</div>';

                echo "</td>";

                echo "<td>";
                echo $proses['nomor'];
                echo "</td>";

                echo "<td>";
                //cek sudah sk atau belum?

                $sqla = "select * from formulir_sk where id_proses_bap = :id";
                $stmta = $db->prepare($sqla);
                $parama = array(
                    ":id" => $proses['id_proses_bap']
                );
                $stmta->execute($parama);
                $sk = $stmta->fetch(PDO::FETCH_ASSOC);

                if($sk){
                  echo '<a href="proses_sk.php?id='.$proses["id"].'" class="btn btn-success">Lihat SK</a>';
                }else {
                  echo '<a href="proses_sk.php?id='.$proses["id"].'" class="btn btn-warning">Buat SK</a>';
                }
                echo "</td>";
                echo '</tr>';
                $i = $i + 1;

                //untuk kalender
                $hasil_array[] = $proses;

            }

            ?>
            </tbody>
        </table>


    </div>
</div>

<script type="text/javascript">
    $(document).ready( function () {
        $('#tabel').DataTable();
    } );
</script>



</body>
</html>
