<?php 
    $db = mysqli_connect('w2k12-compscidb.academia.sjfc.edu','salon','salon','salon') or die('Error connecting to MySQL server.'); 
?>
<html>
<!--if the stylist searched exists this page is where
the user will see the stylists name and username and be
able to change what is needed-->
<div class="header">
        <h1>Update Stylist Info</h1>
    </div>
<link rel="stylesheet" type="text/css" href="../../view.css" media="all">
<script type="text/javascript" src="../../view.js"></script>
<body>
<?php
$username = $_POST["username"];
$password = md5($_POST["password"]);

//sql query to see if the entered username and password are correct
$sql = "SELECT * FROM employee WHERE username = '$username' AND
									 password = '$password'";
$result = $db->query($sql);
$row = $result->fetch_assoc();

//username and password are correct
if($result->num_rows > 0)
{
	$getEmpId = $row["EmpId"];
	$getName = $row["Name"];
	$getUsername = $row["Username"];	
}
else
{
	echo '<script type="text/javascript">'; 
    echo 'alert("Username or Password is Incorrect! Try Again");'; 
    echo 'window.location.href = "FndEmp.php";';
    echo '</script>';
}
?>
<div class="white-box">
<div class="container">
	<form action="AltEmp.php" method="post">
		<ul>
		<li><label for="name">Name</label>
			<input type="text" id="name" name="name" value="<?php echo $getName?>"></li>
		<li><label for="username">Username</label>
			<input type="text" id="username" name="username" value="<?php echo $getUsername?>"></li>
		<li><label for="password">Password</label>
			<input type="password" id="password" name="password" placeholder="Leave blank to keep same"></li>
		<input type="number" style="display:none;" id="empId" name="empId" value="<?php echo $getEmpId ?>"></li>	
        <li><input type="submit" value="Update"></li>  
		</ul>
	</form>
</div>
</div>
</body>
</html> 
</body>
</html>