<?php

session_start();
ob_start();
require_once ('config.php');


if (isset($_POST['masuk'])){

    $username = $_POST['username'];
    $pass = $_POST['password'];


    if ($username == '' || $pass == ''){
        $err = -3;
    } else {



        //cek login
        $sql = "select * from users where username = :username OR email = :email";
        $stmt = $db->prepare($sql);
        $param = array(
            ":username" => $username,
            ":email" => $username
        );

        $stmt->execute($param);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);


        //jika user terdaftar
        if ($user){
            if ( password_verify($pass,$user['password']) ){

                //masukkan tabel log
                $sql = "insert into log (id_user) VALUES (:id_user)";
                $stmt = $db->prepare($sql);
                $param = array(
                    ":id_user" => $user['id']
                );
                $saved = $stmt->execute($param);

                //mulai sesi
                //session_start();
                $_SESSION['user']=$user;

                //redirect ke home
                //header('Location: ../master/home.php' );

                echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../master/home.php">';
                exit;



            } else{

                //jika password tidak sesuai
                $err = -1;

            }
        } else{

            //jika user tidak terdaftar
            $err = 0;

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
    <title>Login</title>
</head>
<body>


<div class="container h-100" style="margin-top:40px">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="card text-center">
                <div class="card-header">
                    <strong class="display-4"> LOGIN</strong>
                </div>
                <div class="card-body">
                    <form role="form" action="" method="POST">
                        <fieldset>
                            <div class="row">
                                <img class="mx-auto d-block rounded-circle"
                                     src="image/simbol/imigrasi.jpg" alt="">
                            </div>
                </div>

                <?php

                if (isset($_POST['masuk'])){

                    if ($err == 0){
                        $pesan = "Anda tidak terdaftar";

                    } elseif ( $err == -1){
                        $pesan = "Password Anda salah";
                    } elseif ( $err == -3){
                        $pesan = "Username dan password harus diisi";
                    }

                    echo '<div class="alert alert-danger" role="alert">';
                    echo $pesan;
                    echo '</div>';

                }



                ?>


                <br>

                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                        <div class="form-group">
                            <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-user"></i>
                        </span>
                                <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-lock"></i>
                        </span>
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <input name="masuk" type="submit" class="btn btn-lg btn-primary btn-block" value="Masuk">

                        </div>

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


<!------ Include the above in your HEAD tag ---------->

    