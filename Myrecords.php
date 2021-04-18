<?php
session_start();
include 'database.php';
if(empty($_SESSION['user'])){
    header("location:index.php");
}
$username=$_SESSION['user'];
/*
$q="select tablename from usertable where username='".$username."' and type='form'";
$q2=mysqli_query($con,$q);
$q3="0";
$quiz="";
$n=0;
while($rows=mysqli_fetch_array($q2)){
    $q3=$rows['tablename'];
    $q3=str_replace($username."_form", "", $q3);
}


$n=intval($q3)+1;
$quiz=$username."_form".$n;




$w="create table ".$quiz."(Q_no int(3) primary key auto_increment,type varchar(8), contents varchar(400), points tinyint(4))";
$w2="insert into usertable(type,tablename,username,token) values('form','".$quiz."','".$username."','".$token2."')";
//$quizname=openssl_encrypt($quiz, 'AES-128-ECB', "SECRET");
*/

$a="select tablename from usertable where username='".$username."'";
$b=mysqli_query($con,$a);
$c=array();
while($row=mysqli_fetch_array($b)){
$s="'".$row['tablename']."'";
array_push($c, $s);
}
$k=implode(',', $c);
//$size="select sum(round(((data_length + index_length) /1024 /1024),2)) 'size' from information_schema.TABLES where table_schema='classhvj_mydatabase' and table_name in (select tablename from usertable where username='".$username."')";

$size="select sum(round(((data_length + index_length) /1024 /1024),2)) 'size' from information_schema.TABLES where table_schema='classhvj_mydatabase' and table_name in (".$k.")";
$size2=mysqli_query($con,$size);


$size3=mysqli_fetch_array($size2);

if($size3['size']!="")
$size4=$size3['size'];
else
$size4=0;

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Classregister - MyRecords</title>
    <meta name="robots" content="noindex, nofollow"/>
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abhaya+Libre">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aguafina+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alex+Brush">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Almendra+SC">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amita">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bree+Serif">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean-1.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean-2.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/untitled.css">

<script type="text/javascript">
       function createquiz(af){
        
        location.href="quizcode.php?q="+af;
       }
   </script>

   <style type="text/css">
       .c{
        color: blue;
        background: transparent;
        border-radius: 2px;
        border-color: white;
       }
       
       @media only screen and (max-width: 600px) {
  #myrecords {
    width:100%;
  }
  #myrec{
      width:100%;
  }
  #jumborecord{
      width:100%;
  }
}
   </style>
   
   
    <style>


/* Button used to open the chat form - fixed at the bottom of the page */
.open-button {
  background:linear-gradient(-45deg, #800080, #b366ff, #4da6ff, #ffffe6);
  background-size: 400% 400%;

  animation: gradient 18s ease infinite;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 1;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}
@keyframes gradient {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 10% 50%;
  }
}
/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}


