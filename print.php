<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
  
  <title>Classregister - Print</title>
    <meta name="robots" content="noindex, nofollow"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="print.css" media="print">
</head>
<body>
<p style="text-align: center;">
<button onclick="window.print();" class="btn btn-primary" id="print-btn" style="margin-top: 50px;">Print</button></p>
<div style="margin-top: 60px">
<?php
include 'database.php';
$table=$_GET['t'];
$r="select tablename from usertable where token='".$table."'";
$r2=mysqli_query($con,$r);
$r3=mysqli_fetch_array($r2);
$tablename=$r3['tablename'];
$k="select * from ".$r3['tablename'];
$k2=mysqli_query($con,$k);
$k3=mysqli_fetch_assoc($k2);
$k4=array_keys($k3);

//$tablename=openssl_decrypt($table, 'AES-128-ECB', "SECRET");


  $query="select * from ".$tablename." where 1";
$result=mysqli_query($con, $query);
if (mysqli_num_rows($result)<1) echo "Table is empty";
else
{
   $row=mysqli_fetch_assoc($result);
   echo '<table class="table table-bordered">';
   echo "<tr>";
   echo "<th>".join("</th><th>",array_keys($row))."</th>";
   echo "</tr>";

   while ($row)
   {
       echo "<tr>";
       echo "<td>".join("</td><td>",$row)."</td>";
       echo "</tr>";
       $row=mysqli_fetch_assoc($result);
   }

   echo "</table>";
}

?>
</div>

</body>
</html>