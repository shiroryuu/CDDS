<?php 

include('../include/config.inc');
include('../class/userClass.php');

$userClass = new userClass();

if(isset($_POST['submit1'])){

	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$type=$_POST['type'];

	$response=$userClass->userRegistration($name,$email,$password,$type);
	
	if($response==0){
		echo 0;
	}elseif ($response==1) {
		echo 1;
	}
	
}

if(isset($_POST['submit2'])){

	$email=$_POST['email'];
	$password=$_POST['password'];

	$response=$userClass->userLogin($email,$password);
	
	if($response==0){
		echo 0;
	}elseif ($response==1) {
		echo 1;
	}
	
}

?>