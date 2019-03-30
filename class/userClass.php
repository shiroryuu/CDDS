<?php 

class userClass
{
	public function userRegistration($name,$email,$password,$type)
	{
		try{
			$db = getDB();
			$st = $db->prepare("SELECT `id` FROM users WHERE email=:email");
			$st->bindParam("email", $email,PDO::PARAM_STR);
			$st->execute();
			$count=$st->rowCount();
			if($count==0){
				$db1 = getDB();
				$st1 = $db1->prepare("INSERT INTO users(name,email,password,type) VALUES (:name,:email,:hash_password,:type)");
				$st1->bindParam("name", $name,PDO::PARAM_STR) ;
				$hash_password= hash('sha256', $password); //Password encryption
				$st1->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
				$st1->bindParam("email", $email,PDO::PARAM_STR) ;
				$st1->bindParam("type", $type,PDO::PARAM_STR) ;
				$st1->execute();
				$uid=$db1->lastInsertId(); // Last inserted row id
				$_SESSION['uid']=$uid;
				return $count;
			}
			else {
				return $count;
			}
		}
	catch(PDOException $e) {
		echo '{"error":{"textreg":'. $e->getMessage() .'}}'; 
	}
}

public function userLogin($email,$password)
{
	try{
		$db = getDB();
			$hash_password= hash('sha256', $password); //Password encryption 
			$stmt = $db->prepare("SELECT `id`,name FROM users WHERE email=:email AND password=:hash_password"); 
			$stmt->bindParam("email", $email,PDO::PARAM_STR) ;
			$stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
			$stmt->execute();
			$count=$stmt->rowCount();
			$data=$stmt->fetch(PDO::FETCH_OBJ);
			if($count==1){
				$_SESSION['name']=$data->name;
				$_SESSION['uid']=$data->id; // Storing user session value
				return $count;
			}
			else{
				return $count;
			} 
		}
		catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}

	}

	public function verifyEmail($uid,$name,$email,$tcode){
		$emailm='worains@gmail.com';
		$ToEmail =$email; 
		$EmailSubject ="Verify Your WorLeads Account";  
		$mailheader = "From: ".$emailm."\r\n"; 
		$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
		$MESSAGE_BODY = "     
		Hello ".$name.",
		<br /><br />
		Welcome to WorLeads!<br/>
		To complete your registration  please , just click the following link<br/>
		<br /><br />
		http://worleads.com/system/7w4qd5c2z1n3j6u5k6.php?id=".$uid."&code=".$tcode."
		<br /><br />
		Thanks,
		<br />
		WorLeads Support Team";
		mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader);
	}

	public function userReset($usernameEmail)	{
		try{
			$db = getDB();
			$stmt = $db->prepare("SELECT uid,name,email,token FROM users WHERE (username=:usernameEmail or email=:usernameEmail)");
			$stmt->bindParam("usernameEmail", $usernameEmail,PDO::PARAM_STR) ;
			$stmt->execute();
			$count=$stmt->rowCount();
			$data=$stmt->fetch(PDO::FETCH_OBJ);
			$db = null;
			if($count==1){
				$uid=$data->uid;
				$name=$data->name;
				$email=$data->email;
				$tcode=$data->token;
				self::PassReset($uid,$name,$email,$tcode);
			}
			else{
				//do nothing
			} 
		}
		catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}

	}

	public function PassReset($uid,$name,$email,$tcode){
		$emailm='worains@gmail.com';
		$ToEmail =$email; 
		$EmailSubject ="Password reset request for WorLeads Account";  
		$mailheader = "From: ".$emailm."\r\n"; 
		$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
		$MESSAGE_BODY = "     
		Hello ".$name.",
		<br /><br />
		We got a Password Reset Request from you. If it was not you, then just ignore the Request.<br/>
		To reset your Password please , just click the following link<br/>
		<br /><br />
		http://worleads.com/system/5ds7e8f4s52f5w0s95.php?id=".$uid."&code=".$tcode."
		<br /><br />
		Thanks,
		<br />
		WorLeads Support Team";
		mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader);
	}

	public function updatePassword($uid,$password){
		try{
			$db = getDB();
			$stmt = $db->prepare("UPDATE users SET pass=:hash_password WHERE uid=:uid"); 
			$hash_password= hash('sha256', $password);
			$stmt->bindParam("uid", $uid,PDO::PARAM_INT);
			$stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
			$stmt->execute();
 //User data
			return true;
		}
		catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}

	public function updateEmail($uid,$usernameEmail){
		try{
			$db = getDB();
			$st = $db->prepare("SELECT uid FROM users WHERE uid=:uid"); 
			$st->bindParam("uid", $uid,PDO::PARAM_STR);
			$st->execute();
			$count=$st->rowCount();
			if($count==1){
				$db2 = getDB();	
				$stmt = $db2->prepare("UPDATE users SET email=:usernameEmail WHERE uid=:uid"); 
				$stmt->bindParam("uid", $uid,PDO::PARAM_INT);
				$stmt->bindParam("usernameEmail", $usernameEmail,PDO::PARAM_STR);
				$stmt->execute();
 //User data
				return true;
			}
			else {
				$db = null;
				return false;
			}
		}
		catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}

	public function userDetails($uid){
		try{
			$db = getDB();
			$stmt = $db->prepare("SELECT name,email,username FROM users WHERE uid=:uid"); 
			$stmt->bindParam("uid", $uid,PDO::PARAM_INT);
			$stmt->execute();
		$data = $stmt->fetch(PDO::FETCH_OBJ); //User data
		return $data;
	}
	catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}
	public function getUserIDS()	{
		try{
			$db = getDB();
			$stmt = $db->prepare("SELECT `id` FROM users");
			$stmt->execute();
			$data=$stmt->fetchALL(PDO::FETCH_OBJ);
			$data=$data->id;
			return $data;
			$db = null;
			 
		}
		catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}

	}

}

?>