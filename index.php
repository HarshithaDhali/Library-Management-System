<?php
$msg="";
if(!empty($_REQUEST['msg'])){
    $msg = $_REQUEST['msg'];
}
session_unset();
// session_destroy();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>library-management</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head>
    <style>
        *{
            padding: 0px;
            margin: 0px;
        }
        .container{
            padding: 10px 20px;
            margin: 10px 150px;
            height: auto;
            width: auto;

        }
        .logo{
            height: auto;
            width: auto;
        }
        .adminlogin{
            float:left;
            border: 1px solid white;
            padding: 170px;
            text-align: center;
            box-shadow:-10px 10px 6px RGB(243 243 243);
        }
        .studentlogin{
            float: left;
            border: 1px solid RGB(41 83 239);
            padding: 170px;
            text-align: center;
            color: white;
            background-color: RGB(41 83 239);
        }
        input{
            width: 240px;
            border: none;
            color: black;
            background-color:RGB(243 243 243);
            border-radius: 4px;
            height: 25px;
        }
        .submit1{
            width:150px;
            background-color:rgb(41,83,239);
            border-radius: 150px;
            color: white;
            height: 25px;
            cursor: pointer;
            margin-top: 20px;
            
        }
        .submit2{
            width:150px;
            background-color: white;
            border-radius: 150px;
            height: 25px;
            cursor: pointer;
            margin-top: 20px;
        }
        .heading{
            padding-bottom: 20px;
        }
        footer {
            background-image: url('pictures/footer background.jpg');
            background-repeat: no-repeat;
            /* background-attachment: fixed; */
            background-size: cover;
            width:1178px ;
            height: 40px;
            color: white;
            margin-top: 550px;

        }
        #footertext{
            padding-left: 500px;
            padding-top: 10px;
        }
        #message{
            color:red;
        }


    </style>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="container">
            <img src="pictures/logo.jpg" id="logo" height="auto" width="1178px">
            <div><p id="message"><?php echo $msg ?></p></div>
            <div class="adminlogin">
                <h2 class="heading">Admin Login</h2>
                <form action="loginadmin_server_page.php" method="get">
                    <input type="text" name="login_email" placeholder="Your Email *" value="" required/><br>
                    <!-- <Label style="color:red" >*</label><br> -->
                    <br>
                    <input type="password" name="login_password" placeholder="Your Password *" value="" required /><br>
                    <!-- <Label style="color:red">*</label><br> -->
                    <br>
                    <input class="submit1" type="submit" value="Login" /><br>
                </form>
            </div>
            <div class="studentlogin">
                <h2 class="heading">Student/Teacher Login</h2>
                <form action="login_server_page.php" method="get" >
                    <input type="text" name="login_email" placeholder="Your Email *" value="" required /><br>
                    <!-- <Label style="color:red">*</label><br> -->
                    <br>
                    <input type="password" name="login_password" placeholder="Your Password *" value=""  required/><br>
                    <!-- <Label style="color:red">*</label><br> -->
                    <br>
                    <input class="submit2" type="submit" value="Login"/><br>
                </form>
            </div>
            <footer id="footerimg">
                <!-- <img src="pictures/footer background.jpg" height="auto" width="1178px"> -->
                <p id="footertext">whiteoak Library &copy; 2022-present</p>
            </footer>
        </div>
        <script src="" async defer></script>
    </body>
</html>