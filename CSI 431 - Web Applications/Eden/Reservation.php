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
	
	if (isset($_POST['submit'])){
	$q = "INSERT INTO Reservations (NameOnRes,SpaceTitle,Date,Time) VALUES ('".$_POST["resName"]."', '".$_POST["resSpace"]."', '".$_POST["resDate"]."', '".$_POST["resTime"]."')";
	$result = $link-> query($q);
	$message = "Your Reservation has been made.";
	echo "<script type='text/javascript'>alert('$message');</script>";
	}

?>
<?php
//Here is the validation, However, we could not integrate it correctly. It could be implemented later. 
/*
	// Define Variables. 
	$NameonReservation = "";
	$DateofReservation = " ";
	$TimeofReservation = " ";
	$SpaceReserved = " ";
	$current_date = new DateTime();
	$statusMessage = " ";
	
	if (isset($_POST['NameonReservation'])) $NameonReservation = $_POST['NameonReservation'];
	if (isset($_POST['DateofReservation'])) $DateofReservation = $_POST['DateofReservation'];
	if (isset($_POST['TimeofReservation'])) $TimeofReservation = $_POST['TimeofReservation'];
	if (isset($_POST['SpaceReserved'])) $SpaceReserved = $_POST['SpaceReserved'];
	
	//Checks to make sure that the expiration date is in the correct format and that the date is current.
	if (!preg_match("/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/",$DateofReservation))	
		$statusMessage = "Please follow the MM/DD/YYYY format.";
		elseif ($DateofReservation <= $current_date){
		$statusMessage = "Please enter a valid date.";
		}
	// Need this if statement first so that the program knows to only load answers into the database after the Submit button is pushed. 
if (isset($_POST['NameonReservation'])){
include_once('ERdbinc.php');
//Connects to Database
$link = new mysqli($dbhost,$dbuser,$dbpassword,$dbname);
if ($link->connect_error) {
	print"There was a problem connecting to the database.</BR>";
print $link->connect_errno.": {$link->connect_error}";
}
elseif ($statusMessage==""){
	print"Connection established.";
	
	//Checks to see if date and time selected for the specific space are availible for Reservation.
	$q = "SELECT SpaceTitle, Date, Time FROM Reservations";
	$result = $link-> query($q);
	if ($result!==0){
		print "The date, time, or space you selected is not availible for reservations at this time.";
	}elseif {
		print "Your reservation has been made."	
	$q = "INSERT into Reservations (Reservation#,NameonRes,SpaceTitle,Date,Time) values (// names of data from below);";
	$result = $link-> query($q);
	if ($result!==false) {
		print "Your space has been reserved.</BR>";
	}
	}
}
//close the link. May take this out when it is implemented.
$link->close();
*/	
//Below is code for the HTML. The user can input the 
?>

<!DOCTYPE>
	<HTML>
		<HEAD>
			<TITLE>Edens Bistro Reservation</TITLE>
			<META Charset "UTF-8" />
			<META name="author" content="Jonathan T. Risoldi" />
			<SCRIPT type="text/javascript" src="topnav.js">
			</SCRIPT>
			<link rel="stylesheet" href="Reservation.CSS">
			<link rel="stylesheet" href="topnav.css">
		</HEAD>
		<BODY class="backgroundimage">
			<FORM action="Reservation.php" method="post">
			<DIV class="sidenav";>
				<img  href="/index.html"><img src="Eden logo.png" alt="logo" /></img> 
				<A href="https://www.google.com/maps/place/2321+E+71st+St,+Chicago,+IL+60649/@41.7660398,-87.5703005,17z/data=!3m1!4b1!4m5!3m4!1s0x880e284fea839a01:0x359acbdb9b3fe3c0!8m2!3d41.7660358!4d-87.5681118">2321 E 71st Street, Chicago, IL 60649</A> 
				<br />
				<H1>Hours:</H1>
				<H1>Monday-Saturday</H1>
				<H1>9AM-9PM</H1>
				<H1>Sunday</H1>
				<H1>Closed</H1>
			</DIV>
			<?php include('topnav.php');?>

			<DIV class="options">
				<DIV class="name">
					<A>Name<A>
					<BR />
					<LABEL name="nameOnReservation">Name on Reservation </LABEL></BR>

					<INPUT type="text" name="resName"/>
				</DIV>
				<DIV class="space">
					<A>Space<A>
					<BR />
					<SELECT name="resSpace">
						<OPTION>Select</OPTION>
						<OPTION Value="Large Party Room"> Large Party Room (Max 40)</OPTION>
						<OPTION Value="Small Party Room"> Small Party Room (Max 15)</OPTION>
						<OPTION Value="Newlywed Corner">Newlywed Corner</OPTION>
					</SELECT>
				</DIV>
				<DIV class="date">
					<A>Date<A>
					<BR />
					<INPUT type= "date" name="resDate" placeholder="MM/DD/YYYY"></INPUT>
				</DIV>
				<DIV class="time">
					<A>Time<A>
					<BR />
					<SELECT name="resTime">
						<OPTION NAME="9AM">9AM</OPTION>
						<OPTION NAME="10AM">10AM</OPTION>
						<OPTION NAME="11AM">11AM</OPTION>
						<OPTION NAME="12PM">12PM</OPTION>
						<OPTION NAME="1PM">1PM</OPTION>
						<OPTION NAME="2PM">2PM</OPTION>
						<OPTION NAME="3PM">3PM</OPTION>
						<OPTION NAME="4PM">4PM</OPTION>
						<OPTION NAME="5PM">5PM</OPTION>
						<OPTION NAME="6PM">6PM</OPTION>
						<OPTION NAME="7PM">7PM</OPTION>
						<OPTION NAME="8PM">8PM</OPTION>
					</SELECT>
				</DIV>
				<DIV class="submit">
					<BUTTON name="submit">Submit</BUTTON>
				</DIV>
			</DIV>
			</FORM>
		</BODY>
	</HTML>
	<?php
	$link->close();
	?>