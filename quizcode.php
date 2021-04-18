<?php
include 'database.php';
session_start();
if(empty($_SESSION['user'])){
  header("location:index.php");
}
$table=$_GET['q'];

//$table2=openssl_decrypt($table, "AES-128-ECB","SECRET");

//$_SESSION['quizdelta']=$table2;

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
   
<title>Classregister - Quiz</title>
    <meta name="robots" content="noindex, nofollow"/>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abhaya+Libre">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aguafina+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alex+Brush">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Almendra+SC">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amita">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bree+Serif">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
   <!-- <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    !--><!--<link rel="stylesheet" href="assets/css/Footer-Dark.css">
    !--><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean-1.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean-2.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style type="text/css">
        #quizcontainer1 {
  background: linear-gradient(0.99deg, #FFFFFF 5%, #85B7F2 68.76%);
}
#scq {
  margin-top: 20px;
  margin-bottom: 10px;
}

#mcq {
  margin-bottom: 10px;
}

#quizcontainer2 {
  margin-top: 20px;

}

#share {
  margin-left: 100px;
}
#quizcontainer3{
 margin: auto;
  width: 80%;
  
  padding: 10px;

}
.f{
 margin: auto;
  width: 80%;
  border-radius: 5px;
 background: #FFFFFF;
 border-left: 7px solid #9900cc;
 border-top: 2px solid #cccccc;
  padding: 10px;
 box-shadow: 1px 1px 1px #cccccc;
  

}
.add-option{
background-color: var(--blue);
 border:solid #FFFFFF;
 color: #FFFFFF;
 border-radius: 5px;

}
.delete-question{
background-color: var(--blue);
 border:solid #FFFFFF;
 color: #FFFFFF;
 border-radius: 5px
}
.cross{
    background-color: transparent;
    border:solid #FFFFFF;
}
.point{
margin: 0 10%;
width: 10%;
outline: 0;
border-width: 0 0 2px;

}
.point:focus{
border-color: purple;
}
.question{
outline: 0;
border-width: 0 0 2px;
width: 70%;

}
.question:focus{
    border-color: purple;
}

.text{
outline: 0;
border-width: 0 0 2px;
width: 70%;
    
}
.text:focus{
    border-color: purple;
}
input{
outline: 0;
border-width: 0 0 2px;
    
}
input:focus{
    border-color: purple;
}


.option:focus{
    border-color: purple;
}
.redundant{
  font-size: 18px;

      border-width: 0 0 0px;
}

</style>
  <script type="text/javascript">
    
      function symbols(a){
        var y=a.value;
        if(a.value.includes("ROOT")){
          
          a.value=a.value.replace("ROOT","√");
        }
        if(a.value.includes("DEG")){
          
          a.value=a.value.replace("DEG","°");
        }
        if(a.value.includes("TRIANGLE")){
          
          a.value=a.value.replace("TRIANGLE","△");
        }
      if(a.value.includes("CONGRUENT")){
          
          a.value=a.value.replace("CONGRUENT","≅");
        }
        if(a.value.includes("SIMILAR")){
          
          a.value=a.value.replace("SIMILAR","∼");
        }
        if(a.value.includes("THETA")){
          
          a.value=a.value.replace("THETA","θ");
        }
        if(a.value.includes("-PI-")){
          
          a.value=a.value.replace("-PI-","π");
        }
        if(a.value.includes("DIVISION")){
          
          a.value=a.value.replace("DIVISION","÷");
        }
        if(a.value.includes("SIGMA")){
          
          a.value=a.value.replace("SIGMA","Σ");
        }
if(a.value.includes("ANGLE")){
          
          a.value=a.value.replace("ANGLE","∠");
        }
        if(a.value.includes("INTEGRAL")){
          
          a.value=a.value.replace("INTEGRAL","∫");
        }
        if(a.value.includes("NOTEQUAL")){
          
          a.value=a.value.replace("NOTEQUAL","≠");
        }
        if(a.value.includes("INFINITY")){
          
          a.value=a.value.replace("INFINITY","∞");
        }
 if(a.value.includes("GREATER-E")){
          
          a.value=a.value.replace("GREATER-E","≥");
        }
        if(a.value.includes("LESS-E")){
          
          a.value=a.value.replace("LESS-E","≤");
        }
        if(a.value.includes("BELONGS")){
          
          a.value=a.value.replace("BELONGS","∈");
        }
         if(a.value.includes("FORALL")){
          
          a.value=a.value.replace("FORALL","∀");
        }
        if(a.value.includes("NOTBELONG")){
          
          a.value=a.value.replace("NOTBELONG","∉");
        }
      }
      
   
  </script>
