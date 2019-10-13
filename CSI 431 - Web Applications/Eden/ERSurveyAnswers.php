<?php 
// Need this if statement first so that the program knows to only load answers into the database after the Submit button is pushed. 
if (isset($_POST['answer1'])){
include_once('../ERdbinc.php');
$link = new mysqli($dbhost,$dbuser,$dbpassword,$dbname);
if ($link->connect_error) {
	print"There was a problem connecting to the database.</BR>";
print $link->connect_errno.": {$link->connect_error}";
}
else {
	print"Database connection established.";
	// Assign answers to variables. Once submitted see first if statement. Can be renamed if be. 
	$answer1 ="";
	$answer2 ="";
	$answer3 ="";
	$answer4 ="";
	$answer5 ="";	
	if(isset($_POST['answer1']))$answer1 = $_POST['answer1'];
	if(isset($_POST['answer2']))$answer2 = $_POST['answer2'];
	if(isset($_POST['answer3']))$answer3 = $_POST['answer3'];
	if(isset($_POST['answer4']))$answer4 = $_POST['answer4'];
	if(isset($_POST['answer5']))$answer5 = $_POST['answer5'];
	//Use an INSERT to put data into, use SELECT to get data out.
	//RTS - these fields may need to be renamed once survey is completely decided upon....
	$q = "INSERT into SurveyAnswers (Survey#,//place other columns here once made) values ('$answer1','$answer2','$answer3','$answer4','$answer5');";
	$result = $link-> query($q);
	if ($result!==false) {
		print "Thank you for your input.</BR>";
	} 
	else {
		print $link->error;
	}
}
//Close the instance.
$link->close();
}	
?>