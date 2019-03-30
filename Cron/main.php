<?php 

include('../include/config.inc');
include('../class/dataClass.php');
include('../class/userClass.php');

$userClass = new userClass();
$dataClass = new dataClass();

//get ID of all users
$uid=$userClass->getUserIDS();

foreach ($uid as $id) {
	$url = "http://localhost:3000/files";  
	$ch = curl_init();   
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt($ch, CURLOPT_URL, $url); 
	$results = curl_exec($ch); 
  	$results = json_decode($results);

  	foreach ($results as $result) {
  		if($result->mimeType="application/vnd.google-apps.folder"){
  			break;
  		}else{
  			
  		}
  	}

}

?>