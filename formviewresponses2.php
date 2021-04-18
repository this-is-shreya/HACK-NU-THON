
<?php
session_start();
include('database.php');
$table=$_POST['q'];
//$tablename=openssl_decrypt($table, 'AES-128-ECB', "SECRET");
$r="select tablename from usertable where token='".$table."'";
$r2=mysqli_query($con,$r);
$r3=mysqli_fetch_array($r2);
$tablename=$r3['tablename'];
$username=$_SESSION['user'];

$allow=$_POST['alloww'];

if($allow=="on"){
	
	echo "To create a result table, please turn off 'Allow Responses' button";

}


else {
$title="select contents from ".$tablename." where type='title'";
$title2=mysqli_query($con,$title);
$title3=mysqli_fetch_array($title2);
$title4=$title3['contents'];
//echo $title4;
$a="drop table if exists ".$tablename."_".$title4;
mysqli_query($con,$a);
$k="delete from usertable where tablename='".$tablename."_".$title4."'";
mysqli_query($con,$k);
$b="create table ".$tablename."_".$title4."( Name varchar(100),".$title4." int(3))";
mysqli_query($con,$b);
$c="insert into ".$tablename."_".$title4."(Name,".$title4.") select name,Marks_Obtained from ".$tablename."responses order by name";
$x=password_hash($tablename."_".$title4, PASSWORD_BCRYPT);
$d="insert into usertable(type, tablename, username,token) values('result','".$tablename."_".$title4."','".$username."','".$x."')";

if(mysqli_query($con,$c)){
	if(mysqli_query($con,$d)){
	echo "Table created successfully";
}
}

}


?>

