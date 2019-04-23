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

    <title>Ubah item</title>
</head>
<body>

<?php
include '../../config.php';
include '../../head_utama.php';
?>

<?php
//get query string
$id = $_GET['id'];
$id_proses_bap = $_GET['id_proses_bap'];

//insert data
if (isset($_POST['simpan'])){

    $nomor = filter_input(INPUT_POST, 'nomor', FILTER_SANITIZE_STRING);
    $pertanyaan = filter_input(INPUT_POST, 'pertanyaan', FILTER_SANITIZE_STRING);
    $jawaban = filter_input(INPUT_POST,'jawaban', FILTER_SANITIZE_STRING);

    if ($nomor == ''){
        $err=-1;
    } else {
        //simpan
        $sql = "update formulir_bap set nomor =:nomor, pertanyaan =:pertanyaan, jawaban =:jawaban where id =:id";
        $stmt = $db->prepare($sql);

        $param = array(
            ":id" => $id,
            ":nomor" => $nomor,
            ":pertanyaan" => $pertanyaan,
            ":jawaban" => $jawaban
        );
        $saved = $stmt->execute($param);
        $err = 1;
        header('Location:formulir_bap.php?id='.$id_proses_bap);
    }
}
?>

<?php

//penomoran otomatis
//hitung untuk penomoran otomatis
$sql = "select * from formulir_bap where id =:id";
$stmt = $db->prepare($sql);
$param = array(
    ":id" => $id
);

$stmt->execute($param);
$form = $stmt->fetch(PDO::FETCH_ASSOC);

if ($form){
    $get_id = $form['id'];
    $get_nomor = $form['nomor'];
    $get_pertanyaan = $form['pertanyaan'];
    $get_jawaban = $form['jawaban'];
}

?>

<div class="container">
    <div class="container-fluid">

        <h1 class="display-4">Ubah item</h1>

        <br>

        <form action=""  method="post">
            <div class="form-group">
                <label for="nomor" class="col-form-label">Nomor</label>
                <input type="number" value="<?php echo $get_nomor; ?>" autofocus name="nomor" class="form-control" id="nomor">
            </div>
            <div class="form-group">
                <label for="pertanyaan" class="col-form-label">Pertanyaan</label>
                <input autofocus class="form-control" type="text" name="pertanyaan" id="pertanyaan" placeholder="contoh : Apakah Saudara dalam keadaan sehat jasmani dan rohani?"  value="<?php echo $get_pertanyaan; ?>">
            </div>
            <div class="form-group">
                <label for="jawaban" class="col-form-label">Jawaban</label>
                <input class="form-control" type="text" name="jawaban" id="jawaban" placeholder="contoh : Ya, saya dalam keadaan sehat jasmani dan rohani"  value="<?php echo $get_jawaban; ?>">
            </div>

            <input type="submit" name="simpan" value="Ubah" class="btn btn-primary">
            <a href="detail_proses_bap.php?id=<?php echo $id_proses_bap; ?>" class="btn btn-secondary">Kembali ke detail</a>
            <a href="formulir_bap.php?id=<?php echo $id_proses_bap; ?>" class="btn btn-secondary">Kembali ke draft</a>

        </form>

    </div>
</div>

</body>
</html>