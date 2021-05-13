<style>
  * {
   box-sizing: border-box; 
  }
  body {
    margin: 0;
  }
    header {
        text-align: center;
        vertical-align: center;
    }    
    
  #main {
    display: flex;
    min-height: calc(100vh - 40vh);
    text-align: center;
    align-content: bottom;
  }
  #main > article {
    flex: 0;;
      
  }
  #main > nav, 
  #main > aside {
    flex: 0 0 46.5vw;
    background: white;
  }
  #main > nav {
    order: -1;
  }
  header, footer, nav, aside {
  }
  header, footer {
    background: #336699;
    height: 20vh;
    vertical-align: middle;
      text-align: center;
      font-size: 700%;
  }
.white-box {
    background-color: white;
    color: black;
    width:640px;
	margin: 0 auto;
font-size:large;
      display: block;
  max-width: 500px;
  margin: auto;
}

.test{
    height:55px;
    width:500px;
	tex
}
h1 {
    vertical-align: middle;
    text-align: center;
}
    
</style>
<html>
<head>
	<title>Update Employee Information</title>
	<div class="header">
			<header>Select Option</header>
		</div>
</head>

<body>
  <div id="main">
  <div class="white-box">
      <article>
      <a href="AddEmp/AddEmp.php"><button class="test">Add Employee</button></a><br>
      <a href="AltEmp/FndEmp.php"><button class="test">Update Employee</button></a><br>
      <a href="RmvEmp/DrpEmp.php"><button class="test">Remove Employee</button></a><br>
	  <a href="../homescreen.php"><button class="test">Back to Home</button></a><br>
          </article>
      <nav></nav>
  </div>
  </div>
  <footer></footer>
</body>
</html>