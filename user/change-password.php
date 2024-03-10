<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['sturecmsstuid'] == 0)) {
  header('location:logout.php');
} else {
  if (isset($_POST['submit'])) {
    $sid = $_SESSION['sturecmsstuid'];
    $cpassword = md5($_POST['currentpassword']);
    $newpassword = md5($_POST['newpassword']);
    $sql = "SELECT StuID FROM tblstudent WHERE StuID=:sid and Password=:cpassword";
    $query = $dbh->prepare($sql);
    $query->bindParam(':sid', $sid, PDO::PARAM_STR);
    $query->bindParam(':cpassword', $cpassword, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if ($query->rowCount() > 0) {
      $con = "update tblstudent set Password=:newpassword where StuID=:sid";
      $chngpwd1 = $dbh->prepare($con);
      $chngpwd1->bindParam(':sid', $sid, PDO::PARAM_STR);
      $chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
      $chngpwd1->execute();

      echo '<script>alert("Your password successully changed")</script>';
    } else {
      echo '<script>alert("Your current password is wrong")</script>';
    }
  }
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>

    <title>Passkey's | Archives</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.3/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/style.css" />

    <script type="text/javascript">
      function checkpass() {
        if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
          alert('New Password and Confirm Password field does not match');
          document.changepassword.confirmpassword.focus();
          return false;
        }
        return true;
      }
    </script>
  </head>

  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
        <?php include_once('includes/sidebar.php'); ?>
        <div class="main-panel">
          <div class="content-wrapper bg-white">
            <div class="row">

              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" name="changepassword" method="post" onsubmit="return checkpass();">

                      <div class="form-group">
                        <input type="password" name="currentpassword" placeholder="Current Passkey" id="currentpassword" class="form-control input input-bordered w-full max-w-xs" required="true">
                      </div>
                      <div class="form-group">
                        <input type="password" name="newpassword" placeholder="New Passkey" class="form-control input input-bordered w-full max-w-xs" required="true">
                      </div>
                      <div class="form-group">
                        <input type="password" name="confirmpassword" placeholder="Retype New Passkey" id="confirmpassword" value="" class="form-control input input-bordered w-full max-w-xs" required="true">
                      </div>

                      <button type="submit" class="btn bg-rose-500 btn-danger mr-2" name="submit">Change</button>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php include_once('includes/footer.php'); ?>
        </div>
      </div>
    </div>
  </body>

  </html><?php }  ?>