<?php session_start(); ?>

<?php

		$result = isset($_SESSION['adminid']);
		if(!$result){
			header("Location:alogin.php");
		}
		
?>

<?php require_once("includes/connection.php"); ?>
<?php
	
	if(isset($_POST['logout'])){
		
		// 1. Find the session
		// session_start();
		
		// 2. Unset all the session variables
		$_SESSION = array();
		
		// 3. Destroy the session cookie
		if(isset($_COOKIE[session_name()])) {
			setcookie(session_name(), '', time()-42000, '/');
		}
		
		// 4. Destroy the session
		session_destroy();
		
		
		header("Location:alogin.php");
	}
	
	$message="";
	
	if(isset($_POST['update'])){
	
		$oldusername = $_GET['username'];
		$usern = $_POST['username'];
		$pas = $_POST['password'];
		$error = "no";
		
		
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
		
		
		if( $error=="no" ){
			
			$query = " UPDATE userlykdata SET username='{$usern}' , password='{$pas}' WHERE username='$oldusername' ";
			$res = mysql_query($query);
			
			if (mysql_affected_rows() == 1){
				$message="Successfully Updated";
			}
			
		}
		else {
			$message=$error;
		}
	}
	
	if(isset($_POST['delete'])){
		
		$oldusername = $_GET['username'];
		$query = "DELETE FROM userlykdata WHERE username='{$oldusername}' ";
		mysql_query($query);
		if(mysql_affected_rows()==1){
			$message = "Successfully Deleted!";
		}
		else{
			$message = "Deletion Failed".mysql_error();
		}
	}
	
	if(isset($_POST['add'])){
	
		$usern = $_POST['username'];
		$pas = $_POST['password'];
		$error = "no";
		
		
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
		
		
		if( $error=="no" ){
			
			$query= " INSERT INTO userlykdata ( username, password ) VALUES ( '{$usern}' , '{$pas}' )";
			$res = mysql_query($query);
			if($res) {
				$message = "account Added";
			}
			else {
				$message = " Failed ";
			}
		}
		else {
			$message=$error;
		}
		
		
	
	}
	
?>

<html>
<head>

<title>Info</title>

<link rel="stylesheet" href="css/style.css" >

</head>

<body>


    <h2>Admin panel</h2>
    
	
    
    <?php 
	echo "<p>Hello <b>". $_SESSION['adminname'] . "</b><p/>"; ?>
    
    <?php
    	
		$query = "SELECT * FROM userlykdata";
		$result = mysql_query($query);
		
		while($array = mysql_fetch_array($result)) {
		
			echo "Username : ".$array['username']."<br> ";
			echo "Password : ".$array['password']."<br>";
			
			echo "<a href='imp.php?";
			echo "username=".$array['username'];
			echo "'>Edit Info</a><br><br><br>";
			
		}
		
		
	$messag ="Select a name";
	
    if(  isset($_GET['username']) ){
		
		$oldusername = $_GET['username'];
	
	$messag ="Selected : ".$_GET['username'];
	echo '
	
	<div class="box">
	
	<form action="imp.php?username='.$_GET['username'].'" method = "post">
    
        New Username: <br>
        <input type="text" name="username" maxlength="32" value ='."".' ><br>
        New Password: <br>
        <input type="password" name="password" maxlength="32">
        <br>
       
        
        <input type="submit" value="update" name="update">
	
    	<input type="submit" value="delete" name="delete">
    </form>
	'.$messag.'<br>'.$message.'
	</div>
	';
		
		
	}
	else {
		
		
		echo '
			<div class="box">
	
	<form action="imp.php" method = "post">
    
        New Username: <br>
        <input type="text" name="username" maxlength="32" value ='."".' ><br>
        New Password: <br>
        <input type="password" name="password" maxlength="32">
        <br>
       
        
        <input type="submit" value="add" name="add">
	
    </form>
	'.$message.'
	</div>
		';
	}
    ?>
    
    
    <form action="imp.php" method = "post">
    
        <input type="submit" value="logout" name="logout">
    
    </form>
    
    
    
    
    

</body>
</html>