<html>
<head>
	<title>Drop Stylist</title>
		<div class="header">
			<h1>Enter Stylist Info</h1>
		</div>
<link rel="stylesheet" type="text/css" href="../../view.css" media="all">
<script type="text/javascript" src="../../view.js"></script>
</head>
<!--Page is used to delete stylist
	info is sent to DltEmp.php page to query-->
<body>
<div class="white-box">
	<div class="container">
		<form action="DltEmp.php" method="post" >
		<ul>
		<li><label for="Name">Name</label>
			<input type="text" id="Name" name="name" maxlength="25" placeholder="Enter Name"></li>
		<li><label for="Username">Username</label>
			<input type="text" id="Username" name="username" maxlength="12" placeholder="Username"></li>
		<li><label for="password">Password</label>
			<input type="password" id = "pass" name="password" placeholder="Password"></li>
		<ul><input type="submit" value="Submit"></ul>       
		</ul>
		</form>
	</div> 
          <a href="../UpdEmp.php"><button class="btn danger">Back</button></a><br>
</div>
</body>

</html> 