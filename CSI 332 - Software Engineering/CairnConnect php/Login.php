<?php
	require "header.php";
?>
	<main>
    <body style="font-family: 'Roboto', sans-serif;">
    	<div class="container">
    		<div class="row">
    			<div class="col-12 text-center" >
    				<div>
    					<br>
    					<h1 style="font-size: 3rem ;">Login</h1>
    				</div>
                <div class="row">
                  <div class="col-3">
                  </div>
                    <div class="card col-6 text-white" style="background-color:rgba(1,1,1,0.5);">
                      <div class="card-body">
                      <form class="" action="includes/login.inc.php" method="post">


                          <?php
                            <input type="text" name="mailuid" class="form-control" placeholder="Email">
                          ?>



                          <?php
                          <input type="password" name="pwd" class="form-control" placeholder="Password">
                          ?>


                          <?php
                          <button href="#" type="submit" class="btn btn-primary">Submit</button>
                          ?>


                      </form>

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
