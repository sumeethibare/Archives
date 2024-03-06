<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!doctype html>
<html data-theme="lofi" class="scrolly">

<head>
  <title>Archives | Student Management System</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="includes/skin.css" rel="stylesheet" type="text/css" />
</head>

<body>

  <!-- Fluid Navigation -->

  <?php include_once('includes/header.php'); ?>

  <!-- The End Of Fluid Navigation-->

  <!-- the impressme!! -->

  <div class="hero min-h-screen bg-white">
    <div class="hero-content text-center">
      <div class="max-w-md">
        <p class="py-2">presenting</p>
        <h1 class="text-8xl font-bold">Archives.</h1>

        <div class="py-6">
          <a class="btn bg-black text-white rounded-none hover:bg-rose-500 hover:drop-shadow-2xl">Docs</a>
          <a class="btn bg-black text-white rounded-none hover:bg-rose-500 hover:shadow-2xl">Project Report</a>
          <a class="btn bg-black text-white rounded-none hover:bg-rose-500 hover:shadow-2xl">Repo</a>
        </div>
      </div>
    </div>
  </div>

  <!-- the end of impressme!! -->


  <!-- the Announcements Area -->

  <div class="bg-black text-white">
    <div class="flex justify-evenly ">
      <div class="flex justify-center items-center">
        <h1 class="text-6xl font-bold">Announcements</h1>
        <a class="p-4"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
          </svg></a>
      </div>
      <div>
        <!-- the logic for announcements -->
        <marquee style="height:350px;" direction="up" onmouseover="this.stop();" onmouseout="this.start();">
          <?php
          $sql = "SELECT * from tblpublicnotice";
          $query = $dbh->prepare($sql);
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);

          $cnt = 1;
          if ($query->rowCount() > 0) {
            foreach ($results as $row) {               ?>
              <a href="view-public-notice.php?viewid=<?php echo htmlentities($row->ID); ?>" target="_blank" style="color:#fff;">
                <?php echo htmlentities($row->NoticeTitle); ?>(<?php echo htmlentities($row->CreationDate); ?>)</a>
              <hr /><br />

          <?php $cnt = $cnt + 1;
            }
          } ?>
        </marquee>
        <!-- end of the logic for announcements -->
      </div>
    </div>
  </div>

  <!-- the end of Announcements Area -->

</body>

</html>