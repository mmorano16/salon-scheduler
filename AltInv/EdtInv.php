<?php 
    $db = mysqli_connect('w2k12-compscidb.academia.sjfc.edu','salon','salon','salon') or die('Error connecting to MySQL server.'); 
?>
<html>
<body>
<!--Takes item name and amount to be added 
	if new amount is negative will not complete
	can add or subtract-->
<?php
$name = $_POST["name"];
$aAmount = $_POST["amount"];

$sql = "SELECT Amount FROM inventory WHERE ItemName = '$name'";
$result = $db->query($sql);
$row = $result->fetch_assoc();
$amount = $row["Amount"];
$nAmount = $aAmount + $amount;
if($nAmount <0)
{
	echo '<script type="text/javascript">'; 
	echo 'alert("Item Amount Cannot Be Negative!");'; 
	echo 'window.location.href = "AltInv.php";';
	echo '</script>';
}
else
{
	$sql = "UPDATE inventory SET Amount = '$nAmount' 
			WHERE ItemName = '$name'";
	if($db->query($sql) === TRUE)
	{
		echo '<script type="text/javascript">'; 
		echo 'alert("Inventory Altered!");'; 
		echo 'window.location.href = "AltInv.php";';
		echo '</script>';
	}
	else
	{
		echo '<script type="text/javascript">'; 
		echo 'alert("Unable to Alter Inventory!");'; 
		echo 'window.location.href = "AltInv.php";';
		echo '</script>';
	}
}

?>
</body>
</html>