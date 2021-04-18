
<!DOCTYPE html>
<html>
<head>
	<title></title>
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
   <!-- <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    !--><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean-1.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean-2.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
	function s(){
	swal({
  text: "Password changed successfully!",
  
  icon: "success",
  button:  'Ok'
})
.then((willDelete) => {
  if (willDelete) {
    location.href='index.php';
  } 
}); 
}  

function passwordnotmatch(){

	swal("","The passwords do not match","info");
}   
</script>

</head>
<body>
<nav class="navbar navbar-light navbar-expand-md border rounded-0 navigation-clean-button">
        <div class="container"><a class="navbar-brand" href="#" style="font-family: Amita, cursive;">classregister</a></div>
</nav>
<form method="POST">
<h5 style="font-family: Actor; margin-top: 50px;text-align: center;">New Password:  <input type="Password" name="p" required style="outline: 0px; border-width: 0 0 2px; margin-left: 5px;"></h5>
<h5 style="font-family: Actor; margin-top: 25px;text-align: center;">Confirm Password:  <input type="Password" name="cp" required style="outline: 0px; border-width: 0 0 2px; margin-left: 5px;"></h5>
  <p style="text-align: center; margin-top: 20px;"><button type="submit" name="submit" class="btn btn-primary">RESET</button></p>
</form>

</body>
<?php
include 'database.php';
if(isset($_POST['submit'])){
$p=mysqli_real_escape_string($con,$_POST['p']);
$cp=mysqli_real_escape_string($con,$_POST['cp']);
if($p==$cp){
	$b=password_hash($p, PASSWORD_BCRYPT);
	$token=$_GET['e'];
	$w="select email from signup where token='".$token."'";
	$w2=mysqli_query($con,$w);
	$w3=mysqli_fetch_array($w2);
$email=$w3['email'];
$q="update signup set password='".$b."' where email='".$email."'";
$q2="select username from signup where email='".$email."'";
$r=mysqli_query($con,$q2);
$q3=mysqli_fetch_array($r);
$q4=$q3['username'];
if(mysqli_query($con,$q)){
	$subject = "Password changed";
  $body = "<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<div class='row' style='background-color: #9900cc; height: 30wpx;text-align:center;'>
<p style='color:white; text-align: center;font-size: 21px;font-family:Amita;'>classregister</p>
</div>
<div class='row'>
  
  
  <p style='font-family:Actor;font-size:18px;margin-top: 15px;'><b>Hi ".$q4."!</b></p>
  
  <p style='font-family:Actor;font-size:18px;'> This is a confirmation mail regarding your request to change your password.
Your password has been changed successfully. If you don't recognize this activity, please contact us at contact@classregister.in</p>

</div>
<div class='row' style='background-color:  #9900cc; height: 25px;margin-top: 50px;'>
  </div>
</body>
</html>";


$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: noreply@classregister.in";
if (mail($email, $subject, $body,$headers)) {
    echo "<script>s();</script>";
} 

	
}
}
else{
	echo "<script>passwordnotmatch();</script>";
}
}

?>
</html>
