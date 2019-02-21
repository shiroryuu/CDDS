<?php
include('../include/config.inc');
$session_id=NULL;
$_SESSION['id']=NULL; 
if(empty($session_id) && empty($_SESSION['id']))
{
$url=BASE_URL.'index.php';
header("Location: $url");
}
?>