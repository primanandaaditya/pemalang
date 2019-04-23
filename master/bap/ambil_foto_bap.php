<?php
session_start();
ob_start();
include ('../../auth.php');

?>
<?php

require_once ('../../config.php');

if (isset($_POST['fileFoto'])){

    $target_dir = "../../image/bap/foto/";
    $target_file = $target_dir . basename($_FILES["foto1"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["foto1"]["tmp_name"]);
    if($check !== false) {
        $pesan = "Tipe file adalah - " . $check["mime"] . ". ";
        $uploadOk = 1;
    } else {
        $pesan = "Foto yang Anda masukkan bukan gambar.";
        $uploadOk = 0;
    }

    if (file_exists($target_file)) {
        $pesan = "Maaf nama foto sudah ada.";
        $uploadOk = 0;
    }

    //periksa ukuran file
    if ($_FILES["foto1"]["size"] > 500000) {
        $pesan = "Maaf, ukuran foto terlalu besar (lebih besar dari 500 MB).";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $pesan = "Maaf, hanya file tipe JPG, JPEG, PNG & GIF yang diizinkan.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $pesan = "Maaf, foto tidak dapat diunggah.";
// if everything is ok, try to upload file
    } else {

        $temp = explode(".", $_FILES["foto1"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);

        if (move_uploaded_file($_FILES["foto1"]["tmp_name"], $target_dir . $newfilename)) {

            $id_proses_bap = filter_input(INPUT_POST, 'id_proses_bap', FILTER_SANITIZE_STRING);

            //simpan path foto ke darabase
            $sql = "insert into foto_bap (id_proses_bap,nama_file) VALUES (:id_proses_bap, :nama_file)";
            $stmt = $db->prepare($sql);

            $param = array(
                ":id_proses_bap" => $id_proses_bap,
                ":nama_file" => $newfilename
            );
            $saved = $stmt->execute($param);
            $pesan = "Foto berhasil diunggah.";

        } else {
            $pesan = "Maaf, terjadi error.";
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <?php
    include '../../head_html.php';
    ?>
    <title>Unggah Foto BAP</title>
</head>
<body>

<?php
include '../../config.php';
include '../../head_utama.php';
?>


<div class="container">
    <div class="container-fluid">

        <h1 class="display-4">Unggah Foto BAP</h1>
        <hr>
        <?php

        if (isset($_POST['fileFoto'])){
            echo '<div class="alert alert-success" role="alert">';
            echo $pesan;
            echo '</div>';
        }
        ?>

        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-header">
                        Foto dari file
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="id_proses_bap" value="<?php echo $_GET['id']; ?>">
                            <div class="form-group">
                                <label for="foto1">Pilih foto</label>
                                <input type="file" name="foto1" class="form-control-file" id="foto1">
                            </div>

                            <figure class="figure">
                                <img id="foto1_preview"
                                     class="figure-img img-fluid rounded" height="200" width="200" />
                            </figure>

                            <hr>


                            <input name="fileFoto" type="submit" value="Unggah" class="btn btn-primary">
                            <a href="detail_proses_bap.php?id=<?php echo $_GET['id']; ?>">Kembali ke detail</a>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col">
                <form>
                    <input name="id_proses_bap" type="hidden" value="<?php echo $_GET['id']; ?>">
                    <div class="card">
                        <div class="card-header">
                            Dengan webcam
                        </div>
                        <div class="card-body">

                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <strong>Mozilla Firefox only!</strong>
                                <hr>
                                <img width="50" height="50" src="../../image/icon/firefox.png"> Hanya dapat dijalankan di Mozilla Firefox
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <!-- Large modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Mulai</button>
                            <a href="detail_proses_bap.php?id=<?php echo $_GET['id']; ?>">Kembali ke detail</a>

                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Webcam Capture</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>


                                        </div>
                                        <div class="modal-body">

                                            <div id="loading">
                                                <div class="d-flex justify-content-center">
                                                    <img src="../../image/icon/spinner.gif">
                                                </div>
                                            </div>

                                                <input id="mydata" type="hidden" name="mydata" value=""/>
                                                <div class="text-center">
                                                    <input type=button name="btnCapture" id="btnCapture" class="btn btn-warning" value="Foto" onClick="take_snapshot()">
                                                    <input type=button name="btnUnggah" id="btnUnggah" class="btn btn-warning" value="Unggah" onClick="SaveSnap()">
                                                </div>
                                            <br>

                                            <div class="d-flex justify-content-center">
                                                <div class="card text-center">
                                                    <div class="card-header">
                                                        Preview
                                                    </div>
                                                    <div class="card-body">
                                                        <div id="my_camera"></div>
                                                    </div>
                                                </div>

                                                <div class="card text-center">
                                                    <div class="card-header">
                                                        Hasil
                                                    </div>
                                                    <div class="card-body">
                                                        <div id="results"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $id_proses_bap = $_GET['id']; ?>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#foto1_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#foto1").change(function () {
        readURL(this);
    });

</script>

<!-- First, include the Webcam.js JavaScript Library -->
<script type="text/javascript" src="webcam.min.js"></script>

<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
    document.getElementById('btnUnggah').style.visibility="hidden";
    document.getElementById("loading").style.visibility='hidden';

    Webcam.set({
        width: 320,
        height: 240,
        crop_width: 240,
        crop_height: 240,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    Webcam.attach( '#my_camera' );

</script>

<!-- Code to handle taking the snapshot and displaying it locally -->
<script language="JavaScript">
    function take_snapshot() {
        // take snapshot and get image data
        Webcam.snap( function(data_uri) {
            // display results in page
            document.getElementById('results').innerHTML = '<img id="img" src="'+data_uri+'"/>';
            document.getElementById('btnUnggah').style.visibility = "visible";
        } );
    }

    function SaveSnap(){

        var file =  document.getElementById("img").src;
        var formdata = new FormData();
        formdata.append("img", file);
        formdata.append("id_proses_bap", <?php echo $id_proses_bap; ?>);
        var ajax = new XMLHttpRequest();
        //ajax.addEventListener("load", function(event) { uploadcomplete(event);}, false);
        ajax.open("POST", "upload.php");
        ajax.upload.onprogress = function () {

        }
        ajax.upload.onloadstart = function (e) {
            document.getElementById("loading").style.visibility='visible';
            document.getElementById("btnUnggah").style.visibility='hidden';
        }
        ajax.upload.onloadend = function (e) {
            document.getElementById("loading").style.visibility='hidden';
            document.getElementById("btnUnggah").style.visibility='visible';
            alert('Foto telah diunggah');
        }
        ajax.send(formdata);
    }
    function uploadcomplete(event){
        //document.getElementById("loading").innerHTML="";
        var image_return=event.target.responseText;
        var showup=document.getElementById("uploaded").src=image_return;
    }

</script>


</body>
</html>


<!------ Include the above in your HEAD tag ---------->
