<?php 
    $db = mysqli_connect('w2k12-compscidb.academia.sjfc.edu','salon','salon','salon') or die('Error connecting to MySQL server.'); 
?>
<html>
<body>
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
$instock = true;
//checks if customer exists
$sql = "SELECT * FROM customer WHERE FirstName = '$fName' AND
									 LastName = '$lName' AND
									 PhoneNumber = '$pNum'";
									 
$result = $db->query($sql);
if($result->num_rows > 0)//if cust exists
{
	$row = $result->fetch_assoc();
	$CustId = $row['CustId'];
	//checks if customer has app at same time with diff stylist
	$sql = "SELECT AppId FROM appointment
			WHERE CustId = '$CustId'
			AND StartTime = '$start'
			AND Date = '$date'";
	$result = $db->query($sql);
	if($result->num_rows < 1)//cust has no app at this time
	{
		//checks if items needed are in stock
		$sql = "SELECT inventory.Amount, product.AmountNeeded, inventory.ItemId 
				FROM product 
				INNER JOIN inventory ON inventory.ItemId = product.ItemId 
				INNER JOIN type ON type.TypeId = product.TypeId 
				WHERE type.TypeId = '$type'";
		$result = $db->query($sql);
		//echo "Items needed: " . $result->num_rows;
		//echo "<br>";
		while($row = $result->fetch_assoc())
		{
			$amount = $row['Amount'];
			$amountNeeded = $row['AmountNeeded'];
			$ItemId = $row['ItemId'];
			if($amount < $amountNeeded)
				$instock = false;
		}
		if($instock == true)//if items are in stock
		{
			$sql = "SELECT Length FROM type WHERE TypeId = '$type'";
			$result = $db->query($sql);
			$row = $result->fetch_assoc();
			$length = $row['Length'] * 60 * 60;
			$startsplit = explode(":", $start);
			$start = $startsplit[0] * 60 * 60 + $startsplit[1] * 60;
			$end = $start + $length;
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
				for($i = 0; $i < count($allsty); $i++)
				{
					$temp = $allsty[$i];
					$sql = "SELECT TIME_TO_SEC(StartTime), TIME_TO_SEC(EndTime)
							FROM appointment
							WHERE EmpId = '$temp' AND Date = '$date'";
					$result = $db->query($sql);
					//if stylist has appointments
					if($result->num_rows > 0)
					{
						while($row = $result->fetch_assoc())
						{
							if($row['TIME_TO_SEC(StartTime)'] <= $start && $start < $row['TIME_TO_SEC(EndTime)'])
							{
								$con = true;
							}
							//start < new end <= end
							if($row['TIME_TO_SEC(StartTime)'] <  $end && $end <= $row['TIME_TO_SEC(EndTime)'])
							{
								$con = true;
							}
							if(!$con)
								array_push($availsty, $temp);
							$con = false;
						}
					}
					else//stylist has no apps
						array_push($availsty, $temp);
				}
				if(count($availsty)>0)//stylist has opening
					$stylist = $availsty[rand(0,count($availsty)-1)];
				else
					$con = true;
			}
			else//if a stylist has been selected
			{
				$sql = "SELECT TIME_TO_SEC(StartTime), TIME_TO_SEC(EndTime)
						FROM appointment
						WHERE EmpId = '$stylist' AND Date = '$date'";
				
				$result = $db->query($sql);
				while($row = $result->fetch_assoc())
				{
					//start <= new start < end
					if($row['TIME_TO_SEC(StartTime)'] <= $start && $start < $row['TIME_TO_SEC(EndTime)'])
					{
						$con = true;
					}
					//start < new end <= end
					if($row['TIME_TO_SEC(StartTime)'] <  $end && $end <= $row['TIME_TO_SEC(EndTime)'])
					{
						$con = true;
					}
				}
			}
			if(!$con)//no conflict
			{
				$sql = "INSERT INTO appointment(EmpId, CustId, Type, StartTime, EndTime, Date)
				VALUES ('$stylist', '$CustId', '$type', SEC_TO_TIME($start), SEC_TO_TIME($end), '$date')";
				if($db->query($sql) === TRUE)//appointment added 
				{
					//deduct Inventory
					$sql = "SELECT inventory.Amount, product.AmountNeeded, inventory.ItemId 
					FROM product 
					INNER JOIN inventory ON inventory.ItemId = product.ItemId 
					INNER JOIN type ON type.TypeId = product.TypeId 
					WHERE type.TypeId = '$type'";
					$result = $db->query($sql);
					while($row = $result->fetch_assoc())
					{
						$amount = $row['Amount'];
						$amountNeeded = $row['AmountNeeded'];
						$ItemId = $row['ItemId'];
						$sql = "UPDATE inventory SET Amount = '$amount' - '$amountNeeded'
							WHERE ItemId = '$ItemId'";
						$db->query($sql);
					}
					if($db->query($sql) === TRUE)
					{
						echo '<script type="text/javascript">'; 
						echo 'alert("Appointment Created!");'; 
						echo 'window.location.href = "../homescreen.php";';
						echo '</script>';
					}
					else//if query failed
					{
						echo '<script type="text/javascript">'; 
						echo 'alert("Something Went Wrong!");'; 
						echo 'window.location.href = "AddApp.php";';
						echo '</script>';
					}
				}
				else//appointment not added
				{
					echo '<script type="text/javascript">'; 
					echo 'alert("Unable to Create Appointment");'; 
					echo 'window.location.href = "AddApp.php";';
					echo '</script>';
				}
			}
			else
			{
				echo '<script type="text/javascript">'; 
				echo 'alert("No Available Appointments For This Time!");'; 
				echo 'window.location.href = "AddApp.php";';
				echo '</script>';
			}
		}
		
		else//items arent in stock
		{
			echo '<script type="text/javascript">'; 
			echo 'alert("Items Needed Are Out Of Stock!");'; 
			echo 'window.location.href = "AddApp.php";';
			echo '</script>';
		}
	}
	else
	{
		echo '<script type="text/javascript">'; 
		echo 'alert("Customer Already Has Appoinment At This Time!");'; 
		echo 'window.location.href = "AddApp.php";';
		echo '</script>';
	}
}
else//cust doesnt exist
{
	echo '<script type="text/javascript">'; 
    echo 'alert("Customer Does Not Excist! Try Again");'; 
    echo 'window.location.href = "AddApp.php";';
	echo '</script>';
}
?>


</body>
</html> 
