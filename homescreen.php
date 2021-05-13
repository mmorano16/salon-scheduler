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
	<title>Home</title>
	<header>Josh and Matt's Salon</header>
</head>

<body>
  <h1>Select Option</h1>
  <div id="main">
	<div class="white-box"> 
      <article>
      <a href="AddApp/AddApp.php"><button class="test">Schedule Appointment</button></a><br>
	  <a href="RmvApp/RmvApp.php"><button class="test">Cancel Appointment</button></a><br>
      <a href="UpdEmp/UpdEmp.php"><button class="test">Update Employee Information</button></a><br>
      <a href="AltCust/FndCust.php"><button class="test">Update Customer Information</button></a><br>
      <a href="ChkSched/PckEmp.php"><button class="test">View Employee Schedules</button></a><br>
      <a href="ViewInv.php"><button class="test">View Inventory</button></a><br>
      <a href="AltInv/AltInv.php"><button class="test">Update Inventory</button></a><br>
          <a href="Login.php"><button class="test">Exit The Application</button></a><br>
          </article>
      <nav></nav>
	  </div>
  </div>
  <footer></footer>
</body>
</html>