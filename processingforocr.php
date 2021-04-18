<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title></title>
	<script src='https://unpkg.com/tesseract.js@v2.0.2/dist/tesseract.min.js'></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <style type="text/css">
  	.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  
  animation: spin 3.5s linear infinite;
}
@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
  </style>
</head>
<body>
<h2 style="align:center;">Please wait</h2>
<h4>This may take a while</h4>
<div class="loader" ></div>


<script type="text/javascript">
	function tess(a){
  //   var d = new Date();
  // d.setTime(d.getTime() + (6*1000));
  // var expires = "expires=" + d.toGMTString();
  //document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
Tesseract.recognize(
            a,
            'eng',
            { logger: m => console.log(m) }
        ).then(({ data: { text } }) => {
            textt= text;
            textt=textt.split("\n").join(" ");
            var x=encodeURIComponent(btoa(unescape(encodeURIComponent(textt))));
            window.location.href= "attendance2.php"+"?q="+x;


        //     document.cookie = "newdata = AND THIS SHOULD WORK ;"+expires+  ";path=/";
        //     console.log(textt);
            

        // })
      
 })}
</script>
<?php


if(isset($_FILES['screenshot'])){

$file_name=$_FILES['screenshot']['name'];
$file_tmp=$_FILES['screenshot']['tmp_name'];


move_uploaded_file($file_tmp, "".$file_name);

// shell_exec('"C:\\Program Files\\Tesseract-OCR\\tesseract" "C:\\xampp\\htdocs\\shreya\\MY WEBSITE\\my images-shreya\\'.$file_name.'" out');

$contents="";
echo "<script>tess('".$file_name."');</script>";
// $contents= base64_decode($_GET['q']);
//echo base64_decode($_GET['q']);


// print_r($contents);
// $myfile= fopen('out.txt', 'r') or die("unable to open file");
// $contents=fread($myfile, filesize('out.txt'));
// fclose($myfile);

$file_name2="";

if(($_FILES['file']['error']==UPLOAD_ERR_OK) && is_uploaded_file($_FILES['file']['tmp_name']))
{
    $file_name2=$_FILES['file']['name'];
$file_tmp2=$_FILES['file']['tmp_name'];


move_uploaded_file($file_tmp2, "my file-shreya/".$file_name2);
}

$listofstudents= file_get_contents("my file-shreya/".$file_name2);


//$contents2=explode("  ", $contents);
$list2=explode(",", $listofstudents);


$absentees= array();
$count=0;

//echo "value of x is ".count($list2)." and y is ".count($contents2)."\n";
// if(strpos($contents,'Maharshi')){
//     echo "yes";
// }
// echo $contents;
if((!empty($list2))&&(!empty($contents))){
for($x=0; $x<sizeof($list2); $x=$x+1){
    
        
        if(strpos(strtolower($contents), strtolower($list2[$x]))){
            $count=$count+1;
          
            
            
        }
    
    if($count==0){
        array_push($absentees,$list2[$x]);
    }
    else{
        $count=0;
    }

}
}

$_SESSION['absentees']=$absentees;
$_SESSION['allstudents']=$list2;


//removed db array

}


?>

</body>
</html>