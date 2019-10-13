<!--This page should now present as a tab option in the navbar at the top of the page instead of a search bar.
I would like the user to input the first and last name or one or the other into input boxes and then search
and display all results from the database with each result showing all the name, graduation year, and email of the resulting users.
-->
<?php
  require 'header.php';
  if (!isset($_SESSION['userUid']))
      header("Location: index.php");

?>
<main>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">CairnConnect</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <a class="nav-link" href="News_Page.php">News<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="UserProfile.php">My Profile<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://cairn.edu/eventcalendar/">Events</a>
      </li>

			<li class="nav-item">
				<a class="nav-link" href="https://cairn.edu/give/ways/">Donate</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="Help_Desk.php">Help Desk</a>
			</li>

      <li class="nav-item">
        <a class="nav-link" href="SearchResults.php">Search</a>
      </li>

    </ul>

    <form class="" action="includes/logout.inc.php" method="post">
            <button type="submit" name="logout-submit">Logout</button>
            </form>
  </div>
</nav>
            <div class="container container-fluid col-12 col-md-11">
          		<div class="row">
          			<div class="row col-12">

          				<div class="text-center col-12">
          					<h1>Search</h1>
          				</div>
          			</div>

          			<div class="row col-12">
          				<div class="col-12">
          					<div class="card col-12" style="background-color:rgba(1,1,1,0.5);">
          						<div class="card-body text-white">
          							<form class="" action="SearchResults.php" method="post">
                          <div class="col-12 col-md-3">
                            <input type="text" name="first_name" placeholder="First Name">
                          </div>
                          <div class="col-12 col-md-3">
                            <input type="text" name="last_name" placeholder="Last Name">
                          </div>
                          <div class="col-6 mx-auto">
                          <button type="submit" name="search-submit">Search</button>
                    			</div>
                        </form>
                        </div>
                        <hr style="background-color:White;">
                        <div class="card col-12 text-white"style="background-color:rgba(1,1,1,0.5);">
                          <div class="card-body">
                        <?php
                          include_once 'includes/dbh.inc.php';
                          if (isset($_POST['search-submit'])) {
                          $sql = "SELECT * FROM `Registered Profiles` WHERE First_Name='{$_POST['first_name']}' OR Last_Name='{$_POST['last_name']}'; ";
                          $result = mysqli_query($conn, $sql);
                          $resultCheck = mysqli_num_rows($result);
                          if ($resultCheck > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                              echo "<h1>";
                              echo $row['First_Name'] . "<br>";
                              echo "</h1>";
                              echo "<h5>";
                              echo $row['Last_Name'] . "<br><br>";
                              echo "</h5>";
                              echo $row['Email'] . "<br>";
                              echo "<hr>";
                              echo $row['Phone'] . "<br>";
                              echo "<hr>";
                              echo $row['Graduation_Year'] . "<br>";
                              echo "<hr>";
                              echo $row['School'] . "<br>";
                              echo "<hr>";
                              echo $row['Degree'] . "<br>";
                              echo "<hr>";
                              echo $row['Current_Occupation'] . "<br>";
                              echo "<hr>";
                              echo $row['LinkedIn_Link'] . "<br>";
                              echo "<hr>";
                            }
                          }
                        }
                        ?>
          							</div>
          						</div>

          					</div>

          				</div>
          			</div>
          		</div>
            </div>

</main>
<?php
require 'footer.php';
?>
