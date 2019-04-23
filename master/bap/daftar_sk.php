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

    <title>Daftar SK</title>
</head>
<body>

<?php
include '../../config.php';
include '../../head_utama.php';
?>


<div class="container">
    <div class="container-fluid">

        <h1 class="display-4">Daftar SK</h1>
        <br>
        <br>

        <a href="sk.php" class="btn btn-primary">SK baru</a>

<br>
<br>
        <table id="tabel" class="table table-bordered">
            <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal SK</th>
                <th>Nomor SK</th>
                <th>Status SK</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            <?php

            //untuk  nomor urut
            $i = 1;

            $sql = "SELECT formulir_sk.id, formulir_sk.id_proses_bap, formulir_sk.nomor,";
            $sql = $sql . " date_format(formulir_sk.tanggal,'%d %M %Y') as ";
            $sql = $sql . " tanggal_sk,formulir_sk.keterangan,jenis_sk.nama as status_sk, ";
            $sql = $sql . " date_format(proses_bap.tanggal_proses_bap,'%d %M %Y') as tanggal_proses_bap, ";
            $sql = $sql . " proses_bap.id_jadwal_bap, ";
            $sql = $sql . " date_format(jadwal_bap.tanggal,'%d %M %Y') as tanggal_jadwal_bap, ";
            $sql = $sql . " pemohon.nama as nama_pemohon, petugas.nama as nama_petugas ";
            $sql = $sql . " FROM formulir_sk ";
            $sql = $sql . " INNER JOIN proses_bap on proses_bap.id = formulir_sk.id_proses_bap ";
            $sql = $sql . " INNER JOIN jadwal_bap on proses_bap.id_jadwal_bap = jadwal_bap.id ";
            $sql = $sql . " INNER JOIN petugas on petugas.id = jadwal_bap.id_petugas ";
            $sql = $sql . " INNER JOIN pemohon on pemohon.id = jadwal_bap.id_pemohon ";
            $sql = $sql . " INNER JOIN jenis_sk on jenis_sk.id = formulir_sk.id_jenis_sk ";
            $sql = $sql . " order by formulir_sk.tanggal DESC";

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
                echo $proses['tanggal_sk'];
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
                echo '<span class="badge badge-primary badge-pill">'.$proses["nama_pemohon"].'</span>';
                echo '</li>';

                echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                echo 'Nama petugas';
                echo '<span class="badge badge-primary badge-pill">'.$proses["nama_petugas"].'</span>';
                echo '</li>';

                //echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                //echo 'Keterangan';
                //echo '<span class="badge badge-primary badge-pill">'.$proses["keterangan"].'</span>';
                //echo '</li>';

                echo '</ul>';
                //echo '</div>';

                echo "</td>";

                //untuk kolom pemohon
                echo "<td>";
                echo $proses['nomor'];
                echo "</td>";

                //untuk status sk
                echo "<td>";
                echo $proses['status_sk'];
                echo "</td>";

                echo "<td>";
                echo '<form method="post" action="delete_sk.php?id='. $proses['id'] .'">';
                echo '<div class="dropdown">';
                echo '<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                echo 'Detail';
                echo '</button>';
                echo '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                echo '<a class="dropdown-item" href="proses_sk.php?id='.$proses["id_proses_bap"].'">Tampilkan</a>';
                //echo '<a class="dropdown-item" href="../../report/master/rptBAPEN.php?online=true&report_name=BAPEN.doc&tipe=word&id_proses_bap='.$proses["id"].'">Cetak BAPEN</a>';
                echo '<a class="dropdown-item" href="../../report/master/rptSK.php?online=true&report_name=SK.doc&tipe=word&id_proses_bap='.$proses["id_proses_bap"].'">Download SK</a>';
                //echo '<a class="dropdown-item" href="ambil_foto_bap.php?id='.$proses["id"].'">Ambil foto...</a>';
                //echo '<a class="dropdown-item" href="ambil_video_bap.php?id='.$proses["id"].'">Ambil video...</a>';

                echo '<div class="dropdown-divider"></div>';
                echo '<div class="text-center">';
                echo "<a class='btn btn-info' href='proses_sk.php?id=".$proses['id_proses_bap']."'>Ubah</a>";
                echo ' <input type="submit" onclick="return confirm(\'Hapus data ini?\')" class="btn btn-danger" value="Hapus"> ';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</form>';
                echo "</td>";
                echo '</tr>';
                $i = $i + 1;
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
