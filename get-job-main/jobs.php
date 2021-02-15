<?php
session_start();
include 'includes/header.html';
//include 'login/login_functions/database.php';
                     
                     //check about user done the email in signup 

                        if(!isset($_SESSION['email'])){
                           // echo "<script>" . "window.location.href = login/signup.php" . "</script>";
                            echo "<script>"."alert('Please Back To Signup First');" . "</script>";
                            die();
                        }
                    ?>

                 



<?php
include 'includes/header.html';
// include 'login/login_functions/database.php';
 include 'includes/navbar.html';
// Connection Information

$servername = "localhost";
$username = "root";//sql username
$password = "";//sql password
$dbname = "jobs";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
     

     $user_email = $_SESSION['email'];
     //view all available jobs
     if (isset($_POST['button'])){
                                 $sql = "SELECT * FROM dashboard";
                                 $result = mysqli_query($conn, $sql);
                          
                                 if (mysqli_num_rows($result) > 0) {
                                   // output data of each row
                                   while($row = mysqli_fetch_assoc($result)) {
                                  include 'des.html';
                                 // header( "refresh:2;url=index.php" );
                                    // echo "c-name: " . $row['c_name']. " - city: " . $row['city']. "<br>";
                                                                              }
                                 } else {
                                   echo "0 results";
                                        }
   
                                }

                                ?>