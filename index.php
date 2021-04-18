<?php

session_start();

?>

<!DOCTYPE html>
<html>

<head>
   <!-- <meta charset="utf-8"> !-->
    
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="keywords" content="how to take attendance of students online for free, how to take attendance of students and keep records online free, classregister.in, how to take quiz for free and join the result tables, quiz making site easy, a website for teachers, online attendance system for students free,how to take attendance of students online for free classregister.in, smarter ways of taking attendance for online classes, easiest method of taking quiz online, best online attendance app for teachers free, best online quiz app for teachers free, take attendance from screenshot of participants in online meeting and keep records, take attendance from screenshot of participants in zoom meeting and keep records of the same free, zoom meeting attendance, virtual meeting attendance, quiz maker that joins the results of quizzes or tests into one,  quiz maker that joins the results of quizzes or tests into one classregister, site that makes job easier for teachers, classregister, dream website for teachers that gets work done, best website for teachers to take attendance and quiz 2021 free, latest website for teachers 2021,best free online app for teaching 2021, how to take attendance online classregister.in, class register.in, class register india,class register">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
    <title>Classregister - Best Site for Teachers to Take Online Attendance and Conduct Quizzes for Free!</title>
    <meta name="description" content="Classregister is a website designed for teachers. Here you can find out who bunked your online class and keep records of the same, conduct quizzes online, create, edit and download marksheets.">
    <meta name="robots" contents="index, follow"/>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
    window.onload=function(){
        if(localStorage.getItem("webhits")=="undefined"){
            localStorage.setItem("webhits",0);
        }
        else{
            var w= localStorage.getItem("webhits");
             localStorage.setItem("webhits",+w + +1);
        }
        //alert( localStorage.getItem("webhits"));
    }
        function label(){
            
            swal("Invalid username or password","","warning");
        }
        function redirect(){
            
            location.href='Homepage.php';
          
        }
       function payment(){
            
            location.href='payment.php';
          
        }
    </script>
    
    <style>
    #demo{
        width:800px;
    }
    #video{
        width:500;
    }
    #img{
        width:400px;
    }
    #jk{
        width:480px;
    }
@media only screen and (max-width: 600px) {
  #demo {
    width: 100%;
  }
  #video{
      width:100%;
  }
  #jk{
      width:100%;
      height:350px;
  }
  #img{
      width:100%;
  }
}


