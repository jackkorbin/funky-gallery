<?php 
	session_start();
?>

<?php
	
	$result = isset($_SESSION['userid']);
		if($result){
			header("Location:imp.php");
		}
	
?>

<?php require_once("includes/connection.php"); ?>
<?php
	$message="";
	$usern = "";
	if(isset($_POST['register'])) {
		
		
		$usern = $_POST['username'];
		$pas = $_POST['password'];
		$cpas = $_POST['cpassword'];
		$error = "yes";
		
		$query = " SELECT id FROM userlykdata WHERE username = '{$usern}' LIMIT 1" ;
		
		$res = mysql_query($query);
		
		
		
		if( mysql_num_rows($res) == 1 ){
			$error = "username already Exist";
		}
		
		if (strlen($usern) < 3 ) {
			$error = "username must be atleast 3";
		}
		else if ( strlen($pas) < 5 ){
			$error = "password must atleast 5";
		}
		
		else if( $pas != $cpas ) {
			$error = "passwords dont match";
		}
		
		
		if( $error == "yes" ) {
		
			$query = "INSERT INTO userlykdata (
							  username, password
						  ) VALUES (
							  '{$usern}', '{$pas}'
						  )";
			$result = mysql_query($query);
			
			if($result) {
				$message = "<p>Account created</p>";
				mkdir('userimages/'.$usern, 0755, true);
				mkdir('userimages/'.$usern.'/bg', 0755, true);
				$usern = "";
			}
			else {
				$message = "<p>Details correct but Query Unsuccessful</p> error :". mysql_error() . "<br><br>";
			}
		}
		else {
			$message = "Error:<br>"  . $error;
		}
	}

?>

<html>
<head>

<title>Register</title>

</head>

<body>


    <h2>Register here:</h2>
    
    <br>
    <br>
    
    
    <form action="register.php" method = "post">
    
        Choose Username: <br>
        <input type="text" name="username" maxlength="32" value = <?php echo $usern; ?> ><br>
        Choose Password: <br>
        <input type="password" name="password" maxlength="32">
        <br>
        Confirm Password: <br>
        <input type="password" name="cpassword" maxlength="32">
        <br>
        
        <input type="submit" value="register" name="register">
    
    </form>
    
    <?php echo "<b>{$message}</b>"; ?>
    
    
     <br /> <br /> 
    <a href="login.php">Login here<a>
    <p>
    <a href="index.php">Main page<a>
    </p>
    

</body>
</html>