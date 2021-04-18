<?php
session_start();
if(empty($_SESSION['user'])){
    header("location:index.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
   <title>Classregister - Attendance</title>
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
    function gotorecords(){
        swal("Memory full","Please go to My Records and delete a few tables to make some space.","info")
.then((willDelete) => {
  if (willDelete) {
    location.href='Myrecords.php';
  } 
});      
    }
</script>
    <script type="text/javascript">
    imageURL="video-to-gif-converter.gif";
    window.restartAnim = function () {
    img.src = "";
    img.src = imageUrl;
}


</script>
<style type="text/css">
    #attendance{
  background: linear-gradient(-45deg, #ff99ff, #ff99cc , #958ff2 , #ff9966);
  background-size: 400% 400%;
    animation: gradient 20s ease infinite;
}
@keyframes gradient {
    0% {
        background-position: 20% 70%;
    }
    50% {
        background-position: 50% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}
</style>
</head>

<body>
    <?php  
if($_SESSION['size']=='10.00'){
    echo "<script>gotorecords();</script>";
}
?>
    <!-- Start: Navigation Clean -->
    <nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container"><a class="navbar-brand" href="#" style="color: var(--dark);font-family: Amita, cursive;">classregister</a>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="Homepage.php" style="color: var(--dark);font-family: Amita, cursive;">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="Myrecords.php" style="font-family: Amita, cursive;color: var(--dark);">My Records</a></li>
                <li class="nav-item"><a class="nav-link" href="myaccount.php" style="font-family: Amita, cursive;color: var(--dark);">My Account</a></li>
                <li class="nav-item"><a class="nav-link" href="signout.php" style="color: var(--white);font-family: Amita, cursive;background: var(--purple);">Sign Out</a></li>
            </ul>
        </div>
    </nav><!-- End: Navigation Clean -->
    <div id="attendance">
        <div class="jumbotron" id="jumboattendance1">
            <form method="POST" action="<?php echo htmlspecialchars('processingforocr.php'); ?>" enctype="multipart/form-data">
            <h2 style=" font-family: Amita, cursive;">Attendance</h2>
            <p style="padding: 10px;font-size: 18px;font-family: ABeeZee, sans-serif;">Add the file (.txt) containing the names of all students.&nbsp;&nbsp;<input class="acceptfiles" type="file" name="file"  accept=".txt" value="Choose File" required></p><!-- Start: 1 Row 2 Columns -->
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-9">
                        <p style="font-family: ABeeZee, sans-serif;">Make sure that the names in the .txt file are the same as in the screenshot.<br><em>The names in the file should be separated by comma, as shown below.</em></p><img id="attendanceimage" src="assets/img/video-to-gif-converter.gif" />

                    </div>
                </div>
            </div><!-- End: 1 Row 2 Columns -->
            <p style="padding: 10px;font-size: 18px;font-family: ABeeZee, sans-serif;">Add the screenshot (.jpg,.png) of the list of participants in the meeting.&nbsp;&nbsp;<input type="file" class="acceptfiles"  name="screenshot" accept="image/*" value="Choose File" required></p>
            <p style="padding: 10px;font-size: 18px;font-family: ABeeZee, sans-serif;">Find out the names of absentees by clicking on the button --&gt;&nbsp;&nbsp;<input type="submit" name="submit"  class="btn btn-primary text-center" value="Click Here"></p>
        </form>
        </div>
    </div>
    <p class="copyright" style="text-align: center;color: var(--gray);">classregister © 2021. All rights are reserved.</p>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
</body>

</html>