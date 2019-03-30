<?php 

include('../include/config.inc');
include('../class/dataClass.php');

$dataClass = new dataClass();

//File Upload
if (empty($_FILES) || $_FILES["file"]["error"]) {
  die('{"OK": 0}');
}
$fileName = $_FILES["file"]["name"];
move_uploaded_file($_FILES["file"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/".BASE_URL."/API/node-backend/backend/Files/$fileName");

die('{"OK": 1}');
//File upload ends

/***File Hashing***/  
// From URL to get webpage contents. 
$url = "http://localhost:3000/chunks/".$filename; 
  
// Initialize a CURL session. 
$ch = curl_init();  
  
// Return Page contents. 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
  
//grab URL and pass it to the variable. 
curl_setopt($ch, CURLOPT_URL, $url); 
  
$result = curl_exec($ch);
$result=json_decode($result);  
$result=$result->hash;   
/***File Hashing ends***/  
$bool=$dataClass->checkHash($result,$_SESSION['uid']);  

if($bool){
	//upload file Starts
	// From URL to get webpage contents. 
	$url = "http://localhost:3000/upload/".$filename; 
  
	// Initialize a CURL session. 
	$ch = curl_init();  
  
	// Return Page contents. 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
  
	//grab URL and pass it to the variable. 
	curl_setopt($ch, CURLOPT_URL, $url); 
  
	$response = curl_exec($ch);
	$response=json_decode($response);     
/***File Hashing ends***/  


}else{
	//upload database
}

?>