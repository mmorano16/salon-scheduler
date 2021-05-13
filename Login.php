<html>
<!--This page is the login page for the web app
	if the credentials are not in the db the user_error
	access will be denied-->
    <head>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>
        <title>Employee Login</title>
        <div class="header">
            <h1>Employee Login</h1>
        </div>
    </head>
    <body>
        <div class="container">
             <div class="white-box"> 
            <form action="Auth.php" method="post" >
            <ul>
			<li><label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Username"></li>
			<li><label for="password">Password</label>
                <input type="password" id = "password" name="password" placeholder="Password"></li>
			<input type="submit" value="Login">    
            </ul>
            </form>
        </div> 
        </div>
    </body>

</html> 