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


    <link href='../../incl/calendar-bootstrap/fullcalendar.min.css' rel='stylesheet' />
    <link href='../../incl/calendar-bootstrap/fullcalendar.print.min.css' rel='stylesheet' media='print' />
    <script src='../../incl/calendar-bootstrap/moment.min.js'></script>
    <script src='../../incl/calendar-bootstrap/fullcalendar.min.js'></script>
    <script src='../../incl/calendar-bootstrap/gcal.min.js'></script>


    <title>Proses BAP</title>
</head>
<body>

<?php
include '../../config.php';
include '../../head_utama.php';
?>


<div class="container">
    <div class="container-fluid">

        <h1 class="display-4">Proses BAP</h1>

        <p>
            <a href="add_proses_bap.php" class="btn btn-primary">Proses baru</a>
        </p>

        <br>
        <br>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Semua data</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Kalender</a>
            </li>

        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                <br>
                <table id="tabel" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal proses</th>
                        <th>Status Bapen</th>
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
                        echo '<br><ul class="list-group">';
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

                        //kolom sudah bapen

                        //cek login

                       $cari = "select * from formulir_bapen where id_proses_bap = :id_proses_bap";
                       $st = $db->prepare($cari);
                       $prm = array(
                           ":id_proses_bap" => $proses['id']
                       );

                       $st->execute($prm);
                       $sdh = $st->fetch(PDO::FETCH_ASSOC);

                       if($sdh){
                         echo "<td>Sudah";
                        echo '<br />
                        <a href="proses_bapen.php?id='.$proses["id"].'"= class="btn btn-success">Lihat Bapen</a>';
                         echo "</td>";
                       }else {
                         echo "<td>Belum";
                         echo '<br />
                         <a href="proses_bapen.php?id='.$proses["id"].'"= class="btn btn-info">Buat Bapen</a>';
                         echo "</td>";
                       }

                        echo "<td>";
                        echo '<form method="post" action="delete_proses.php?id='. $proses['id'] .'">';
                      //  echo '<div class="btn-group-vertical">';
                        //echo '<a class="btn btn-secondary" href="detail_proses_bap.php?id='.$proses["id"].'">Foto/video/form BAP...</a>';
                        //echo " <a class='btn btn-secondary' href='edit_proses.php?id=".$proses['id']."'>Ubah</a>";
                        //echo ' <input type="submit" onclick="return confirm(\'Hapus data ini?\')" class="btn btn-danger" value="Hapus"> ';
                        //echo '</div>';

                        echo '<div class="dropdown">';
                        echo '<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                        echo 'Detail';
                        echo '</button>';
                        echo '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                        echo '<a class="dropdown-item" href="detail_proses_bap.php?id='.$proses["id"].'">Foto/video/form BAP...</a>';
                        //echo '<a class="dropdown-item" href="detail_proses_bap.php?id='.$proses["id"].'">Tambah dokumen...</a>';
                        echo '<a class="dropdown-item" href="../../report/master/rptBAP.php?online=true&report_name=BAP.doc&tipe=word&id_proses_bap='.$proses["id"].'">Download BAP</a>';
                        //echo '<a class="dropdown-item" href="ambil_foto_bap.php?id='.$proses["id"].'">Ambil foto...</a>';
                        //echo '<a class="dropdown-item" href="ambil_video_bap.php?id='.$proses["id"].'">Ambil video...</a>';

                        echo '<div class="dropdown-divider"></div>';
                        echo '<div class="text-center">';
                        echo "<a class='btn btn-info' href='edit_proses.php?id=".$proses['id']."'>Ubah</a>";
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
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <br>
                <div id="calendar" class="calendar">

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready( function () {
        $('#tabel').DataTable();
    } );
</script>

<script type="text/javascript">
    $( function() {
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,listYear'
            },
            eventTextColor: '#FFFFFF',
            buttonText :
                {
                    today:    'Hari ini',
                    month:    'Bulan',
                    week:     'Minggu',
                    day:      'Tanggal',
                    list:     'Daftar'
                },
            events: <?php echo json_encode($hasil_array); ?>
        })
    } );
</script>

</body>
</html>
