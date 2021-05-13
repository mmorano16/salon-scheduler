<?php 
    $db = mysqli_connect('w2k12-compscidb.academia.sjfc.edu','salon','salon','salon') or die('Error connecting to MySQL server.'); 
?>

<html>
<!--If the customer searched exists this page is where
	the user will see all of the customers info and 
	change what is needed. if the customer does not exists
	the page will redirect to the previous page-->
<head>
<div class="header">
        <h1>Update Customer Info</h1>
    </div>
<link rel="stylesheet" type="text/css" href="../view.css" media="all">
<script type="text/javascript" src="../view.js"></script>
</head>
<body>

<?php
$fName = $_POST["firstName"];//same as name field in list
$lName = $_POST["lastName"];
$pNum = $_POST["phone"];
//query to search for customer based off name and number
$sql = "SELECT * FROM customer WHERE FirstName = '$fName' AND
									 LastName = '$lName' AND
									 PhoneNumber = '$pNum'";
									 
$result = $db->query($sql);
$row = $result->fetch_assoc();

if($result->num_rows > 0)
{//stores all customer info into variables
	$getCustId = $row["CustId"];
	$getFirstName = $row["FirstName"];
	$getLastName = $row["LastName"];
	$getPhoneNumber = $row["PhoneNumber"];
	$getAddress = $row["Address"];
	$getCity = $row["City"];
	$getState = $row["State"];
	$getZip = $row["Zipcode"];
}
else//pop up message occurs on previous screen
{
	echo '<script type="text/javascript">'; 
    echo 'alert("Customer Does Not Excist! Try Again");'; 
    echo 'window.location.href = "FndCust.php";';
    echo '</script>';
}
?>
<div class="white-box">
<div class="container">
	<form action="AltCust.php" method="post">
		<ul>
            <li><label for="firstName">First Name</label>
				<input type="text" id="fName" name="firstName" value="<?php echo $getFirstName ?>"></li>
			<li><label for="lastName">Last Name</label>
                <input type="text" id="lName" name="lastName" value="<?php echo $getLastName ?>"></li>
			<li><label for="phone">Phone</label>
                <input type="tel" id = "pNum" name="phone" maxlength="10" value="<?php echo $getPhoneNumber ?>"></li>
			<li><label for="address">Address</label>
				<input type="text" id="address" name="address" value="<?php echo $getAddress ?>"></li>
			<li><label for="city">City</label>
				<input type="text" id="city" name="city" value="<?php echo $getCity ?>"></li>
			<li><label for="state">State</label>
				<input type="text" id="state" name="state" value="<?php echo $getState ?>"></li>
			<li><label for="zip">Zip</label>
				<input type="number"  id="zip" name="zip" maxlength="5" value="<?php echo $getZip ?>"></li>
			<input type="number" style="display:none;" id="custId" name="custId" value="<?php echo $getCustId ?>">
			<li><input type="submit" value="Update"></li>       
            </ul>
	</form>
	</div>
	</div>
</body>
</html> 