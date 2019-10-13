<?php	
//Connect to the Database.
	$message= "";
	
	include_once('ERdbinc.php');
	//Connects to Database
	$link = new mysqli($dbhost,$dbuser,$dbpassword,$dbname);
		if ($link->connect_error) {
		print"There was a problem connecting to the database.</BR>";
		print $link->connect_errno.": {$link->connect_error}";
		}

	
	
	//This is hte validaion for the Credit Card information, however, it would not react with the php properly and still needs some work.
	// Had to change the way that they date is inserted, when it is imporved and validation is added, then the date format will need to be changed back. 
	
	// Put this before the query in order to parse the date into substrings.
	/* 	$year = substr($expDate,3,4);
	$month = substr($expDate,0,2);    */
	
	/*	// Checks to see if the card entered is accepted by Eden
	$validCardTypes = ['Visa','MasterCard','American Express','Discover'];
	if (!in_array($cardType,$validCardTypes))  {
		//$status = "warning";
		$statusMessage = "You have not submitted a valid card type.  Please try again.";
	}
	//Checks to make sure that the card numbered entered is exactly 16 numbers long.
	if (strlen($_POST['cardNumber'])!=16) {
		//$status = "warning";
		$statusMessage = "Please enter a valid card number.";
	}
	//Checks to make sure that the expiration date is in the correct format and that the card is not expired currently.
	if (!preg_match("/^(0[1-9]|11|12|10)-(20[0-9]{2})$/",$expDate))	
		$statusMessage = "Please follow the MM-YYYY format.";
		elseif (substr($expDate,3,4).substr($expDate,0,2)< date('Ym'))
			$statusMessage = "Your card has expired, please enter a different card.";	
	// Checks to make sure that the ccv number is exactly three numbers long. 		
	if (!ctype_digit($ccv) || strlen($ccv)!=3) {
	//$status = "warning";
	$statusMessage = "Please enter a valid ccv.";
	}
	*/
	
	
	//INSERT query for the payment information and order information into the database
	
	if (isset($_POST['submit'])){
	$q1 = "INSERT INTO TakeOut_Order (NameOnOrder,OrderContents) VALUES ('".$_POST["orderName"]."', '".$_POST["orderContent"]."')";
	$result = $link-> query($q1);
	$orderNumber=$link->insert_id;
	$q2 = "INSERT INTO PaymentInformation (OrderNumber,nameOnCard,cardType,cardNumber,expDate,CCV) VALUES ('".$orderNumber."','".$_POST["nameOnCard"]."', '".$_POST["cardType"]."', '".$_POST["cardNumber"]."', '".$_POST["expDate"]."', '".$_POST["ccv"]."')";
	$result2 = $link-> query($q2);
	$message = "Your Order has been made.";
	echo "<script type='text/javascript'>alert('$message');</script>";
	}

