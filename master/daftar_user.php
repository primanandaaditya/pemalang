<?php
    session_start();
    ob_start();
    include ('../auth.php');
?>
<!DOCTYPE html>
<html>
<head>
    <?php
        include '../head_html.php';

    ?>

    <title>Daftar user</title>
</head>
<body>

<?php
    include '../config.php';
    include '../head_utama.php';
?>


<div class="container">
    <div class="container-fluid">
        <h1 class="display-4">Daftar User</h1>
        <p>
        <a href="../register.php" class="btn btn-primary">Register user baru</a>
        </p>

        <br>
        <br>

        <table id="tabel" class="table" style="width:100%">
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
                $sql = "select * from users order by username";
                $stmt = $db->query($sql);

                while ($users = $stmt->fetch(PDO::FETCH_ASSOC)){


                    echo '<tr>';

                    echo "<td>".$i."</td>";
                    echo "<td>".$users['username']."</td>";


                    echo "<td>";
                        echo '<form method="post" action="delete_user.php?id='. $users['id'] .'">';
                        echo "<a class='btn btn-info btn-sm' href='edit_user.php?id=".$users['id']."'>Ubah</a>";
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

</body>
<footer>

    <script type="text/javascript">
        $(document).ready( function () {
            $('#tabel').DataTable();
        } );
    </script>

</footer>
</html>


<!------ Include the above in your HEAD tag ---------->
