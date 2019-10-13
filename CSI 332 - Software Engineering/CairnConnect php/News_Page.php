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
<br>
<br>
<br>
<div class="container container-fluid col-lg-11">
	<div class="card col-lg-12" style="background-color:rgba(.1,.1,.1,.01); border:none;">
		<div class="card-header text-white " style="background-color:#611a32;">
			<h1>CairnConnect Alumni News</h1>
		</div>
		<div class="card col-12 text-white"style="background-color:rgba(1,1,1,0.5);">
			<div class="card-body">
		<?php
			include_once 'includes/dbh.inc.php';
			$sql = "SELECT * FROM News;";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);
			if ($resultCheck > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<h1>";
					echo $row['Title'] . "<br>";
					echo "</h1>";
					echo "<h5>";
					echo $row['Date'] . "<br><br>";
					echo "</h5>";
					echo $row['Description'] . "<br>";
					echo "<hr>";
				}
			}
		?>
	</div>
</div>
</div>
</div>
</div>
<br><br>
</main>
<?php
require 'footer.php';
?>
