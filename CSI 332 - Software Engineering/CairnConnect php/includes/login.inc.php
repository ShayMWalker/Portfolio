<?php
if (isset($_POST['login-submit'])) {
  require 'dbh.inc.php';
  $email = $_POST['mailuid'];
  $password = $_POST['pwd'];

  if (empty($email) || empty($password)) {
    header("Location: ../index.php?error=emptyfields");
    exit();
  }
  else {
    $sql = "SELECT * FROM `Registered Profiles` WHERE Email=?; ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../index.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "s", $p1);
      -$p1 = $email;
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) {
        $pwdCheck = password_verify($password, $row['Password']);
        if ($pwdCheck == false) {
          header("Location: ../index.php?error=wrongpwd");
          exit();
        }
        else if ($pwdCheck == true) {
          session_start();
          $_SESSION['userId'] = $row['User_ID'];
          $_SESSION['userUid'] = $row['Email'];
          header("Location: ../News_Page.php");
          exit();
        }
        else {
          header("Location: ../index.php?error=wrongpwd");
          exit();
        }
      }
      else {
        header("Location: ../index.php?error=nouser&".$email);
        exit();
      }
    }
  }

}
else {
    header("Location: ../index.php");
}
