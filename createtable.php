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
    <title>Classregister - CreateTable</title>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        
        function success(){
           swal("Data saved successfully!", "To view table, go to My Records-->Attendance", "success");
        }
        function tablexists(){
            swal("","You have already created a table with this name","warning");
        }
        function rules(){
            swal("","Please make use of ONLY alphabets, numbers or '_' in the table name","warning");
        }
    </script>
</head>

<body style="height: 600px;">
    <!-- Start: Navigation Clean -->
    <nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container"><a class="navbar-brand" href="#" style="font-family: Amita, cursive;">classregister</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link" href="Homepage.php" style="font-family: Amita, cursive;color: var(--dark);">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="Myrecords.php" style="color: var(--dark);font-family: Amita, cursive;">My Records</a></li>
                    <li class="nav-item"><a class="nav-link" href="myaccount.php" style="color: var(--dark);font-family: Amita, cursive;">My Account</a></li>
                    <li class="nav-item"><a class="nav-link" href="signout.php" style="font-family: Amita, cursive;color: var(--white);background: var(--purple);">Signout</a></li>
                </ul>
            </div>
        </div>
    </nav><!-- End: Navigation Clean -->
    <div id="createtable" style="height: 600px;">
        <div class="jumbotron" id="jumbocreate" style="text-align: center;height: 500px;">
            <h3 id="createtableheader" style="font-family: ABeeZee, sans-serif;">Create a table to store data</h3>
            <form method="POST">
            <p id="nameofthetable" style="font-family: ABeeZee, sans-serif;font-size: 18px;">Name of the table:&nbsp;<input type="text" name="table" maxlength="19" required></p>
            <p style="font-size: 18px;font-family: ABeeZee, sans-serif;">Select a date for this attendance:&nbsp;<input type="date" name="date" required></p>
            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<input type="submit" class="btn btn-primary"  value="Create Table" name="submit" style="font-family: ABeeZee, sans-serif;"></p>
        </form>
            
            
        </div>
    </div>
      <p class="copyright" style="text-align: center;color: var(--gray);">classregister © 2021. All rights are reserved.</p>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
</body>
<?php
include 'database.php';
if(isset($_POST['submit'])){
    
    //echo "user is ".$_SESSION['user']."<br>";
    $table=mysqli_real_escape_string($con,$_POST['table']);
    $t2=str_replace("_","",$table);
    if(ctype_alnum($t2)){
$tablename=$_SESSION['user']."_".$table;
$q="select tablename from usertable where tablename='".$tablename."'";
$q2=mysqli_query($con,$q);
$a=strtotime($_POST['date']);
$b=getdate($a);
$mday=$b['mday'];
$month=$b['month'];
$date=$mday."_".$month;
$allstudents=$_SESSION['allstudents'];
$absentees=$_SESSION['absentees'];

if(empty(mysqli_fetch_array($q2))){
    $c="create table ".$tablename." (Name varchar(100),".$date." char(1) default 'P')";
    mysqli_query($con,$c);
   $tablehash=password_hash($tablename, PASSWORD_BCRYPT);
    $add="insert into usertable(type,tablename,username,token) values('attendance','".$tablename."','".$_SESSION['user']."','".$tablehash."')";
    mysqli_query($con,$add);
    $s="";
    for($i=0;$i<count($allstudents);$i++){
        if(in_array($allstudents[$i], $absentees)){
            $s ="insert into ".$tablename." values('".$allstudents[$i]."','A')";
            mysqli_query($con,$s);
        }
        else{
            $s ="insert into ".$tablename." values('".$allstudents[$i]."','P')";
            mysqli_query($con,$s);
        }

    }
    
        echo "<script>success();</script>";
    

    }
    else{
        echo "<script>tablexists();</script>";
    }
}
else{
    echo "<script>rules();</script>";
}
}

?>
</html>