<?php 
    $db = mysqli_connect('w2k12-compscidb.academia.sjfc.edu','salon','salon','salon') or die('Error connecting to MySQL server.'); 
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<title>Inventory</title>
<div class="header"><h1>Inventory</h1></div>
</head>
<body>
<div class="white-box">
<?php
$sql="SELECT * FROM inventory";
$result = $db->query($sql);

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

<div id="main">
      <article>
	  <a href="homescreen.php"><button class="btn danger">Back to Home</button></a><br>
          </article>
      <nav></nav>
  </div>
</div>
</body>
</html>