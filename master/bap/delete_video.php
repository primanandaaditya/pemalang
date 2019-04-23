<?php
include '../../config.php';

$id = $_GET['id'];
$filename = $_GET['filename'];

//hapus file foto permanen
$file = "../../image/bap/video/".$filename;
if (!unlink($file))
{
    echo ("Error deleting $file");
}
else
{
    echo ("Deleted $file");
}

//select dari foto database
$sql = "select * from video_bap where id = :id";
$stmt = $db->prepare($sql);
$param = array(
    ":id" => $id
);

$stmt->execute($param);
$foto = $stmt->fetch(PDO::FETCH_ASSOC);

if ($foto){
    //untuk query string
    //dapatkan id dulu
    $id_queryString=$foto['id_proses_bap'];
}


//hapus foto dari database
$sql = "delete from video_bap where id = :id";
$stmt = $db->prepare($sql);
$param = array(
    ":id" => $id
);

$stmt->execute($param);
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=detail_proses_bap.php?id='.$id_queryString.'">';
//header("Location: detail_proses_bap.php?id=".$id_queryString."");
exit(0);

?>
