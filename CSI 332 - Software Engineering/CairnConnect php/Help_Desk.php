<!-- I want this page to simply post the entries to the database. I have been unsuccessful so far. :(

-->
<?php
	require "header.php";
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

<div class="container">
  <div class="row">
    <div class="col-12 text-center">
      <div>
        <br>
        <h1 style="font-size: 3rem ;">Help Desk</h1>
      </div>
      <div class="row">
        <div class="col-3">
        </div>
      <div class="card col-10 text-white mx-auto" style="background-color:rgba(1,1,1,0.5);">
        <div class="card-body">
          <h3>Please complete this form and our staff will help as soon as possible</h3>

          <form class="" action="includes/Help_Desk.inc.php" method="post">

            <div class="form-group">
              <input type="text" name="First_Name" class="form-control" placeholder="First Name">
            </div>

            <div class="form-group">
              <input type="text" name="Last_Name" class="form-control" placeholder="Last Name">
            </div>

            <div class="form-group">
              <input type="text" Name="Email" class="form-control" placeholder="Email">
            </div>

            <div class="form-group">
              <label for="comment">Description of Issue:</label>
              <textarea class="form-control" name="Description" rows="5" id="comment"></textarea>
            </div>
            <div class="row">
               <div class="col-6 mx-auto">
              <button type="submit" name="help-submit" class="btn btn-primary">Submit</button>
               </div>

<?php
	require "footer.php";
 ?>
