<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsstuid'] == 0)) {
  header('location:logout.php');
} else {

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>

    <title>My Profile | Archives</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.3/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/style.css" />
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

                    <table class="table">
                      <?php
                      $sid = $_SESSION['sturecmsstuid'];
                      $sql = "SELECT tblstudent.StudentName,tblstudent.StudentEmail,tblstudent.StudentClass,tblstudent.Gender,tblstudent.DOB,tblstudent.StuID,tblstudent.FatherName,tblstudent.MotherName,tblstudent.ContactNumber,tblstudent.AltenateNumber,tblstudent.Address,tblstudent.UserName,tblstudent.Password,tblstudent.Image,tblstudent.DateofAdmission,tblclass.ClassName,tblclass.Section from tblstudent join tblclass on tblclass.ID=tblstudent.StudentClass where tblstudent.StuID=:sid";
                      $query = $dbh->prepare($sql);
                      $query->bindParam(':sid', $sid, PDO::PARAM_STR);
                      $query->execute();
                      $results = $query->fetchAll(PDO::FETCH_OBJ);
                      $cnt = 1;
                      if ($query->rowCount() > 0) {
                        foreach ($results as $row) {               ?>

                          <tr>
                            <th>Student Name</th>
                            <td><?php echo $row->StudentName; ?></td>
                            <th>Student Email</th>
                            <td><?php echo $row->StudentEmail; ?></td>
                          </tr>
                          <tr>
                            <th>Student Class</th>
                            <td><?php echo $row->ClassName; ?> <?php echo $row->Section; ?></td>
                            <th>Gender</th>
                            <td><?php echo $row->Gender; ?></td>
                          </tr>
                          <tr>
                            <th>Date of Birth</th>
                            <td><?php echo $row->DOB; ?></td>
                            <th>Student ID</th>
                            <td><?php echo $row->StuID; ?></td>
                          </tr>
                          <tr>
                            <th>Father Name</th>
                            <td><?php echo $row->FatherName; ?></td>
                            <th>Mother Name</th>
                            <td><?php echo $row->MotherName; ?></td>
                          </tr>
                          <tr>
                            <th>Contact Number</th>
                            <td><?php echo $row->ContactNumber; ?></td>
                            <th>Altenate Number</th>
                            <td><?php echo $row->AltenateNumber; ?></td>
                          </tr>
                          <tr>
                            <th>Address</th>
                            <td><?php echo $row->Address; ?></td>
                            <th>User Name</th>
                            <td><?php echo $row->UserName; ?></td>
                          </tr>
                          <tr>
                            <th>Profile Pics</th>
                            <td><img src="../admin/images/<?php echo $row->Image; ?>"></td>
                            <th>Date of Admission</th>
                            <td><?php echo $row->DateofAdmission; ?></td>
                          </tr>
                      <?php $cnt = $cnt + 1;
                        }
                      } ?>
                    </table>
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