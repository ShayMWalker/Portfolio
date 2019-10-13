<?php
	require "header.php";
?>
	<main>
		<div class="container">
			<div class="row">
				<div class="col-12 text-center" >
					<div>
						<br>
						<h1 style="font-size: 3rem ;">Welcome to CairnConnect</h1>
						<br>
						<h1 style="font-size: 3rem ;">Login</h1>
					</div>
							<div class="row">
								<div class="col-3">
								</div>
									<div class="card col-6 text-white" style="background-color:rgba(1,1,1,0.5);">
										<div class="card-body">

											<?php if (isset($_SESSION['userId'])) {
												echo '<form class="" action="includes/logout.inc.php" method="post">
															<button type="submit" name="logout-submit">Logout</button>
															</form>';
											}
											else {
												echo '
													<form action="includes/login.inc.php" method="post">

														<div class="form-group">
												    	<input type="text" name="mailuid" class="form-control" placeholder="Email">
												    </div>

												    <div class="form-group">
												    	<input type="password" name="pwd" class="form-control" placeholder="Password">
												    </div>

												    <div class="col-6 mx-auto">
												    	<button name="login-submit" type="submit" class="btn btn-primary">Submit</button>
												    </div>

												 	</form>
													<a href="signup.php">Sign Up</a> ';
											}
											 ?>

									</div>
							 </div>
						</div>
					</div>
			 </div>
		</div>

	</main>
<?php
	require "footer.php";
 ?>
