<?php
include_once('ERdbinc.php');
//Connects to Database
$link = new mysqli($dbhost,$dbuser,$dbpassword,$dbname);
if ($link->connect_error) {
	print"There was a problem connecting to the database.</BR>";
print $link->connect_errno.": {$link->connect_error}";
}
elseif ($statusMessage==""){
	print"Connection established.";
}	
?>
<!DOCTYPE>
	<HTML>
		<HEAD>
			<TITLE>Edens Bistro Take-Out</TITLE>
			<META Charset "UTF-8" />
			<META name="author" content="Jonathan T. Risoldi" />
			<SCRIPT src="topnav.js" type="text/javascript">
				var select= document.getElementById("qty");
				var input= document.getElementById("item");
				var inputValue1 = input1.value;
				var inputValue2 = input2.value;	
			
				function(orderForum){
					newString= document.getElementById("item"+"("+"qty"+")").innerHTML;
				}
			</SCRIPT type="text/javascript">
			<link rel="stylesheet" href="topnav.css">
			<link rel="stylesheet" href="TakeOut.CSS">
		</HEAD>
		<BODY class="backgroundimage">
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
				<TABLE class="Breakfast">
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
				<TABLE class="lunch">
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
					<DIV class="selectMenuItem">
						<SELECT id="item" name="item">
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
							Sweet Potato Fries
							</OPTION>
							<OPTION>
							White Rice
							</OPTION>
							<OPTION>
							Bottled Water
							</OPTION>
							<OPTION>
							Coffee
							</OPTION>
							<OPTION>
							Fruit Juice
							</OPTION>
							<OPTION>
							Hot Chocolate
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
						<INPUT id="qty" name="qty" placeholder="Qty."></INPUT>
					</DIV>
					<DIV class="addButton">
						<BUTTON onClick(orderForum) id="addBuotton" name="addButton">ADD</BUTTON>
					</DIV>
					<DIV class="name">
						<INPUT placeholder="Name" type="text" id="name" name="nameOnCard"/>
					</DIV>
					<DIV class="type">
						<SELECT>
							<OPTION>
							Type
							</OPTION>
							<OPTION>
								Visa
							<OPTION>
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
						<BUTTON type="submit" value="submit">SUBMIT</BUTTON>
					</DIV>
				</DIV>
		</BODY>
	</HTML>
<?php
	$link->close();
?>