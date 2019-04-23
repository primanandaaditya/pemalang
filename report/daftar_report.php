<?php
    session_start();
    ob_start();
    include ('../auth.php');
?>
<?php require_once ('../config.php'); ?>



<!DOCTYPE html>
<html>
<head>
    <?php
    include '../head_html.php';
    ?>

    <title>Daftar Laporan</title>
</head>
<body>

<?php include '../head_utama.php'; ?>

<div class="container">
    <div class="container-fluid">

        <h2 class="display-4">Daftar Laporan</h2>
        <br>

        <table class="table table-striped">
            <thead>
            <tr>
                <td>Laporan</td>
                <td>Format</td>
            </tr>
            </thead>
            <tbody>

                <tr>
                    <td>Daftar user</td>
                    <td>
                        <a href="master/DaftarUser.php?report_name=DaftarUser.doc&tipe=word">
                            <img src="../image/icon/word.png">
                        </a>
                        <a href="master/DaftarUser.php?report_name=DaftarUser.xls&tipe=excel">
                            <img src="../image/icon/excel.png">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Daftar petugas</td>
                    <td>
                        <a href="master/DaftarPetugas.php?report_name=DaftarPetugas.doc&tipe=word">
                            <img src="../image/icon/word.png">
                        </a>
                        <a href="master/DaftarPetugas.php?report_name=DaftarPetugas.xls&tipe=excel">
                            <img src="../image/icon/excel.png">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Daftar pemohon</td>
                    <td>
                        <a href="master/DaftarPemohon.php?report_name=DaftarPemohon.doc&tipe=word">
                            <img src="../image/icon/word.png">
                        </a>
                        <a href="master/DaftarPemohon.php?report_name=DaftarPemohon.xls&tipe=excel">
                            <img src="../image/icon/excel.png">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Daftar jadwal BAP</td>
                    <td>
                        <a href="master/Jadwal_BAP.php?report_name=Daftar Jadwal.doc&tipe=word">
                            <img src="../image/icon/word.png">
                        </a>
                        <a href="master/Jadwal_BAP.php?report_name=Daftar Jadwal.xls&tipe=excel">
                            <img src="../image/icon/excel.png">
                        </a>
                    </td>
                </tr>

            </tbody>
        </table>

    </div>
</div>

</body>
</html>


<!------ Include the above in your HEAD tag ---------->
