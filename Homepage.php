<?php
include 'database.php';
session_start();
$username=$_SESSION['user'];
if(empty($username)){
    header("location:index.php");
}
$fr="select count(*) from usertable where username='".$username."' and type='form'";

$fr2=mysqli_query($con,$fr);

$count=mysqli_fetch_array($fr2);
if(!empty($count)){
$count2=$count['count(*)']+1;
}
else{
    $count2=1;
}
$quizz=$username."_form".$count2;


/*while($rows=mysqli_fetch_array($fr2)){
    $fr3=$rows['tablename'];
    echo "ent in array :- ".$fr3;
    $fr3=str_replace($username."_form", "", $fr3);

$n=intval($fr3)+1;
$quizz=$username."_form".$n;
}
*/



$w="create table ".$quizz." (Q_no int(3) primary key auto_increment,type varchar(8), contents varchar(400), points tinyint(4))";

$token=random_bytes(10);
$token2=bin2hex($token);
$w2="insert into usertable(type,tablename,username,token) values('form','".$quizz."','".$username."','".$token2."')";

//$quizname=openssl_encrypt($quizz, 'AES-128-ECB', "SECRET");
//echo $quizz;
 $size="select sum(round(((data_length + index_length) /1024 /1024),2)) 'size' from information_schema.TABLES where table_schema='mydatabase' and table_name in (select tablename from usertable where username='".$username."')";
$size2=mysqli_query($con,$size);

$size3=mysqli_fetch_array($size2);

$size4=$size3['size'];

$_SESSION['size']=$size4;
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Classregister - Homepage</title>
    <meta name="robots" content="noindex, nofollow"/>
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
    <!--<link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    !--><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean-1.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean-2.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">
   <link rel="stylesheet" href="assets/css/untitled.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <style type="text/css">
       .s{
        color: blue;
        background: transparent;
        border-radius: 2px;
        border-color: white;
       }
       #homepageimage {
  width: 500px;
  height: 350px;
  margin-top: 50px;
}
#homepagecontainer{
    max-width: 100%;
    
}
img {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);width: auto;
  
}
body{
  background: linear-gradient(-45deg, #ff99ff, #ff99cc , #958ff2 , #ffbf80);
  background-size: 400% 400%;
    animation: gradient 15s ease infinite;
}
@keyframes gradient {
    0% {
        background-position: 0% 70%;
    }
    50% {
        background-position: 50% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}
#homejumbo {
  margin-top: 20px;
  background: rgb(255,255,255,0.75);
}
   </style>
   <script type="text/javascript">
       function createquiz(af){
        
        location.href="quizcode.php?q="+af;
       }
   </script>
   <script type="text/javascript">
       function display(af){
        
        alert(af);
       }
   </script>
</head>

<body>
    <!-- Start: Navigation Clean -->
    <nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container"><a class="navbar-brand" href="#" style="font-family: Amita, cursive;font-size: 22px;">classregister</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="Homepage.php" style="font-family: Amita, cursive;color: var(--dark);">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="Myrecords.php" style="font-family: Amita, cursive;color: var(--dark);">My Records</a></li>
                    <li class="nav-item"><a class="nav-link" href="myaccount.php" style="font-family: Amita, cursive;color: var(--dark);">My Account</a></li>
                    <li class="nav-item"><a class="nav-link" href="signout.php" style="font-family: Amita, cursive;color: var(--white);background: var(--purple);">Sign Out</a></li>
                </ul>
            </div>
        </div>
    </nav><!-- End: Navigation Clean -->
    <!-- Start: 1 Row 2 Columns -->
    <div class="container" id="homepagecontainer">
        <div class="row">
            <div class="col-md-6">
                <div class="jumbotron" id="homejumbo">
                    <form method="POST" enctype="multipart/form-data">
                    <p style="font-family: Amita, sans-serif; font-size: 24px;">Attendance</p>
                    <p style="font-size: 18px;font-family: ABeeZee, sans-serif;">To take new attendance&nbsp;<a href="<?php echo 'attendance.php'; ?>">click here</a>&nbsp;</p>
                    <p style="font-family: Amita, sans-serif; font-size: 24px;">Quiz</p>
                    <p style="font-size: 18px;font-family: ABeeZee, sans-serif;">To create a new quiz&nbsp;<button type="submit" name="submit"  class="s">click here</button>&nbsp;</p>
                    <p style="font-family: Amita, sans-serif;font-size: 24px;">Tables</p>
                    <p></p>
                    <p style="font-size: 18px;font-family: ABeeZee, sans-serif;">To create and edit tables of the responses&nbsp;<a href="Myrecords.php">click here</a>&nbsp;</p>
                </form>
                </div>
            </div>
            <div class="col-lg-4"><img id="homepageimage" src="assets/img/Login.png" /></div>
        </div>
    </div><!-- End: 1 Row 2 Columns -->
    <p class="copyright" style="text-align: center;color: var(--gray);">classregister © 2021. All rights are reserved.</p>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    mysqli_query($con,$w);
    mysqli_query($con,$w2);
     
    //echo "<script>display('".$quizz."');</script>";
    echo "<script type='text/javascript'>createquiz('".$token2."');</script>";

}

?>