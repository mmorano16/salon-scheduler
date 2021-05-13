<html>
<div class="header">
        <h1>Create New Customer</h1>
    </div>
<link rel="stylesheet" type="text/css" href="../../view.css" media="all">
<script type="text/javascript" src="../../view.js"></script>
<body>
<!--Enters Info for new customer-->
<div class="white-box">
<div class="container">
	<form action="CrtCust.php" method="post">
		<ul>
            <li><label for="firstName">First Name:</label>
				<input type="text" id="fName" name="firstName" placeholder="First Name"></li>
			<li><label for="lastName">Last Name</label>
                <input type="text" id="lName" name="lastName" placeholder="Last Name"></li>
			<li><label for="phone">Phone:</label>
                <input type="tel" id = "pNum" name="phone" maxlength="10" placeholder="Phone Number"></li>
			<li><label for="address">Address</label>
				<input type="text" id="address" name="address" placeholder="Address"></li>
			<li><label for="city">City</label>
				<input type="text" id="city" name="city" placeholder="City"></li>
			<li><label for="state">State</label>
				<input type="text" id="state" name="state" placeholder="State"></li>
			<li><label for="zip">Zip</label>
				<input type="number"  id="zip" name="zip" maxlength="5" placeholder="Zip Code"></li>
			<li><input type="submit" value="Create"></li>       
            </ul>
	</form>
</div>
</div>
</body>
</html> 