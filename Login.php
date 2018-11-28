
<?php require 'connections/connections.php'; ?>

<?php

	if(isset($_POST['LoginButton'])) {
		
		$USN = $_POST['UsernameF'];
		$PW = $_POST['PasswordF'];
		
		
		
		$result = $con->query("SELECT * FROM user_tbl WHERE Username='$USN'");
		
		$row = $result->fetch_array(MYSQLI_BOTH);
		
		if(password_verify($PW, $row['Password'] )){
			
		
		@session_start();
		$_SESSION["UserID"] = $row['UserID'];
		
		@header('Location: Account.php');
		}else{
			session_start();
			$_SESSION["LoginFail"] = "Yes";
			}
		
}
		
?>
<!doctype html>
<html>
<head>
<link href="css/master.css" rel="stylesheet"type="text/css" />
<link href="css/menu.css" rel="stylesheet" type="text/css" />
<meta charset="utf-8">
<title>Log In</title>
</head>

<body>
	<div class="Container">
		<div class="Header"></div>
        <div class="Menu">
        <div id='cssmenu'>
<ul>
   <li class='active'><a href='#'><span>Home</span></a></li>
   <li><a href='Reg.php'><span>Register</span></a></li>
</ul>
		</div>
</div>
        <div class="LeftBody"></div>
        <div class="RightBody">
          <form id="form1" name="form1" method="post">
          <?php if(isset($_SESSION["LogInFail"])){ ?>
          <div class="FormElement">LogIn Failed! Please try again.</div>
          <?php } ?>
           <div class="FormElement">
             <input name="UsernameF" type="text" required="required" class="TField" id="LoginF" placeholder="Username">
           </div>
           <div class="FormElement">
             <input name="PasswordF" type="password" required="required" class="TField" id="passwordF">
           </div>
           <div class="FormElement">
             <input name="LoginButton" type="submit" class="button" id="LoginButton" value="Login">
           </div>
          </form>
        </div>
        <div class="Footer"></div>
	</div>
</body>
</html>
