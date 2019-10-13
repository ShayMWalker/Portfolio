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
<div class="card col-12 text-white"style="background-color:rgba(1,1,1,0.5);">
  <div class="card-body">


        <div class="container">
    			<div class="row">
    				<div class="col-12 text-center">
    					<div>
    						<br>
    						<h1 style="font-size: 3rem ;">Edit Your Profile</h1>
    					</div>
    					<div class="row">
    						<div class="col-3">
    						</div>
    					<div class="card col-6 text-white" style="background-color:rgba(1,1,1,0.5);">
    						<div class="card-body">
    							<h3>Please complete this form</h3>


    	 <?php
    	 if (isset($_GET['error'])) {
    		 if ($_GET['error']== "emptyfields") {
    			 echo '<p>Fill in all reuired fields!</p>';
    		 }
    		 else if ($_GET['error']== "invalidmailuid") {
    			 echo '<p>Please use a valid Username and Email</p>';
    		 }
    		 else if ($_GET['error']== "invaliduid") {
    			 echo '<p>Please use a valid Username</p>';
    		 }
    		 else if ($_GET['error']== "invalidmail") {
    			 echo '<p>Please use a valid Email</p>';
    		 }
    		 else if ($_GET['error']== "passwordcheck") {
    			 echo '<p>The passwords you typed do not match</p>';
    		 }
    		 else if ($_GET['error']== "usertaken") {
    			 echo '<p>That Username has already been taken. Please choose a different Username</p>';
    		 }
    	 }
    	 else if (isset($_GET['signup']) && $_GET['signup']== "success") {
    		 echo '<p>Signup success!</p>';
    	 }
    ?>
    		  <form class="" action="includes/edits.inc.php" method="post">
    			<div class="form-group mx-auto">
    				<input class="col-8" type="text" name="first_name" placeholder="First Name">
    			</div>

    			<div class="form-group mx-auto">
    				<input class="col-8" type="text" name="last_name" placeholder="Last Name">
    			</div>

    			<div class="form-group mx-auto">
    				<input class="col-8" type="text" name="phone" placeholder="Phone">
    			</div>

    			<div class="form-group mx-auto">
    				<input class="col-8" type="number" name="grad_year" placeholder="Graduation Year">
    			</div>

    			<div class="form-group mx-auto">
    				<select class="col-8" name="school" id="School">
    					<option>School of Business</option>
    					<option>School of Divinity</option>
    					<option>School of Education</option>
    					<option>School of Liberal Arts and Sciences</option>
    					<option>School of Social Work</option>
    					<option>School of Music</option>
    				</select>
    			</div>

    			<div class="form-group mx-auto">
    				<select class="col-8" name="degree" id="Degree Earned">
    					<option>Accounting</option>
    					<option>Accounting + MBA</option>
    					<option>General Fine Arts</option>
    					<option>Community Arts</option>
    					<option>Graphic Design</option>
    					<option>Pre-Art Therapy</option>
    					<option>Studio Art</option>
    					<option>Bible Ministries</option>
    					<option>Biblical Studies</option>
    					<option>Biology (BA)</option>
    					<option>Biology (BS)</option>
    					<option>Pre-Physical Therapy</option>
    					<option>Pre-Med</option>
    					<option>Business Administration</option>
    					<option>Entrepreneurship</option>
    					<option>Leadership and Management</option>
    					<option>Nonprofit Management</option>
    					<option>BS Bible + MBA</option>
    					<option>BS Bible + MS Org. Leadership</option>
    					<option>BS Youth & Family Ministry + MBA</option>
    					<option>BS Bus. Admin. + MBA</option>
    					<option>BS Bus. Admin. + MS Nonprofit Leadership</option>
    					<option>Camping Ministries</option>
    					<option>Christian Studies</option>
    					<option>BS Bible + MA Religion</option>
    					<option>BS Bible + Master of Divinity (MDiv)</option>
    					<option>Computer Science</option>
    					<option>Computer Science + MBA</option>
    					<option>BA Psychology + MAC</option>
    					<option>BS Youth & Family Ministry + MAC</option>
    					<option>Criminal Justice</option>
    					<option>Education</option>
    					<option>BS Bible + MSEd</option>
    					<option>BS Education + MS Special Ed (ABA)</option>
    					<option>BS Education + MS Special Ed (Instruction)</option>
    					<option>Elementary/Early Childhood Education</option>
    					<option>Early Education + MS Special Ed (Instruction)</option>
    					<option>Early Education + MS Special Ed (ABA)</option>
    					<option>English</option>
    					<option>English BA + MS in Ed</option>
    					<option>Healthcare Management</option>
    					<option>Health and Physical Education</option>
    					<option>History</option>
    					<option>History BA + MS in Ed</option>
    					<option>Information Systems</option>
    					<option>Intercultural Studies</option>
    					<option>Liberal Arts</option>
    					<option>Marketing</option>
    					<option>Marketing + MBA</option>
    					<option>Mathematics BA</option>
    					<option>Mathematics BS</option>
    					<option>Mathematics BA+ MS in Ed</option>
    					<option>Music</option>
    					<option>Composition</option>
    					<option>Music Education</option>
    					<option>Music Performance</option>
    					<option>Pastoral Ministries</option>
    					<option>Politics</option>
    					<option>Psychology</option>
    					<option>Pychology + MAC</option>
    					<option>Secondary English Education</option>
    					<option>Secondary Mathematics Education</option>
    					<option>Secondary Social Studies Education</option>
    					<option>Social Service Interdisciplinary</option>
    					<option>Social Work</option>
    					<option>Social Work (BSW +  MS Nonprofit Leadership)</option>
    					<option>Sports Management</option>
    					<option>Sports Management + MBA</option>
    					<option>Worship and Music</option>
    					<option>Youth and Family Ministry</option>
    				</select>
    			</div>

    			<div class="form-group mx-auto">
    				<input class="col-8"type="text" name="occupation" placeholder="Current Occupation">
    			</div>

    			<div class="form-group mx-auto">
    				<input  class="col-8" type="url" name="linkedin" placeholder="LinkedIn Profile URL">
    			</div>

    			<div class="form-group mx-auto">
    				<input class="col-8" type="text" name="uid" placeholder="Username">
    			</div>

    			<div class="form-group mx-auto">
          	<input class="col-8" type="text" name="mail" placeholder="E-mail">
    			</div>

    			<div class="form-group mx-auto">
          	<input class="col-8" type="password" name="pwd" placeholder="Password">
    			</div>

    			<div class="form-group mx-auto">
          	<input class="col-8" type="password" name="pwd-repeat" placeholder=" Repeat Password">
    			</div>

    			<div class="col-6 mx-auto">
          <button type="submit" name="edits-submit">Save</button>
    			</div>

        </form>

</main>
<?php
	require "footer.php";
 ?>
