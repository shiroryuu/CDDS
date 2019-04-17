<?php 
include('../include/config.inc');
include('../include/session.inc'); 
include('../include/uheader.inc');

$files = $dataClass->fetchRecentUserFiles($_SESSION['uid']); 

$data1 = $userClass->getNoFiles($_SESSION['uid']);
$data2 = $userClass->getNoDFiles($_SESSION['uid']);
$predata3 = $userClass->getData($_SESSION['uid']);
$predata4 = $userClass->getDData($_SESSION['uid']);

$data3 = $dataClass->convertBytes($predata3->dp);
$data4 = $dataClass->convertBytes($predata4->ddp);

?>
<div class="content">
  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-warning">
                <i class="nc-icon nc-globe text-warning"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category">Files Processed</p>
                <p class="card-title"><?php echo $data1->nf;?><p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer ">
              <hr>
              <div class="stats">
                <i class="fa fa-clock-o"></i>Last Update: <?php echo date("M,d,Y h:i:s A"); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-body ">
              <div class="row">
                <div class="col-5 col-md-4">
                  <div class="icon-big text-center icon-warning">
                    <i class="nc-icon nc-globe text-warning"></i>
                  </div>
                </div>
                <div class="col-7 col-md-8">
                  <div class="numbers">
                    <p class="card-category">Duplicate Files</p>
                    <p class="card-title"><?php echo $data2->dnf;?><p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer ">
                  <hr>
                  <div class="stats">
                    <i class="fa fa-clock-o"></i>Last Update: <?php echo date("M,d,Y h:i:s A"); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-body ">
                  <div class="row">
                    <div class="col-5 col-md-4">
                      <div class="icon-big text-center icon-warning">
                        <i class="nc-icon nc-vector text-danger"></i>
                      </div>
                    </div>
                    <div class="col-7 col-md-8">
                      <div class="numbers">
                        <p class="card-category">Data Processed</p>
                        <p class=""><?php echo $data3; ?><p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer ">
                      <hr>
                      <div class="stats">
                        <i class="fa fa-clock-o"></i><?php echo date("M,d,Y h:i:s A"); ?> 
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="card card-stats">
                    <div class="card-body ">
                      <div class="row">
                        <div class="col-5 col-md-4">
                          <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-vector text-danger"></i>
                          </div>
                        </div>
                        <div class="col-7 col-md-8">
                          <div class="numbers">
                            <p class="card-category">Duplicate Data</p>
                            <p class="card-title"><?php echo $data4; ?><p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card-footer ">
                          <hr>
                          <div class="stats">
                            <i class="fa fa-clock-o"></i><?php echo date("M,d,Y h:i:s A"); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card ">
                        <div class="card-header ">
                          <h5 class="card-title">Recent Files</h5>
                          <p class="card-category">
                            <div class="row">
                              <?php 
                              foreach ($files as $file) {
                                echo '<div class="col-md-3"><a href="https://drive.google.com/file/d/'.$file->sid.'" target="_BLANK"><img src="../assets/images/file-icon.png" width="75" height="75"><br>'.$file->filename.'<br>'.$file->uploadtime.'<br><br></a></div>';
                              }
                              ?>
                            </div>
                          </p>
                        </div>
                        <div class="card-footer ">
                          <hr>
                          <div class="stats">
                            <i class="fa fa-history"></i>Last Sync: <?php echo date("M,d,Y h:i:s A"); ?>
                          </div>
                        </div>
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