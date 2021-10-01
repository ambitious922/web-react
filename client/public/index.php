<?php
require_once 'config.php';
if(isset($_GET['logout'])) {
	logOut();
}
$notvalidkey = false;
$SubscribeEnded = false;

if(isset($_POST['key']) && isset($_POST['username'])) {
	$_SESSION['key'] = $_POST['key'];
	$_SESSION['username'] = $_POST['username'];
	
	$notvalidkey = !$database->has("users", ["privatekey" => $_SESSION['key'], "contact" => $_SESSION['username'] ]);
}

$SubscribeEnded = !GetValidSubscribe() && isset($_SESSION['key']);

if(GetValidSubscribe()) { 
	$urllink = $database->get("users", "url", [
		"privatekey" => $_SESSION['key'],
		"contact" => $_SESSION['username']
	]);
	setcookie('restApiUrl', $urllink);
	echo file_get_contents('index.html');
}
else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="/css/roboto.css">
    <link rel="stylesheet" href="/css/Akronim.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/toastr.css">
    <link rel="stylesheet" href="/css/all.css">
    <link rel="stylesheet" href="/css/main.css">
    <style>
body, html {
    background-color: #1F2837 !important;
    background-image: url(/img/logo_black.png) !important;
    background-size: cover !important;
}
.centered {
    position: fixed;
    top: 50%;
    left: 50%;
    /* bring your own prefixes */
    transform: translate(-50%, -50%);
    padding: 0px 20px;
	width: 600px;
	height: 210px;
}
.form-control {
    display: block;
    height: 35px !important;
    padding: 0.375rem 0.75rem;
    font-weight: 400;
    line-height: 1.5;
    color: #ecf5ff;
    margin: 15px 0px;
    background-color: #343247;
    background-clip: padding-box;
    border: 1px solid #1F2837;
    border-radius: 0.50rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
	width: 100%;
	height: 50%;
	resize:none;
    font-family: monospace;
    font-size: 18px;
}
.errorkey {
	color: red;
    margin-top: 2px;
	display: block;
	max-width: 150px;
}
    </style>
</head>
<body>
    <form class="centered" method="post">
        <img class="mx-auto d-block" style="width: 65%; margin-bottom: -30px; margin-top: -30px;" src="/img/9.png">
	<textarea class="form-control" name="username" placeholder="Enter Username"></textarea>
	<textarea class="form-control" name="key" placeholder="Enter Authorize Key"></textarea>
		<?php if($notvalidkey) { ?>
		<p class="errorkey" style="color: red;margin-top: 2px;">Credentails Not Valid</p>
		<?php } ?>
		<?php if(!$notvalidkey && $SubscribeEnded) { ?>
		<p class="errorkey" style="color: red;margin-top: 2px;">Your subscription has ended</p>
		<?php } ?>
        <p style="margin-top: 10px; text-align: right;"><input style="border: 1px solid #fff; color: #orange;" class="btn btn-outline-info" type="submit" value="Sign in"></p>
    </form>
</body>
</html>
<?php 
}
?>
