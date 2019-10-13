<!-- I want this page to simply post the entries to the database. I have been unsuccessful so far. :(

-->
<?php
require_once "header.php";
if (isset($_POST['help-submit'])) {

    require 'dbh.inc.php';
    $First_Name = $_POST['First_Name'];
    $Last_Name = $_POST['Last_Name'];
    $Email = $_POST['Email'];
    $Description = $_POST['Description'];

    if (empty($First_Name) || empty($Last_Name) || empty($Email) || empty($Description)) {
      // code...
 header("Location: ../Help_Desk.php?error=emptyfields&name=".$First_Name."&name=".$Last_Name);
  exit();
 }

else {
  $sql = "INSERT INTO Help_Desk_Requests (First_Name, Last_Name, Email, Description) VALUES (?, ?, ?, ?)";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../Help_Desk.php?error=sqlerror");
    exit ();
  }
  mysqli_stmt_bind_param($stmt, "ssss", $p1, $p2, $p3, $p4);
  $p1=$First_Name;
  $p2=$Last_Name;
   $p3=$Email;
   $p4=$Description;
  mysqli_stmt_execute($stmt);
     header("Location: ../News_Page.php");
}
}
  else{

   header("Location: ../Help_Desk.php");
    exit ();
}
