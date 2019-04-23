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


    <title>Bapen baru</title>
</head>
<body>

<?php
include '../../config.php';
include '../../head_utama.php';
?>


<div class="container">
    <div class="container-fluid">

        <h1 class="display-4">Bapen baru</h1>


        <br>
        <br>

        Pilih dari data berikut
        <br>
        <br>
        <table id="tabel" class="table table-bordered">
            <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal proses</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            <?php

            //untuk  nomor urut
            $i = 1;

            $sql = "SELECT proses_bap.id, DATE_FORMAT(proses_bap.tanggal_proses_bap, '%d-%m-%Y') as tanggal, proses_bap.tanggal_proses_bap as start,";
            $sql = $sql . " DATE_FORMAT(jadwal_bap.tanggal, '%d-%m-%Y') as tanggal_jadwal_bap,";
            $sql = $sql . " pemohon.nama as title, pemohon.nik as NIK, ";
            $sql = $sql . " petugas.nama as nama_petugas,";
            $sql = $sql . " proses_bap.keterangan as keterangan";

            $sql = $sql . " FROM proses_bap";
            $sql = $sql . " INNER JOIN jadwal_bap on jadwal_bap.id = proses_bap.id_jadwal_bap";
            $sql = $sql . " INNER JOIN pemohon on pemohon.id = jadwal_bap.id_pemohon";
            $sql = $sql . " INNER JOIN petugas on petugas.id = jadwal_bap.id_petugas";

            $sql = $sql . " ORDER by proses_bap.tanggal_proses_bap DESC";
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
                echo $proses['tanggal'];
                //echo '</a>';
                //echo '</p>';

                //untuk content/isi accordion
                //echo '<div class="collapse" id="collapseExample'.$proses["id"].'">';
                echo '<ul class="list-group">';
                echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                echo 'Jadwal BAP';
                echo '<span class="badge badge-primary badge-pill">'.$proses["tanggal_jadwal_bap"].'</span>';
                echo '</li>';

                echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                echo 'Nama pemohon';
                echo '<span class="badge badge-primary badge-pill">'.$proses["title"].'</span>';
                echo '</li>';

                echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                echo 'NIK pemohon';
                echo '<span class="badge badge-primary badge-pill">'.$proses["NIK"].'</span>';
                echo '</li>';

                echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                echo 'Nama petugas';
                echo '<span class="badge badge-primary badge-pill">'.$proses["nama_petugas"].'</span>';
                echo '</li>';

                echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                echo 'Keterangan';
                echo '<span class="badge badge-primary badge-pill">'.$proses["keterangan"].'</span>';
                echo '</li>';
                echo '</ul>';
                //echo '</div>';
                echo "</td>";

                echo "<td>";

                //cari apakah
                //sudah ada Bapen
                $sqla = "select * from formulir_bapen where id_proses_bap = :id";
                $stmta = $db->prepare($sqla);
                $parama = array(
                    ":id" => $proses['id']
                );

                $stmta->execute($parama);
                $ada_bapen = $stmta->fetch(PDO::FETCH_ASSOC);

                if ($ada_bapen){
                    echo '<a href="proses_bapen.php?id='.$proses["id"].'" class="btn btn-success">Lihat bapen</a>';
                }else{
                    echo '<a href="proses_bapen.php?id='.$proses["id"].'" class="btn btn-primary">Buat bapen</a>';
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
