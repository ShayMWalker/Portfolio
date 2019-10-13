<?php 
include_once('ERdbinc.php');
$link = new mysqli($dbhost,$dbuser,$dbpassword,$dbname);
if ($link->connect_error) {
	print"There was a problem connecting to the database.</BR>";
print $link->connect_errno.": {$link->connect_error}";
}
else {
	// may take out later after testing connection
	print"Database connection established.";
	
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
	
	//Checks to make sure that the date is in the correct format and that the date is current.
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
$link->close();
	
?>


