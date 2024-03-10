<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['login'])) {
  $stuid = $_POST['stuid'];
  $password = md5($_POST['password']);
  $sql = "SELECT StuID,ID,StudentClass FROM tblstudent WHERE (UserName=:stuid || StuID=:stuid) and Password=:password";
  $query = $dbh->prepare($sql);
  $query->bindParam(':stuid', $stuid, PDO::PARAM_STR);
  $query->bindParam(':password', $password, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  if ($query->rowCount() > 0) {
    foreach ($results as $result) {
      $_SESSION['sturecmsstuid'] = $result->StuID;
      $_SESSION['sturecmsuid'] = $result->ID;
      $_SESSION['stuclass'] = $result->StudentClass;
    }

    if (!empty($_POST["remember"])) {
      //COOKIES for username
      setcookie("user_login", $_POST["stuid"], time() + (10 * 365 * 24 * 60 * 60));
      //COOKIES for password
      setcookie("userpassword", $_POST["password"], time() + (10 * 365 * 24 * 60 * 60));
    } else {
      if (isset($_COOKIE["user_login"])) {
        setcookie("user_login", "");
        if (isset($_COOKIE["userpassword"])) {
          setcookie("userpassword", "");
        }
      }
    }
    $_SESSION['login'] = $_POST['stuid'];
    echo "<script type='text/javascript'> document.location ='view-notice.php'; </script>";
  } else {
    echo "<script>alert('Invalid Details');</script>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>Student | Archive</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="../includes/skin.css">

</head>

<body>


<div class="min-h-screen bg-black text-gray-900 flex justify-center">
  <div class="max-w-screen-xl m-0 sm:m-10 bg-black shadow rounded-3xl flex justify-center flex-1 shadow-xl">

    <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">

      <div class="mt-12 flex flex-col items-center">

        <h1 class="text-xl xl:text-2xl text-white tracking-tighter">
          Student <span class="text-green-400">Auth</span>
        </h1>
        <div class="w-full flex-1 mt-8">

          <div class="mx-auto max-w-xs">

            <form class="pt-3" id="login" method="post" name="login">

              <div class="form-group">


                <label class="input input-bordered flex items-center gap-2 bg-gray-100 px-8 py-4 rounded-none focus:outline-none focus:border-gray-400 focus:bg-white mt-5">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                  </svg>
                  <input type="text" class="grow" placeholder="Student ID" required="true" name="stuid" value="<?php if (isset($_COOKIE["user_login"])) {
                                                                                                                  echo $_COOKIE["user_login"];
                                                                                                                } ?>" />
                </label>
              </div>

              <div class="form-group">

                <label class="input input-bordered flex items-center gap-2 bg-gray-100 px-8 py-4 rounded-none focus:outline-none focus:border-gray-400 focus:bg-white mt-5">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
                    <path fill-rule="evenodd" d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z" clip-rule="evenodd" />
                  </svg>
                  <input type="password" class="grow" value="" placeholder="Passkey" name="password" required="true" value="<?php if (isset($_COOKIE["userpassword"])) {
                                                                                                                              echo $_COOKIE["userpassword"];
                                                                                                                            } ?>" />
                </label>
              </div>


              <div class="mt-3">
                <button class="mt-5 tracking-wide font-semibold bg-green-300 text-black w-full py-4 rounded-none flex items-center justify-center focus:shadow-outline focus:outline-none" name="login" type="submit">Login</button>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
    <div class="flex-1 bg-indigo-100 text-center hidden lg:flex rounded-r-3xl relative bg-cover bg-center bg-no-repeat" style="background-image: url('https://cdn.mos.cms.futurecdn.net/YSs8CNikC5Va6SE9MerbZM-1200-80.jpg');">

      <label for="reset" class="btn btn-md btn-circle btn-ghost float-right absolute right-12 top-2 rotate-45 hover:rotate-180"><a href="../admin/login.php">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21 3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" />
          </svg></a></label>

      <label for="reset" class="btn btn-md btn-circle btn-ghost float-right absolute right-2 top-2 "><a href="forgot-password.php" class="tooltip tooltip-left tooltip-success" data-tip="Reset Passkey"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12a7.5 7.5 0 0 0 15 0m-15 0a7.5 7.5 0 1 1 15 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077 1.41-.513m14.095-5.13 1.41-.513M5.106 17.785l1.15-.964m11.49-9.642 1.149-.964M7.501 19.795l.75-1.3m7.5-12.99.75-1.3m-6.063 16.658.26-1.477m2.605-14.772.26-1.477m0 17.726-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205 12 12m6.894 5.785-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495" />
          </svg></a></label>
    </div>
  </div>
</div>
</body>

</html>