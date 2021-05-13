<?php 
    $db = mysqli_connect('w2k12-compscidb.academia.sjfc.edu','salon','salon','salon') or die('Error connecting to MySQL server.'); 
?>
<!--if the username and password are correct, the user is allowed
	access to the home page, if not, the user is notified that the
	credentials are incorrect-->
<html>
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
	echo '<script type="text/javascript">'; 
    echo 'window.location.href = "homescreen.php";';
    echo '</script>';	
}
else//username or password are incorrect
{
	echo '<script type="text/javascript">'; 
    echo 'alert("Username or Password is Incorrect! Try Again");'; 
    echo 'window.location.href = "Login.php";';
    echo '</script>';
}
?>
</body>
</html>