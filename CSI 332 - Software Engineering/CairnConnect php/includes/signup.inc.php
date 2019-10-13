<?php
require_once "header.php";
if (isset($_POST['signup-submit'])) {

    require 'dbh.inc.php';
    $First_Name = $_POST['first_name'];
    $Last_Name = $_POST['last_name'];
    $Phone = $_POST['phone'];
    $Graduation_Year = $_POST['grad_year'];
    $School = $_POST['school'];
    $Degree_Earned = $_POST['degree'];
    $Current_Occupation = $_POST['occupation'];
    $LinkedIn_Profile = $_POST['linkedin'];
    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
      // code...
      header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
      exit();
    }

    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: ../signup.php?error=invalidmail&uid=".$username);
      exit();
    }

    elseif ($password !== $passwordRepeat) {
      header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail".$email);
      exit();
    }
    else {
      $sql = "SELECT Email FROM `Registered Profiles` WHERE Email=?";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=sqlerror");
        exit ();
      }
      else{
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0) {
          header("Location: ../signup.php?error=usertaken&mail=".$email);
          exit ();
        }
        else {
        $sql = "INSERT INTO `Registered Profiles` (First_Name, Last_Name, Email, Password, Phone, Graduation_Year, School, Degree, Current_Occupation, LinkedIn_Link ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../signup.php?error=sqlerror");
          exit ();
        }
        else {
          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

          mysqli_stmt_bind_param($stmt, "ssssssssss", $p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10);
          $p1=$First_Name;
          $p2=$Last_Name;
           $p3=$email;
            $p4=$hashedPwd;
             $p5=$Phone;
             $p6=$Graduation_Year;
             $p7=$School;
             $p8=$Degree_Earned;
             $p9=$Current_Occupation;
             $p10=$LinkedIn_Profile;
          mysqli_stmt_execute($stmt);
          $_SESSION['userId'] = mysqli_insert_id($conn);
          $_SESSION['userUid'] = $email;
          header("Location: ../News_Page.php");
          exit ();
        }
        }
      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
  header("Location: ../signup.php");
  exit ();
}
