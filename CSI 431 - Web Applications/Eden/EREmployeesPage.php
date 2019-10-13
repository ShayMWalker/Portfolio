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
?>
<?php
if (isset($_POST['user_id']) and isset($_POST['user_pass'])){
	
// Assigning POST values to variables.
$username = $_POST['user_id'];
$password = $_POST['user_pass'];

// CHECK FOR THE RECORD FROM TABLE
$q = "SELECT * FROM `EmployeeCredentials` WHERE Username='$username' and Password='$password'";
 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if ($count == 1){
//echo "Login Credentials verified";
echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";

}else{
echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
//echo "Invalid Login Credentials";
}
}
?>

<!DOCTYPE html >
<html>
<head>
<title>EDEN EMPLOYEE LOGIN FORM</title>
<link rel="stylesheet" type="text/css" href="EREmployeesPage.css">
</head>
<body id="body_bg">
<div <div align="center">

<h3>EDEN LOGIN FORM</h3>
    <form id="login-form" method="post" action="authen_login.php" >
        <table border="0.5" >
            <tr>
                <td><label for="user_id">User Name</label></td>
                <td><input type="text" name="user_id" id="user_id"></td>
            </tr>
            <tr>
                <td><label for="user_pass">Password</label></td>
                <td><input type="password" name="user_pass" id="user_pass"></input></td>
            </tr>
			
            <tr>
				
                <td><input type="submit" value="Submit" />
                <td><input type="reset" value="Reset"/>
				
            </tr>
        </table>
    </form>
		</div>
</body>
</html>