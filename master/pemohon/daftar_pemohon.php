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

    <title>Daftar pemohon</title>
</head>
<body>

<?php
include '../../config.php';
include '../../head_utama.php';
?>


<div class="container">
    <div class="container-fluid">

        <h1 class="display-4">Daftar Pemohon</h1>

        <p>
            <a href="add_pemohon.php" class="btn btn-primary">Pemohon baru</a>
        </p>

        <br>
        <br>

        <table id="tabel" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Keterangan</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            <?php

            //untuk  nomor urut
            $i = 1;
            $sql = "select * from pemohon order by created_date DESC";
            $stmt = $db->query($sql);

            while ($pemohon = $stmt->fetch(PDO::FETCH_ASSOC)){

                echo '<tr>';

                echo "<td>".$i."</td>";
                echo "<td><a href='detail_pemohon.php?id=".$pemohon['id']."'>".$pemohon['nama']."</a></td>";


                //cari tahu
                //apakah sudah ada prosesnya
                //cek login

                $cari = "select * from jadwal_bap where id_pemohon = :id";
                $stm = $db->prepare($cari);
                $paramb = array(
                    ":id" => $pemohon['id']
                );
                $stm->execute($paramb);
                $proses_bap = $stm->fetch(PDO::FETCH_ASSOC);

                //jika ada jadwal
                if ($proses_bap){
                  echo "<td>Sudah ada jadwal BAP</td>";
                } else{
                  echo "<td>Belum dijadwal BAP</td>";
                }

                echo "<td>";
                echo '<form method="post" action="delete_pemohon.php?id='. $pemohon['id'] .'">';
                //jika ada jadwal
                if ($proses_bap){
                
                } else{
                  echo "<a class='btn btn-warning btn-sm' href='../bap/buat_jadwal.php?id_pemohon=".$pemohon['id']."'>Buat jadwal BAP</a>";
                }
                echo " <a class='btn btn-info btn-sm' href='edit_pemohon.php?id=".$pemohon['id']."'>Ubah</a>";

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
</div>

<script type="text/javascript">
    $(document).ready( function () {
        $('#tabel').DataTable();
    } );
</script>

</body>
</html>


<!------ Include the above in your HEAD tag ---------->
