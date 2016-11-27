<?php ob_start(); ?>
<?php session_start(); ?>
<?php include("../DB/db.php"); ?>
<?php include("../DB/functions.php"); ?>
<?php


    if(isset($_POST['submit'])){



            //$_SESSION['login_required'] = null;

            $db_user = getOneUser($_POST['username'],$_POST['password']);
            $db_username = $db_user['userName'];
            $db_password = $db_user['userPassword'];

            $login_username = $_POST['username'];
            $login_password = $_POST['password'];
            $_SESSION['userID'] = $db_user['userID'];


            if($login_username == $db_username && $login_password == $db_password){
                $_SESSION['username'] = $login_username;
                $_SESSION['password'] = $login_password;

                if ($db_user['profileTypeID']==1) {
                    redirect_to("../Student/index.php");
                }elseif ($db_user['profileTypeID']==2) {
                    redirect_to("../Professor/index.php");
                }elseif ($db_user['profileTypeID']==3) {
                    redirect_to("../Employee/index.php");
                }elseif ($db_user['profileTypeID']==4) {
                    redirect_to("../Admin/index.php");
                }else{
                    redirect_to("index.php");
                }


            }else{
                 $_SESSION['username'] = $login_username;
                 $_SESSION['error_login'] = 'Please try again!';

            }


    }


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="assets/css/styles.php">
</head>

<body>
    <div id="photo_background"></div>
    <div id="left_pane">
        <div class="row">
            <div class="col-md-3" id="left_column">
                <div class="login-card">
                <p class="text-white"><?php echo $_SESSION['logout_message']; echo $_SESSION['logout_message'] = null; ?></p>
                    <form class="form-signin" method="POST" action="index.php">
                        <input class="form-control" type="text" required="" placeholder="username" autofocus="" name="username" value="<?php echo $_SESSION['username']; ?>">
                        <input class="form-control" type="password" required="" placeholder="Password" name="password">
                        <div class="checkbox">
                            <div class="checkbox">
                                <label>
                                    <!-- <input type="checkbox">Remember Me</label> -->
                            </div>
                        </div>
                        <input class="btn btn-primary btn-block btn-lg btn-signin" type="submit" name="submit"  >


                    </form>
                    <!-- <a href="#" class="text-white">Forgot your password?</a> -->
                    <p class="text-white">
                    <?php echo  $_SESSION['error_login']; ?>
                    </p>
                    </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <?php ob_end_flush(); ?>
<?php mysqli_close($connection); ?>
</body>

</html>
