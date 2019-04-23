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

    <title>Daftar BAPEN</title>
</head>
<body>

<?php
include '../../config.php';
include '../../head_utama.php';
?>


<div class="container">
    <div class="container-fluid">

        <h1 class="display-4">Daftar BAPEN</h1>
        <br>
        <br>

        <a href="bapen.php" class="btn btn-primary">Bapen baru</a>

<br>
<br>
        <table id="tabel" class="table table-bordered">
            <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal bapen</th>
                <th>Pendapat & Alasan</th>
                <th>Status SK</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            <?php

            //untuk  nomor urut
            $i = 1;

            $sql = "SELECT formulir_bapen.id, formulir_bapen.id_proses_bap, DATE_FORMAT(proses_bap.tanggal_proses_bap, '%d-%m-%Y') as tanggal, DATE_FORMAT(formulir_bapen.tanggal, '%d-%m-%Y') as tanggal_bapen,";
            $sql = $sql . " DATE_FORMAT(jadwal_bap.tanggal, '%d-%m-%Y') as tanggal_jadwal_bap,";
            $sql = $sql . " pemohon.nama as title, pemohon.nik as NIK, ";
            $sql = $sql . " petugas.nama as nama_petugas,";
            $sql = $sql . " proses_bap.keterangan as keterangan,";
            $sql = $sql . " formulir_bapen.pendapat, formulir_bapen.alasan";

            $sql = $sql . " FROM proses_bap";

            $sql = $sql . " INNER JOIN jadwal_bap on jadwal_bap.id = proses_bap.id_jadwal_bap";
            $sql = $sql . " INNER JOIN pemohon on pemohon.id = jadwal_bap.id_pemohon";
            $sql = $sql . " INNER JOIN petugas on petugas.id = jadwal_bap.id_petugas";
            $sql = $sql . " INNER JOIN formulir_bapen on formulir_bapen.id_proses_bap = proses_bap.id";

            $sql = $sql . " ORDER by formulir_bapen.tanggal DESC";
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

                //untuk kolom pendapat
                if ($proses['pendapat']=='S'){
                    echo "<td>Setuju";
                    echo "<br>";
                    echo $proses['alasan'];
                    echo "</td>";
                }else{
                    echo "<td>Tidak setuju";
                    echo "<br>";
                    echo $proses['alasan'];
                    echo "</td>";
                }


                //untuk kolom status sk
                //cek login

            $sqla = "select * from formulir_sk where id_proses_bap = :id";
            $stmta = $db->prepare($sqla);
            $parama = array(
                ":id" => $proses['id_proses_bap']
            );

            $stmta->execute($parama);
            $sk = $stmta->fetch(PDO::FETCH_ASSOC);

            echo "<td>";
            if($sk){
              echo "Sudah";
              echo '<br><a href="proses_sk.php?id='.$proses["id_proses_bap"].'" class="btn btn-success">Lihat SK</a>';
            }else {
              echo "Belum";
              echo '<br><a href="proses_sk.php?id='.$proses["id_proses_bap"].'" class="btn btn-warning">Buat SK</a>';
            }
            echo "</td>";


                echo "<td>";
                echo '<form method="post" action="delete_proses_bapen.php?id='. $proses['id'] .'">';



                echo '<div class="dropdown">';
                echo '<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                echo 'Detail';
                echo '</button>';
                echo '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                echo '<a class="dropdown-item" href="proses_bapen.php?id='.$proses["id_proses_bap"].'">Tampilkan</a>';
                //echo '<a class="dropdown-item" href="../../report/master/rptBAPEN.php?online=true&report_name=BAPEN.doc&tipe=word&id_proses_bap='.$proses["id"].'">Cetak BAPEN</a>';
                echo '<a class="dropdown-item" href="../../report/master/rptBapen.php?online=true&report_name=BAPEN.doc&tipe=word&id_proses_bap='.$proses["id_proses_bap"].'">Download Bapen</a>';
                //echo '<a class="dropdown-item" href="ambil_foto_bap.php?id='.$proses["id"].'">Ambil foto...</a>';
                //echo '<a class="dropdown-item" href="ambil_video_bap.php?id='.$proses["id"].'">Ambil video...</a>';

                echo '<div class="dropdown-divider"></div>';
                echo '<div class="text-center">';
                echo "<a class='btn btn-info' href='proses_bapen.php?id=".$proses['id_proses_bap']."'>Ubah</a>";
                echo ' <input type="submit" onclick="return confirm(\'Hapus data ini?\')" class="btn btn-danger" value="Hapus"> ';
                echo '</div>';
                echo '</div>';
                echo '</div>';


                echo '</form>';
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
