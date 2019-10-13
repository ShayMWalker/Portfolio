<?php
	require "header.php";
?>
	<main>
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<div>
						<br>
						<h1 style="font-size: 3rem ;">Registration</h1>
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
			 echo '<p>Fill in all fields!</p>';
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
		<form action="includes/signup.inc.php" method="post">
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
      <button type="submit" name="signup-submit">Signup</button>
			</div>

    </form>

		<div class="row">
			<div class="form-group form-check col-6 mx-auto">
				<input type="checkbox" class="form-check-input" id="exampleCheck1">
				<label class="form-check-label"><a href="https://app.termly.io/document/terms-of-use-for-website/9cd4e49c-8b6e-4a5e-b2cb-034d90467bca" target="_blank">Terms & Agreements</a></label>
					</div>
			</div>

	</main>
<?php
	require "footer.php";
 ?>
