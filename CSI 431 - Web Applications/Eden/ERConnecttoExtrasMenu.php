<?php
//Make sure Database connection is esablished first at top before HTML
else {
	// may take out later after testing connection
	print"Database connection established.";
	//Copy from here down
	$q = "SELECT * FROM ExtraMenu";
	$result = $link->query($q);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<TR><TD>" . $row["Extra_Item"]. "</TD><TD>" . $row["Additional_Price"]."</TD></TR>";
    }
} else {
    echo "0 results";
}
}//End of else
	//Make sure to close link at the end of the HTML
?>