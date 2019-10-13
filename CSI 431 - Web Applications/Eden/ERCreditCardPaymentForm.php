 
<?php 
// This code will be inegrated into the Eden of the Rock website and may be edited later to conform with the website along with the css file. 
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
include_once('../ERdbinc.php');
//Connects to Database
$link = new mysqli($dbhost,$dbuser,$dbpassword,$dbname);
if ($link->connect_error) {
	print"There was a problem connecting to the database.</BR>";
print $link->connect_errno.": {$link->connect_error}";
}
elseif ($statusMessage==""){
	print"Connection established.";
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
<DOCTYPE HTML>
<HTML>
<HEAD>
<TITLE>CIS431 Credit Card Payment Form</TITLE>
<META charset="UTF-8" />
<LINK rel="stylesheet" type="text/css" href="ERCreditCardPaymentForm.css" />
</HEAD>
<BODY>

<DIV id="messages"><?php echo $statusMessage;?></DIV>

<DIV id="input">
<FORM id="payment" action="CreditCardPaymentForm.php" method="post">
<LABEL for="nameOnCard">Name on Card </LABEL></BR>

<INPUT type="text" id="name" name="nameOnCard"/><BR />

</BR>

 <LABEL for="cardType">Card Type</LABEL></BR>

<INPUT type="text" id="type" name="cardType"/><BR />

</BR>

<LABEL for="cardNumber">Card Number</LABEL></BR>

<INPUT type="text" id="number" name="cardNumber"/><BR />

</BR>

<LABEL for="expirationDate">Expiration Date:</LABEL></BR>

<INPUT type = "text" name="expDate" placeholder= "MM-YYYY" required
pattern="^(0[1-9]|11|12|10)-(20[0-9]{2})$"/>
</BR>

<LABEL for="ccv">CCV</LABEL></BR>

<INPUT type="text" id="cCv" name="ccv"/><BR />
</BR>

</SELECT><BUTTON type="submit" value="submit">SUBMIT</BUTTON>
</FORM>
</BODY>
</HTML>