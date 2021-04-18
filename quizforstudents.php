<!DOCTYPE html>
<html>
<head>
	
    <meta name="robots" content="noindex, nofollow"/>
	<title></title>
	<style>
		
.container {
  margin: auto;
  width: 99%;
  background: linear-gradient(0.99deg, #d0a0f5 8.04%, #FFFFFF 68.76%);
  
  padding: 10px;
}

.text{
	outline: 0;
border-width: 0 0 2px;
}
.text:focus{
	border-color: purple;
}
.button{
	color: #FFFFFF;
	background-color:   #9900cc;
	font-size: 16px;
	width: 70px;
	height: 35px;
	border-width: 0px;
	border-radius: 3px;
	margin-left: 400px;
}
.card{
	 margin: auto;
  width: 60%;
  border-radius: 5px;
 background: #FFFFFF;
 border-left: 7px solid #9900cc;
 border-top: 2px solid #cccccc;
  padding: 10px;
 box-shadow: 1px 1px 1px #cccccc;
font-size: 18px;
}
.points{
	float: right;
	outline: 0;
border-width: 0 0 0px;
}
</style>
</head>
<body >
<?php
include('database.php');
$table=$_GET['q'];
//echo "this is ".$table;
//$tablename=openssl_decrypt($table, "AES-128-ECB", "SECRET");
//$tablename=openssl_decrypt($table, 'AES-128-ECB', "SECRET");
$r="select tablename from usertable where token='".$table."'";
$r2=mysqli_query($con,$r);
$r3=mysqli_fetch_array($r2);
$tablename=$r3['tablename'];

//echo "and tablename is ".$tablename;

$a="select * from ".$tablename;
$b=mysqli_query($con,$a);
$f="select contents from ".$tablename." where type='title'";
$f2=mysqli_query($con,$f);
$f3=array();
if($f2){
	$f3=mysqli_fetch_array($f2);




?>
<div class="container" >

	<form method="POST" action="<?php echo 'formthankyou.php?q='.$table; ?>">
		<br>
		<div class="card">
		
		
			<div class="card-header">

				<?php echo 'Title'; ?>
				
			</div>
			<br>
			<div class="card-body">
				<?php echo $f3['contents']; ?>
			</div>
		</div>
		<br>
		
		<br>
		<div class="card">
		<div class="card-header">
		<?php echo "Name"; ?>
		</div>
		<div class="card-body">
			<br>
		<input type="text" name="Name" maxlength="40" class="text" required>
		</div>
		</div>
		<br>
		
		<div class="card">
		<div class="card-header">
		<?php echo "Section"; ?>
		</div>
		<div class="card-body">
			<br>
		<input type="text" name="Section" maxlength="10" class="text" required>
		</div>
		</div>
		<br>

		<?php
			
			
				
				while($rows=mysqli_fetch_array($b)){
					if($rows['type']!='title' and $rows['type']!='allow'){

						?>
						<br>
						<div class="card">
							<?php
						$c="select * from ".$tablename."answer where Q_no=".$rows['Q_no'];
				$d=mysqli_query($con,$c);

				$points="select points from ".$tablename." where Q_no=".$rows['Q_no'];
				$points2=mysqli_query($con,$points);
				$points3=mysqli_fetch_array($points2);

			?>
			
				<div class="card-header">
					<?php echo $rows['contents']; ?><input type="text" value="<?php echo 'Points:'.$points3['points']; ?>" class="points" readonly >
				</div>
				<div class="card-body">
				<?php
					while($ans=mysqli_fetch_array($d)){
						if($rows['type']=="radio"){
				?>
				<br>
				
					<input type="<?php echo $rows['type']; ?>" name="<?php echo $rows['Q_no']."[]"; ?>" value="<?php echo $ans['ans_id']; ?>" required><?php echo $ans['content']; ?>
				
			
			<?php
}
if($rows['type']=="checkbox"){

			?>
			<br>
				
					<input type="<?php echo $rows['type']; ?>" name="<?php echo $rows['Q_no']."[]"; ?>" value="<?php echo $ans['ans_id']; ?>" ><?php echo $ans['content']; ?>
			

			<?php
}
}
?>
</div>
</div>
<?php
}
}
	

?>
<br>
	<input type="submit" name="submitquiz" value="Submit" class="button">
</form>
<?php
}
	else {
	echo "something went wrong";
}
		?>







</div>
</body>
</html>