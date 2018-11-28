
<?php require 'connections/connections.php'; ?>
<?php

if(isset($_POST['Register'])){
	
	@session_start();
	$Fname = $_POST['First_Name'];
	$Lname = $_POST['Last_Name'];
	$Email = $_POST['Email'];
	$Username = $_POST['Username'];
	$Password = $_POST['Password'];
	
	$StorePassword = password_hash($Password, PASSWORD_BCRYPT, array('cost' => 10));
	
	$sql = $con->query("INSERT INTO user_tbl  (Fname, Lname, Email, Username, Password)Values ('{$Fname}', '{$Lname}', '{$Email}', '{$Username}','{$StorePassword}')");
	
	@header('Location: Login.php');
	}

?>

<!doctype html>
<html>
<head>
<link href="css/master.css" rel="stylesheet"type="text/css" />
<link href="css/menu.css" rel="stylesheet" type="text/css" />
<meta charset="utf-8">
<title>Registration Page</title>
</head>

<body>
	<div class="Container">
		<div class="Header"></div>
        <div class="Menu">
        <div id='cssmenu'>
<ul>
   <li class='active'><a href='Login.php'><span>Home</span></a></li>
   <li><a href='Login.php'><span>LogIn</span></a></li>
   <li class='last'><a href='#'><span>About Us</span></a></li>
</ul>
		</div>
</div>
        <div class="LeftBody"></div>
        <div class="RightBody">
          <form id="form1" name="RegisterForm" method="post">
          <div class="FormElement">
            <input name="First_Name" type="text" required="required" class="TField" id="First_Name" placeholder="First Name">
          </div>
          <div class="FormElement"><input name="Last_Name" type="text" required="required" class="TField" id="Last_Name" placeholder="Last Name"></div>
          <div class="FormElement"><input name="Email" type="email" required="required" class="TField" id="Email" placeholder="Email"></div>
          <div class="FormElement"><input name="Username" type="text" required="required" class="TField" id="Username" placeholder="Username"></div>
          <div class="FormElement"><input name="Password" type="password" required="required" class="TField" id="Password" placeholder="Password"></div>
  <div class="FormElement"><input name="Register" type="submit" class="button" id="RegisterButton" value="Register"></div>
          </form>
        </div>
        <div class="Footer"></div>
	</div>
</body>
</html>
