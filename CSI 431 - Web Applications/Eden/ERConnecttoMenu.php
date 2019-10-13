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
	$q = "SELECT * FROM BreakfastMenu";
	$result = $link->query($q);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<TR><TD>" . $row["Breakfast_Item"]. "</TD><TD>" . $row["Price"]."</TD></TR>";
    }
} else {
    echo "0 results";
}
	$q = "SELECT * FROM LunchMenu";
	$result = $link->query($q);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<TR><TD>" . $row["Lunch_Item"]. "</TD><TD>" . $row["Price"]."</TD></TR>";
    }
} else {
    echo "0 results";
}

	$q = "SELECT * FROM DinnerMenu";
	$result = $link->query($q);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<TR><TD>" . $row["Dinner_Item"]. "</TD><TD>" . $row["Price"]."</TD></TR>";
    }
} else {
    echo "0 results";
}
	$q = "SELECT * FROM SideMenu";
	$result = $link->query($q);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<TR><TD>" . $row["Side_Item"]. "</TD><TD>" . $row["Price"]."</TD></TR>";
    }
} else {
    echo "0 results";
}
	$q = "SELECT * FROM DrinkMenu";
	$result = $link->query($q);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<TR><TD>" . $row["Drink_Item"]. "</TD><TD>" . $row["Price"]."</TD></TR>";
    }
} else {
    echo "0 results";
}

}
$link->close();
?>
