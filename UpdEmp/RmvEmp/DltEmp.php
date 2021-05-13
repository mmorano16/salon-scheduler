<?php 
    $db = mysqli_connect('w2k12-compscidb.academia.sjfc.edu','salon','salon','salon') or die('Error connecting to MySQL server.'); 
?>
<html>
<body>
<!--takes the emp info and determines if they can be removed
	checks if emp exists
	checks if emp has any appointments 
	if they do they cannot be removed
	if not they are removed-->
<?php	
$name = $_POST["name"];
$username = $_POST["username"];
$password = md5($_POST["password"]);

$sql = "SELECT username FROM employee WHERE username = '$username'";
$result = $db->query($sql);
//emp does not exist
if($result->num_rows<1)
{
	echo '<script type="text/javascript">'; 
	echo 'alert("Stylist Information Incorrect!");'; 
	echo 'window.location.href = "DrpEmp.php";';
	echo '</script>';
}
$sql = "SELECT employee.EmpId FROM appointment 
		INNER JOIN employee ON appointment.EmpId = employee.EmpId 
		WHERE employee.Username = '$username'";
$result = $db->query($sql);
$row = $result->fetch_assoc();
//emp has appointments
if($result->num_rows>0)
{
	echo '<script type="text/javascript">'; 
	echo 'alert("Stylist Has Existing Appointments And Cannot Be Removed!");'; 
	echo 'window.location.href = "DrpEmp.php";';
	echo '</script>';
}
else//emp has no apps
{
	$sql = "DELETE FROM employee WHERE username = '$username'";
	//delete successful
	if($db->query($sql) === TRUE)
	{
		echo '<script type="text/javascript">'; 
		echo 'alert("Stylist Record Deleted!");'; 
		echo 'window.location.href = "../../homescreen.php";';
		echo '</script>';
	}
	else//if query failed
	{
		echo '<script type="text/javascript">'; 
		echo 'alert("Unable to Delete Stylist Record");'; 
		echo 'window.location.href = "DrpEmp.php";';
		echo '</script>';
	}
}


?>	
</body>
</html>