<?php

include 'database.php';
$tablename=$_POST['tablename'];
$s="select * from ".$tablename;
$s2=mysqli_query($con,$s);
if(mysqli_query($con,$s)){
if (mysqli_num_rows($s2)<1) echo "Table is empty";
else
{
   $row=mysqli_fetch_assoc($s2);
   //echo '<table class="table table-bordered">';
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
if(isset($_POST['t'])){
	if($_POST['t']=='enter'){
		$text=$_POST['entertext'];
		$q="insert into ".$tablename." values('".$text."',0)";
		mysqli_query($con,$q);
	}
	if($_POST['t']=="delete"){
		$del=$_POST['select'];
		$q2="delete from ".$tablename." where name='".$del."'";
		mysqli_query($con,$q2);
	}
}
?>