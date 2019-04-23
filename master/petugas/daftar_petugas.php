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

    <title>Daftar petugas</title>
</head>
<body>

<?php
include '../../config.php';
include '../../head_utama.php';
?>


<div class="container">
    <div class="container-fluid">

        <h1 class="display-4">Daftar Petugas</h1>



        <p>
            <a href="add_petugas.php" class="btn btn-primary">Petugas baru</a>
        </p>

        <br>
        <br>

        <table id="tabel" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th></th>
            </tr>
            </thead>
            <tbody>



            <?php

            //untuk  nomor urut
            $i = 1;
            $sql = "select * from petugas order by nama";
            $stmt = $db->query($sql);

            while ($petugas = $stmt->fetch(PDO::FETCH_ASSOC)){


                echo '<tr>';

                echo "<td>".$i."</td>";
                echo "<td>".$petugas['nama']."</td>";


                echo "<td>";
                echo '<form method="post" action="delete_petugas.php?id='. $petugas['id'] .'">';
                echo "<a class='btn btn-info btn-sm' href='edit_petugas.php?id=".$petugas['id']."'>Ubah</a>";
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

