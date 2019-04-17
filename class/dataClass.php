<?php

class dataClass{
	
	public function genHash($filename){
		$url = "http://localhost:3000/chunks/".$filename; 
		$ch = curl_init();  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_URL, $url); 
		$result = curl_exec($ch);  
		$result=json_decode($result);  
		return $result->hash;
	}

	public function pushData($filename){
		//Add Dynamic Token
		$url = "http://localhost:3000/upload/".$filename;  
		$ch = curl_init();   
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_URL, $url); 
		if($response = curl_exec($ch)){
		$response=json_decode($response);
		$fid=$response->fileid;
		return $fid;
	} 
	}
	
	public function pullData($fid){
		//Add dynamic Token
		$url = "http://localhost:3000/files/".$fid;  
		$ch = curl_init();   
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_URL, $url); 
		if($response = curl_exec($ch)){
		$response=json_decode($response);
		$fname=$response->name;
		return array($fname,true);
		}
	}

	public function checkHash($result,$session){
		try{
			$db = getDB();
			$st = $db->prepare("SELECT `id`,`sid` FROM `hashs` WHERE (uid=:sessionid AND `hash`=:results)");
			$st->bindParam("sessionid", $session,PDO::PARAM_INT);
			$st->bindParam("results", $result,PDO::PARAM_STR);
			$st->execute();
			$count=$st->rowCount();
			if($count==0){
				return 1;
			}
			else {
			$data = $st->fetch(PDO::FETCH_OBJ);
				return array('id' => $data->id,'sid' => $data->sid );
			}
		}
	catch(PDOException $e) {
		echo '{"error":{"textreg":'. $e->getMessage() .'}}'; 
	}
	}

	public function pushFileInfo($session,$filename,$result,$fid,$dp,$fileSize){
		try{
			$db = getDB();
			$st = $db->prepare("INSERT INTO `hashs` (filename,uid,hash,sid,duplicate,fsize) VALUES (:filename,:session,:result,:fid,:dp,:fileSize)");
			$st->bindParam("filename", $filename,PDO::PARAM_STR);
			$st->bindParam("session", $session,PDO::PARAM_STR);
			$st->bindParam("result", $result,PDO::PARAM_STR);
			$st->bindParam("fid", $fid,PDO::PARAM_STR);
			$st->bindParam("dp", $dp,PDO::PARAM_STR);
			$st->bindParam("fileSize", $fileSize,PDO::PARAM_STR);
			$st->execute();
		}
	catch(PDOException $e) {
		echo '{"error":{"textreg":'. $e->getMessage() .'}}'; 
	}
	}
	public function checkFilebyID($fid,$uid){
		try{
			$db = getDB();
			$st = $db->prepare("SELECT `id` FROM `hashs` WHERE (uid=:uid AND sid=:fid)");
			$st->bindParam("uid", $uid,PDO::PARAM_INT);
			$st->bindParam("fid", $fid,PDO::PARAM_STR);
			$st->execute();
			$count=$st->rowCount();
			if($count==0){
				return -1;
			}
			else {
				return 0;
			}
		}
	catch(PDOException $e) {
		echo '{"error":{"textreg":'. $e->getMessage() .'}}'; 
	}
	}
	public function getFileMeta($uid){
		try{
			//Add dynamic Token
			$url = "http://localhost:3000/files";  
			$ch = curl_init();   
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_URL, $url); 
			$results = curl_exec($ch); 
  			$results = json_decode($results);
  			return $results; 
		}
	catch(PDOException $e) {
		echo '{"error":{"textreg":'. $e->getMessage() .'}}'; 
	}
	}

	public function fetchUserFiles($sessionid){
		try{
			$db = getDB();
			$st = $db->prepare("SELECT `filename`,sid,uploadtime FROM `hashs` WHERE (uid=:uid)");
			$st->bindParam("uid", $sessionid,PDO::PARAM_INT);
			$st->execute();
			$data=$st->fetchALL(PDO::FETCH_OBJ);
			return $data;
		}
	catch(PDOException $e) {
		echo '{"error":{"textreg":'. $e->getMessage() .'}}'; 
	}
	}

	public function fetchRecentUserFiles($sessionid){
		try{
			$db = getDB();
			$st = $db->prepare("SELECT `filename`,sid,uploadtime FROM `hashs` WHERE (uid=:uid) ORDER BY uploadtime DESC LIMIT 4");
			$st->bindParam("uid", $sessionid,PDO::PARAM_INT);
			$st->execute();
			$data=$st->fetchALL(PDO::FETCH_OBJ);
			return $data;
		}
	catch(PDOException $e) {
		echo '{"error":{"textreg":'. $e->getMessage() .'}}'; 
	}
	}
	public function convertBytes($bytes)
	{
		 if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
	}
	public function getFileSize($file){
		return filesize($file);
	}
}

?>