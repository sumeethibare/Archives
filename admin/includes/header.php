<?php
$aid = $_SESSION['sturecmsaid'];
$sql = "SELECT * from tbladmin where ID=:aid";

$query = $dbh->prepare($sql);
$query->bindParam(':aid', $aid, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);

$cnt = 1;
if ($query->rowCount() > 0) {
  foreach ($results as $row) {               ?>

    <div class="navbar bg-white">
      <div class="flex-1"></div>

      <div class="navbar-center space-x-4">
        <div class="relative">
          <div class="absolute inset-y-0 start-0 flex items-center ps-3">
            <a href="search.php">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
              </svg>
            </a>
          </div>

          <input type="text" id="simple-search" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full lg:w-96 ps-10 p-2.5" placeholder="want to find anything ??" required />
        </div>

        <div class="dropdown dropdown-right dropdown-hover">
          <div tabindex="0" role="button" class="btn btn-sm btn-ghost bg-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
          </div>
          <ul tabindex="0" class="dropdown-content z-[1] menu bg-gray-200 rounded-3xl w-52 space-y-1">
            <li><a href="add-students.php" class="btn btn-ghost bg-gray-100 rounded-t-3xl">Student</a></li>
            <li><a href="add-class.php" class="btn btn-ghost bg-gray-100 rounded-none">Class</a></li>
            <li><a href="add-notice.php" class="btn btn-ghost bg-gray-100 rounded-none">Notice</a></li>
            <li><a href="add-public-notice.php" class="btn btn-ghost bg-gray-100 rounded-b-3xl">Announcement</a></li>
          </ul>
        </div>
      </div>


      <div class="flex-none gap-2 navbar-end">
        <div class="dropdown dropdown-end">
          <div tabindex="0" role="button" class="btn btn-ghost flex">
            <h1> Welcome, <?php echo htmlentities($row->AdminName); ?></h1>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
              <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
          </div>
          <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content w-52 bg-white rounded-xl">
            <li class="btn btn-ghost btn-lg pointer-events-none"><?php echo htmlentities($row->AdminName); ?><br><br><?php echo htmlentities($row->Email); ?></li>
            <hr class="py-1">
            <li><a class="btn btn-ghost btn-sm" href="profile.php">Profile</a></li>
            <li><a class="btn btn-ghost btn-sm" href="change-password.php">change password</a></li>
            <li><a href="logout.php" class="btn btn-ghost btn-sm">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>

<?php $cnt = $cnt + 1;
  }
} ?>