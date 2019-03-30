<?php
if(!empty($_SESSION['uid'])){
$session_aid=NULL;	
$session_uid=$_SESSION['uid'];
include('../class/userClass.php');
include('../class/dataClass.php');
$userClass = new userClass();
$orderClass = new dataClass();
}
if(!empty($_SESSION['aid'])){
$session_uid=NULL;	
$session_aid=$_SESSION['aid'];
include('../class/dataClass.php');
include('../class/adminClass.php');
$orderClass = new dataClass();
$adminClass = new adminClass();
}
if(empty($session_uid)){
$url=BASE_URL.'index.php';
header("Location: $url");
}
?>