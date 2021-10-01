<?php 
//if($_SERVER['SERVER_NAME'] != 'tz2u6iex7sxp4fzw.onion') {
//	die('Welcome to my website');
//	return;
//}
require_once 'medoo.php';

session_start();

// Using Medoo namespace
use Medoo\Medoo;

$database = new Medoo([
	// required
    'database_type' => 'mysql',
    'database_name' => 'bot',
    'server' => 'localhost',
    'username' => 'non-root',
    'password' => '142536142536Amk@x'
]);

function logOut() {
	session_destroy();
	header("Location: /");
	die();
}

function GetValidSubscribe() {
	global $database;
	
	if(!isset($_SESSION['key']))
		return false;
	
	$res = $database->get("users",
		"end_subscribe", [
			"privatekey" => $_SESSION['key'],
			"contact" => $_SESSION['username']
		]);
		
	if(!res)
		return false;
	
	return (time()<=strtotime($res));
}
?>
