<html>
<!--This page is used to enter Emp username and password
	in order to find the emp in the database and
	the info is sent to UpdEmp.php page to query-->
    <head>
        <title>Stylist Update</title>
        <div class="header">
            <h1>Enter Stylist Info</h1>
        </div>
<link rel="stylesheet" type="text/css" href="../../view.css" media="all">
<script type="text/javascript" src="../../view.js"></script>
    </head>
    <body>
	<div class="white-box">
        <div class="container">
            <form action="UpdEmp.php" method="post" >
            <ul>
			<li><label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Username"></li>
			<li><label for="password">Password</label>
                <input type="password" id = "password" name="password" placeholder="Password"></li>
			<input type="submit" value="Search">    
            </ul>
            </form>
        </div> 
           <a href="../UpdEmp.php"><button class="btn danger">Back</button></a><br>
    </div>   
    </body>

</html> 