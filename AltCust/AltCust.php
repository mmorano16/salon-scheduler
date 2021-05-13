<?php 
    $db = mysqli_connect('w2k12-compscidb.academia.sjfc.edu','salon','salon','salon') or die('Error connecting to MySQL server.'); 
?>

<html>
<body>
<!--This page runs the update query then returns
	to home if query updates successfully
	or back to update info screen if not-->
<?php
//stores all input customer info to variables
$custId = $_POST["custId"];//same as name field in UpdCust.php
$fName = $_POST["firstName"];
$lName = $_POST["lastName"];
$pNum = $_POST["phone"];
$address = $_POST["address"];
$city = $_POST["city"];
$state = $_POST["state"];
$zip = $_POST["zip"];
//query to update customer info
$sql = "UPDATE customer SET FirstName = '$fName',
							LastName = '$lName',
							PhoneNumber = '$pNum',
							Address = '$address',
							City = '$city',
							State = '$state',
							Zipcode = '$zip'
		WHERE customer.CustId = '$custId'";
//if the query worked return to the first screen
if($db->query($sql) === TRUE)
{
	echo '<script type="text/javascript">'; 
    echo 'alert("Customer Record Updated");'; 
    echo 'window.location.href = "../homescreen.php";';
    echo '</script>';
}
else//if query failed return to enter info screen
{
	echo '<script type="text/javascript">'; 
    echo 'alert("Unable to Update Customer Record");'; 
    echo 'window.location.href = "UpdCust.php";';
    echo '</script>';
}
?>
</body>
</html>