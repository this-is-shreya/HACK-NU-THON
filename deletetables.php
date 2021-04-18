<?php
include 'database.php';
session_start();
if(empty($_SESSION['user'])){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Classregister - DeleteTables</title>
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
	<style type="text/css">
		#myrec{
			height: 100%;

		}
	</style>
    <script type="text/javascript">
        function reload(){
            swal({
  text: "Tables deleted!",
  
  icon: "info",
  button: 'Ok'
})
.then((willDelete) => {
  
    window.location.href=window.location.href;
    
  
});      
            
        }
    </script>
</head>
<body><nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container"><a class="navbar-brand" href="#" style="font-family: Amita, cursive;">Company Name</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
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
        	<h3 style="font-family: Amita, cursive;color: var(--dark);">Tables</h3>
	<form method="POST" enctype="multipart/form-data">
<?php
$username=$_SESSION['user'];
$q="select tablename from usertable where username='".$username."' and type='form'";
$q2=mysqli_query($con,$q);
if($q2){
while($r=mysqli_fetch_array($q2)){
	
$title="select contents from ".$r['tablename']." where type='title'";
$t=mysqli_query($con,$title);
$e=array();
if($t){
$e=mysqli_fetch_array($t);
}
?>


<input type="checkbox" name="c[]" value="<?php echo $r['tablename']; ?>"><?php if(!empty($e['contents'])) echo $e['contents']; else echo "untitled"; ?>
		<br>
<?php
}
}
?>
<?php
$w="select tablename from usertable where username='".$username."' and type='result'";
$w2=mysqli_query($con,$w);
if(mysqli_query($con,$w)){
	

while($rows=mysqli_fetch_array($w2)){
    $name2=explode("_",$rows['tablename']);
    $name=$name2[2];

	

?>
<input type="checkbox" name="c[]" value="<?php echo $rows['tablename']; ?>"><?php echo $name."_result"; ?>
		<br>
<?php
}
}

?>
<?php
$v="select tablename from usertable where username='".$username."' and type='attendance'";

$v2=mysqli_query($con,$v);
if(mysqli_query($con,$v)){
while($row=mysqli_fetch_array($v2)){
	
	$att=str_replace($username."_", "", $row['tablename']);

?>
<input type="checkbox" name="c[]" value="<?php echo $row['tablename']; ?>"><?php echo $att; ?>
		<br>
<?php
}
}
?>
<button type="submit" name="submit" class="btn btn-primary">Delete Tables</button>
</form>
</div>
</div>


<?php
if(isset($_POST['submit'])){
    $tables=array();
if(isset($_POST['c'])){
$tables=$_POST['c'];
}
$i=0;
if(count($tables)>0){
while($i<count($tables)){
	if(strpos($tables[$i], "form")){
		$a=$tables[$i]."responses";
		$b=$tables[$i]."answer";
		$u="drop table if exists ".$a;
		$o="drop table if exists ".$b;
		mysqli_query($con,$u);
		mysqli_query($con,$o);
		$r="delete from usertable where tablename='".$tables[$i]."'";
		mysqli_query($con,$r);
	}
	$s="drop table if exists ".$tables[$i];
	mysqli_query($con,$s);
	$rr="delete from usertable where tablename='".$tables[$i]."'";
		mysqli_query($con,$rr);
$i=$i+1;
}
echo "<script>reload();</script>";
}

}

?>
</body>
</html>