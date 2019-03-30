<?php 

include('../include/config.inc');
include('../class/dataClass.php');

$dataClass = new dataClass();

//File Upload
if (empty($_FILES) || $_FILES["file"]["error"]) {
	  die('{"OK": 0}');
}
$fileName = $_FILES["file"]["name"];
if(copy($_FILES["file"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/".SITE_NAME."/API/node-backend/backend/Files/$fileName")){
//File upload ends
chmod($_SERVER['DOCUMENT_ROOT']."/".SITE_NAME."/API/node-backend/backend/Files/$fileName",0755);
//File Hashing   
$result=$dataClass->genHash($fileName);
//Check if Hash exists    
$bool=$dataClass->checkHash($result,$_SESSION['uid']);  

if($bool==1){
	/***File Upload Starts***/
	$fid=$dataClass->pushData($fileName);
	$dp=0;
}else{
	$fid=$bool['sid'];
	$dp=$bool['id'];
}
//update database
	$dataClass->pushFileInfo($_SESSION['uid'],$fileName,$result,$fid,$dp);
die('{"OK": 1}');
}
die('{"OK": -1}');
?>