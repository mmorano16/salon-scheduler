<?php 
    $db = mysqli_connect('w2k12-compscidb.academia.sjfc.edu','salon','salon','salon') or die('Error connecting to MySQL server.'); 
?>
<html>
<body>
<!--This page runs the update query then returns
	to home if query updates successfully
	or back to update info screen if not
	checks to see if password was changed or not first-->
<?php
$name = $_POST["name"];
$username = $_POST["username"];
$empId = $_POST["empId"];
$password = md5($_POST["password"]);
$sql = "SELECT EmpId FROM employee WHERE username = '$username'";
$result = $db->query($sql);
$row = $result->fetch_assoc();

if($row['EmpId'] == $empId)//if the username entered belongs to the employee
{
	//if password is not new
	if($_POST["password"] === "")
	{
		$sql = "UPDATE employee SET Name = '$name',
									Username = '$username'
				WHERE employee.EmpId = '$empId'";
	}
	else//if password is new
	{
		$sql = "UPDATE employee SET Name = '$name',
									Username = '$username',
									Password = '$password'
				WHERE employee.EmpId = '$empId'";
	}

	//if the query worked return to the first screen
	if($db->query($sql) === TRUE)
	{
		echo '<script type="text/javascript">'; 
		echo 'alert("Employee Record Updated");'; 
		echo 'window.location.href = "../../homescreen.php";';
		echo '</script>';
	}
	else//if query failed return to enter info screen
	{
		echo '<script type="text/javascript">'; 
		echo 'alert("Unable to Update Employee Record");'; 
		echo 'window.location.href = "UpdEmp.php";';
		echo '</script>';
	}
}
else//if the username belongs to another employee
{
	echo '<script type="text/javascript">'; 
    echo 'alert("Another Employee Has This Username");'; 
    echo 'window.location.href = "FndEmp.php";';
    echo '</script>';
}
?>
</body>
</html>