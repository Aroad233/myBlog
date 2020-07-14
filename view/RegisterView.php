<?php
require_once ('config.php');
include "../controller/RegisterController.php";
    if (!empty($_POST)) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $rpassword = $_POST['rpassword'];
        $code = strtoupper($_POST['authcode']);
        $authcode = strtoupper($_SESSION['code']);
        if ($code != $authcode) {
            echo "<script type=\"text/javascript\">
            alert('验证码错误');
                </script>";
        } else if($password != $rpassword)
        {
            echo "<script type=\"text/javascript\">
            alert('两次密码不一致');
                </script>";
        } else {
            $registerController = new RegisterController();
            $r = $registerController->Register($username,$password);
            if ($r == 1) {
                echo "<script type=\"text/javascript\">
                    alert('注册成功');
                    header('location:LoginView.php');
                </script>";
            } else {
                echo "<script type=\"text/javascript\">
                    alert('注册失败');
                </script>";
            }

        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MyBlog</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div id="logo" class="navbar-brand" style="background-image: url('img/logo.png');"></div>
    <div id="title">
        <h1>Aroad's Blog</h1>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <svg xmlns="http://www.w3.org/2000/svg" color="#8a278c" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <?php
            require_once ("List.php");
            ?>
        </ul>
    </div>
</nav>

<section class="max-width mx-auto" style="padding-top: 160px;z-index: -1;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="ui-logins">
                    <h2>
                        注册
                    </h2>
                    <form class="ui-login" method="post">
                        <input class="" name="username" type="text" placeholder="Username" />
                        <input class="" name="password" type="password" placeholder="Password" />
                        <input class="" name="rpassword" type="password" placeholder="Confirm Password" />
                        <input class="" name="authcode" type="text" placeholder="Auth Code" style="width: 69%;"/>
                        <img src="code.php" style="width: 29%;height: 48px;display: inline-block;vertical-align: middle;float: right;border-radius: 5px;" />
                        <input class="submit" type="submit" value="Login" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>
<script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>