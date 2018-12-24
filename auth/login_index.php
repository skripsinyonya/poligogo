<?php
    require_once "../_config/config.php";
    if(isset($_SESSION['jabatan']) != null){
        session_destroy();
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <title>SI RM Poligigi RS Balung</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../_assets/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link href="<?php echo base_url();?>/_assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/_assets/font-awesome/css/font-awesome.min.css">
<!--===============================================================================================-->
   <!--  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css"> -->
<!--===============================================================================================-->  
    <!-- <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css"> -->
<!--===============================================================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css"> -->
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../_assets/css/login/util.css">
    <link rel="stylesheet" type="text/css" href="../_assets/css/login/main.css">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div name="form1" method="post" action="login_cek.php" class="container-login100" style="background-image: url('../_images/back_login.jpeg');">
            <div class="wrap-login100 p-t-50 p-b-128">
                <form class="login100-form validate-form" name="form1" method="post" action="login_cek.php">
                    <div class="login100-form-avatar">
                        <img src="../_images/blank.png" alt="AVATAR">
                    </div>

                    <span class="login100-form-title p-t-20 p-b-45">
                        SISTEM INFORMASI REKAM MEDIS POLIGIGI RUMAH SAKIT BALUNG
                    </span>

                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
                        <input type="text" class="input100" placeholder="Password" name="user" required> 
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
                        <input type="password" class="input100" placeholder="Password" name="pass" required> 
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn p-t-10">
                        <input type="submit" name="login" class="login100-form-btn" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    

    
<!--===============================================================================================-->  
    <script src="../_assets/js/login/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <!-- <script src="vendor/bootstrap/js/popper.js"></script> -->
    <script src="../_assets/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <!-- <script src="vendor/select2/select2.min.js"></script> -->
<!--===============================================================================================-->
    <script src="../_assets/js/login/main.js"></script>

</body>
</html>