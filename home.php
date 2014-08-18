 <?php session_start(); ?>

<?php
	
	$result = isset($_SESSION['userid']);
		if(!$result){
			header("Location: login.php");
			exit;
		}
		else {
			$username = $_SESSION['username'];
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
		
		
		header("Location:login.php");
		exit;
	}
	$message = "";
	
	


	
	
?>

<html>
<head>

<title>HOME</title>

<link rel="stylesheet" href="css/style.css" >
<script src="javascript/jquery-1.11.0.min.js"></script>
<script src="javascript/script.js"></script>

<style>
body{
background: url(userimages/<?php echo $username; ?>/bg/bg.jpg) no-repeat center fixed; 
background-size: 100% 100%;
}

#imagepopup{

	position: absolute;
	background-image: url(userimages/tanuj/03-13-12-13-37328a1d64ecb45261e6644a6b9f4d624e.jpg);
  background-size: contain;
  
  background-position: center;
  background-repeat: no-repeat;
  height: 75%;
  width: 75%;
	z-index:100;
	
	margin-top:8%;
	margin-left:15%;
	
	
	display:none;
}


</style>

</head>

<body>

	<div id="overlay">
    </div>
    <div id="imagepopup">
    </div>
    
    <div id="notification">
    	
    </div>
    
    
	
    <script>
	var numItems = $('.images').length;
	</script>



    <span class="topname" >
    <?php echo "Hi ". $username;?>
    
    </span>
    
    
    <div id="belowtopname">
    
    <div id="choosef" class="choosef">
    Add Image
    </div>
    
    <div  id="bg" class="choosef">
    Background
    </div>
    
    <div  id="gallery" class="choosef" onClick="javascript:gallery();">
    Gallery
    </div>
    
    <div  id="friends" class="choosef" onClick="javascript:loadfriends();">
    Friends
    </div>
    
    <div  id="logout" class="choosef">
    logout
    </div>
    
    </div>
    
    <form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="filename[]" id="choosefile" multiple >
    </form>
    
    <form action="uploadbg.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="filebg" id="choosefilebg" >
    </form>
    
    
    
    
    <form action="home.php" method = "post">
        <input type="submit" value="logout" name="logout" id="logouto">
    </form>
    
	
    
    
    
        <div id="imagecontainer">
        
        
        
        
        
        <noscript>
            sdafsd Idiot..
         </noscript>
       
            <!-- HERE content is Generating Dynamically!!-->
           
         </div> 
     
     
     
     
    
       
	<span id="footer">
    	<span id='deleteall' onClick="javascript:deleteall()">
        delete all!
        </span>
    	 A testing Website @ Jack Korbin
         <span id='deletebg' onClick="javascript:deletebg()">
        delete background!
        </span>
    </span>

</body>
</html>