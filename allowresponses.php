<?php
session_start();
include('database.php');
$table=$_POST['q'];
$r="select tablename from usertable where token='".$table."'";
$r2=mysqli_query($con,$r);
$r3=mysqli_fetch_array($r2);
$tablename=$r3['tablename'];
//$tablename=openssl_decrypt($table, 'AES-128-ECB', "SECRET");
$username=$_SESSION['user'];
$allowbtn=$_POST['allowbtn'];
if($allowbtn=="on"){
	$change="update ".$tablename." set contents='on' where type='allow'";
	mysqli_query($con,$change);
	
}
if($allowbtn=="off"){
	$change="update ".$tablename." set contents='off' where type='allow'";
	mysqli_query($con,$change);
	
}

?>