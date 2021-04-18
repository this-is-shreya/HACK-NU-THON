<?php
include 'database.php';
if(isset($_POST['email'])){
	$email=$_POST['email'];
$q="select token,username from signup where email='".$email."'";
if(mysqli_query($con,$q)){
$w=mysqli_query($con,$q);
$q2=mysqli_fetch_array($w);

if(!empty($q2)){
$q3=$q2['username'];
$subject = "Recovery of Password";
$body = "<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<div class='row' style='background-color: #9900cc; height: 30px;text-align:center;'>
<p style='color:white; text-align: center;font-size: 21px;font-family:Amita;'>classregister</p>
</div>
<div class='row'>
  
  
  <p style='font-family:Actor;font-size:18px;margin-top: 15px;'><b>Hi ".$q3."!</b></p>
  <p style='font-family:Actor;font-size:18px;'> You have initiated a request to reset your password. Below is the link to reset your password.</p>
  
<p style='font-family:Actor;font-size:18px;'><b>Rest Password: </b> https://www.classregister.in/resetpassword.php?e=".$q2['token']."
</div>
<div class='row' style='background-color:  #9900cc; height: 25px;margin-top: 50px;'>
  </div>
</body>
</html>";


$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: noreply@classregister.in";
if (mail($email, $subject, $body,$headers)) {
    echo "If this email ID was registered, a link to reset your password has been sent to this email ID. ";
} 

}
else{
	echo "If this email ID was registered, a link to reset your password has been sent to this email ID. ";
}
}
}

?>