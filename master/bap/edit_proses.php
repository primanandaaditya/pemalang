<?php
session_start();
ob_start();
include ('../../auth.php');
?>
<?php

require_once ('../../config.php');


if (isset($_POST['simpan'])){

    $id = $_GET['id'];
    $tanggal = filter_input(INPUT_POST, 'tanggal', FILTER_SANITIZE_STRING);
    $id_jadwal_bap = filter_input(INPUT_POST, 'id_jadwal_bap', FILTER_SANITIZE_STRING);
    $keterangan = filter_input(INPUT_POST, 'keterangan', FILTER_SANITIZE_STRING);

    if ($tanggal == '' || $id_jadwal_bap =='' ){
        $err = -1;
    } else {

        $sql = "update proses_bap set tanggal_proses_bap =:tanggal,id_jadwal_bap=:id_jadwal_bap,keterangan=:keterangan where id =:id";
        $stmt = $db->prepare($sql);

        $param = array(
            ":tanggal" => $tanggal,
            ":id_jadwal_bap" => $id_jadwal_bap,
            ":keterangan" => $keterangan,
            ":id" => $id
        );
        $saved = $stmt->execute($param);
        header('location: proses_bap.php');
        $err = 1;

    }
}

//proses get
//Proses GET
if (!isset($_GET['id'])){
    header('location: proses_bap.php');
}else{

    //dapatkan data user
    // dari id di atas
    $id = $_GET['id'];
    $sql = "select * from proses_bap where id = :id";
    $stmt = $db->prepare($sql);
    $param = array(
        ":id" => $id
    );

    $stmt->execute($param);
    $proses = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($proses){
        $get_tanggal = $proses['tanggal_proses_bap'];
        $get_id_jadwal_bap = $proses['id_jadwal_bap'];
        $get_keterangan = $proses['keterangan'];
    }

}





?>


<!DOCTYPE html>
<html>
<head>
    <?php
    include '../../head_html.php';
    ?>


    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>



    <script>
        $( function() {
            $( "#tanggal" ).datepicker({ dateFormat: 'yy-mm-dd' });
        } );
    </script>

    <title>Ubah Proses BAP</title>
</head>
<body>

<?php
include '../../config.php';
include '../../head_utama.php';
?>


<div class="container">
    <div class="container-fluid">

        <h1 class="display-4">Ubah Proses BAP</h1>
        <hr>

        <?php

        if (isset($_POST['simpan'])){
            if ($err == -1){
                $pesan = "Mohon isi semua kolom dengan benar";
                echo '<div class="alert alert-danger" role="alert">';
                echo $pesan;
                echo '</div>';


            } elseif ($err == 1) {
                $pesan = "Data berhasil disimpan";
                echo '<div class="alert alert-success" role="alert">';
                echo $pesan;
                echo '</div>';

            } elseif ($err == -2){

                $pesan = "Data ini sudah ada";
                echo '<div class="alert alert-danger" role="alert">';
                echo $pesan;
                echo '</div>';
            }
        }
        ?>

        <form action="" method="post">

            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <div class="form-group">
                <label for="tanggal">Tanggal proses BAP</label>
                <input value="<?php echo $get_tanggal; ?>" autocomplete="off" autofocus="true" placeholder="tahun-bulan-tanggal" type="text" name="tanggal" class="form-control" id="tanggal">
            </div>


            <div class="form-group">
                <label for="id_pemohon">Pilih jadwal BAP</label>
                <select class="form-control" id="id_jadwal_bap" name="id_jadwal_bap">
                    <?php
                    $sql="SELECT jadwal_bap.id, concat('Tanggal: ',date_format(jadwal_bap.tanggal,'%d-%m-%Y'),' &diams; Pemohon (',pemohon.nama, ') &diams; NIK (',pemohon.nik,')') as keterangan ";
                    $sql = $sql . " FROM jadwal_bap ";
                    $sql = $sql . " INNER JOIN pemohon ";
                    $sql = $sql . " on pemohon.id = jadwal_bap.id_pemohon ";
                    $sql = $sql . " ORDER by jadwal_bap.tanggal desc";

                    $stmt = $db->query($sql);

                    while ($k = $stmt->fetch(PDO::FETCH_ASSOC)){
                        if ($get_id_jadwal_bap == $k['id']){
                            echo '<option value="'.$k['id'].'" selected>'.$k['keterangan'].'</option>';
                        }else{
                            echo '<option value="'.$k['id'].'">'.$k['keterangan'].'</option>';
                        }


                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="inputKeterangan">Keterangan</label>
                <input type="text" value="<?php echo $get_keterangan; ?>" name="keterangan" class="form-control" id="inputKeterangan">
            </div>

            <input name="simpan" type="submit" value="Ubah" class="btn btn-primary">
            <a href="proses_bap.php">Kembali</a>

        </form>

    </div>
</div>




</body>
</html>


<!------ Include the above in your HEAD tag ---------->
