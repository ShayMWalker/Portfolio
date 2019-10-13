<!-- When the search button is pressed on the SearchResults page
This page supplies the sql to search for all database entries with that first and/or last name
Then they will display those results with the graduation year and email of those people.
-->
<?php
require_once "header.php";

$First_Name = $_POST['first_name'];
$Last_Name = $_POST['last_name'];


require 'includes/dbh.inc.php';
if (isset($_POST['search-submit'])) {
    $sql = "SELECT * FROM `Registered Profiles` WHERE First_Name=? OR Last_Name=?; ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../SearchResults.php?error=sqlerror");
      exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $p1, $p2);
    $p1=$First_Name;
    $p2=$Last_Name;
    $result = mysqli_stmt_execute($stmt);
  }
