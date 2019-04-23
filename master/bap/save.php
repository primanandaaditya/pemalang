<?php
require_once ('../../config.php');
if (isset($_POST['video-filename'])){
    $id_proses_bap = $_POST['id_proses_bap'];
    $prefile = $_POST['video-filename'];
    $filePath = '../../image/bap/video/' . $_POST['video-filename'];
    $tempName = $_FILES['video-blob']['tmp_name'];
    if (!move_uploaded_file($tempName, $filePath)) {
        echo 'gagal';
        die();
    } else {
        //simpan video ke database
        $sql = "insert into video_bap (id_proses_bap,nama_file) VALUES (:id_proses_bap, :nama_file)";
        $stmt = $db->prepare($sql);
        $param = array(
            ":id_proses_bap" => $id_proses_bap,
            ":nama_file" => $prefile
        );
        $saved = $stmt->execute($param);
        echo 'success';
    }
}else{
    echo 'gagal';
    die();
}
?>