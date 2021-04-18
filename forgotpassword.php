
<!DOCTYPE html>
<html>
<head>
	<title>Classregister - ForgotPassword</title>
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
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    !--><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean-1.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean-2.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </script>
    <script type="text/javascript">
    	function submit(){
            $("#p").html("Please wait..");
    	var email=$("#email").val();
    	   $.ajax({
        url : 'forgotpassword2.php',
        type : 'POST',
        data : {'email':email},
        success : function(result){
          $("#p").html(result);
        }
      });
    	}
    </script>
</head>
<body>
<nav class="navbar navbar-light navbar-expand-md border rounded-0 navigation-clean-button">
        <div class="container"><a class="navbar-brand" href="#" style="font-family: Amita, cursive;">classregister</a></div>
    </nav>

  <h5 style="font-family: Actor; margin-top: 50px;text-align: center;">Enter email ID:  <input type="email" name="email" id="email" style="outline: 0px; border-width: 0 0 2px; margin-left: 5px;"></h5>
  <p style="text-align: center; margin-top: 20px;"><button type="submit" class="btn btn-primary" onclick="submit()">Submit</button></p>
  <p style="margin-top: 15px;text-align: center; font-family: Actor;" id="p"></p>
</body>
</html>