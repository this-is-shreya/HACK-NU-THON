<?php
session_start();
$username=$_SESSION['user'];
if(empty($username)){
    header("location:index.php");
}
include 'database.php';
$a="select email from signup where username='".$username."'";
$a2=mysqli_query($con,$a);
$a3=mysqli_fetch_array($a2);
$a4=$a3['email'];

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Classregister - MyAccount</title>
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
        function deletetables(){
            swal({
  text: "Are you sure?",
  
  icon: "warning",
  buttons: ['Cancel', 'Continue']
})
.then((willDelete) => {
  if (willDelete) {
    location.href='myaccountdelete.php';
  } 
});      
        }
    </script>
</head>

<body>
    <!-- Start: Navigation Clean -->
    <nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container"><a class="navbar-brand" href="#" style="font-family: Amita, cursive;">classregister</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="Homepage.php" style="font-family: Amita, cursive;color: var(--dark);">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="Myrecords.php" style="color: var(--dark);font-family: Amita, cursive;">My Records</a></li>
                    <li class="nav-item"><a class="nav-link" href="myaccount.php" style="color: var(--dark);font-family: Amita, cursive;">My Account</a></li>
                    <li class="nav-item"><a class="nav-link" href="signout.php" style="color: var(--white);font-family: Amita, cursive;background: var(--purple);">Sign Out</a></li>
                </ul>
            </div>
        </div>
    </nav><!-- End: Navigation Clean -->
    <div id="myaccount">
        <div class="jumbotron" id="myaccountjumbo">
            <h3 id="heading" style="font-family: Amita, cursive;"><span style="text-decoration: underline;">My Account</span></h3>
            <h5 id="heading-1" style="font-family: ABeeZee, sans-serif;">Your Profile&nbsp; &nbsp; &nbsp;<img id="myaccountprofile" src="assets/img/undraw_Profile_data_re_v81r.png" /></h5>
            <p style="margin-left: 60px;font-size: 18px;">Email ID:&nbsp;<label><?php echo $a4; ?></label></p>
            <p id="usernamemyaccount" style="font-size: 18px;">Username:&nbsp;&nbsp;<label><?php echo $_SESSION['user']; ?></label></p>
            <p>To delete your account, click here--&gt;<button class="btn btn-primary" onclick="deletetables()" name="submit" style="background: var(--red);box-shadow: 0px 0px;">Delete</button></p>
            <p style="margin-top: 10px;">For any queries, contact us at: contact@classregister.in</p>
        </div>
    </div>
    <p class="copyright" style="margin-top:20px;text-align: center;color: var(--gray);">classregister © 2021. All rights are reserved.</p>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
</body>

</html>
