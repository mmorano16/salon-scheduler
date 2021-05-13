<?php 
    $db = mysqli_connect('w2k12-compscidb.academia.sjfc.edu','salon','salon','salon') or die('Error connecting to MySQL server.'); 
	$sql = "SELECT ItemName FROM inventory";
	$result = $db->query($sql);
?>

<html>
<head>
	<title>Alter Inventory</title>
		<div class="header">
			<h1>Enter Item Name and Amount to Add</h1>
		</div>
<link rel="stylesheet" type="text/css" href="../view.css" media="all">
<script type="text/javascript" src="../view.js"></script>
</head>
<!--Page is used to enter item and the amount to add
	info is sent to EdtInv.php page to query
	can put negative numbers-->
<body>
<div class="white-box">
	<div class="container">
		<form action="EdtInv.php" method="post" >
		<ul>
		<li><label for="name">Item Name</label>
			<select id="Name" name="name">
			<option placeholder="Select Item">Select Item</option>
			<?php
				while($row = $result->fetch_assoc())
				{
					echo "<option value='" . $row['ItemName'] . "'>" . $row['ItemName'] . "</option>";
				}
			?>
			</select>
		<li><label for="Amount">Amount</label>
			<input type="number" id="Amount" name="amount" maxlength="3" placeholder="Add Amount"></li>
		<ul><input type="submit" value="Submit"></ul>       
		</ul>
		</form>
	</div> 
	<a href="../homescreen.php"><button class="btn danger">Back to Homescreen</button></a><br>
<?php
$sql="SELECT * FROM inventory";
$result = $db->query($sql);
echo "<br>";
echo "<style>";
echo "table, th, td {";
echo "border: 1px solid black;";
echo "border-collapse: collapse;";
echo "}";
echo "th, td {";
echo "padding: 5px;";
echo "}";
echo "</style>";

echo "<table>";
echo "<tr>";
echo "<th>Item Name</th>";
echo "<th>Amount</th>";
echo "</tr>";

while($row = $result->fetch_assoc())
{
	echo "<tr>";
		echo "<td>".$row['ItemName']."</td>";
		echo "<td>" .$row['Amount']."</td>";
	echo "</tr>";
}
echo "</table>";
?>	
</div>

</body>

</html> 