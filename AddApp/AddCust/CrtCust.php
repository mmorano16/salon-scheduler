<?php 
    $db = mysqli_connect('w2k12-compscidb.academia.sjfc.edu','salon','salon','salon') or die('Error connecting to MySQL server.'); 
?>
<html>
<body>
<!--Checks information given to see if customer already exists
if they do, error message given and returns to prev page
if not, new customer is added to the db and returns to prev page-->

<?php
$fName = $_POST["firstName"];
$lName = $_POST["lastName"];
$pNum = $_POST["phone"];
$address = $_POST["address"];
$city = $_POST["city"];
$state = $_POST["state"];
$zip = $_POST["zip"];
//query to search if cust already exists
$sql = "SELECT * FROM customer WHERE FirstName = '$fName' AND
									 LastName = '$lName' AND
									 PhoneNumber = '$pNum'";
									 
$result = $db->query($sql);
$row = $result->fetch_assoc();
//if cust does not exist
if($result->num_rows <1)
{
	//query to add cust to db
	$sql = "INSERT INTO customer(FirstName, LastName, PhoneNumber,
				Address, City, State, Zipcode) VALUES
				('$fName', '$lName', '$pNum', '$address',
				'$city', '$state', '$zip')";
	//if the query ran successfully
	if($db->query($sql) === TRUE)
	{
		echo '<script type="text/javascript">'; 
		echo 'alert("Customer Record Created!");'; 
		echo 'window.location.href = "../AddApp.php";';
		echo '</script>';
	}
	else//if the query failed
	{
		echo '<script type="text/javascript">'; 
		echo 'alert("Unable to Create Customer Record");'; 
		echo 'window.location.href = "NewCust.php";';
		echo '</script>';
	}
	
}
else//if the cust already exists
{
	echo '<script type="text/javascript">'; 
    echo 'alert("Customer Already Excists!");'; 
    echo 'window.location.href = "NewCust.php";';
    echo '</script>';
}

?>

</body>
</html>