/* Button used to open the chat form - fixed at the bottom of the page */
.open-button {
  background:linear-gradient(-45deg, #ffffe6, #e73c7e, #23a6d5, #23d5ab);
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
  background:linear-gradient(-45deg, #ffffe6, #e73c7e, #23a6d5, #23d5ab);
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
        <div class="container"><a class="navbar-brand" href="#" style="font-family: Amita, cursive;">classregister</a><a class="nav-link" href="Signup.php" style="font-family: Amita, cursive;color: var(--light);font-size: 18px;background: transparent; color: var(--purple); border-radius: 2px;border-color: var(--purple);"><strong>Sign Up</strong></a></div>
    </nav><!-- End: Navigation Clean -->
    <!-- Start: 1 Row 2 Columns -->
    <div class="container" id="indexcontainer1">
        <div class="row" id="row1index">
            <div class="col-md-6">
                <!-- Start: Login Form Clean -->
                <section class="login-clean">
                    <form method="POST">
                        <h2 class="sr-only">Login Form</h2>
                        <div class="illustration"><i class="icon ion-ios-navigate" style="background: var(--white);color: var(--purple);"></i>
                            <h1 style="font-family: Actor, sans-serif;color: var(--purple);">Login</h1>
                        </div>
                        <div class="form-group"><input class="form-control"  name="username" placeholder="Username"  style="font-family: 'Bree Serif', serif;" required></div>
                        <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" style="font-family: 'Bree Serif', serif;" required></div>
                        <div class="form-group"><input  class="btn btn-primary btn-block" type="submit" value="Log In"  name="login" style="color: var(--white);background: var(--purple);"></div><a class="forgot" href="forgotpassword.php">Forgot password?</a>
                        
                    </form>
                </section><!-- End: Login Form Clean -->
            </div>
            <div class="col-md-6"><img id="img" src="assets/img/Home%20Page.jpg" ></img>
</div>
        </div>
    </div><!-- End: 1 Row 2 Columns -->
    <div class="row">
        <div class="col-md-6" id="id">
            <div class="jumbotron" id="jk" ></div>
        </div>
        <div class="col-md-6">
            <div class="jumbotron" id="indexjumbo">
                <h2 style="font-family: 'Bree Serif', serif;">Welcome Teachers!</h2>
                <p style="font-family: 'Bree Serif', serif;font-size: 18px;">Here you can:</p>
                <p style="font-family: 'Bree Serif', serif;font-size: 18px;">Find out who bunked your online classes and keep records of the same.</p>
                <p style="font-size: 18px;font-family: 'Bree Serif', serif;">Conduct quizzes online.</p>
                <p style="font-family: 'Bree Serif', serif;font-size: 18px;">Create, edit and download marksheets.</p>
            </div>
        </div>
    </div>
    <div class="container site-section" id="demo">
        <h2 style="font-family: 'Bree Serif', serif;">New Here?</h2>
        <p style="font-family: 'Bree Serif', serif;">Don't know how to get started? Watch the DEMO below to get an idea.</p><video  height="340" id="video" controls>
  <source src="web video 2.mp4" type="video/mp4">
  <source src="movie.ogg" type="video/ogg">
  Your browser does not support the video tag.
</video>
    </div><!-- Start: Copyright -->
    <p class="copyright" style="text-align: center;color: var(--gray);">classregister © 2021. All rights are reserved.</p><!-- End: Copyright -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    
    <button class="open-button" onclick="openForm()" style="font-family: Actor;">Chat</button>

<div class="chat-popup" id="myForm">
  <form  class="form-container">
    <h3 style="font-family: Actor;">Welcome visitor!</h3>
<h5 style="font-family: Actor;">How may we help you?</h5>
<button type="button" class="collapsible">Will I have to pay for the services at any point of time?</button>
<div class="content">
  <p>No, the services are free.</p>
</div>
<button type="button" class="collapsible">Is there a subscription involved?</button>
<div class="content">
  <p>No, there's no subscription invloved. All the services are free!</p>
</div>
  <button type="button" class="collapsible">How do I get started?</button>
<div class="content">
  <p>Just SignUp and verify your email ID. After having done that, simply Login and start using the services provided by us.</p>
</div>
<button type="button" class="collapsible">I didn't receive any verification email after SignUp. What should I do?</button>
<div class="content">
  <p>Please check the spam folder of your email account. The settings of your email account might have redirected the verification email to spam.</p>
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
<?php

include('database.php');

if(isset($_POST['login'])){
    $username=mysqli_real_escape_string($con,$_POST['username']);
   
    $password=mysqli_real_escape_string($con,$_POST['password']);
    
$q="select password,status from signup where username='".$username."'";
$q3=array();
$q2="";
if(mysqli_query($con,$q)){
    //echo "ent here";
$q2=mysqli_query($con,$q);
//echo "q2 ".$q2."<br>";
$q3=mysqli_fetch_array($q2);
//print_r($q3);
$q4="";
if(!empty($q3)){

    $q4=$q3['password'];
    //echo "<br>ent here, q4 is ".$q4."<br>";

if(password_verify($password,$q4)){
       if($q3['status']=='active'){
    $_SESSION['user']=$username;
     echo '<script type="text/javascript">redirect();</script>';

}

}
else{
    echo '<script type="text/javascript">label();</script>';
}
}

else{
    
    echo '<script type="text/javascript">label();</script>';
}
}//query
}//if isset login



?>
</html>