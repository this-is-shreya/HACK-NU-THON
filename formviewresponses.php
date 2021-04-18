<?php
include('database.php');
session_start();
if(empty($_SESSION['user'])){
    header("location:index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Classregister - ViewResponses</title>
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
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean-1.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean-2.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/untitled.css">

    
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    

    <style type="text/css">
    	.table table-bordered{
    		border-width: 2px;
    	}
    	#responsestable{
    		background: linear-gradient(10.99deg, #85B7F2 8.76%,#FFFFFF 45%);
    		padding: 10px;
    		max-width: 100%;
    	}
    	.resultb{
    		color: #FFFFFF;
	background-color:   var(--blue);
	border-width: 0px;
	border-radius: 2px;
    	}
    </style>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
	<script>
        
    </script>
	<script type="text/javascript">
		$(document).ready(function(){
			var intervalId = setInterval(function(){
  /// call your function here
  read();
  //countresponses();
}, 2000);
			
//$("#allow").prop("checked",true);
			$("#count").load('formresponsestable2.php');
			
		});
	</script>
<script type="text/javascript">
	function countresponses(){
		var af=window.location.href;
			var c= af.indexOf("?q=");
			var b=af.substr(+c + +3);
			$.ajax({
				url: 'formresponsestable.php',
				type:'POST',
				data:{'q':b},
				success:function(result){
					$("#responses").html(result);
				}
			});
	}
	function changeallow(){
		var a="";
		if(document.getElementById("allow").checked){
			a="on";
			//alert(a);
		}
		else{
			a="off";
			//clearInterval(intervalId);
			//alert(a);
		}
		var af=window.location.href;
			var c= af.indexOf("?q=");
			var b=af.substr(+c + +3);
		$.ajax({
				url: 'allowresponses.php',
				type:'POST',
				data:{'allowbtn':a,'q':b},
				
			});
	}
		function read(){
			var a=window.location.href;
			var c= a.indexOf("?q=");
			var b=a.substr(+c + +3);
			var r="read";
			$.ajax({
				url: 'formresponsestable2.php',
				type:'POST',
				data:{'data':r,'quiz':b},
				success:function(result){
					$("#table").html(result);
				}
			});

			$.ajax({
				url: 'formresponsestable.php',
				type:'POST',
				data:{'q':b},
				success:function(result){
					$("#responses").html(result);
				}
			});
		}
	
		function myfun(){
			var al="";
			
			if(document.getElementById("allow").checked){
				al="on";
			}
			else{
				al="off";
				
			}
			var a=window.location.href;
			var c=a.indexOf("?q=");
			var b=a.substr(+c + +3);
			$.ajax({

				url: 'formviewresponses2.php',
				type: 'POST',
				data: {'alloww':al,'q':b},
				success: function(result){
					
					
					if(result.includes("Table created successfully")){
					swal(result,"","success");
					//clearInterval(intervalId);
				//window.location.href=window.location.href;
			}
				else{
					swal(result,"","info");
				}
				}
			});

		}
	
</script>
<nav class="navbar navbar-light navbar-expand-md navigation-clean" style="background: rgb(255,255,255);border-style: none;border-color: var(--secondary);">
        <div class="container"><a class="navbar-brand" href="#" style="font-family: Amita, cursive;">classregister</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="Homepage.php" style="font-family: Amita, cursive;color: var(--dark);">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="Myrecords.php" style="color: var(--dark);font-family: Amita, cursive;">My Records</a></li>
                    <li class="nav-item"><a class="nav-link" href="myaccount.php" style="font-family: Amita, cursive;color: var(--dark);">My Account</a></li>
                    <li class="nav-item"><a class="nav-link" href="signout.php" style="color: var(--white);font-family: Amita, cursive;background: var(--purple);">Sign Out</a></li>
                </ul>
            </div>
        </div>
    </nav><!-- End: Navigation Clean -->
<div class= "container" id="responsestable">
	<br>
	<form method="POST">
	<input type="checkbox" name="allow" id="allow" onclick="changeallow()">Allow Responses<br>
	</form>
	<p id="responses"></p>
	<p id="count"></p>
		<p>To create a separate  result table that will contain only the names and marks obtained by students, click on the button below</p>
<input type="submit" name="resultb" value="Create Result Table" onclick="myfun()" class="resultb">

</div>


<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered" id="table">



</div>
</div>
 
</body>
</html>
