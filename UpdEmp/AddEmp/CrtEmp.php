<?php 
    $db = mysqli_connect('w2k12-compscidb.academia.sjfc.edu','salon','salon','salon') or die('Error connecting to MySQL server.'); 
?>
<html>
<body>
<!--Takes new emp info and creates new employee in db
if the username entered already exists sends back to AddEmp.php
if not a new employee is created 
password is hashed-->
<?php
$name = $_POST["name"];
$username = $_POST["username"];
$password = md5($_POST["password"]);

$sql = "SELECT username FROM employee WHERE username = '$username'";
$result = $db->query($sql);
$row = $result->fetch_assoc();
//echo $result->num_rows;
//if username doesn't exist
if($result->num_rows<1)
{
	$sql = "INSERT INTO employee(Name, Username, Password) VALUES
			('$name', '$username', '$password')";
	//if query ran successfully
	if($db->query($sql) === TRUE)
	{
		echo '<script type="text/javascript">'; 
		echo 'alert("Stylist Record Created!");'; 
		echo 'window.location.href = "../../homescreen.php";';
		echo '</script>';
	}
	else//if query failed
	{
		echo '<script type="text/javascript">'; 
		echo 'alert("Unable to Create Stylist Record");'; 
		echo 'window.location.href = "AddEmp.php";';
		echo '</script>';
	}
}
else//username already exists
{
	echo '<script type="text/javascript">'; 
    echo 'alert("Username Taken!");'; 
    echo 'window.location.href = "AddEmp.php";';
    echo '</script>';
}
?>
</body>
</html>