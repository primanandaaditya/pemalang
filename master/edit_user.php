<?php
session_start();
ob_start();
include ('../auth.php');
?>
<?php
require_once ('../config.php');

    //jika tidak ada querystring
    //redirect ke daftar_user.php
    if (!isset($_GET['id'])){
        header('Location:../master/daftar_user.php');
    }


    //dapatkan nilai id dari query string
    $id = $_GET['id'];

    //dapatkan data user
    // dari id di atas
    $sql = "select * from users where id = :id";
    $stmt = $db->prepare($sql);
    $param = array(
        ":id" => $id
    );

    $stmt->execute($param);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user){
        $get_username = $user['username'];
        $get_nama = $user['nama'];
        $get_email = $user['email'];
    }



if (isset($_POST['ubah'])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);
    //$password = $_POST['password'];
    //$cpassword =$_POST['cpassword'];


    $sql = "update users set username = :username, email = :email, nama = :nama where id = :id";
    $stmt = $db->prepare($sql);

    $param = array(
        ":username" => $username,
        ":email" => $email,
        ":nama" => $nama,
        ":id" => $id
    );
    $saved = $stmt->execute($param);
    $err = 1;
    header('Location:../master/daftar_user.php');
}


?>



<!DOCTYPE html>
<html>
<head>
    <?php
    include '../head_html.php';
    ?>

    <title>Ubah data user</title>
</head>
<body>



<div class="container h-100" style="margin-top:40px">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-sm-6">
            <div class="card text-center">
                <div class="card-header">
                    <strong class="display-4"> Ubah Data User</strong>
                </div>
                <div class="card-body">
                    <form role="form" action="" method="POST">
                        <fieldset>
                            <div class="row">
                                <img class="mx-auto d-block"
                                     src="../image/user.png" alt="">
                            </div>
                </div>

                <?php

                if (isset($_POST['ubah'])){
                    if ($err == -1){
                        $pesan = "Nama, password dan username harus diisi lengkap";

                        echo '<div class="alert alert-danger" role="alert">';
                        echo $pesan;
                        echo '</div>';

                    } elseif ($err == 0){
                        $pesan="Password tidak sama";

                        echo '<div class="alert alert-danger" role="alert">';
                        echo $pesan;
                        echo '</div>';
                    } elseif ($err == 1){
                        header('location:daftar_user.php');
                    } elseif ($err == -2){



                    }



                }


                ?>


                <br>

                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-10  col-md-offset-1">

                        <input type="hidden" value="<?php echo $id; ?>" >

                        <div class="form-group">
                            <p class="text-left">Username</p>
                            <input class="form-control" name="username" type="text" value="<?php echo $get_username; ?>" autofocus>
                        </div>

                        <div class="form-group">
                            <p class="text-left">Nama</p>
                            <input class="form-control" name="nama" type="text" value="<?php echo $get_nama; ?>">
                        </div>

                        <div class="form-group">
                            <p class="text-left">Email</p>
                            <input class="form-control" name="email" value="<?php echo $get_email; ?>" type="email">
                        </div>


                        <input name="ubah" type="submit" class="btn btn-primary" value="Ubah">
                        <a href="../master/daftar_user.php">Kembali</a>


                        <br>
                        <br>

                    </div>
                </div>
                </fieldset>
                </form>
            </div>

        </div>
    </div>
</div>
</div>
</body>
</html>