/* Add a red background color to the cancel button */
.form-container .cancel {
  background:linear-gradient(-45deg, #ffffe6, #004de6, #23a6d5, #23d5ab);
  background-size: 400% 400%;
  animation: gradient 15s ease infinite;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 1;
  
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
<style>
.collapsible {
  background-color: #777;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

.active, .collapsible:hover {
  background-color: #555;
}

.content {
  padding: 0 18px;
  display: none;
  overflow: hidden;
  background-color: #f1f1f1;
}
</style>
</head>

<body>
    <!-- Start: Navigation Clean -->
    <nav class="navbar navbar-light navbar-expand-md border rounded-0 navigation-clean-button">
        <div class="container"><a class="navbar-brand" href="#" style="font-family: Amita, cursive;">classregister</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="Homepage.php" style="font-family: Amita, cursive;color: var(--dark);">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="Myrecords.php" style="color: var(--dark);font-family: Amita, cursive;">My Records</a></li>
                    <li class="nav-item"><a class="nav-link" href="myaccount.php" style="font-family: Amita, cursive;color: var(--dark);">My Account</a></li>
                    <li class="nav-item"><a class="nav-link" href="signout.php" style="color: var(--white);font-family: Amita, cursive;background: transparent; color:purple;"><strong>Sign Out</strong></a></li>
                </ul>
            </div>
        </div>
    </nav><!-- End: Navigation Clean -->
    <div id="myrec">
        <div class="jumbotron" style="text-align: left;background: rgba(255,255,255,0.75);" id="jumborecord">
            <!-- Start: 1 Row 2 Columns -->
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <?php  echo "Memory used <progress value=".$size4." max='10'></progress> ".$size4."MB of 10MB"; ?>

                        <h3 style="font-family: Amita, cursive;color: var(--dark);margin-top: 40px;">Attendance</h3><button class="btn btn-primary" style="background-color: transparent; float: right;"><a href="deletetables.php">Delete Tables</a></button><br>
                        <br>
                        <br>
                        <?php
                            $q="select tablename,date,token from usertable where username='".$_SESSION['user']."' and type='attendance'";
                            $q2=mysqli_query($con,$q);
                            if(!(mysqli_num_rows($q2))<1){
                                echo '<table class="table table-bordered">';
                                echo '<tr><th>Table name</th><th>Date</th></tr>';
                                while($rows=mysqli_fetch_array($q2)){
                                    

                                    $name=str_replace($_SESSION['user']."_","", $rows['tablename']);
                                    //$tablename=openssl_encrypt($rows['tablename'],'AES-128-ECB', "SECRET");
                                    echo '<tr><td><a href="view.php?t='.$rows['token'].'">'.$name.'</a></td>';
                                    echo '<td>'.$rows['date'].'</td></tr>';
                                }
                                echo "</table>";
                            }

                        ?>
                       <br>
                        <h3 style="font-family: Amita, cursive;color: var(--dark);">Quiz</h3><!--<form method="POST"><button type="submit" name="submit" value="createquiz" class="c">+Create quiz</button></form>!-->
                        <br>
                        <?php
                            $qq="select tablename,date from usertable where username='".$_SESSION['user']."' and type='form'";
                            $qq2=mysqli_query($con,$qq);
                            if((mysqli_num_rows($qq2))>=1){
                                echo '<table class="table table-bordered">';
                                echo '<tr><th>Table name</th><th>Date</th></tr>';
                                
                                while($rows=mysqli_fetch_array($qq2)){
                                    $r4=$rows['tablename'];
                                    $r="select contents from ".$r4." where type='title'";
                                
                                    $rr=mysqli_query($con,$r);
                                    $r3="";
                                    if(mysqli_query($con,$r)){
                                        while($ans=mysqli_fetch_array($rr)){
                                            $r3=$ans['contents'];
                                        }
                                    if($r3==""){
                                        $r3="untitled";
                                        $r5="update ".$rows['tablename']." set contents='untitled' where type='title'";
                                        mysqli_query($con,$r5);
                                        //if(mysqli_query($con,$r5))
                                        //echo "done title";
                                    }
                                    $ss="select token from usertable where tablename='".$rows['tablename']."'";
                                    $ss2=mysqli_query($con,$ss);
                                    $ss3=mysqli_fetch_array($ss2);
                                    $tablename=$ss3['token'];
                                    //$tablename=openssl_encrypt($rows['tablename'],'AES-128-ECB', "SECRET");

                                    echo '<tr><td><a href="viewmyquiz.php?quiz='.$tablename.'">'.$r3.'</a></td>';
                                    echo '<td>'.$rows['date'].'</td></tr>';
                                }
                                    
                                    
                                }
                                echo "</table>";
                            }

                        ?>
                        <br>
                        <h3 style="font-family: Amita, cursive;color: var(--dark);">Tables</h3>
                       <br>
                       <?php
                            $q="select tablename,date,token from usertable where username='".$_SESSION['user']."' and type='result'";
                            $q2=mysqli_query($con,$q);
                            if(!(mysqli_num_rows($q2))<1){
                                echo '<table class="table table-bordered">';
                                echo '<tr><th>Table name</th><th>Date</th></tr>';
                                while($rows=mysqli_fetch_array($q2)){
                                    
                                    $name2=explode("_",$rows['tablename']);
                                    $name=$name2[2];
                                    $name=$name."_result";
                                    $tablename=$rows['token'];
                                    echo '<tr><td><a href="viewtables.php?table='.$tablename.'">'.$name.'</a></td>';
                                    echo '<td>'.$rows['date'].'</td></tr>';
                                }
                                echo "</table>";
                            }

                        ?>
                        <p style="font-family: ABeeZee, sans-serif;font-size: 18px;">To join the tables above,&nbsp;<a href="jointables.php">click here</a></p>
                    </div>
                    <div class="col-md-6"><img id="myrecords" src="assets/img/undraw_notes1_cf55.png"/></div>
                </div>
            </div><!-- End: 1 Row 2 Columns -->
        </div>
    </div>
    <p class="copyright" style="margin-top:20px;text-align: center;color: var(--gray);">classregister © 2021. All rights are reserved.</p>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    
     <button class="open-button" onclick="openForm()" style="font-family: Actor;">Chat</button>


<div class="chat-popup" id="myForm">
  <form  class="form-container">
    <h3 style="font-family: Actor;">Hi <?php echo $username."!"; ?></h3>
<h5 style="font-family: Actor;">How may we help you?</h5>
<button type="button" class="collapsible" >How do I join the results of different quizzes?</button>
<div class="content">
  <p>Click on the respective quizzes under quiz section, go to 'View Responses' and click on 'Create Result Table'.</p>
  <p>After you have created the result tables of the required quizzes, simply click on the link under Tables section, select the required tables and click on 'Join Tables'.</p>
  <p>You may click on 'Print' to save the data for future reference</p>
  
</div>
<button type="button" class="collapsible">I had created a quiz, but when I click on it I don't see any of my questions</button>
<div class="content">
  <p>You may have forgotten to click on 'Save'. The quiz gets saved only when you click on 'Save'.</p>
</div>
 
<button type="button" class="collapsible">Others</button>
<div class="content">
  <p>If you face any other issues, please contact us at contact@classregister.in. We'll revert back to you within 48 hours. </p>
</div>
<br>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

    
</body>

</html>
<?php
/*
if(isset($_POST['submit'])){
    mysqli_query($con,$w);
    mysqli_query($con,$w2);
    echo "<script type='text/javascript'>createquiz('".$token2."');</script>";

}
*/
?>