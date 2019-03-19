<?php 

include('../include/config.inc');
include('../class/userClass.php');

$userClass = new userClass();

if(isset($_POST['type'])){

	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$type=$_POST['type'];

	if($response=$userClass->userRegistration($name,$email,$password,$type)){
		echo $response;	
	}
}
	
elseif(isset($_POST['password'])){

	$email=$_POST['email'];
	$password=$_POST['password'];
	
	if($response=$userClass->userLogin($email,$password)){
		echo $response;	
	}
	
}

?>