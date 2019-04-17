<?php 

include('../include/config.inc');
include('../class/dataClass.php');
include('../class/userClass.php');

$userClass = new userClass();
$dataClass = new dataClass();

//get ID of all users
$uid=$userClass->getUserIDS();

foreach ($uid as $mid) {
  $id=$mid->id;
  //Get Filemeta of the user
  $results=$dataClass->getFileMeta($id);
 //Process Each file
  foreach ($results as $key) {
    foreach ($key as $result) {
      if($result->mimeType!="application/vnd.google-apps.folder"){
        $fid=$result->id;
        $ofileName=$result->name;

    //check if file has been processed
    $data=$dataClass->checkFilebyID($fid,$id);
    
    if($data==-1){ //if file not processed 

      //start file download
      $fileNamearr=$dataClass->pullData($fid);
      sleep(1);
      if($fileNamearr[1]){
          $fileName=$fileNamearr[0];
        //Gen Hash
        if($hash=$dataClass->genHash($fileName)){
        //Check if Hash exists    
          $bool=$dataClass->checkHash($hash,$id);
          $file=BASE_URL."API/node-backend/backend/Files/".$fileName;  
          $fileSize=$dataClass->getFileSize($file);
        }
      }

    if($bool==1){//if hash not
      $dp=0;
    }else{//if hash present (Duplicate Found)

      //Delete File on Server Pending
      $fid=$bool['sid'];
      $dp=$bool['id'];
    }
    //update database
    if($dataClass->pushFileInfo($id,$ofileName,$hash,$fid,$dp,$fileSize)){
      $fid=NULL;
      $data=NULL;
      $fileName=NULL;
      $ofileName=NULL;
      $hash=NULL;
      $id=NULL;
      $bool=NULL;
      $dp=NULL;
      $fileNamearr=NULL;
      $fileSize=NULL;
    }
  }
    }else{ //if file processed
      //Batch File for processing
    }
  }
}

}

?>