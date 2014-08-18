<?php session_start(); ?>

<?php
	
	$result = isset($_SESSION['userid']);
		if($result){
			header("Location:home.php");
			exit;
		}
		else if ( isset($_SESSION['adminid']) ){
			header("Location:imp.php");
			exit;
		}
	
?>

<html>
<head>

<title>Login</title>

</head>

<body>


    <h2>Welcome to Test website!</h2>
    
    <br>
    <br>
    
    <p>
    <a href="login.php">USER Login here<a>
    </p><p>
    <a href="register.php">Register here<a>
    </p><p>
    <a href="alogin.php">ADMIN Login here<a>
    </p>

</body>
</html>