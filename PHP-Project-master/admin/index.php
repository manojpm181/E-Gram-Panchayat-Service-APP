<?php
session_start();
include 'commonincludefiles.php';
global $appname;
$message = '';

if (isset($_SESSION['email'])) {
    echo "<script>window.location='dashboard.php'</script>";
}

if (isset($_REQUEST['logout']) && $_REQUEST['logout'] == 'true') {
    if (isset($_SESSION)) {
        unset($_SESSION['email']);
        unset($_SESSION['user_id']);
        unset($_SESSION['name']);
        session_destroy();
        echo "<script>window.location='index.php'</script>";
        exit;
    }
}
if (isset($_POST['login'])) {
    if (isset($_POST['admin']) && isset($_POST['password'])) {
        if (login($_POST['admin'], $_POST['password'])) {
            header('Location:dashboard.php');
        } else {
            $message = "You have entered wrong UserName Or Password";
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $appname?> | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
        <link rel="shortcut icon" type="image/x-icon" href="dist/img/favicon.ico">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a><b><?= $appname ?></b></a>
            </div>
            <br><br><br><br><br><br>
            <center>
    <h2 style="color: #000; font-weight: bold; text-shadow: 1px 1px 2px #fff, 0 0 5px #ff6f61;">
        E-Gram Panchayat Service APP
    </h2>
</center>

            <br><br><br><br><br><br><br>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <?php if (isset($message) && $message != '') { ?>
                    <div role="alert" class="alert alert-danger">
                        <?= $message ?>
                    </div>
                <?php } ?>
                <form action="#" method="post">
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="Admin Name" name="admin" required="">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password" name="password" required="">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-xs-12">
                            <input type="submit" class="btn btn-primary btn-block btn-flat" name="login" value="Login">
                        </div>
                        <!-- /.col -->
                    </div>
                </form>               

            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery 2.2.3 -->
        <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="bootstrap/js/bootstrap.min.js"></script>        
    </body>
</html>
