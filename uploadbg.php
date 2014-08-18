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

<?php
		$name = $_FILES['filebg']['name'];
		$size = $_FILES['filebg']['size'];
		$type = $_FILES['filebg']['type'];
		$tmpname = $_FILES['filebg']['tmp_name'];
		$maxsize = 20000000;
		$ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));	   
                                 
		$location = "userimages/".$username."/bg/bg.jpg";  
		
		if( $ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif'){
			if( $size < $maxsize ) {
				$result = move_uploaded_file($tmpname,$location);
					if($result){
						$message = "Successfully Uploaded";
						header("Location:home.php");
						exit;
					}
			 
			}
		
		}else {
			$message="cannot upload";	
			header("Location:home.php");
						exit;
			}
			
			
		
	
	
?>