<script>
    $(document).ready(function(){



      $(document).on("click", ".add-option",function(){
          //var quesid= $(this).prev().find(".question")[0].id;
          var quesid= $(this).parent().find(".question")[0].id;
        //alert(quesid);
        var str="";
        var type="";
        //var options=$(this).prev().find(".options");
        var options=$(this).parent().find(".option");
        var optid="";
        var textid="";
        var l=options.length;
        if(l==0){
          if((document.getElementById("selector_1")).checked){
            type="radio";
            optid="1";
            textid="t1";
          }
          else if((document.getElementById("selector_2")).checked){
            type="checkbox";
            optid="1";
            textid="t1";
          }
          else{
            swal("Please Select the type of Question");
          }
        }
        else{
         //type=$(this).prev().find(".options")[l-1].type;
         //optid=$(this).prev().find(".options")[l-1].id;
         type=$(this).parent().find(".option")[l-1].type;
         optid=$(this).parent().find(".option")[l-1].id;
         optid= +optid + +1;
         textid="t"+optid;
       //alert(type);
        }
        
           str='<div><input type="'+type+'" name="'+quesid+'[]"  class="option" id="'+optid+'" onchange="setval(this)" /><textarea maxlength="200" name="Q_'+quesid+'[]" class="text" id="'+textid+'" rows="1" cols="70" placeholder="Option" onkeydown="new do_resize(this);" onkeyup="symbols(this)"  style="resize: none;" ></textarea><input type="button" class="cross" value="X"><br><br></div>';
        
        
        
        //alert("str is "+str);
        //$(".container").append(str);
        //$(str).insertBefore($(this).prev().find(".delete-question"));
        $(str).insertBefore($(this));
        str="";
        
     
      
      });
      
       
      $(document).on("click", ".delete-question",function(){
        $(this).parent().next(".add-option").remove();
        $(this).parent().parent().remove();
      });
      $(document).on("click",".cross", function(){

        $(this).parent().remove();
      });
      /*$(document).on("click", "#save", function(){
        var textoptions= document.getElementsByName("Q_1[]");
        var i=0;
        var b=$("[name=Q_1[1]]").val();

        alert( "ans is"+ b);
      });
        */
    });
    

  </script>
    
  <script type="text/javascript">
    function appendtext(){
        var questions= document.getElementsByClassName("question");
        var options=document.getElementsByClassName("option");
        var optid="";
        var pointsname="";
        var radioname="";
        var textname="";
        var newid="";
        var textid="";
      
        if(questions.length==0){
          pointsname="Q_1_POINTS";
          radioname="1";
          textname="Q_1[]";
          newid="1";
          optid="1"
          textid="t1";
          
//alert("passed if");
        }
        
        else{
          var id=questions[questions.length-1].id;
          optid=options[options.length-1].id;
          optid= +optid + +1;
          textid="t"+optid;
          
          newid= +id + +1;
          pointsname= "Q_"+newid+"_POINTS";
          radioname=newid;
          textname="Q_"+newid+"[]";
//alert("passed else");
        }

        var str="";
       if((document.getElementById("selector_1")).checked){
      str='<div><br><div class="f"><textarea name="question[]" class="question" id="'+newid+'" maxlength="400" rows="1" cols="50" placeholder="Question" style="resize:none;" onkeyup="symbols(this)" onkeydown="new do_resize(this);"></textarea><input type="number" class="point" name="'+pointsname+'" placeholder="Points"/><br><br><div><input type="radio" name="'+newid+'[]"  class="option" id="'+optid+'" onchange="setval(this)"/><textarea rows="1" cols="70" placeholder="Option" name="'+textname+'" maxlength="200" class="text" onkeyup="symbols(this)" onkeydown="new do_resize(this);" id="'+textid+'" style="resize:none;"></textarea><input type="button" class="cross" value="X"><br><br></div><input type="button" class="add-option" value="Add Option"><input type="button" class="delete-question" value="Delete question"></div></div>';
       }
       else if((document.getElementById("selector_2")).checked){
        str='<div><br><div class="f"><br><textarea name="question[]" class="question" id="'+newid+'" maxlength="400" rows="1" cols="50" onkeyup="symbols(this)" onkeydown="new do_resize(this);" placeholder="Question" style="resize:none;"></textarea><input class="point" type="number" name="'+pointsname+'" placeholder="Points"/><br><br><div><input type="checkbox" name="'+newid+'[]"  class="option" id="'+optid+'" onchange="setval(this)"/><textarea onkeyup="symbols(this)" onkeydown="new do_resize(this);" rows="1" cols="70" maxlength="200" name="'+textname+'" class="text" id="'+textid+'" placeholder="Option" style="resize:none;"></textarea><input type="button" class="cross" value="X"><br><br></div><input type="button" class="add-option" value="Add Option"><input type="button" class="delete-question" value="Delete question"></div></div>';
       }
       else{
        swal("Please Select the type of Question","","info");
       }
        
        //alert(str);
        $(str).insertBefore($("form").find("#save"));
        str="";
        //$("form").append(str);
      }
