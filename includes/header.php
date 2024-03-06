<div class="navbar bg-black text-white">
  <div class="navbar-start">
    <a class="btn btn-ghost text-xl font-medium">Archives</a>
  </div>
  <div class="navbar-center hidden lg:flex">
    <ul class="menu menu-horizontal px-1">
      <li><a href="index.php">main</a></li>
      <li><a href="about.php">NextLevel</a></li>
      <li><a href="admin/login.php">Administrator</a></li>
      <li><a href="user/login.php">Student</a></li>
    </ul>
  </div>
  <div class="navbar-end">
    <a href="http://localhost/phpmyadmin/" target="_blank" class="hidden lg:flex btn btn-ghost hover:bg-black text-white hover:rotate-180">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
      </svg>
    </a>
    <label for="my-drawer-4" class="drawer-button btn btn-ghost lg:hidden">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" />
      </svg>

    </label>
  </div>
</div>

<!-- the mobile drawer -->

<div class="drawer drawer-end">
  <input id="my-drawer-4" type="checkbox" class="drawer-toggle" />
  <div class="drawer-content">
  </div>
  <div class="drawer-side z-50">
    <label for="my-drawer-4" aria-label="close sidebar" class="drawer-overlay"></label>
    <ul class="menu p-4 w-80 min-h-full bg-base-200 text-base-content justify-center dark:bg-black dark:text-white text-lg">
      <li><a href="index.php" class="hover:p-6 hover:text-xl duration-700 hover:duration-700 transition-all rounded-none">main</a></li>
      <li><a href="about.php" class="hover:p-6 hover:text-xl duration-700 hover:duration-700 transition-all rounded-none">NextLevel</a></li>
      <li><a href="admin/login.php" class="hover:p-6 hover:text-xl duration-700 hover:duration-700 transition-all rounded-none">Administrator</a></li>
      <li><a href="user/login.php" class="hover:p-6 hover:text-xl duration-700 hover:duration-700 transition-all rounded-none">Student</a></li>
    </ul>
  </div>
</div>

<!-- the end of mobile drawer -->