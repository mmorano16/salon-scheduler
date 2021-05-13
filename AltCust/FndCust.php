<!DOCTYPE html>
 
<html>
<!--This page is used to enter customer name and number
	in order to find the customer in the database and
	the info is sent to UpdCust.php page to query-->
    <head>
        <title>Customer Update</title>
        <div class="header">
            <h1>Enter Customer Info</h1>
        </div>
<link rel="stylesheet" type="text/css" href="../view.css" media="all">
<script type="text/javascript" src="../view.js"></script>
    </head>
    <body>
	<div class="white-box">
        <div class="container">
            <form action="UpdCust.php" method="post" >
            <ul>
            <li><label for="firstName">First Name</label>
				<input type="text" id="fName" name="firstName" placeholder="Enter First Name"></li>
			<li><label for="lastName">Last Name</label>
                <input type="text" id="lName" name="lastName" placeholder="Last Name"></li>
			<li><label for="phone">Phone</label>
                <input type="tel" id = "pNum" name="phone" maxlength="10" placeholder="Phone"></li>
			<li><input type="submit" value="Search"></li>       
            </ul>
            </form>
        </div> 
          <a href="../homescreen.php"><button class="btn danger">Back to Home</button></a><br>
        </div>
    </body>

</html> 