function setval(bf){
    //alert("type is "+bf.type);
    var id= bf.id;
    

    var b="t"+id;
   
    var text1 = bf.checked ? document.getElementById(b).value : '';
    
    //alert("text1 is "+text1);
    bf.value=text1;
    

  }
  /*function addblank(){
    var s='<br><div><input type="text" name="other[]" placeholder="Add a title"><br><input type="text"  readonly><br><button class="delete-question">Delete Question</button></div><br>';
    $(s).insertAfter($(document.getElementsByClassName("name")).parent());
  }
  */
  function myfun(){
    
    document.getElementsByClassName("point").defaultValue=0;
      var t=document.getElementById("titled").value;
     

      if(t==""){
        
        swal("Please add a title", "", "info");
      }

      else{
        var quesid=$('textarea[name="question[]"]').map(function(){ 
                    return this.id; 
                }).get();

      var question = $('textarea[name="question[]"]').map(function(){ 
                    return this.value; 
                }).get();
      //alert("ques is "+question);
      var alloptions={};
      var correct={};
      var points={};
      var i=0;
      while(i<quesid.length){
        var s="Q_"+quesid[i];
        alloptions[s]=$('textarea[name="'+s+'[]"]').map(function(){ 
                    return this.value; 
                }).get();
        i=i+1;
        alert("all "+alloptions[s]);
      }
     var j=0;
      while(j<quesid.length){
        var s=""+quesid[j];
        correct[s]=$.map($('input[name="'+s+'[]"]:checked'), function(c){return c.value; })
        
        //alert(correct[s]);
        j=j+1;
        
      }
      

      var k=0;
      while(k<quesid.length){
        var s="Q_"+quesid[k]+"_POINTS";
        points[s]=$('input[name="'+s+'"]').map(function(){ 
          if(this.value==""){
            
            return 0;
          }
          else{
                    return this.value; 
                
      }
      }).get();
        k=k+1;
        
        //alert("correct "+correct[s][1]);
      }
      var bk=window.location.href;
var fk=bk.indexOf("quizcode.php?q=");
var link=bk.substr(+fk + +15);
//alert(link);

      $.ajax({
        url : 'quiz-processing-2.php',
        type : 'POST',
        data : {'question[]':question,'alloptions':alloptions,'correct':correct,'titledetail':t,'points':points,'q':link},
        success : function(result){
          //if(result!=""){
            //swal("Something went wrong","Please check whether you have at least one question and selected at least one option for every question","info");
          //}
          if(result.includes("Please enter only alphabets and numbers in the title")){
            swal(result,"","info");
          }
       else if(result==""){
        swal("Quiz saved successfully!","","success");
       }
       else{
        swal("Something went wrong","Please make sure you have added at least one question and selected at least one option in every question","warning");
       }
        }
      });
      
      }
    }

  </script>
</head>
<script type="text/javascript">
        function do_resize(textbox) {

 var maxrows=5; 
  var txt=textbox.value;
  var cols=textbox.cols;

 var arraytxt=txt.split('\n');
  var rows=arraytxt.length; 

 for (i=0;i<arraytxt.length;i++) 
  rows+=parseInt(arraytxt[i].length/cols);
textbox.rows=rows;
 //if (rows>maxrows) textbox.rows=maxrows;
  //else 
 }
 function share(){

var b=window.location.href;
var f=b.indexOf("quizcode.php?q=");
var g=b.substr(0,+f);

var d=b.substr(+f + +15);

var link=g+'quizforstudents.php?q='+d;

 {
  swal("Share","Link: "+link,"");
 }
 
}
    </script>
 
