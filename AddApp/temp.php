<!--searches if customer exists
	checks if the items needed for the type are in stock--
	checks for conflict in time
	if stylist not selected determines how many have time available
	if more than 1 chooses randomly
	if all things write deduct from inventory
	create appointment-->
<?php
$fName 	 = $_POST["firstname"];
$lName 	 = $_POST["lastname"];
$pNum	 = $_POST["phone"];
$stylist = $_POST["stylist"];
$type 	 = $_POST["type"];
$start 	 = $_POST["start"];
$end	 = 0;
$date 	 = $_POST["date"];
$con	 = false;
//checks if Customer Exists
//***********************************
/*$sql = "SELECT * FROM customer WHERE FirstName = '$fName' AND
									 LastName = '$lName' AND
									 PhoneNumber = '$pNum'";
									 
$result = $db->query($sql);
if($result->num_rows < 1)
{
	echo '<script type="text/javascript">'; 
    echo 'alert("Customer Does Not Excist! Try Again");'; 
    echo 'window.location.href = "SchedApp.php";';
	echo '</script>';
}*/
//************************************
//Checks if items needed are in stock
//************************************
/*$sql = "SELECT inventory.Amount, product.AmountNeeded 
		FROM product 
		INNER JOIN inventory ON inventory.ItemId = product.ItemId 
		INNER JOIN type ON type.TypeId = product.TypeId 
		WHERE type.TypeId = '$type'";
$result = $db->query($sql);
while($row = $result->fetch_assoc())
{
	if($row["Amount"] < $row["AmountNeeded"])
	{
		echo '<script type="text/javascript">'; 
		echo 'alert("Items Needed Are Out Of Stock!");'; 
		echo 'window.location.href = "SchedApp.php";';
		echo '</script>';
	}
}*/
//************************************
//Checks for conflicts in schedule
//************************************
/*
$sql = "SELECT Length FROM type WHERE TypeId = '$type'";
$result = $db->query($sql);
$row = $result->fetch_assoc();
$length = $row['Length'] * 60 * 60;
$startsplit = explode(":", $start);
echo "input: " . $start;
echo "<br>";
echo "Date: " . $date;
echo "<br>";
$start = $startsplit[0] * 60 * 60 + $startsplit[1] * 60;
echo "type length: " . $length;
echo "<br>";
echo "start: " . $start;
echo "<br>";
$end = $start + $length;
echo "end Time: " . $end;
echo "<br>";
if($stylist=="")//if a stylist has not been selected
{
	$allsty = array();
	$availsty = array();
	$sql = "SELECT EmpId FROM employee";
	$result = $db->query($sql);
	while($row = $result->fetch_assoc())
	{
		array_push($allsty, $row['EmpId']);
	}
	echo count($allsty);
	for($i = 0; $i < count($allsty); $i++)
	{
		$temp = $allsty[$i];
		echo "<br>";
		echo $temp;
		echo "<br>";
		$sql = "SELECT TIME_TO_SEC(StartTime), TIME_TO_SEC(EndTime)
				FROM appointment
				WHERE EmpId = '$temp' AND Date = '$date'";
		$result = $db->query($sql);
		//if stylist has appointments
		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				echo "Start: " . $row['TIME_TO_SEC(StartTime)'];
				echo "<br>";
				echo "End: " . $row['TIME_TO_SEC(EndTime)'];
				echo "<br>";
				if($row['TIME_TO_SEC(StartTime)'] <= $start && $start < $row['TIME_TO_SEC(EndTime)'])
				{
					echo "Start conflict";
					$con = true;
				}
				else
				{
					echo "no start conflict";
				}
				echo "<br>";
				//start < new end <= end
				if($row['TIME_TO_SEC(StartTime)'] <  $end && $end <= $row['TIME_TO_SEC(EndTime)'])
				{
					echo "End Conflict";
					$con = true;
				}
				else
					echo "no end conflict";
				echo "<br>";
				echo $con;
				if(!$con)
					array_push($availsty, $temp);
				$con = false;
			}
		}
		else//stylist has no apps
			array_push($availsty, $temp);
		print_r($availsty);
	}
	$stylist = $availsty[rand(0,4)];
	echo "<br>";
	echo $stylist;
	
}
else//if a stylist has been selected
{
	$sql = "SELECT TIME_TO_SEC(StartTime), TIME_TO_SEC(EndTime)
			FROM appointment
			WHERE EmpId = '$stylist' AND Date = '$date'";
	
	$result = $db->query($sql);

	while($row = $result->fetch_assoc())
	{
		echo "Start: " . $row['TIME_TO_SEC(StartTime)'];
		echo "<br>";
		echo "End: " . $row['TIME_TO_SEC(EndTime)'];
		echo "<br>";
		//start <= new start < end
		if($row['TIME_TO_SEC(StartTime)'] <= $start && $start < $row['TIME_TO_SEC(EndTime)'])
		{
			echo "Start conflict";
			$con = true;
		}
		else
		{
			echo "no start conflict";
		}
		echo "<br>";
		//start < new end <= end
		if($row['TIME_TO_SEC(StartTime)'] <  $end && $end <= $row['TIME_TO_SEC(EndTime)'])
		{
			echo "End Conflict";
			$con = true;
		}
		else
			echo "no end conflict";
		echo "<br>";
		echo $con;
	}
}

//create the appointment
$CustId = 2;
echo "<br>";
echo $stylist;
echo "<br>";
echo $CustId;
echo "<br>";
echo $type;
echo "<br>";
echo $start;
echo "<br>";
echo $end;
echo "<br>";
echo $date;
echo "<br>";
$sql = "INSERT INTO appointment(EmpId, CustId, Type, StartTime, EndTime, Date)
		VALUES ('$stylist', '$CustId', '$type', SEC_TO_TIME($start), SEC_TO_TIME($end), '$date')";

if($db->query($sql) === TRUE)
{
	echo '<script type="text/javascript">'; 
	echo 'alert("Appointment Created!");'; 
	echo 'window.location.href = "SchedApp.php";';
	echo '</script>';
}
else//if query failed
{
	echo '<script type="text/javascript">'; 
	echo 'alert("Unable to Create Appointment");'; 
	echo 'window.location.href = "SchedApp.php";';
	echo '</script>';
}*/
//************************************
//Deduct Inventory
//************************************

$sql = "SELECT inventory.Amount, product.AmountNeeded, inventory.ItemId 
		FROM product 
		INNER JOIN inventory ON inventory.ItemId = product.ItemId 
		INNER JOIN type ON type.TypeId = product.TypeId 
		WHERE type.TypeId = '$type'";
$result = $db->query($sql);
$row = $result->fetch_assoc();
$amount = $row['Amount'];
$ItemId = $row['ItemId'];
$amountNeeded = $row['AmountNeeded'];
echo $amount;
echo "<br>";
echo $ItemId;
echo "<br>";
echo $amountNeeded;
echo "<br>";
$sql = "UPDATE inventory SET Amount = '$amount' - '$amountNeeded'
		WHERE ItemId = '$ItemId'";

if($db->query($sql) === TRUE)
{
	echo '<script type="text/javascript">'; 
	echo 'alert("Inventory Deducted!");'; 
	echo 'window.location.href = "SchedApp.php";';
	echo '</script>';
}
else//if query failed
{
	echo '<script type="text/javascript">'; 
	echo 'alert("Something Went Wrong!");'; 
	echo 'window.location.href = "SchedApp.php";';
	echo '</script>';
}
?>

