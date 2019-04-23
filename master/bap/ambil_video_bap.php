<?php
session_start();
ob_start();
include ('../../auth.php');

?>
<?php

require_once ('../../config.php');

if (isset($_POST['fileFoto'])){

    $target_dir = "../../image/bap/video/";
    $target_file = $target_dir . basename($_FILES["foto1"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (file_exists($target_file)) {
        $pesan = "Maaf, nama video sudah ada.";
        $uploadOk = 0;
    }

    //periksa ukuran file
    if ($_FILES["foto1"]["size"] > 5000000000) {
        $pesan = "Maaf, ukuran video terlalu besar (lebih besar dari 5 GB).";
        $uploadOk = 0;
    }

// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        //$pesan = "Maaf, video tidak dapat diunggah.";
// if everything is ok, try to upload file
    } else {

        $temp = explode(".", $_FILES["foto1"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);

        if (move_uploaded_file($_FILES["foto1"]["tmp_name"], $target_dir . $newfilename)) {

            $id_proses_bap = filter_input(INPUT_POST, 'id_proses_bap', FILTER_SANITIZE_STRING);

            //simpan path foto ke darabase
            $sql = "insert into video_bap (id_proses_bap,nama_file) VALUES (:id_proses_bap, :nama_file)";
            $stmt = $db->prepare($sql);

            $param = array(
                ":id_proses_bap" => $id_proses_bap,
                ":nama_file" => $newfilename
            );
            $saved = $stmt->execute($param);
            $pesan = "Video berhasil diunggah.";

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

    <script src="https://cdn.WebRTC-Experiment.com/RecordRTC.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>


    <title>Unggah Video BAP</title>
</head>
<body>

<?php
include '../../config.php';
include '../../head_utama.php';
?>


<div class="container">
    <div class="container-fluid">

        <h1 class="display-4">Unggah Video BAP</h1>
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
                        Video dari file
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="id_proses_bap" value="<?php echo $_GET['id']; ?>">
                            <div class="form-group">

                                <p class="font-italic">Hanya file .mp4 dan .webm yang diperbolehkan</p>
                                <input type="file" name="foto1" class="form-control-file" id="foto1">
                            </div>

                            <figure class="figure">
                                <img id="foto1_preview"
                                     class="figure-img img-fluid rounded" height="200" width="200" />
                            </figure>

                            <hr>
                            <input name="fileFoto" type="submit" value="Unggah" accept="video/*" class="btn btn-primary">
                            <a href="detail_proses_bap.php?id=<?php echo $_GET['id']; ?>">Kembali ke detail</a>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col">
                    <input name="id_proses_bap" type="hidden" value="<?php echo $_GET['id']; ?>">
                    <div class="card">
                        <div class="card-header">
                            Live/Webcam
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
                                            <h5 class="modal-title" id="exampleModalLabel">Live Video</h5>
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

                                            <div class="d-flex justify-content-center">
                                                <input type="button" id="btnmulai" class="btn btn-warning" onclick="Mulai()" value="Rekam">
                                                <input type="button" id="btnstop" class="btn btn-warning" value="Berhenti dan unggah">
                                            </div>
                                            <br>

                                            <div class="d-flex justify-content-center">
                                                <video id="your-video-id" controls="" autoplay=""></video>
                                            </div>

                                            <script type="text/javascript">
                                                document.getElementById("loading").style.visibility="hidden";
                                                document.getElementById("btnstop").style.visibility = "hidden";

                                                function Mulai() {
                                                    document.getElementById("btnstop").style.visibility = "visible";
                                                    document.getElementById("btnmulai").style.visibility = "hidden";

                                                    navigator.mediaDevices.getUserMedia({ video: true, audio: true }).then(function(camera) {

                                                        // preview camera during recording
                                                        document.getElementById('your-video-id').muted = false;
                                                        document.getElementById('your-video-id').srcObject = camera;

                                                        // recording configuration/hints/parameters
                                                        var recordingHints = {
                                                            type: 'video'
                                                        };

                                                        // initiating the recorder
                                                        var recorder = RecordRTC(camera, recordingHints);

                                                        // starting recording here
                                                        recorder.startRecording();

                                                        document.getElementById('btnstop').onclick = function () {
                                                            document.getElementById("loading").style.visibility="visible";
                                                            recorder.stopRecording(function() {
                                                                var blob = recorder.getBlob();
                                                                var fileName = getFileName('webm');
                                                                var fileObject = new File([blob], fileName, {
                                                                    type: 'video/webm'
                                                                });

                                                                var formData = new FormData();
                                                                formData.append('video-blob', fileObject);
                                                                formData.append('video-filename', fileObject.name);
                                                                formData.append('id_proses_bap', <?php echo $_GET['id']; ?>);

                                                                // upload using jQuery
                                                                $.ajax({
                                                                    url: 'save.php', // replace with your own server URL
                                                                    data: formData,
                                                                    cache: false,
                                                                    contentType: false,
                                                                    processData: false,
                                                                    type: 'POST',
                                                                    success: function(response) {
                                                                        if (response === 'success') {
                                                                            document.getElementById("loading").style.visibility="hidden";
                                                                            alert('Video telah diunggah');
                                                                            // preview uploaded file in a VIDEO element
                                                                            document.getElementById('your-video-id').src = fileDownloadURL;
                                                                            // open uploaded file in a new tab
                                                                            window.open(fileDownloadURL);
                                                                        } else {
                                                                            alert(response); // error/failure
                                                                        }
                                                                    }
                                                                });

                                                                // release camera
                                                                document.getElementById('your-video-id').srcObject = null;
                                                                camera.getTracks().forEach(function(track) {
                                                                    track.stop();
                                                                });
                                                                document.getElementById("btnstop").style.visibility = "hidden";
                                                                document.getElementById("btnmulai").style.visibility = "visible";

                                                            });
                                                        };
                                                    });
                                                }
                                                function getFileName(fileExtension) {
                                                    var d = new Date();
                                                    var year = d.getUTCFullYear();
                                                    var month = d.getUTCMonth();
                                                    var date = d.getUTCDate();
                                                    return 'Live' + year + month + date + '-' + getRandomString() + '.' + fileExtension;
                                                }
                                                function getRandomString() {
                                                    if (window.crypto && window.crypto.getRandomValues && navigator.userAgent.indexOf('Safari') === -1) {
                                                        var a = window.crypto.getRandomValues(new Uint32Array(3)),
                                                            token = '';
                                                        for (var i = 0, l = a.length; i < l; i++) {
                                                            token += a[i].toString(36);
                                                        }
                                                        return token;
                                                    } else {
                                                        return (Math.random() * new Date().getTime()).toString(36).replace(/\./g, '');
                                                    }
                                                }
                                            </script>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

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


</body>
</html>


<!------ Include the above in your HEAD tag ---------->
