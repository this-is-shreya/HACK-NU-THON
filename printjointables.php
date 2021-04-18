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
<?php
include 'database.php';
session_start();
if(isset($_SESSION['query'])){
$query=$_SESSION['query'];
unset($_SESSION['query']);
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
}
?>
</body>
</html>