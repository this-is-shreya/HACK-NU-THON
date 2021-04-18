<?php
include('database.php');
$table=$_POST['q'];
//$tablename=openssl_decrypt($table, 'AES-128-ECB', "SECRET");
$r="select tablename from usertable where token='".$table."'";

$r2=mysqli_query($con,$r);
$r3=mysqli_fetch_array($r2);

$tablename="";
if(!empty($r3)){
$tablename=$r3['tablename'];
$a="select count(*) from ".$tablename."responses";
			$b=mysqli_query($con,$a);
			$c=mysqli_fetch_array($b);
			echo "Number of responses: ".$c['count(*)'];
}
?>