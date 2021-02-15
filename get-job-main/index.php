<?php
session_start();
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
//echo "Connected successfully";

?>
<?php
    if(!isset($_SESSION['email'])){
       // echo "<script>" . "window.location.href = login/signup.php" . "</script>";
        echo "<script>"."alert('Please Back To Signup First');" . "</script>";
        die();
    }
?> 

<html>
<!--<form action="index.php" method="post">
                      <button style=" background-color: #5F9EA0;
                                         border: none;
                                         color: white;
                                         padding: 15px 32px;
                                         text-align: center;
                                         text-decoration: none;
                                         display: inline-block;
                                         font-size: 16px;
                                         margin: 2px 0px 0px 50px;
                                         cursor: pointer;
                                         " name="button">view all available jobs</button>
                 </form> -->


  
  <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="includes/posts.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
   <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
    <!------ Include the above in your HEAD tag ---------->
    <?php
     $user_email = $_SESSION['email'];
     //view all available jobs   in jobs.php
     /*if (isset($_POST['button'])){
                                 $sql = "SELECT * FROM dashboard";
                                 $result = mysqli_query($conn, $sql);
                          
                                 if (mysqli_num_rows($result) > 0) {
                                   // output data of each row
                                   while($row = mysqli_fetch_assoc($result)) {
                                  include 'des.html';
                                
                                    // echo "c-name: " . $row['c_name']. " - city: " . $row['city']. "<br>";
                                                                              }
                                 } else {
                                   echo "0 results";
                                        }
   
                                }*/

//seach bar
        if (isset($_POST['sub'])){
          //search  jobs
          if($_POST['search']=='android' || $_POST['search']=='mobile android' )
          {
             $sql = "SELECT * FROM dashboard WHERE job_section='Android'";
                                 $result = mysqli_query($conn, $sql);}

              elseif($_POST['search']=='it' || $_POST['search']=='front end' )
          {
             $sql = "SELECT * FROM dashboard WHERE job_section='IT/Software'";
                                 $result = mysqli_query($conn, $sql);} 

                                 //search companies   

             elseif($_POST['search']=='EELU' || $_POST['search']=='eelu' ||$_POST['search']=='Eelu' )
          {
             $sql = "SELECT * FROM dashboard WHERE c_name='EELU'";
                                 $result = mysqli_query($conn, $sql);}



             elseif($_POST['search']=='IKEN Technology' || $_POST['search']=='iken technology' ||$_POST['search']=='Iken Technology' ||$_POST['search']=='IkEN TECHNOLOGY'|| $_POST['search']=='ikentechnology'|| $_POST['search']=='IkenTechnology')
          {
             $sql = "SELECT * FROM dashboard WHERE c_name='IKEN Technology'";
                                 $result = mysqli_query($conn, $sql);}




                                //fetch from data base

                                 if (mysqli_num_rows($result) > 0) {
                                   // output data of each row
                                   while($row = mysqli_fetch_assoc($result)) {
                                  include 'des.html';
                                
                                    // echo "c-name: " . $row['c_name']. " - city: " . $row['city']. "<br>";
                                                                              }
                                 } else {
                                   echo "0 results";
                                        }
                           }

       

              else{
   // echo $user_email;
    
$query = "SELECT city,job FROM profile WHERE email='$user_email'";
$result2 = mysqli_query($conn, $query);


if ($result2->num_rows > 0) {
    // output data of each row
    while ($row = $result2->fetch_assoc()) {

        //echo "id: " . $row["city"] . " - Name: " . $row["job"] . "<br>";
        $_SESSION['user_job'] = $row["job"];
        $_SESSION['user_city'] = $row["city"] ;
       // echo $_SESSION['user_city'];
       // echo $_SESSION['user_job'];
    }
}else {
    echo "0 results";
}


   $user_city = $_SESSION['user_city'];
   $user_job= $_SESSION['user_job'];

$sql = "SELECT c_name,c_details ,city,c_mail FROM dashboard WHERE city='$user_city' AND job_section='$user_job' ";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       // echo "id: " . $row["c_name"]. " - Name: " . $row["c_details"];
        
        echo "<br>" ;

        ?>
 <head>
     <meta charset="utf-8">
     <style>
         .r1
         {
          margin: -1px 400px 10px 90px;
          width: 50%
         }
         a{
        text-decoration: none;

           }
         p{
        font-size: 95%
          }
          h3 , h6{
        display: inline;
      }
       h6{
        font-family: Cursive;
        font-size: 90%;
       
      }
       
     </style>
  </head>
 
      <div class="r1">
        <h3><?php echo $row['c_name'] ;?></h3>
              <h6>  Suggestion </h6>
          <p class="r2"><?php echo $row['city'];?> </p>
          <p class="r3"><?php echo $row['c_details'];?></p>
        for contact: <a href="#"><?php echo $row['c_mail'];?></a>
          <hr>
       </div> 
 
        <?php }}}
        
        
                

    ?>
    
    
                                
</html>
<?php
include 'includes/footer.html';
?>