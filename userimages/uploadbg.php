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
		$name = $_FILES['file']['name'];
		$size = $_FILES['file']['size'];
		$type = $_FILES['file']['type'];
		$tmpname = $_FILES['file']['tmp_name'];
		$maxsize = 4000000;
		$ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));	   
		$newname= md5($name);                                  
		$location = "userimages/".$username."/".$newname.".".$ext;  
		
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