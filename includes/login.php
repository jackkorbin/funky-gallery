<?php session_start(); ?>

<?php
	
	$result = isset($_SESSION['userid']);
		if($result){
			header("Location:imp.php");
		}
	
?>

<?php require_once("includes/connection.php"); ?>
<?php
	
	$message="";
	
	
	if(isset($_POST['login'])){
		
		$login = $_POST['login'];
		$usern = $_POST['username'];
		$pas = $_POST['password'];
		
		$query = " SELECT id,  username FROM userlykdata WHERE username='{$usern}' AND password='{$pas}' LIMIT 1";
		
		$result = mysql_query($query);
			
			
		if (mysql_num_rows($result) == 1) {
			
			$fuser = mysql_fetch_array($result);
			$_SESSION['userid']= $fuser['id'];
			$_SESSION['username']= $fuser['username'];
			
			$message = "Success";
			header("Location:imp.php");
			exit;
		}
		else {
			$message = "Login Failed";
		}
		
	}
?>

<html>
<head>

<title>Login</title>

</head>

<body>


    <h2>Welcome to Login page!</h2>
    
    <br>
    <br>
    
    
    <form action="alogin.php" method="post">
    
        Username: <br>
        <input type="text" name="username"><br>
        Password: <br>
        <input type="password" name="password">
        <br>
        <input type="submit" value="login" name="login">
    
    </form><br>
    
    <?php
    	echo "<p>".$message."</p>"
	?>
    
    
     or 
    <a href="register.php">Register here<a>
    
    <p>
    <a href="index.php">Main page<a>
    </p>

</body>
</html>