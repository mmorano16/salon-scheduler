<?php 
    $db = mysqli_connect('w2k12-compscidb.academia.sjfc.edu','salon','salon','salon') or die('Error connecting to MySQL server.'); 
	$Ssql = "SELECT Name, EmpId FROM employee";
	$Sresult = $db->query($Ssql);
	$Tsql = "SELECT Name, TypeId FROM type";
	$Tresult = $db->query($Tsql);
?>

<html>
<head>
	<title>Schedule Appointment</title>
		<div class="header">
			<h1>Enter Appointment Information</h1>
		</div>
<link rel="stylesheet" type="text/css" href="../view.css" media="all">
<script type="text/javascript" src="../view.js"></script>
</head>
<!--Page is used to enter information for a new appointment
	information will be sent to CrtApp.php
	option to create a new customer and view current schedules-->
<body>
	<div id="main">
        <div id="form_container">
      <nav></nav>
	</div>
	<div class="white-box"> 
	<a href="ChkSched/PckEmp.php"><button class="btn danger">View Employee Schedules</button></a><br>
	<a href="AddCust/NewCust.php"><button class="btn danger">Add Customer</button></a><br>
	
	<div class="container">
		<form action="CrtApp.php" method="post" >
		<ul>
		<li><label for="FirstName">First Name</label>
			<input type="text" id="FirstName" name="firstname" placeholder="First Name"></li>
		<li><label for="LastName">Last Name</label>
			<input type="text" id="LastName" name="lastname" placeholder="Last Name"></li>
		<li><label for="PhoneNumber">Phone Number</label>
			<input type="phone" id="PhoneNumber" name="phone" placeholder="PhoneNumber"></li>
		<li><label for="Stylist">Stylist</label>
			<select id="Stylist" name="stylist">
			<option value="">All Stylists</option>
			<?php
				while($row = $Sresult->fetch_assoc())
				{
					echo "<option value='" . $row['EmpId'] . "'>" . $row['Name'] . "</option>";
				}
			?>
			</select>
		<li><label for="Type">Type</label>
			<select id="Type" name="type">
			<?php
				while($row = $Tresult->fetch_assoc())
				{
					echo "<option value='" . $row['TypeId'] . "'>" . $row['Name'] . "</option>";
				}
			?>
			</select>
		<li><label for="Time">Start Time</label>
			<input type="time" id="StartTime" name="start"></li>
		<li><label for="Date">Date</label>
			<input type="date" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d"); ?>" name="date">	
		<input type="submit" value="Submit">      
		</ul>
		</form>
	</div> 
          <a href="../homescreen.php"><button class="btn danger">Back To Home</button></a><br>
	</div>
</body>
</html>