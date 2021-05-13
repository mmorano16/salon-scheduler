<?php 
    $db = mysqli_connect('w2k12-compscidb.academia.sjfc.edu','salon','salon','salon') or die('Error connecting to MySQL server.'); 
?>
<html>
<body>
<!--takes cust info and start time and date
	finds if appointment exists
	deletes appoinment from schedule-->
<?php
$fName 	 = $_POST["fname"];
$lName 	 = $_POST["lname"];
$pNum	 = $_POST["pNum"];
$start 	 = $_POST["start"];
$date 	 = $_POST["date"];

$sql = "SELECT appointment.AppId, Type
		FROM appointment
		INNER JOIN customer ON customer.CustId = appointment.CustId
		WHERE customer.FirstName = '$fName' 
		AND customer.LastName = '$lName' 
		AND customer.PhoneNumber = '$pNum'
		AND appointment.StartTime = '$start'
		AND appointment.Date = '$date'";

$result = $db->query($sql);
$row = $result->fetch_assoc();
$AppId = $row['AppId'];
$TypeId = $row['Type'];
echo $result->num_rows;
echo "<br>";
if($result->num_rows > 0)//cust has app
{
	echo $TypeId;
	echo "<br>";
	$sql = "SELECT inventory.Amount, product.AmountNeeded, inventory.ItemId 
				FROM product 
				INNER JOIN inventory ON inventory.ItemId = product.ItemId 
				INNER JOIN type ON type.TypeId = product.TypeId 
				WHERE type.TypeId = '$TypeId'";
	$result = $db->query($sql);
	while($row = $result->fetch_assoc())
	{
		$amount = $row['Amount'];
		$amountNeeded = $row['AmountNeeded'];
		$ItemId = $row['ItemId'];
		echo "amount: " . $amount;
		echo "<br>";
		echo "amount needed: " . $amountNeeded;
		echo "<br>";
		echo "item id: " . $ItemId;
		echo "<br>";
		$sql = "UPDATE inventory SET Amount = '$amount' + '$amountNeeded'
								WHERE ItemId = '$ItemId'";
		if($db->query($sql) === FALSE)
		{
			echo '<script type="text/javascript">'; 
			echo 'alert("Something Went Wrong!");'; 
			echo 'window.location.href = "RmvApp.php";';
			echo '</script>';
		}
	}
	$sql = "DELETE FROM appointment WHERE AppId = '$AppId'";
	if($db->query($sql) === TRUE)
	{
		echo '<script type="text/javascript">'; 
		echo 'alert("Appointment Canceled!");'; 
		echo 'window.location.href = "../homescreen.php";';
		echo '</script>';
	}
	else//if query failed
	{
		echo '<script type="text/javascript">'; 
		echo 'alert("Unable to Cancel Appointment");'; 
		echo 'window.location.href = "RmvApp.php";';
		echo '</script>';
	}
}
else
{
	echo '<script type="text/javascript">'; 
	echo 'alert("Appointment Does Not Exist!");'; 
	echo 'window.location.href = "RmvApp.php";';
	echo '</script>';
}
?>	
</body>
</html>