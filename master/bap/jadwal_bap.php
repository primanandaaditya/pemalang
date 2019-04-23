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
    <title>Jadwal BAP</title>
</head>
<body>

<?php
include '../../config.php';
include '../../head_utama.php';
?>


<div class="container">
    <div class="container-fluid">

        <h1 class="display-4">Jadwal BAP</h1>

        <p>
            <a href="add_jadwal.php" class="btn btn-primary">Jadwal baru</a>
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
                        <th>Tanggal</th>
                        <th>Pemohon</th>
                        <th>Petugas</th>
                        <th>Sudah diproses BAP?</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php

                    //untuk  nomor urut
                    $i = 1;
                    $sql = "select jadwal_bap.id, DATE_FORMAT(jadwal_bap.tanggal, '%d-%m-%Y') as tanggal, pemohon.nama as nama_pemohon, petugas.nama as nama_petugas, jadwal_bap.keterangan";
                    $sql = $sql . " FROM jadwal_bap";
                    $sql = $sql . " INNER JOIN pemohon on jadwal_bap.id_pemohon = pemohon.id ";
                    $sql = $sql . " INNER JOIN petugas on jadwal_bap.id_petugas = petugas.id ";
                    $sql = $sql . " ORDER by jadwal_bap.tanggal DESC";
                    $stmt = $db->query($sql);

                    while ($jadwal = $stmt->fetch(PDO::FETCH_ASSOC)){
                        echo '<tr>';

                        echo "<td>".$i."</td>";
                        echo "<td>".$jadwal['tanggal']."</td>";
                        echo "<td>".$jadwal['nama_pemohon']."</td>";
                        echo "<td>".$jadwal['nama_petugas']."</td>";

                        //cari tahu
                        //apakah sudah ada prosesnya
                        $cari = "select * from proses_bap where id_jadwal_bap = :id";
                        $stm = $db->prepare($cari);
                        $paramb = array(
                            ":id" => $jadwal['id']
                        );
                        $stm->execute($paramb);
                        $proses_bap = $stm->fetch(PDO::FETCH_ASSOC);

                        //jika ada jadwal
                        if ($proses_bap){
                            echo "<td>Sudah</td>";
                        } else{
                            echo "<td>Belum</td>";
                        }

                        echo "<td>";
                        echo '<form method="post" action="delete_jadwal.php?id='.$jadwal['id'].'">';
                        //jika ada jadwal
                        if ($proses_bap){
                          echo " <a class='btn btn-success btn-sm' href='detail_proses_bap.php?id=".$proses_bap['id']."'>Lihat proses BAP</a>";
                        } else{
                            echo " <a class='btn btn-warning btn-sm' href='buat_proses_bap.php?id_jadwal_bap=".$jadwal['id']."'>Buat proses BAP</a>";
                        }
                        echo " <a class='btn btn-info btn-sm' href='edit_jadwal.php?id=".$jadwal['id']."'>Ubah</a>";
                        echo ' <input type="submit" onclick="return confirm(\'Hapus data ini?\')" class="btn btn-danger btn-sm" value="Hapus"> ';
                        echo '</form>';
                        echo "</td>";
                        echo '</tr>';
                        $i = $i + 1;
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

<?php

    $sql = "select pemohon.nama as title,jadwal_bap.tanggal as start ";
    $sql = $sql . " FROM jadwal_bap";
    $sql = $sql . " INNER JOIN pemohon on jadwal_bap.id_pemohon = pemohon.id ";


    $stmt = $db->query($sql);

    $hasil_array = Array();
    while ($jadwal = $stmt->fetch(PDO::FETCH_ASSOC)){
        $hasil_array[] = $jadwal;
    }

?>


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

<script type="text/javascript">
    $(document).ready( function () {
        $('#tabel').DataTable();
    } );
</script>


</body>
</html>
