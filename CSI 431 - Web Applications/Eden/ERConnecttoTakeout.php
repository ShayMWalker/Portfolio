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


	//Only run here till end of thsi block only if they have posted.
	//Define variables (text fields)
	$ NameonOrder= "";
	$ OrderContent= "";
	$statusMessage= "";
	
	if (isset($_POST['NameonOrder'])) $NameonOrder = $_POST['NameonOrder'];
	//Would like to have OrderContent be put into a javascript array then read and put into database
	//Hopefully this will be achieveable 
	if (isset($_POST['OrderContent'])) $OrderContent = $_POST['OrderContent'];


	$q = "INSERT into Takeout_Order (NameonOrder,OrderContent) values ('$NameonOrder',' ');";
	$result = $link-> query($q);
	if ($result!==false) {
		$OrderNumber = $link -> insert_id;
		foreach($OrderContent as $Item) {
			$q2 = "INSERT into Takeout_OrderItems (OrderNumber,LineNumber,ItemName,Quantity) values ('$NameonOrder','$LineNumber','$ItemName','$Quantity');";
			$result2 = $link-> query($q2);	
			}
		print "Order has been has been placed.</BR>";
	} 
	else {
		print $link->error;
	}
}

?>

<?php
// This block of php should populate the Menu table for TakeOut but also add an extra input column so that the customer can input the amount of an item hey would like to order.
// Populate Takeout Breakfast Table
	$q = "SELECT * FROM TakeOut_BreakfastMenu";
	$result = $link->query($q);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<TR><TD>" . $row["BreakfastItem"]. "</TD><TD>" . $row["Price"]."</TD><TD><INPUT  Type = \"number\" name = \"quantity\" id = \"{$row['BreakfastItem']}\" /></TD></TR>";
    }
} else {
    echo "0 results";
}
// Populate Takeout Lunch Table
	$q = "SELECT * FROM TakeOut_LunchMenu";
	$result = $link->query($q);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<TR><TD>" . $row["LunchItem"]. "</TD><TD>" . $row["Price"]."</TD><TD><INPUT  Type = \"number\" name = \"quantity\" id = \"{$row['LunchItem']}\" /></TD></TR>";
    }
} else {
    echo "0 results";
}
// Populate Takeout Dinner Table
	$q = "SELECT * FROM TakeOut_DinnerMenu";
	$result = $link->query($q);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<TR><TD>" . $row["DinnerItem"]. "</TD><TD>" . $row["Price"]."</TD><TD><INPUT  Type = \"number\" name = \"quantity\" id = \"{$row['DinnerItem']}\" /></TD></TR>";
    }
} else {
    echo "0 results";
}
// Populate Takeout Sides Table
	$q = "SELECT * FROM TakeOut_SideMenu";
	$result = $link->query($q);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<TR><TD>" . $row["SideItem"]. "</TD><TD>" . $row["Price"]."</TD><TD><INPUT  Type = \"number\" name = \"quantity\" id = \"{$row['SideItem']}\" /></TD></TR>";
    }
} else {
    echo "0 results";
}

// Finsih making menu tables then at bottom place in CreditCard payment php
?>


<?php 
// This block of php will perform some pre-validation for Credit Card Input. It will then store the information in the Database. It potentially can be used with an API.
// Will be integrated into a HTML file with a corresponding .css.
//Define variables
	//$autNet = "5R2RFwCu3a35T6w9";
	$nameOnCard = "";
	$cardType = "";
	$cardNumber = "";
	$expDate = "";
	$ccv = "";
	$statusMessage= "";
	// Once if isset is done once it does not have to be done again.
	if (isset($_POST['nameOnCard'])) $nameOnCard = $_POST['nameOnCard'];
	if (isset($_POST['cardType'])) $cardType = $_POST['cardType'];
	if (isset($_POST['cardNumber'])) $cardNumber = $_POST['cardNumber'];
	if (isset($_POST['expDate'])) $expDate = $_POST['expDate'];
	if (isset($_POST['ccv'])) $ccv = $_POST['ccv'];
	 
	// Checks to see if the card entered is accepted by Eden
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
// Need this if statement first so that the program knows to only load answers into the database after the Submit button is pushed. 
if (isset($_POST['nameOnCard'])){

	// Assign answers to variables. Once submitted see first if statement. 
	//Use an INSERT to put data into, use SELECT to get data out.
	$year = substr($expDate,3,4);
	$month = substr($expDate,0,2);
	$q = "INSERT into PaymentInformation (nameOnCard,cardType,cardNumber,expMonth,expYear,CCV) values ('$nameOnCard','$cardType','$cardNumber','$month','$year','$ccv');";
	$result = $link-> query($q);
	if ($result!==false) {
		print "Payment has been submited.</BR>";
	} 
	else {
		print $link->error;
	}
}
//Close the instance.
$link->close();
}	
?>