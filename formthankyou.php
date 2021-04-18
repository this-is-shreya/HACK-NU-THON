<!DOCTYPE html>
<html>
<head>
	
    <meta name="robots" content="noindex, nofollow"/>
	<script type="text/javascript">
		function thankyou(){
			location.href="thankyou.php";
		}
		function sorry(){
			location.href="sorryresponses.php";
		}
	</script>
</head>
<body>

</body>
</html><?php
include('database.php');
$table=$_GET['q'];
$r="select tablename from usertable where token='".$table."'";
$r2=mysqli_query($con,$r);
$r3=mysqli_fetch_array($r2);
$tablename=$r3['tablename'];
//$tablename=openssl_decrypt($table, 'AES-128-ECB', "SECRET");
$alw="select contents from ".$tablename." where type='allow'";
$alw2=mysqli_query($con,$alw);
$alw3=mysqli_fetch_array($alw2);
if($alw3['contents']=="off"){
	echo "<script>sorry();</script>";
}
else{


$a="select count(*) from ".$tablename;
$b=mysqli_query($con,$a);
$count=mysqli_fetch_array($b);
$count2=$count['count(*)']-2;
$name=$_POST['Name'];
$section=$_POST['Section'];

$POINTS=0;
$ran=array();
$ques="";
for($i=1;$i<=$count2;$i++){
	$s="".($i+3);
	$ques=$ques."Q_".($i).",";
	$correct="select ans_id from ".$tablename."answer where Q_no=".($i+3)." and answer='y'";
	$correct2=mysqli_query($con,$correct);
	$correctoptions=array();
	while($correct3=mysqli_fetch_array($correct2)){
		array_push($correctoptions,$correct3['ans_id']);

	}
	
	
	
	$points="select points from ".$tablename." where Q_no=".($i+3);
	$p=mysqli_query($con,$points);
	$points2=mysqli_fetch_array($p);
	$points3=0;
	if(isset($points2)){
	$points3=$points2['points'];
}
	//echo "points are ".$points3."<br>";
	$answersmarked=array();
	$answersmarked2="";
	if(isset($_POST[$s])){
	$answersmarked=$_POST[$s];
	$answersmarked2=implode('',$answersmarked);
}
	
	
	
		
	
	
	$correctoptions2=implode('',$correctoptions);

	//$w=array_diff($correctoptions,$answersmarked);
	if($correctoptions2==$answersmarked2){
		$POINTS=$POINTS+$points3;
		//echo "ent line 26, points are ".$POINTS."<br>";
	}
	
	$str="";
	
	for($j=0;$j<count($answersmarked);$j++){
		$q="select content from ".$tablename."answer where ans_id=".$answersmarked[$j];
		$q2=mysqli_query($con,$q);
		$q3=mysqli_fetch_array($q2);
		$q4=$q3['content'];
		
		$str=$str." ".$q4;
		
	}


	
	array_push($ran, $str);

	
}
$t="";
for($k=0;$k<count($ran);$k++){
if($k!=(count($ran)-1))
$t=$t.$ran[$k]."','";
else{
	$t=$t.$ran[$k];
}

}
$ques=substr($ques,0,-1);
//echo "string is ".$t;
$add="alter table ".$tablename."responses add Marks_Obtained tinyint default 0";
mysqli_query($con,$add);

/*if(strlen($t)>30){
	$t=substr($t,0,28);
	
}
$t=$t."..";
*/
$insert="insert into ".$tablename."responses(name,section,".$ques.",Marks_Obtained) values('".$name."','".$section."','".$t."',".$POINTS.")";
//echo "".$insert;


if(mysqli_query($con,$insert)){
	echo "<script>thankyou();</script>";
}
}
?>