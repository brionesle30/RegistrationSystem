
<?php require 'connections/connections.php'; ?>
<?php session_start(); 

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
   <li class='active'><a href='Account.php'><span>Welcome! <?php echo $_SESSION["Fname"]; ?></span></a></li>
   <li ><a href="Update.php"><span>Update Account</span></a></li>
   <li><a class='last' href="Logout.php"><span>Log Out</span></a></li>
   
</ul>
		</div>
</div>
        <div class="LeftBody"></div>
        <div class="RightBody">Your Account</div>
        <br><br><?php echo $_SESSION["UserID"]; ?>
        <div class="Footer"></div>
	</div>
</body>
</html>
