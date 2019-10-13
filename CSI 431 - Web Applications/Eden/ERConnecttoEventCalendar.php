<?php
//Make sure Database connection is esablished first at top before HTML
else {
	// may take out later after testing connection
	print"Database connection established.";
	$q = "SELECT * FROM EventCalendar";
	$result = $link->query($q);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<TR><TD>" . $row["EventDate"]. "</TD><TD>" . $row["EventName"]."</TD><TD>" . $row["EventDescription"]."</TD></TR>";
    }
} else {
    echo "0 results";
}
}//End of else
	//Make sure to close link at the end of the HTML
?>
