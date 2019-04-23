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

    <title>Item baru</title>
</head>
<body>

<?php
include '../../config.php';
include '../../head_utama.php';
?>

<?php
    //get query string
    $id_proses_bap = $_GET['id'];

    //insert data
    if (isset($_POST['simpan'])){

        $nomor = filter_input(INPUT_POST, 'nomor', FILTER_SANITIZE_STRING);
        $pertanyaan = filter_input(INPUT_POST, 'pertanyaan', FILTER_SANITIZE_STRING);
        $jawaban = filter_input(INPUT_POST,'jawaban', FILTER_SANITIZE_STRING);

        if ($nomor == ''){
            $err=-1;
        } else {
            //simpan
            $sql = "insert into formulir_bap (id_proses_bap,nomor,pertanyaan,jawaban) VALUES (:id_proses_bap,:nomor,:pertanyaan,:jawaban)";
            $stmt = $db->prepare($sql);

            $param = array(
                ":id_proses_bap" => $id_proses_bap,
                ":nomor" => $nomor,
                ":pertanyaan" => $pertanyaan,
                ":jawaban" => $jawaban
            );
            $saved = $stmt->execute($param);
            $err = 1;
        }
    }
?>

<?php

    //penomoran otomatis
    //hitung untuk penomoran otomatis
    $sql = "select (max(nomor) + 1) as nomor from formulir_bap where id_proses_bap =:id_proses_bap";
    $stmt = $db->prepare($sql);
    $param = array(
        ":id_proses_bap" => $id_proses_bap
    );

    $stmt->execute($param);
    $form = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($form){
        if ($form['nomor']==''){
            $nomor_baru = 1;
        }else{
            $nomor_baru = $form['nomor'];
        }

    }else{
        $nomor_baru = 1;
    }

?>

<div class="container">
    <div class="container-fluid">

        <h1 class="display-4">Item baru</h1>

        <br>

        <form action=""  method="post">
            <div class="form-group">
                <label for="nomor" class="col-form-label">Nomor</label>
                <input type="number" value="<?php echo $nomor_baru; ?>" name="nomor" class="form-control" id="nomor">
            </div>
            <div class="form-group">
                <label for="pertanyaan" class="col-form-label">Pertanyaan</label>
                <textarea autofocus class="form-control" placeholder="contoh : Apakah Saudara dalam keadaan sehat jasmani dan rohani?" name="pertanyaan" id="pertanyaan"></textarea>
            </div>
            <div class="form-group">
                <label for="jawaban" class="col-form-label">Jawaban</label>
                <textarea class="form-control" placeholder="contoh : Ya, saya dalam keadaan sehat jasmani dan rohani" name="jawaban" id="jawaban"></textarea>
            </div>

            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
            <a href="detail_proses_bap.php?id=<?php echo $id_proses_bap; ?>" class="btn btn-secondary">Kembali ke detail</a>
            <a href="formulir_bap.php?id=<?php echo $id_proses_bap; ?>" class="btn btn-secondary">Kembali ke draft</a>

        </form>

    </div>
</div>

</body>
</html>