?>
<!DOCTYPE HTML>
	<HTML>
		<HEAD>  
			<TITLE>Edens Bistro Take-Out</TITLE>
			<META Charset "UTF-8" />
			<META name="author" content="Jonathan T. Risoldi" />
			<SCRIPT src="topnav.js" type="text/javascript"></script>
			<link rel="stylesheet" href="topnav.css">
			<link rel="stylesheet" href="Take_Out.css">
		</HEAD>
			<script>				
			/*	function orderForum(){
				var select = document.getElementById("item").value;
				var input = document.getElementById("qty").value;
				document.getElementById("orderSection").innerHTML = select+"("+input+")";
				} */
			</SCRIPT>
		<BODY class="backgroundimage">
		<FORM action="TakeOut.php" method="post">
			<DIV class="sidenav";>
				<img href="/index.html"><img src="Eden logo.png" alt="logo" /></img> 
				<A>2321 E 71st Street, Chicago, IL 60649</A> 
				<br />
				<H1>Hours:</H1>
				<H1>Monday-Saturday</H1>
				<H1>9AM-9PM</H1>
				<H1>Sunday</H1>
				<H1>Closed</H1>
				<BR />
				<H1>Breakfast: 9AM-11AM</H1>
				<H1>Lunch: 11AM-3PM</H1>
				<H1>Dinner: 3PM-9PM</H1>
			</DIV>
			<DIV class="topnav";>
				<A href="index.html";>Main</A>
				<A href="Menu.html";>Menu</A>
				<A href="TakeOut.html";>Take-Out</A>				
				<A href="Reservation.html";>Reservations</A>
				<A href="Events.html";>Events</A>
			</DIV>
			<?php include('topnav.php');?>
					<TABLE class= "Breakfast">
						<TR>
							<TH>Breakfast</TH>
							<TH> Price</TH>
						</TR>
						<?php
							$q = "SELECT * FROM Take_OutBreakfastMenu";
							$result = $link->query($q);
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
									echo "<TR><TD>" . $row["Breakfast_Item"]. "</TD><TD>" . $row["Price"]."</TD></TR>";
								}
							} else {
								echo "0 results";
							}
						?>
					</TABLE>
					<TABLE class="Lunch">
						<TR>
							<TH>Lunch</TH>
							<TH> Price</TH>
						</TR>
						<?php
							// Populate Takeout Lunch Table
							$q = "SELECT * FROM Take_OutLunchMenu";
							$result = $link->query($q);
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
									echo "<TR><TD>" . $row["Lunch_Item"]. "</TD><TD>" . $row["Price"]."</TD></TR>";    }
							} else {
								echo "0 results";
							}
						?>
					</TABLE>
					<TABLE class="Dinner">
						<TR>
							<TH>Dinner</TH>
							<TH> Price</TH>
						</TR>
						<?php
							// Populate Takeout Dinner Table
							$q = "SELECT * FROM Take_OutDinnerMenu";
							$result = $link->query($q);
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
									echo "<TR><TD>" . $row["Dinner_Item"]. "</TD><TD>" . $row["Price"]."</TD></TR>";    }
							} else {
								echo "0 results";
							}					
						?>
					</TABLE>
					<TABLE class="Sides">
						<TR>
							<TH>Sides</TH>
							<TH> Price</TH>
						</TR>
						<?php
							// Populate Takeout Sides Table
							$q = "SELECT * FROM Take_OutSideMenu";
							$result = $link->query($q);
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
									echo "<TR><TD>" . $row["Side_Item"]. "</TD><TD>" . $row["Price"]."</TD></TR>";    }
							} else {
								echo "0 results";
							}
						?>
					</TABLE>
					<TABLE class="Drinks">
						<TR>
							<TH>Drinks</TH>
							<TH> Price</TH>
						</TR>
						<?php
							// Populate Takeout Sides Table
							$q = "SELECT * FROM Take_OutDrinkMenu";
							$result = $link->query($q);
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
									echo "<TR><TD>" . $row["Drink_Item"]. "</TD><TD>" . $row["Price"]."</TD></TR>";    }
							} else {
								echo "0 results";
							}
						?>
					</TABLE>

				<DIV class="orderForum">
				<!--	<DIV class="orderList" style="color:white;">
						<p id="orderSection"></p>
					</DIV>
					<DIV class="selectMenuItem">
						<SELECT id="item" name="items">
							<OPTION>
							Item Select
							</OPTION>
							<OPTION>
							Egg, sausage, biscuit sandwich
							</OPTION>
							<OPTION>
							Egg, sausage, cheese biscuit sandwich
							</OPTION>
							<OPTION>
							Fruit Bowl
							</OPTION>
							<OPTION>
							Fruit Yogurt Blend
							</OPTION>
							<OPTION>
							1/2 Summer salad
							</OPTION>
							<OPTION>
							Cheeseburger
							</OPTION>
							<OPTION>
							Fish Sandwich
							</OPTION>
							<OPTION>
							Frankfurter
							</OPTION>
							<OPTION>
							Grilled Chicken Wrap
							</OPTION>
							<OPTION>
							Hamburger
							</OPTION>
							<OPTION>
							Italian sausage w/ peppers & onions
							</OPTION>
							<OPTION>
							Buffalo Wings 6 Piece
							</OPTION>
							<OPTION>
							Buffalo Wings 9 Piece
							</OPTION>
							<OPTION>
							Buffalo Wings 12 Piece
							</OPTION>
							<OPTION>
							Deep Dish Pizza
							</OPTION>
							<OPTION>
							Boiled Cabbage
							</OPTION>
							<OPTION>
							Caesar salad
							</OPTION>
							<OPTION>
							Curly Fries
							</OPTION>
							<OPTION>
							Garden salad
							</OPTION>	
							<OPTION>
							Steamed Mixed Vegeables
							</OPTION>
							<OPTION>
			</OPTION>
							<OPTION>
							Regular Soda
							</OPTION>
							<OPTION>
							Specialty Soda
							</OPTION>
							<OPTION>
							Tea
							</OPTION>
							<OPTION>
							White Hot Chocolate
							</OPTION>
						</SELECT>
					</DIV>
					<DIV type="number_format" class="inputQyt">
						<INPUT id="qty" name="quty" placeholder="Qty."></INPUT>
					</DIV>
					<DIV class="addButton">
						<BUTTON onClick="orderForum()" id="addButton" name="addButton">ADD</BUTTON>
					</DIV> -->
					<DIV class="ordername">
						<INPUT placeholder="Name for Order" type="text" id="namefororder" name="orderName"/>
					</DIV>
						<TEXTAREA class="orderInput" name="orderContent" placeholder="Please type your order here, Following the format: Item Name (quantity desired), Next Item (quantity desired), etc."></TEXTAREA>
					<DIV class="name">
						<INPUT placeholder="Name" type="text" id="name" name="nameOnCard"/>
					</DIV>
					<DIV class="type">
						<SELECT name="cardType">
							<OPTION>
								Type
							</OPTION>
							<OPTION>
								Visa
							</OPTION>
							<OPTION>
								Master Card
							</OPTION>
							<OPTION>
								American Express
							</OPTION>
							<OPTION>
								Discover
							</OPTION>
						</SELECT>
					</DIV>
					<DIV class="number">
						<INPUT placeholder="Card Number" type="text" id="number" name="cardNumber"/>
					</DIV>
					<DIV class="xDate">
						<INPUT type="text" name="expDate" placeholder= "MM-YYYY" required pattern="^(0[1-9]|11|12|10)-(20[0-9]{2})$"/>
					</DIV>
					<DIV class="CCV">
						<INPUT placeholder="CCV" type="text" id="cCv" name="ccv"/>
					</DIV>
					<DIV class="submitButton">
						<BUTTON type="submit" name="submit">SUBMIT</BUTTON>
					</DIV>
				</DIV>
			</FORM>
		</BODY>
	</HTML>
<?php
	// close database link
	$link->close();
?>
