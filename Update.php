
<?php require 'connections/connections.php'; ?>

<?php @session_start(); 

if(isset($_SESSION["UserID"])){
}else {
		header('Location: Login.php');
		}
	?>
    
<?php

$user = $_SESSION["UserID"];
$result = $con->query("select * from user_tbl where UserID='$user'");
$row = $result->fetch_array(MYSQLI_BOTH);

@session_start();

$_SESSION["Fname"] = $row['Fname'];
$_SESSION["Lname"] = $row['Lname'];
$_SESSION["Email"] = $row['Email'];
$_SESSION["Username"] = $row['Username'];
$_SESSION["Password"] = $row['Password'];
?>

<?php

	if(isset($_POST['Update'])){
		
		$UpdateFname = $_POST['Fname'];
		$UpdateLname = $_POST['Lname'];
		$UpdateEmail = $_POST['Email'];
		$UpdateUsername = $_POST['Username'];
		$UpdatePassword = $_POST['Password'];
		
	$sql = $con->query("UPDATE user_tbl SET Fname = '{$UpdateFname}', Lname = '{$UpdateLname}', Email = '{$UpdateEmail}', Username = '{$UpdateUsername}', Password = '{$UpdatePassword}'
	 WHERE UserID= $user");		
		
	header('Location: Update.php');
				
		}



?>

<!doctype html>
<html>
<head>
<link href="css/master.css" rel="stylesheet"type="text/css" />
<link href="css/menu.css" rel="stylesheet" type="text/css" />
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<div class="Container">
		<div class="Header"></div>
        <div class="Menu">
        <div id='cssmenu'>
<ul>
   <li class='active'><a href='Account.php'><span>Home</span></a></li>
   <li><a class='last' href="Logout.php"><span>Log Out</span></a></li>
</ul>
		</div>
</div>
        <div class="LeftBody"></div>
        <div class="RightBody">
          <form id="form1" name="form1" method="post">
          <div class="FormElement">
            <input name="Fname" type="text" required="required" class="TField" id="Fname" value="<?php echo $_SESSION["Fname"]; ?>">
          </div>
          <div class="FormElement">
            <input name="Lname" type="text" required="required" class="TField" id="Lname" value="<?php echo $_SESSION["Lname"]; ?>">
          </div>
          <div class="FormElement">
            <input name="Email" type="text" required="required" class="TField" id="Email" value="<?php echo $_SESSION["Email"]; ?>">
          </div>
          <div class="FormElement">
            <input name="Username" type="text" required="required" class="TField" id="Username" value="<?php echo $_SESSION["Username"]; ?>">
          </div>
          <div class="FormElement">
            <input name="Password" type="password" required="required" class="TField" id="Password" value="<?php echo $_SESSION["Password"]; ?>">
          </div>
          <div class="FormElement">
            <input name="Update" type="submit" class="button" id="Update" value="Update">
          </div>
          </form>
        </div>
        <div class="Footer"></div>
	</div>
</body>
</html>
