<?php
include('../include/config.inc');
include('../include/session.inc'); 
include('../include/uheader.inc'); 
?>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Connect with Cloud Storage</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>
                          <img src="../assets/images/gdrive.png" class="img-responsive" width="50px" height="50px">Google Drive
                        </td>
                        <td>
                          <button class="btn btn-primary"><a href="auth?type=gdrive" style="color:white;" target="_BLANK">Connect</a></button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                         <img src="../assets/images/odrive.png" class="img-responsive" width="50px" height="50px"> Microsoft OneDrive
                        </td>
                        <td>
                          <button class="btn btn-primary"><a href="#" style="color:white;">Connect</a></button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <img src="../assets/images/mega.png" class="img-responsive" width="50px" height="50px"> Mega
                        </td>
                        <td>
                          <button class="btn btn-primary"><a href="#" style="color:white;">Connect</a></button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      </div>

<div id="upButton">
<button type="button" class="upload" data-toggle="modal" data-target="#upModal"><i class="nc-icon nc-cloud-upload-94"></i></button>
</div>      
<?php include('../include/ufooter.inc'); ?>      