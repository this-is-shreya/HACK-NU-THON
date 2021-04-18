<?php
include 'database.php';
session_start();
if(empty($_SESSION['user'])){
    header("location:index.php");
}
$username=$_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Classregister - JoinTables</title>
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
	<title>Tables</title>

	<style type="text/css">
		#myrec{
			height: 100%;
      font-size: 18px;
		}
   

    #print-btn{
background-color: transparent;
    }
	</style>

</head>
<body><nav class="navbar navbar-light navbar-expand-md navigation-clean">
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
    <div id="myrec">
        <div class="jumbotron" style="text-align: left;background: rgba(255,255,255,0.75);">
        	<h3 style="font-family: Amita, cursive;color: var(--dark);">List of Tables</h3>
	<form method="POST" enctype="multipart/form-data">

<?php

$w="select tablename from usertable where username='".$username."' and type='result'";

$w2=mysqli_query($con,$w);
//$w3=mysqli_fetch_array($w2);

if(mysqli_query($con,$w)){
  

while($rowss=mysqli_fetch_array($w2)){
	//$name=str_replace($username."_", "", $rowss['tablename']);
$name2=explode("_",$rowss['tablename']);
$name=$name2[2];
$name=$name."_result";

?>
<input type="checkbox" name="c[]" value="<?php echo $rowss['tablename']; ?>"><?php echo $name; ?>
		<br>
<?php
}
}


?>
<button type="submit" name="submit" class="btn btn-primary">Join Tables</button>
<button  id="print-btn" class="btn btn-primary" style="margin-left: 50px;" ><a class="printlink" href="printjointables.php">Print</a></button>
</form>
<br>
<p style="font-size: 13px;">If you observe more or less number of records than expected, after joining tables, it maybe because the tables you selected didn't have equal number of records</p> 
</div>
</div>
<?php
if(isset($_POST['submit']))
{
  if(isset($_POST['c'])){
    $tables=$_POST['c'];
    //print_r($tables);
    $s="select * from ".$tables[0];

    if(count($tables)>2){
    for($i=1;$i<count($tables)-2;$i=$i+1){
        $s=$s." natural join ".$tables[$i];
    }
  }
    $s=$s." natural join ".$tables[count($tables)-1];

    //echo $s;
    $_SESSION['query']=$s;
$e=mysqli_query($con,$s);
if(mysqli_query($con,$s)){
  if (mysqli_num_rows($e)<1) echo "Table is empty";
else
{
   $row=mysqli_fetch_assoc($e);
   echo '<table class="table table-bordered">';
   echo "<tr>";
   echo "<th>".join("</th><th>",array_keys($row))."</th>";
   echo "</tr>";

   while ($row)
   {
       echo "<tr>";
       echo "<td>".join("</td><td>",$row)."</td>";
       echo "</tr>";
       $row=mysqli_fetch_assoc($e);
   }

   echo "</table>";
}
}
}
}
?>
 <p class="copyright" style="margin-top:100px;text-align: center;color: var(--gray);">classregister © 2021. All rights are reserved.</p>
</body>
</html>