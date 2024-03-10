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

    <title>Student | Archives</title>
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
                      $stuclass = $_SESSION['stuclass'];
                      $sql = "SELECT tblclass.ID,tblclass.ClassName,tblclass.Section,tblnotice.NoticeTitle,tblnotice.CreationDate,tblnotice.ClassId,tblnotice.NoticeMsg,tblnotice.ID as nid from tblnotice join tblclass on tblclass.ID=tblnotice.ClassId where tblnotice.ClassId=:stuclass";
                      $query = $dbh->prepare($sql);
                      $query->bindParam(':stuclass', $stuclass, PDO::PARAM_STR);
                      $query->execute();
                      $results = $query->fetchAll(PDO::FETCH_OBJ);
                      $cnt = 1;
                      if ($query->rowCount() > 0) {
                        foreach ($results as $row) {               ?>
                          <tr align="center" class="table-warning">

                          </tr>
                          <tr>
                            <th>Announcement</th>
                            <td><?php echo $row->CreationDate; ?></td>
                          </tr>
                          <tr>
                            <th>Subject</th>
                            <td><?php echo $row->NoticeTitle; ?></td>
                          </tr>
                          <tr>
                            <th>Message</th>
                            <td><?php echo $row->NoticeMsg; ?></td>

                          </tr>

                        <?php $cnt = $cnt + 1;
                        }
                      } else { ?>
                        <tr>
                          <th colspan="2" style="color:red;">No Notice Found</th>
                        </tr>
                      <?php } ?>
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