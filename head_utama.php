<?php
    require_once 'auth.php';

    $pathLogo = substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT'])).'/image/simbol/imigrasi.jpg';
    $pathHome = substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT'])).'/master/home.php';
    $pathDaftarUser = substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT'])).'/master/daftar_user.php';
    $pathDaftarPemohon = substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT'])).'/master/pemohon/daftar_pemohon.php';
    $pathDaftarPetugas = substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT'])).'/master/petugas/daftar_petugas.php';
    $pathJadwalBAP = substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT'])).'/master/bap/jadwal_bap.php';
    $pathProsesBAP = substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT'])).'/master/bap/proses_bap.php';
    $pathBapen = substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT'])).'/master/bap/bapen.php';
    $pathDaftarBapen = substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT'])).'/master/bap/daftar_bapen.php';
    $pathSK = substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT'])).'/master/bap/sk.php';
    $pathDaftarSK = substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT'])).'/master/bap/daftar_sk.php';
    $pathLiniWaktuPemohon = substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT'])).'/master/bap/timeline_pemohon.php';


    $pathLogout = substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT'])).'/logout.php';
    $pathReportDaftarUser = substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT'])).'/report/master/rptDaftarUser.php';
    $pathReportDaftarPemohon = substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT'])).'/report/master/rptDaftarPemohon.php';
    $pathDaftarLaporan = substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT'])).'/report/daftar_report.php';


?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">

        <img src=" <?php echo $pathLogo; ?> " class="rounded-circle" width="45" height="45">

    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Admin
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href=" <?php echo $pathHome; ?>">Dashboard</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href=" <?php echo $pathDaftarUser; ?>">User login</a>
                    <a class="dropdown-item" href=" <?php echo $pathDaftarPemohon; ?>">Pemohon</a>
                    <a class="dropdown-item" href=" <?php echo $pathDaftarPetugas; ?>">Petugas</a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href=" <?php echo $pathDaftarLaporan; ?>">Laporan</a>
                </div>
            </li>


            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    BAP
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href=" <?php echo $pathJadwalBAP; ?>">Jadwal BAP</a>
                    <a class="dropdown-item" href=" <?php echo $pathProsesBAP; ?>">Daftar Proses BAP</a>
                    <a class="dropdown-item" href=" <?php echo $pathDaftarBapen; ?>">Daftar BAPEN</a>
                    <a class="dropdown-item" href=" <?php echo $pathDaftarSK; ?>">Daftar SK</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href=" <?php echo $pathLiniWaktuPemohon; ?>">Progres Pemohon</a>

                </div>
            </li>


        </ul>

        <form class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown my-2 my-lg-0 ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['user']['nama']; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href=" <?php  echo $pathLogout; ?> ">Keluar</a>

                    </div>
                </li>
            </ul>

        </form>



    </div>
</nav>

<br>
