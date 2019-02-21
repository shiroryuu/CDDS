<?php 

class adminClass 
{
	public function adminRegistration($aname,$apassword,$aemail,$ausername,$atoken,$aphno)
	{
		try{
			$db = getDB();
			$st = $db->prepare("SELECT token FROM tokens WHERE token=:atoken"); 
			$st->bindParam("atoken", $atoken,PDO::PARAM_STR);
			$st->execute();
			$count=$st->rowCount();
			if($count==	1){
				$db3 = getDB();
				$st2 = $db3->prepare("SELECT aid FROM admins WHERE ausername=:ausername OR aemail=:aemail"); 
				$st2->bindParam("ausername", $ausername,PDO::PARAM_STR);
				$st2->bindParam("aemail", $aemail,PDO::PARAM_STR);
				$st2->execute();
				$count=$st2->rowCount();
				if($count==0){
					$db2=getDB();
				$atcode = md5( rand(0,1000) );	
				$stmt = $db2->prepare("INSERT INTO admins(ausername,apass,aemail,aname,apno,atoken) VALUES (:ausername,:ahash_password,:aemail,:aname,:aphno,:atcode)");
				$stmt->bindParam("ausername", $ausername,PDO::PARAM_STR) ;
				$ahash_password= hash('sha256', $apassword); //Password encryption
				$stmt->bindParam("ahash_password", $ahash_password,PDO::PARAM_STR) ;
				$stmt->bindParam("aemail", $aemail,PDO::PARAM_STR) ;
				$stmt->bindParam("aname", $aname,PDO::PARAM_STR) ;
				$stmt->bindParam("aphno", $aphno,PDO::PARAM_STR) ;
				$stmt->bindParam("atcode", $atcode,PDO::PARAM_STR) ;
				$stmt->execute();
				$aid=$db2->lastInsertId(); // Last inserted row id
				$_SESSION['aid']=$aid;
				return true;
				}
			else{
				return false;
				}
			}
			else{
				$db = null;
				$db2 = null;
				return false;
			}
		}
		catch(PDOException $e) {
			echo '{"error":{"textreg":'. $e->getMessage() .'}}'; 
		}
	}

	public function adminLogin($apassword,$ausername)
	{
		try{
			$db = getDB();
			$ahash_password= hash('sha256', $apassword); //Password encryption 
			$stmt = $db->prepare("SELECT aid FROM admins WHERE ausername=:ausername AND apass=:ahash_password"); 
			$stmt->bindParam("ausername", $ausername,PDO::PARAM_STR) ;
			$stmt->bindParam("ahash_password", $ahash_password,PDO::PARAM_STR) ;
			$stmt->execute();
			$count=$stmt->rowCount();
			$data=$stmt->fetch(PDO::FETCH_OBJ);
			$db = null;
			if($count){
				$_SESSION['aid']=$data->aid; // Storing user session value
				return true;
			}
			else{
				return false;
			} 
		}
		catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}

	}	

	public function adminReset($adminnameEmail)	{
		try{
			$db = getDB();
			$stmt = $db->prepare("SELECT aid,aname,aemail,atoken FROM admins WHERE (ausername=:adminnameEmail or aemail=:adminnameEmail)");
			$stmt->bindParam("adminnameEmail", $adminnameEmail,PDO::PARAM_STR) ;
			$stmt->execute();
			$count=$stmt->rowCount();
			$data=$stmt->fetch(PDO::FETCH_OBJ);
			$db = null;
			if($count==1){
				$aid=$data->aid;
				$aname=$data->aname;
				$aemail=$data->aemail;
				$atcode=$data->atoken;
				self::PassReset($aid,$aname,$aemail,$atcode);
			}
			else{
				//do nothing
			} 
		}
		catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}

	}

	public function PassReset($aid,$aname,$aemail,$atcode){
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
	http://worleads.com/system/5ds7e8f4s52f5w0s956.php?id=".$aid."&code=".$atcode."
	<br /><br />
	Thanks,
	<br />
	WorLeads Support Team";
		mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader);
	}

	public function updatepasswordadmin($aid,$password){
	try{
		$db = getDB();
		$stmt = $db->prepare("UPDATE admins SET apass=:hash_password WHERE aid=:aid"); 
		$hash_password= hash('sha256', $password);
		$stmt->bindParam("aid", $aid,PDO::PARAM_INT);
		$stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
		$stmt->execute();
 //User data
		return true;
	}
	catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}

	public function updateEmailadmin($aid,$usernameEmail){
	try{
		$db = getDB();
		$st = $db->prepare("SELECT aid FROM admins WHERE aid=:aid"); 
		$st->bindParam("aid", $aid,PDO::PARAM_INT);
		$st->execute();
		$count=$st->rowCount();
		if($count==1){
			$db2 = getDB();	
			$stmt = $db2->prepare("UPDATE admins SET aemail=:usernameEmail WHERE aid=:aid"); 
			$stmt->bindParam("aid", $aid,PDO::PARAM_INT);
			$stmt->bindParam("usernameEmail", $usernameEmail,PDO::PARAM_STR);
			if($stmt->execute()){
 //User data
			return true;
			}
			else
			{
				return false;
			}
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

	public function adminDetails($aid){
	try{
		$db = getDB();
		$stmt = $db->prepare("SELECT aname,aemail,ausername FROM admins WHERE aid=:aid"); 
		$stmt->bindParam("aid", $aid,PDO::PARAM_INT);
		$stmt->execute();
		$data = $stmt->fetch(PDO::FETCH_OBJ); //admin data
		return $data;
		}
		catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}

}
?>