<body style="height: 900px;">
    <!-- Start: Navigation Clean -->
    <nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container"><a class="navbar-brand" href="#" style="font-family: Amita, cursive;">classregister</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="Homepage.php" style="font-family: Amita, cursive;color: var(--dark);">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="Myrecords.php" style="color: var(--dark);font-family: Amita, cursive;">My Records</a></li>
                    <li class="nav-item"><a class="nav-link" href="myaccount.php" style="color: var(--dark);font-family: Amita, cursive;">My Account</a></li>
                    <li class="nav-item"><a class="nav-link" href="signout.php" style="color: var(--white);font-family: Amita, cursive;background: var(--purple);">Sign Out</a></li>
                </ul>
            </div>
        </div>
    </nav><!-- End: Navigation Clean -->
    <div class="container" id="quizcontainer1">
        <h3 style="font-family: Actor, sans-serif;">Instructions</h3>
        <p style="font-size: 18px;">1. Select the right options while making the quiz to add the answer key. Also, there's no need to type anything in Name and Section cards.</p>
        <p style="font-size: 18px;">2. If in a More than One Correct type question, there's only one option correct, the question will be displayed as Single Choice Correct to the students.</p>
        <p style="font-size: 18px;">3. Type the following to get the required symbols:</p>
        <p style="font-size: 18px;">ROOT: √ , DEG : °, TRIANGLE : △,CONGRUENT : ≅, SIMILAR : ~, THETA : θ,-PI- : π, DIVISION : ÷, SIGMA : ∑ , ANGLE : ∠,INTEGRAL : ∫, NOTEQUAL: ≠, INFINITY :, GREATER-E : ≥, LESS-E : ≤,BELONGS : ∈, FORALL : ∀ , NOTBELONG : ∉ </p>
    </div>
    <br>
    <div class="container" id="quizcontainer2">
        <div class="form-check" id="scq" style="width: 200px;"><input class="form-check-input" type="radio" id="selector_1" name="selector"><label class="form-check-label" for="formCheck-1">Single Choice Correct</label></div>
        <div class="form-check" id="mcq" style="width: 200px;"><input class="form-check-input" type="radio" id="selector_2" name="selector"><label class="form-check-label" for="formCheck-1">More than One Correct</label></div><button class="btn btn-primary" type="button" id="add-question" onclick="appendtext()">Add Question</button><button class="btn btn-primary" name="share" id="share" onclick="share()">Share</button>
        <a class="float-right" href="<?php echo 'formviewresponses.php?q='.$table; ?>">View Responses</a>
        
        <br>
        <br>
        
    </div>
    <br>
    
    <br>
    <div class="container" id="quizcontainer3" style="text-align: left;">
       <form>
        <div class="f">
        <input type="text" class="redundant" name="title" id="title" value="Title" readonly>
        <br><br>
        <input type="text" class="ti" name="titledetail" id="titled" maxlength="20" required>
        <br>
      </div><br>
      <br>
        <div class="f">
        <input type="text"  value="Name"  class="redundant" readonly><br><br>
        <input type="text"  class="name" readonly><br>
      </div><br>
      <div class="f">
        <input type="text"  value="Section" class="redundant" readonly><br><br>
        <input type="text"  class="name" readonly><br>
      </div>
     <div>
      <br>
    <div class="f">
    
      <textarea rows="1"  name="question[]" class="question" id="1" maxlength="400" placeholder="Question" onkeyup="symbols(this)" onkeydown="new do_resize(this);" style=" resize: none;"></textarea><input type="number" name="Q_1_POINTS" class="point" placeholder="Points" /><br>
      <br>
      <div>
        <input type="radio" name="1[]"   class="option" id="1" onchange="setval(this)" /><textarea name="Q_1[]" rows="1"  placeholder="Option" class="text" maxlength="200" id="t1" onkeyup="symbols(this)" onkeydown="new do_resize(this);" style="resize: none;"></textarea><input type="button" value="X" class="cross"><br><br>
      </div>
      
        <div>
        <input type="radio" name="1[]"   class="option" id="2" onchange="setval(this)" /><textarea name="Q_1[]" rows="1" cols="70" class="text" maxlength="200" id="t2" placeholder="Option" onkeyup="symbols(this)" onkeydown="new do_resize(this);" style="resize: none;"></textarea><button class="cross">X</button><br><br>
      </div>
      
      <input type="button" class="add-option" value="Add Option" />
      <button class="delete-question">Delete Question</button>
    </div>
  </div>
    <input type="button" name="save" class="btn btn-primary" id="save" value="Save" onclick="myfun()"/>
  </form>
    
 
    </div>
    <p class="copyright" style="margin-top:20px;text-align: center;color: var(--gray);">classregister © 2021. All rights are reserved.</p>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
</body>

</html>
