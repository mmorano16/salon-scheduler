<?php 
    $db = mysqli_connect('w2k12-compscidb.academia.sjfc.edu','salon','salon','salon') or die('Error connecting to MySQL server.'); 
	$sql = "SELECT Name FROM employee";
	$result = $db->query($sql);
?>


<html>
<head>
<title>View Schedule</title>
<div class="header">
	<h1>Select Stylist</h1>
</div>
<link rel="stylesheet" type="text/css" href="../../view.css" media="all">
<script type="text/javascript" src="../../view.js"></script>
<head>
<!--page is used to select stylist's schedule to be viewed
	if no stylist is selected all stylist schedules 
	will be shown-->
<body>
<div class="white-box">
	<div class="container">
		<form action="ViewSched.php" method="post">
		<ul>
		<li><label for="Stylist">Stylist</label>
			<select id="Stylist" name="stylist">
			<option value="">All Schedules</option>
			<?php
				while($row = $result->fetch_assoc())
				{
					echo "<option value='" . $row['Name'] . "'>" . $row['Name'] . "</option>";
				}
			?>
			</select>
		<ul><input type="submit" value="Submit"></ul>       
		</ul>
		</form>
	</div> 
	</div>
</body>
</html>