<html>
<head>
	<title>Cancel Appointment</title>
		<div class="header">
			<h1>Enter Appointment Info</h1>
		</div>
<link rel="stylesheet" type="text/css" href="../view.css" media="all">
<script type="text/javascript" src="../view.js"></script>
</head>
<!--Page is used to delete appointment
	info is sent to DltApp.php page to query-->
<body>
<div class="white-box">
	<div class="container">
		<form action="DltApp.php" method="post" >
		<ul>
		<li><label for="firstName">First Name</label>
			<input type="text" id="FirstName" name="fname" maxlength="25" placeholder="First Name"></li>
		<li><label for="lastName">Last Name</label>
			<input type="text" id="LastName" name="lname" maxlength="12" placeholder="Last Name"></li>
		<li><label for="phone">Phone Number</label>
			<input type="tel" id = "Phone" name="pNum" placeholder="Phone Number"></li>
		<li><label for="Time">Start Time</label>
			<input type="time" id="StartTime" name="start" placeholder="Start Time"></li>
		<li><label for="Date">Date</label>
			<input type="date" id="Date" name="date" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d"); ?>" name="date"></li>	
		<ul><input type="submit" value="Submit"></ul>       
		</ul>
		</form>
	</div> 
	<a href="../homescreen.php"><button class="btn danger">Back to Home</button></a><br>
</div>
</body>

</html> 