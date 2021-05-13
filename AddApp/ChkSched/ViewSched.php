<?php 
    $db = mysqli_connect('w2k12-compscidb.academia.sjfc.edu','salon','salon','salon') or die('Error connecting to MySQL server.'); 
?>

<!--Takes the stylist selected and shows their schedule
	if no stylist was selected, all scheduled apps will be shown-->
<html>
<head>
<link rel="stylesheet" type="text/css" href="../../view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<title>Schedule</title>
<div class="header"><h1>Schedule</h1></div>
</head>
<body>
<div class="white-box">
<?php
$name = $_POST["stylist"];
if($name=="")
	$sql = "SELECT employee.Name, type.name, customer.FirstName, appointment.StartTime, appointment.EndTime, appointment.Date 
			FROM appointment 
			INNER JOIN employee ON appointment.EmpId = employee.EmpId 
			INNER JOIN customer ON appointment.CustId = customer.CustId 
			INNER JOIN Type ON appointment.Type = type.TypeId
			WHERE Date >= CURRENT_DATE
			ORDER BY employee.Name, Date, StartTime";
else
{
	$sql = "SELECT employee.Name, type.name, customer.FirstName, appointment.StartTime, appointment.EndTime, appointment.Date 
			FROM appointment 
			INNER JOIN employee ON appointment.EmpId = employee.EmpId 
			INNER JOIN customer ON appointment.CustId = customer.CustId 
			INNER JOIN Type ON appointment.Type = type.TypeId 
			WHERE employee.name = '$name' AND Date >= CURRENT_DATE
			ORDER BY Date, StartTime";
}
$result = $db->query($sql);
if($result->num_rows < 1)
{
	echo '<script type="text/javascript">'; 
    echo 'alert("Stylist Has No Appointments! Try Again");'; 
    echo 'window.location.href = "PckEmp.php";';
    echo '</script>';
}
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
echo "<th>Stylist</th>";
echo "<th>Type</th>";
echo "<th>Customer</th>";
echo "<th>Start</th>";
echo "<th>End</th>";
echo "<th>Date</th>";
echo "</tr>";

while($row = $result->fetch_assoc())
{
	echo "<tr>";
	echo "<td>".$row['Name']."</td>";
	echo "<td>".$row['name']."</td>";
	echo "<td>".$row['FirstName']."</td>";
	echo "<td>".$row['StartTime']."</td>";
	echo "<td>".$row['EndTime']."</td>";
	echo "<td>".$row['Date']."</td>";
}
echo "</table>";

?>
<div id="main">
      <article>
	  <a href="../AddApp.php"><button class="btn danger">Back</button></a><br>
          </article>
      <nav></nav>
  </div>
</div>
</body>
</html>