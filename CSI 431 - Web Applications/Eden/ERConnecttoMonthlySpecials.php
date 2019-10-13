<?php

	$q = "SELECT * FROM MonthlySpecials";
	$result = $link->query($q);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<TR><TD>" . $row["Month_of_Special"]. "</TD><TD>" . $row["Special_Description"]."</TD></TR>";
    }
} else {
    echo "0 results";
}
}//End of else
	//Make sure to close link at the end of the HTML
?>

