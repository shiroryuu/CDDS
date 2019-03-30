<?php

class dataClass{

	public function genHash(){

	}
	
	public function pushData(){

	}
	
	public function pullData(){

	}

	public function checkHash($result,$session){
		try{
			$db = getDB();
			$st = $db->prepare("SELECT `id` FROM hashs WHERE (uid=:session AND hash=:result");
			$st->bindParam("session", $session,PDO::PARAM_STR);
			$st->bindParam("hash", $result,PDO::PARAM_STR);
			$st->execute();
			$count=$st->rowCount();
			if($count==0){
				return true;
			}
			else {
				return false;
			}
		}
	catch(PDOException $e) {
		echo '{"error":{"textreg":'. $e->getMessage() .'}}'; 
	}
	}
}

?>