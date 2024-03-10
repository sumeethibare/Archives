<nav class="sidebar sidebar-offcanvas">
</nav>

<!-- navbar -->

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
  <div class="h-full px-3 py-4 overflow-y-auto bg-black">
    <a href="logout.php" class="flex items-center justify-between ps-2.5 mb-5">
      <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Archives</span>
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
      </svg>
    </a>
    <ul class="space-y-2 font-medium bg-rose-800 rounded-2xl">
      <li>
        <details>
          <summary class="flex items-center p-2 text-gray-900 rounded-t-2xl text-white hover:bg-rose-700 group">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>



            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">
              <?php
              $uid = $_SESSION['sturecmsuid'];
              $sql = "SELECT * from tblstudent where ID=:uid";

              $query = $dbh->prepare($sql);
              $query->bindParam(':uid', $uid, PDO::PARAM_STR);
              $query->execute();
              $results = $query->fetchAll(PDO::FETCH_OBJ);

              $cnt = 1;
              if ($query->rowCount() > 0) {
                foreach ($results as $row) {               ?>
                  <p><?php echo htmlentities($row->StudentName); ?></p>

              <?php $cnt = $cnt + 1;
                }
              } ?>
            </span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg>


          </summary>
          <ul class="p-2 bg-rose-700 rounded-t-none rounded-b-2xl">
            <li class="btn btn-sm btn-ghost text-white"><a href="student-profile.php">Profile</a></li>
            <li class="btn btn-sm btn-ghost text-white"><a href="change-password.php">Settings</a></li>
          </ul>
        </details>
      </li>
      <!-- <li>
        <a href="dashboard.php" class="flex items-center p-2 text-gray-900 rounded-none text-white hover:bg-rose-700 group">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
          </svg>

          <span class="ms-3">Dashboard</span>
        </a>
      </li> -->
      <li>
        <a href="view-notice.php" class="flex items-center p-2 text-gray-900 rounded-b-2xl text-white hover:bg-rose-700 group">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 0 1-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 0 0 1.183 1.981l6.478 3.488m8.839 2.51-4.66-2.51m0 0-1.023-.55a2.25 2.25 0 0 0-2.134 0l-1.022.55m0 0-4.661 2.51m16.5 1.615a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V8.844a2.25 2.25 0 0 1 1.183-1.981l7.5-4.039a2.25 2.25 0 0 1 2.134 0l7.5 4.039a2.25 2.25 0 0 1 1.183 1.98V19.5Z" />
          </svg>
          <span class="flex-1 ms-3 whitespace-nowrap">Inbox</span>
        </a>
      </li>
    </ul>

    <div id="dropdown-cta" class="p-4 mt-6 bg-rose-800 rounded-2xl" role="alert">
      <div class="flex items-center mb-3">
        <span class="bg-orange-100 text-orange-800 text-sm font-semibold me-2 px-2.5 py-0.5 rounded-full">Beta</span>
      </div>
      <p class="mb-3 text-sm text-white">
        this is Student Archives System, Report us if there are any bugs or want to add some features!
      </p>
      <a href="contact.php" class="btn text-white bg-black font-mono w-full rounded-full">feedback</a>
    </div>
  </div>
</aside>