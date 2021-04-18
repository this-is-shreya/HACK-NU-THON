<?php
include 'database.php';
session_start();
$username=$_SESSION['user'];
$q="select tablename from usertable where username='".$username."'";
$q2=mysqli_query($con,$q);
$i=0;

while($rows=mysqli_fetch_array($q2)){
	$s="drop table if exists ".$rows['tablename'];
	$d="delete from usertable where tablename='".$rows['tablename']."'";
	
	mysqli_query($con,$s);
	mysqli_query($con,$d);
}
$k="delete from signup where username='".$username."'";
	mysqli_query($con,$k);
header("location:index.php");
session_unset();
session_destroy();
?>