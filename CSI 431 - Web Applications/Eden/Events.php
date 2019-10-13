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
?>
<!DOCTYPE>
	<HTML>
		<HEAD>
			<TITLE>Edens Bistro Events</TITLE>
			<META Charset "UTF-8" />
			<META name="author" content="Jonathan T. Risoldi" />
			<SCRIPT type="text/javascript" src="topnav.js">
			</SCRIPT>
			<link rel="stylesheet" href="events.css">
			<link rel="stylesheet" href="topnav.css">			
		</HEAD>
		<BODY class="backgroundimage">
			<DIV class="sidenav";>
				<img  href="/index.html"><img src="Eden logo.png" alt="logo" /></img> 
				<A>2321 E 71st Street, Chicago, IL 60649</A> 
				<br />
				<A>Hours:</A>
				<A>Monday-Saturday</A>
				<A>9AM-9PM</A>
				<A>Sunday</A>
				<A>Closed</A>
			</DIV>
			<?php include('topnav.php');?>	
			<TABLE class="EventsTable">
				<TR>
					<TH>Date</TH>
					<TH>Name</TH>
					<TH>Description</TH>
						<?php
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
							}
							//Make sure to close link at the end of the HTML
						?>
				</TR>				
			<TABLE>
			<TABLE class="specialsTableEventsPage">
				<TR>
					<TH>Month</TH>
					<TH>Specials</TH>
				</TR>
				<?php
					$q = "SELECT Month_of_Special, Special_Description FROM MonthlySpecials";
					$result = $link->query($q);
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo "<TR><TD>" . $row["Month_of_Special"]. "</TD><TD>" . $row["Special_Description"]."</TD></TR>";
						}
					} else {
						echo "0 results";
						}
						//Make sure to close link at the end of the HTML
				?>
			</TABLE>
		</BODY>
	</HTML>
</!DOCTYPE>
<?php
	$link->close();
?>