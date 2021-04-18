<?php
session_start();
include 'database.php';
$table=$_GET['t'];
if(empty($_SESSION['user'])){
    header("location:index.php");
}
$username=$_SESSION['user'];
$r="select tablename from usertable where token='".$table."'";
$r2=mysqli_query($con,$r);
$r3=mysqli_fetch_array($r2);
$tablename=$r3['tablename'];
//$tablename=openssl_decrypt($table, 'AES-128-ECB', "SECRET");
//echo "val is ".openssl_decrypt($table, 'AES-128-ECB', "SECRET");
$tabledisplayname= str_replace($username."_", "", $tablename);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    
    <title>Classregister - ViewAttendance</title>
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
    <script>
        
        function errormsg(){
            swal("", "Sorry, couldn't make the changes", "error");
        }
    </script>
    <style type="text/css">
        a:hover {
            color: white;
        }
        .printlink{
           color: white;
            

        }
    </style>
</head>

<body>
    <!-- Start: Navigation Clean -->
    <nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container"><a class="navbar-brand" href="#" style="font-family: Amita, cursive;">classregister</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="Homepage.php" style="font-family: Amita, cursive;color: var(--dark);">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="Myrecords.php" style="font-family: Amita, cursive;">My Records</a></li>
                    <li class="nav-item"><a class="nav-link" href="myaccount.php" style="font-family: Amita, cursive;color: var(--dark);">My Account</a></li>
                    <li class="nav-item"><a class="nav-link" href="signout.php" style="font-family: Amita, cursive;color: var(--white);background: var(--purple);">Sign Out</a></li>
                </ul>
            </div>
        </div>
    </nav><!-- End: Navigation Clean -->
    <div>
        <div class="jumbotron" id="viewtablesjumbo">
            <h2 style="font-family: Actor, sans-serif;color: var(--gray-dark);"><?php echo $tabledisplayname; ?></h2>
            <form method="POST" enctype="multipart/form-data">
                <br>
            <p style="font-family: ABeeZee, sans-serif;font-size: 18px;text-align: left;"><u>To delete a particular column:</u></p>

            <p style="font-size: 18px;font-family: ABeeZee, sans-serif;">Select the column:&nbsp;
                <select id="columnlist" name="columnlist" style="width: 100px;">
                    <?php
                        $at="select * from ".$tablename;
                        $at2=mysqli_query($con,$at);
                        $at3=mysqli_fetch_assoc($at2);
                        $at4=array_keys($at3);

                        for($i=1;$i<count($at4);$i++){

                    ?>
                    <option value="<?php echo $at4[$i];  ?>"><?php echo $at4[$i]; ?></option>
                    <?php

                }
                ?>
                </select><button style="margin-left: 20px;" name="update" class="btn btn-primary" type="submit" value="delete">DELETE</button></p>
                <br>
            <p style="font-family: ABeeZee, sans-serif;font-size: 18px;text-align: left;"><u>To change the attendance of a particular student:</u></p>

            <p style="font-size: 18px;font-family: ABeeZee, sans-serif;">Select the name of student:&nbsp;
                <select id="studentlist" name="studentlist"  style="width:100px;">
                    <?php
                        $w="select name from ".$tablename;
                        $w2=mysqli_query($con,$w);
                        while($rows=mysqli_fetch_array($w2)){
                    ?>
                        <option value="<?php echo $rows['name']; ?>" >
                            <?php echo $rows['name']; ?></option>
                    <?php

                        }
                
                    ?>
                        
                   
                </select></p>
            <p style="font-size: 18px;font-family: ABeeZee, sans-serif;">Select the date:&nbsp;<input type="date" name="date"></p>
            <p style="font-size: 18px;font-family: ABeeZee, sans-serif;">Change attendance to (P/A)<input type="text" maxlength="1" name="attchange" >&nbsp;<input  class="btn btn-primary" data-bss-hover-animate="tada" name="update" type="submit" value="UPDATE"><button   id="print-btn" class="btn btn-primary" style="margin-left: 50px;" ><a class="printlink" href="<?php echo "print.php?t=".$table; ?>">Print</a></button></p>
            <p style="text-align: center;">
</p>
        </form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
<?php
if (isset($_POST['update'])){
if($_POST['update']=='delete'){
if(isset($_POST['columnlist'])){
    $column=$_POST['columnlist'];
    $qu="alter table ".$tablename." drop column ".$column;
    $qu2=mysqli_query($con,$qu);

}
}
else{
if(isset($_POST['studentlist']) and isset($_POST['attchange']) and isset($_POST['date'])){
$date=strtotime($_POST['date']);
$date2=getdate($date);
$mday=$date2['mday'];
$month=$date2['month'];
$column=$mday."_".$month;
$at=mysqli_real_escape_string($con,$_POST['attchange']);
if(isset($_POST['studentlist'])){
$student=$_POST['studentlist'];
//echo $tablename;
$q="update ".$tablename." set ".$column."='".$at."' where name='".$student."'";
//echo $q;
if(mysqli_query($con,$q)){

}
else{
    echo "<script>errormsg();</script>";
}
}

}
}
}
?>
<?php


$query="select * from ".$tablename." where 1";
$result=mysqli_query($con, $query);
if (mysqli_num_rows($result)<1) echo "Table is empty";
else
{
   $row=mysqli_fetch_assoc($result);
   echo '<table class="table table-bordered">';
   echo "<tr>";
   echo "<th>".join("</th><th>",array_keys($row))."</th>";
   echo "</tr>";

   while ($row)
   {
       echo "<tr>";
       echo "<td>".join("</td><td>",$row)."</td>";
       echo "</tr>";
       $row=mysqli_fetch_assoc($result);
   }

   echo "</table>";
}
?>
<p class="copyright" style="margin-top:20px;text-align: center;color: var(--gray);">classregister © 2021. All rights are reserved.</p>
</body>
</html>