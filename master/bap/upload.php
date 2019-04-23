<?php

require_once ('../../config.php');

if (isset($_POST['id_proses_bap']) && isset($_POST['img'])){

    define('UPLOAD_DIR', '../../image/bap/foto/');

    $id_proses_bap = filter_input(INPUT_POST, 'id_proses_bap', FILTER_SANITIZE_STRING);
    $img = $_POST['img'];

    $img = str_replace('data:image/jpeg;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);

    $prefile = uniqid() . '.png';

    $file = UPLOAD_DIR . $prefile;
    $success = file_put_contents($file, $data);

    //simpan path foto ke darabase
    $sql = "insert into foto_bap (id_proses_bap,nama_file) VALUES (:id_proses_bap, :nama_file)";
    $stmt = $db->prepare($sql);

    $param = array(
        ":id_proses_bap" => $id_proses_bap,
        ":nama_file" => $prefile
    );
    $saved = $stmt->execute($param);
    $pesan = "Foto berhasil diunggah.";
}

print $success ? $file : 'Unable to save the file.';
?>