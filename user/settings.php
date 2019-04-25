<?php
include('../include/config.inc');
include('../include/session.inc'); 
include('../include/uheader.inc');

$data=$userClass->getUserInfo($_SESSION['uid']);

if(isset($_POST['submit1'])){
  $ctype=$_POST['ctype'];
  $cdata=$_POST['cdata'];
  if($ctype=='name'){
    $userClass->updateNameUser($_SESSION['uid'],$cdata);
    $url=BASE_URL."user/settings";
    header("Location: $url");
  }elseif ($ctype=='email') {
    $userClass->updateEmailUser($_SESSION['uid'],$cdata);
    $url=BASE_URL."user/settings";
    header("Location: $url");
  }elseif ($ctype=='type') {
    $userClass->updateTypeUser($_SESSION['uid'],$cdata);
    $url=BASE_URL."user/settings";
    header("Location: $url");
  }
}

?>
<div class="content">
  <div class="row">
    <div class="col-md-10">
      <div class="card card-user">
        <div class="card-header">
          <h5 class="card-title">Edit Profile</h5>
        </div>
        <div class="card-body">
            <div class="row">
              <div class="col-md-4 pr-1">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" disabled="" value="<?php echo $data->name; ?>">
                </div>
              </div>
              <div class="col-md-4 px-1">
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" disabled="" value="<?php echo $data->email; ?>">
                </div>
              </div>
              <div class="col-md-4 pl-1">
                <div class="form-group">
                  <label>Type</label>
                  <input type="text" class="form-control" disabled="" value="<?php echo $data->type; ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 pr-1">
                <div class="form-group">
                  <form action="" class="bg-white rounded pb_form_v1" method="POST">
                  <label>Change</label>
                  <select class="form-control" name="ctype">
                    <option value="name">Name</option>
                    <option value="email">Email</option>
                    <option value="type">Subs-Type</option>
                  </select>
                  <input type="text" class="form-control" name="cdata">
                  <button type="submit" class="btn btn-primary btn-round" name="submit1">Update Profile</button>
                </div>
                </form>
              </div>
              <div class="col-md-6 pl-1">
                <form action="" method="POST" id="Userform">
                <div class="form-group">
                  <label>Change Password</label>
                  <input type="password" class="form-control" placeholder="Enter old password" name="oldpass">
                  <input type="password" class="form-control" placeholder="Enter new password" name="newpass">
                  <button type="submit" class="btn btn-primary btn-round" name="submit">Update Password</button>
                </div>
                </form>
              </div> 
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<?php include('../include/ufooter.inc'); ?>      