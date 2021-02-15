<?php
session_start();
include 'includes/header.html';
//include 'login/login_functions/database.php';
                    //check about user doing email in signup
                        if(!isset($_SESSION['email'])){
                           // echo "<script>" . "window.location.href = login/signup.php" . "</script>";
                            echo "<script>"."alert('Please Back To Signup First');" . "</script>";
                            die();
                        }
                    ?>
<?php
$user_email = $_SESSION['email'];
include 'login/login_functions/database.php';

if((isset($_POST['update'])&&($_POST['city']&&$_POST['job_section']&&$_POST['gender']&&$_POST['career_level']&&$_POST['experience']&&$_POST['time']&&$_POST['contact']&&$_POST['details']!=null)))
{
    $user_email = $_SESSION['email'];
    $city       = $_POST['city'];
    $job        = $_POST['job_section'];
    $gender     = $_POST['gender'];
    $career     = $_POST['career_level'];
    $exp        = $_POST['experience'];
    $time       = $_POST['time'];
    $contact    = $_POST['contact'];
    $details    = $_POST['details'];
    
    //
    $sql = "UPDATE profile SET city= '$city', job= '$job' ,gender='$gender',current_level='$career',exp='$exp',type_time= '$time' ,email= '$contact',details='$details'   WHERE  email='$user_email'" ;
   //
    db_connect($sql);
    header( "refresh:2;url=index.php" );
       /* if (mysqli_query($conn, $query)) {
          echo "Record updated successfully";
        } else {
          echo "Error updating record: " . mysqli_error($conn);
        }*/
        
}
   ?>
<html>
    <head>
        <meta charset="utf-8">
        <style>
            body
        {
              background-image: url("login/images/mm.jpeg");
              background-position: 18% 18% ;
              background-repeat: no-repeat;
              background-size: cover;
              
        }
         .roro
        {
           height: 50%;
          width: 53%;
          padding: 50px;
          margin: 45px;
        }
       .col-6 
       {
       
        width: 100%;
        }
       .col-md-68 
       {
        width: 100%
       }
       .col-md-68.btn
       {
        display: inline-block;
       }
       .email
       {
         visibility: hidden
       }
        
     </style>
        </style>
    </head>
<body>
    <div class="roro">
<form action="update.php" method="post" class="row g-3">
 <!--   <div class="col-md-6">
        <label  class="form-label">Company Name</label>
        <input type="text" class="form-control" name="c_name" >
    </div> -->
    <br>
    <div class="col-md-68">
        <select id="inputState" class="form-select" name = "city">
            <option value=" "           >Choose Your City ?</option>
            <option value="cairo"    >Cairo</option>
            <option value="alex"     >Alex</option>
            <option value="aswan"    >Aswan</option>
            <option value="asyut"    >Asyut</option>
            <option value="mansoura" >Mansoura</option>
            <option value="luxor"    >Luxor</option>
            <option value="sohag"    >Sohag</option>
            <option value="giza"     >Giza</option>
            <option value="faiyum"   >Faiyum</option>
            <option value="port said">Port Said</option>
            <option value="damietta" >Damietta</option>
            <option value="sharqia"  >Sharqia</option>
            <option value="monufya"  >Monufya</option>
            <option value="suez"     >Suez</option>
            <option value="charbia"  >Charbia</option>
            <option value="dakahlia" >Dakahlia</option>
        </select>

    </div>

    <div class="col-6">
        <!-- <label for="inputState" class="form-label">. Job</label>-->
        <select id="inputState" class="form-select" name = "job_section">
                <option value=" "           >Whats Your Job ?</option>
                <option value="IT/Software"  >IT/Software Development</option>
                <option value="marketing"   >Marketing</option>
                <option value="Android"       >Android Developer</option>
                <option value="design"      >Design</option>
                <option value="Full Stack"   >Full Stack Developer</option>
                <option value="Translator"     >Translator</option>
                <option value="Graphic"     >Graphic Designer</option>
                <option value="engineering"  >Civil engineering</option>
                <option value="medical"  >medical</option>
        </select>
    </div>

    <div class="col-md-6">
        <select id="inputState" class="form-select" name = "gender">
            <option value=" "           >Gender ?</option>
            <option value="male"    >Male</option>
            <option value="female"     >Female</option>
        </select>
    </div>

    <div class="col-md-6">
        <select id="inputState" class="form-select" name = "career_level">
            <option value=" "           >Whats Your Current Career Level ?</option>
            <option value="student"    >Student</option>
            <option value="entry_level"     >Entry Level</option>
            <option value="manager"     >Manager</option>
        </select>
    </div>

    <div class="col-md-6">
        <select id="inputState" class="form-select" name = "experience">
            <option value=" "           > How MAny Years Of EXP. ?</option>
            <option value="1"    >0-1</option>
            <option value="2"     >1-2</option>
            <option value="3"     >2-3</option>
            <option value="4"     >4-5</option>
        </select>
    </div>


    <div class="col-md-6">
        <select id="inputState" class="form-select" name = "time">
            <option value=" "           >What Types Of Job ?</option>
            <option value="full_time"    >Full Time</option>
            <option value="part_time"     >Part Time</option>
        </select>
    </div>
    

    <div class="input-group">
        <span class="input-group-text">About Your Skills !</span>
        <textarea class="form-control" aria-label="With textarea" name="details"></textarea>
    </div>
    
  <!--  <div class="saso">
              Upload your cv :  <input type="file" id="myFile" name="filename">
    </div> -->  
        <div class="btn">
           <button type="submit" class="btn btn-primary" name="update" value="update"> Update Your Profile </button>
        </div>
      
      <div class="email">
        <input type="text" class="form-control" placeholder="Email contact" aria-label="Recipient's username" aria-describedby="basic-addon2" name="contact" value="<?php echo $user_email ?>" readonly>
        <span class="input-group-text" id="basic-addon2">@example.com</span>
    </div> 
</form>
    </div>
</body>
</html>





<?php
include 'includes/footer.html';
?>                 