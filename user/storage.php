<?php
include('../include/config.inc');
include('../include/session.inc'); 
include('../include/uheader.inc'); 

$files = $dataClass->fetchUserFiles($_SESSION['uid']);

?>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Storage</h4>
        </div>
        <div class="card-body">
          <div class="row">
          <?php 

          foreach ($files as $file) {
            echo '<div class="col-md-3"><a href="https://drive.google.com/file/d/'.$file->sid.'" target="_BLANK"><img src="../assets/images/file-icon.png" width="60" height="60"><br>'.$file->filename.'<br>'.$file->uploadtime.'<br><br></a></div>';
          }
          ?>    
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="upButton">
  <button type="button" class="upload" data-toggle="modal" data-target="#upModal"><i class="nc-icon nc-cloud-upload-94"></i></button>
</div>      
<?php include('../include/ufooter.inc'); ?>      