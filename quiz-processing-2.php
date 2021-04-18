<?php
session_start();
$question=array();
include('database.php');
$username=$_SESSION['user'];
if(isset($_POST['question'])){
$question=$_POST['question'];

}
//echo "number of questions is ".count($question)."<br>";

$titledetail=$_POST['titledetail'];
//$titletest=str_replace("_", "", $titledetail);
if(ctype_alnum($titledetail)){
$table=$_POST['q'];
$r="select tablename from usertable where token='".$table."'";
$r2=mysqli_query($con,$r);
$r3=mysqli_fetch_array($r2);
$quiz=$r3['tablename'];
//$quiz=openssl_decrypt($table, 'AES-128-ECB', "SECRET");
//$quiz=$_SESSION['quizdelta'];
//$quiz=$_POST['table'];
//echo "quiz is ".$quiz;
//print_r($titledetail);
//unset($_SESSION['quizdelta']);

$i=0;


$q="select save_clicked from usertable where username='".$username."' and tablename='".$quiz."'";
$results=mysqli_query($con, $q);
$save=mysqli_fetch_array($results);
$saves=$save['save_clicked'];
//while($rows=mysqli_fetch_array($results)){
//  $saves=$rows['save_clicked'];
//}
$q2="update usertable set save_clicked=".($saves+1)." where username='".$username."' and tablename='".$quiz."'";
$update=mysqli_query($con,$q2);


if($saves==0){

  //echo "saves 0";
$q3="create table ".$quiz."answer( ans_id int(3) auto_increment primary key, Q_no tinyint, content varchar(200), answer char(1) default 'n')";
mysqli_query($con, $q3);
$w3="insert into usertable(type,tablename,username) values('answer','".$quiz."answer','".$username."')";
mysqli_query($con,$w3);
$q4="create table ".$quiz."responses(date_time datetime default now(),name varchar(40),section varchar(10))";
mysqli_query($con, $q4);
$w4="insert into usertable(type,tablename,username) values('responses','".$quiz."responses','".$username."')";
mysqli_query($con,$w4);

for($kk=0;$kk<count($question);$kk++){

  $strr="alter table ".$quiz."responses add Q_".($kk+1)." varchar(200)";
  mysqli_query($con,$strr);
}


$ti="insert into ".$quiz." values(1,'title','".$_POST['titledetail']."',0)";
mysqli_query($con,$ti);
$allow="insert into ".$quiz." values(2,'allow','off',0)";
mysqli_query($con,$allow);


if(!empty($question)){
while(($i+1)<=count($question)){
  $a=$i;
    
  $tex=array();
  $text=array();
  if(isset($_POST['alloptions']))
  {

    //$tex=$_POST['alloptions'];
    $tex=array_keys($_POST['alloptions']);
    //print_r($tex);
    $k=$tex[$a];
    $text=$_POST['alloptions'][$k];
    //print_r($text);
  }
  if(empty($text)){
    echo "Please add at least one option in ".$a;
  }
  
$b=str_replace("Q_", "", $tex[$a]);
  $correct=array();
  $correctoptions=array();
if(isset($_POST['correct'])){
  $correct=$_POST['correct'];
  //print_r($correct);
  
  $correctoptions=$correct[$b];
}

  $type="";
  if(count($correctoptions)>1){
$type="checkbox";

  }
  else if(count($correctoptions)==1){
    $type="radio";
    
  }
  else{
    echo "Please select at least one option in Q".($i+1);
    break;
  }
  $b=$tex[$a]."_POINTS";
  $point=$_POST['points'];
  $points=$point[$b];
  

  //$points=$_POST[$b]?$_POST[$b]:0;
  $q_no=4+($i);
  $query="insert into ".$quiz." values(".$q_no.",'".$type."','".$question[$i]."',".$points[0].")";
  
  if(mysqli_query($con, $query)){

  
}
else{
  echo mysqli_error($con);
}

for($j=0; $j<count($text);$j++){
   
  if(in_array($text[$j],$correctoptions)){
   
    $ansquery ="insert into ".$quiz."answer(Q_no, content, answer) values(". $q_no.",'".$text[$j]."','y')";
  }
  else{
  
    $ansquery ="insert into ".$quiz."answer(Q_no, content, answer) values(". $q_no.",'".$text[$j]."','n')";
  }
  mysqli_query($con,$ansquery);
}


$i++;
}//while(question)

}
else{
  echo "Add at least one question";
}
}
//if(save)



else {

  $a="drop table ".$quiz;
  $b="drop table ".$quiz."answer";
  $c="drop table ".$quiz."responses";
  mysqli_query($con,$a);
  mysqli_query($con,$b);
  mysqli_query($con,$c);
  $q4="create table ".$quiz."responses(date_time datetime default now(), name varchar(40), section varchar(10))";
mysqli_query($con, $q4);

 
$q3="create table ".$quiz."answer( ans_id int(3) auto_increment primary key, Q_no tinyint, content varchar(200), answer char(1) default 'n')";
mysqli_query($con, $q3);
  
$q5="create table ".$quiz."( Q_no int(3) auto_increment primary key, type varchar(8), contents varchar(200), points tinyint(4) default 0)";
mysqli_query($con, $q5);
  $ti="insert into ".$quiz." values(1,'title','".$_POST['titledetail']."',0)";
mysqli_query($con,$ti);

$allow="insert into ".$quiz." values(2,'allow','on',0)";
mysqli_query($con,$allow);



if(!empty($question)){
for($kk=0;$kk<count($question);$kk++){
  
  $strs="alter table ".$quiz."responses add Q_".($kk+1)." varchar(200)";

  mysqli_query($con,$strs);
}


  while(($i+1)<=count($question)){
  $a=$i;
    
  $tex=array();
  $text=array();
  if(isset($_POST['alloptions']))
  {

    //$tex=$_POST['alloptions'];
    $tex=array_keys($_POST['alloptions']);
    //print_r($tex);
    $k=$tex[$a];
    $text=$_POST['alloptions'][$k];
    //print_r($text);
  }

  
  if(empty($text)){
    echo "Please add at least one option in Q".$a+1;
  }
  $b=str_replace("Q_", "", $tex[$a]);
  $correct=array();
  $correctoptions=array();
if(isset($_POST['correct'])){
  $correct=$_POST['correct'];
  //print_r($correct);
  
  $correctoptions=$correct[$b];
}
  

  $type="";
  if(count($correctoptions)>1){
$type="checkbox";

  }
  else if(count($correctoptions)==1){
    $type="radio";
    
  }
  else{
    echo "Please select at least one option in Q".($i+1);
    break;
  }
  $b=$tex[$a]."_POINTS";
  $point=$_POST['points'];
  $points=$point[$b];
  /*if(!empty($point[$b])){
  	echo "<br> if <br>";
  	$points=$point[$b];
  	print_r($points);
  }
  else{
  	echo "else";
  	$points=0;
  	print_r($points);
  }
  */
  $q_no= 4+($i);
  $query="insert into ".$quiz." values(".$q_no.",'".$type."','".$question[$i]."',".
  $points[0].")";
  //print_r($points);
  //print_r($question[$i]);
  if(mysqli_query($con, $query)){

  
}
else{
  echo mysqli_error($con);
}
$l=2;
for($j=0; $j<count($text);$j++){
  if(in_array($text[$j],$correctoptions)){
    //echo "in array ".($text[$j])."<br>";
    $ansquery ="insert into ".$quiz."answer(Q_no, content, answer) values(". $q_no.",'".$text[$j]."','y')";
  }
  else{
    //echo "not in array ".$text[$j]."<br>";
    $ansquery ="insert into ".$quiz."answer(Q_no, content, answer) values(". $q_no.",'".$text[$j]."','n')";
  }
  mysqli_query($con,$ansquery);
}


$i++;
}//while(question)

}
else{
  echo "Add at least one question";
}
}//else
}
else{
  echo "Please enter only alphabets and numbers in the title";
}


?>