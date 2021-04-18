<?php
	
include('database.php');

if(isset($_POST['data'])){
$table=$_POST['quiz'];
//$tablename=openssl_decrypt($table, 'AES-128-ECB', "SECRET");
$r="select tablename from usertable where token='".$table."'";

$r2=mysqli_query($con,$r);
$r3=mysqli_fetch_array($r2);

$tablename="";
if(!empty($r3)){
$tablename=$r3['tablename'];


$query="select * from ".$tablename."responses";
$result=mysqli_query($con, $query);
if (mysqli_num_rows($result)<1) echo "Table is empty";
else
{
   $row=mysqli_fetch_assoc($result);
   echo '<table class="table table-bordered">';
   echo "<tr style='height:50px;'>";
   echo "<th>".join("</th><th>",array_keys($row))."</th>";
   echo "</tr>";

   while ($row)
   {
       echo "<tr style='height:50px;'>";
       echo "<td>".join("</td><td>",$row)."</td>";
       echo "</tr>";
       $row=mysqli_fetch_assoc($result);
   }

   echo "</table>";
   
}
}
}
		?>