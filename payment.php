<?php
session_start();
if(empty($_SESSION['user'])){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
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
</head>
<body>
 <nav class="navbar navbar-light navbar-expand-md border rounded-0 navigation-clean-button">
        <div class="container"><a class="navbar-brand" href="#" style="font-family: Amita, cursive;">classregister</a></div>
    </nav>
<h2 style="text-align: center; margin-top: 30px;">Only 50 Rs/month!</h2>
<h4 style="margin-top: 30px;padding: 7px; font-family: Actor">You are just one step away! Complete the payment process by clicking on the button below and start using the services of classregister.</h4>
<!--<button class="btn btn-primary" style="margin-left: 350px;">PROCEED TO PAY</button>!-->
<div style="margin-left: 350px;"> <a style=" width: 135px; background-color: #1065B7; text-align: center; font-weight: 800; padding: 11px 0px; color: white; font-size: 12px; display: inline-block; text-decoration: none; " href='https://pmny.in/OI7a6xtFZ2L8' > Pay Now </a> </div>
<img src="payment.png" style="width: 250px; height: 230px; margin-top: 20px; margin-left: 250px;">
 <p class="copyright" style="margin-top:100px;text-align: center;color: var(--gray);">classregister © 2021. All rights are reserved.</p>
</body>
</html>