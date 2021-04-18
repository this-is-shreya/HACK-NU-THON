<?php
session_start();
$username=$_SESSION['user'];
include 'database.php';
if(empty($_SESSION['user'])){
    header("location:index.php");
}
$table=$_GET['table'];
$r="select tablename from usertable where token='".$table."'";
$r2=mysqli_query($con,$r);
$r3=mysqli_fetch_array($r2);
$tablename=$r3['tablename'];
//$tablename=openssl_decrypt($table, 'AES-128-ECB', "SECRET");
$name2=explode("_", $tablename);
$name=$name2[2];
$name=$name."_result";

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Classregister - Tables</title>
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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<style type="text/css">
		#myrec{
			height: 100%;
      font-size: 18px;
		}
    #print-btn{
      background: transparent;
     border-width: 0 0 0px;

    }
	</style>
<script type="text/javascript">
	function errormsg(){
            swal("", "Sorry, couldn't make the changes", "error");
        }

        function gotoprint(){
            location.href='print.php';
        }

        function reload(){
          window.location.href=window.location.href;
        }
</script>
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
        	<h3 style="font-family: Amita, cursive;color: var(--dark);"><?php echo $name; ?></h3>
<form method="POST">
<p><u>To add a student's record:</u></p>
<p>Enter the student's name:<input type="text" name="entertext" id="entertext"><button type="submit" name="submit" value="enter" class="btn btn-primary" onclick="read()" >ADD</button>
</p>

<p><u>To delete a student's record: </u></p>
<p>Select the student's name:<select name="deleteselect" id="deleteselect">
	<?php
	$n="select name from ".$tablename;
	$n2=mysqli_query($con,$n);
	if(mysqli_query($con,$n)){
		while($ro=mysqli_fetch_array($n2)){

	?>
	<option value="<?php echo $ro['name']; ?>"><?php echo $ro['name']; ?></option>
<?php
}
}
?>
</select>
<p>Select the marks obtained : <select name="deletesno" id="deletesno">
  <?php
  $n="select ".$name2[2]." from ".$tablename;
  $k=$name2[2];
  $n2=mysqli_query($con,$n);
  if(mysqli_query($con,$n)){
    while($ro=mysqli_fetch_array($n2)){

  ?>
  <option value="<?php echo $ro[$k]; ?>"><?php echo $ro[$k]; ?></option>
<?php
}
}
?>
</select>

<button type="submit" name="submit" value="delete" class="btn btn-primary" onclick="fordelete()">DELETE</button>
</p>
<p style="text-align: left;">
<button   id="print-btn" ><a href="<?php echo "print.php?t=".$table; ?>">Print</a></button></p>
</form>


</div>
</div>
<?php 
if(isset($_POST['submit'])){
	if($_POST['submit']=='enter'){
   
		$text=mysqli_real_escape_string($con,$_POST['entertext']);
		$q="insert into ".$tablename."(name,".$name2[2].") values('".$text."',0)";
  echo $q;
		if(mysqli_query($con,$q)){
      echo "<script>reload();</script>";
		}
		else{
			echo "<script>errormsg();</script>";
		}
	}
	if($_POST['submit']=="delete"){
		$del=$_POST['deleteselect'];
    $sno=$_POST['deletesno'];

    if(isset($del) and isset($sno)){
      //$colname=str_replace($username."_", "", $tablename);
		$colname=$name2[2];
    $q2="delete from ".$tablename." where name='".$del."' and ".$name2[2]."=".$sno;
    
		//$q3="create table ".$username."dummy (S_no int(3) auto_increment primary key, Name varchar(100),".$colname." int(3))";
    //echo $q3;
    //$q4="insert into ".$username."dummy (Name,".$colname.") select Name,".$colname." from ".$tablename;
    
    //$q5="drop table ".$tablename;

    //$q6="alter table ".$username."dummy rename to ".$tablename;
  mysqli_query($con,$q2);
    /*mysqli_query($con,$q3);
    mysqli_query($con,$q4);
    mysqli_query($con,$q5);
    mysqli_query($con,$q6);
*/
	echo "<script>reload();</script>";
			//echo "<script>errormsg();</script>";
		
  }
	}
}


?>
<?php
$s="select * from ".$tablename." order by name";
$s2=mysqli_query($con,$s);
if(mysqli_query($con,$s)){
if (mysqli_num_rows($s2)<1) echo "Table is empty";
else
{
   $row=mysqli_fetch_assoc($s2);
   echo '<table class="table table-bordered">';
   echo "<tr>";
   echo "<th>".join("</th><th>",array_keys($row))."</th>";
   echo "</tr>";

   while ($row)
   {
       echo "<tr>";
       echo "<td>".join("</td><td>",$row)."</td>";
       echo "</tr>";
       $row=mysqli_fetch_assoc($s2);
   }

   echo "</table>";
}
}

?>
 <p class="copyright" style="margin-top:150px;text-align: center;color: var(--gray);">classregister © 2021. All rights are reserved.</p>
</body>
</html>