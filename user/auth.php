<?php 

include('../include/config.inc');
include('../include/session.inc');

$type=$_GET['type'];
switch ($type) {
	case 'gdrive':
	{
		$url = "http://localhost:3000/connect"; 
		$ch = curl_init();  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
		curl_setopt($ch, CURLOPT_URL, $url); 
		$result=curl_exec($ch);
		curl_close($ch);
		$result=json_decode($result);
		if($result->message="successfull"){
			$url=BASE_URL."user/storage";
			exit("Please close the Tab");
		} 
	}
	break;
	
	default:
	echo "Error while connecting...";
	break;
}
?>