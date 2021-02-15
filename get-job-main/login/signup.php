<?php
session_start();
include "login_functions/database.php";
   $servername = "localhost";
    $username = "root";//sql username
    $password = "";//sql password
    $dbname = "jobs";

// Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

//include 'functions/login.php';
// $pass = password_hash($_POST['pass'],PASSWORD_DEFAULT);
if((isset($_POST['signup'] )&&($_POST['name']&&$_POST['email']&&$_POST['pass']&&$_POST['re_pass']!=null) )) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass=$_POST['pass'];
    $re_pass=$_POST['re_pass'];

    if(($pass === $re_pass)){

                   $query = "SELECT email FROM login WHERE email = '$email'";
                   $result = mysqli_query($conn,$query);
                   if ($result) {
                     if (mysqli_num_rows($result) > 0) {
                        echo "<script>"."alert('this email already found please enter another one');" . "</script>";
                       
                    }
                     else {
                       //echo 'not found';
                                      db_connect(  "INSERT INTO login (name,email,password,re) VALUES ('$name', '$email', '$pass','$re_pass')");
                                     $_SESSION["logged_in"] = true;
                                     $_SESSION['email'] = $email;
                                  {
                            
                                     header( "refresh:2;url=../profile.php" );}
                                     //echo $_SESSION['email'];
                          }
                 }  
         

    //if(filter_var($email,FILTER_VALIDATE_EMAIL) && filter_var($name, FILTER_SANITIZE_STRING)&& filter_var($pass, FILTER_SANITIZE_STRING)&& filter_var($re_pass, FILTER_SANITIZE_STRING)) {
        
       /*
         // db_connect(  "INSERT INTO login (name,email,password,re) VALUES ('$name', '$email', '$pass','$re_pass')")
         $query = "INSERT INTO login (name,email,password,re) VALUES ('$name', '$email', '$pass','$re_pass')";
         db_connect($query);
        // $sql="INSERT INTO login 'email
             //  SELECT '".$_POST['email']."' FROM login WHERE NOT EXIST(SELECT email FROM login WHERE email='".$_POST['email']."' )";
             
         $_SESSION["logged_in"] = true;
         $_SESSION['email'] = $email;

         header( "refresh:2;url=../profile.php" );
         }
         //echo $_SESSION['email']*/
        
     
                            }else{ echo "<script>"."alert('Please check your password');" . "</script>";}
       
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        .btn{
             margin-left: 70px;
            margin-top: 40px 
        }
        .form-title
        {
            margin-left: 60px;
            font-size: 40px
        }
       
    </style>
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form action="signup.php" method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <!--<div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>-->
                            <div class="btn">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                              <a  href="login.php" class="signup-image-link">I am already member</a>
                              <a style="margin: 20px;" href="../dashboard.php" class="signup-image-link">Employer / Organization Registration</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>