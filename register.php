<?php
session_start();
ob_start();
include ('auth.php');
?>
<?php

    require_once ('config.php');

    if (isset($_POST['register'])){


        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);
        $password = $_POST['password'];
        $cpassword =$_POST['cpassword'];

        if ($username == '' || $nama == '' || $password == '' || $cpassword == ''){
            $err = -1;
        } else {

            //jika password dan ulang password tidak sama
            //error
            if ( strcmp($password,$cpassword) != 0 ){
                $err = 0;

            //jika password dan ulang password sama
            }else{

                //cek dulu
                $sql = "select * from users where username = :username";
                $stmt = $db->prepare($sql);
                $param = array(
                  ":username" => $username
                );
                $stmt->execute($param);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                //jika sudah ada
                if ($user){
                    $err = -2;
                }else{
                    //simpan
                    $sql = "insert into users (username, email, password, nama) VALUES (:username, :email, :password, :nama)";
                    $stmt = $db->prepare($sql);

                    //hash password
                    $password=password_hash($_POST['password'], PASSWORD_DEFAULT);

                    $param = array(
                        ":username" => $username,
                        ":email" => $email,
                        ":password" => $password,
                        ":nama" => $nama
                    );
                    $saved = $stmt->execute($param);

                    $err = 1;
                }


            }
        }

    }


?>



<!DOCTYPE html>
<html>
<head>
    <?php
        include 'head_html.php';
    ?>
    
    <title>Register baru</title>
</head>
<body>

<?php include 'head_utama.php'; ?>



<div class="container">
    <div class="container-fluid">

        <h2>Register Baru</h2>
        <hr>


        <?php

        if (isset($_POST['register'])){
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
                $pesan ="Register berhasil";

                echo '<div class="alert alert-success" role="alert">';
                echo $pesan;
                echo '</div>';
            } elseif ($err == -2){

                $pesan="User ini sudah ada. Silakan diganti";

                echo '<div class="alert alert-danger" role="alert">';
                echo $pesan;
                echo '</div>';

            }



        }


        ?>

        <form action="" method="post">
            <div class="form-group">
                <p class="text-left">Username</p>
                <input class="form-control" name="username" type="text" autofocus>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <p class="text-left">Nama tampilan</p>
                    <input class="form-control" name="nama" type="text">
                </div>

                <div class="form-group col-md-6">
                    <p class="text-left">Email</p>
                    <input class="form-control" name="email" type="email">
                </div>


            </div>

            <div class="form-row">

                <div class="form-group col-md-6">
                    <p class="text-left">Password</p>
                    <input class="form-control" name="password" type="password">
                </div>

                <div class="form-group col-md-6 ">
                    <p class="text-left">Ulangi password</p>
                    <input class="form-control" name="cpassword" type="password">
                </div>

            </div>

            <input name="register" type="submit" class="btn btn-primary" value="Register">
            <a href="../master/daftar_user.php">Kembali</a>


        </form>



    </div>
</div>

</body>
</html>


<!------ Include the above in your HEAD tag ---------->

