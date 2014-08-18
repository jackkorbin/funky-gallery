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
         
			$i = 0;
			$fdata = $_FILES['filename'];
		while( $i < count($fdata['name']) ){
				
				$name = $fdata['name'][$i];
				$size = $fdata['size'][$i];
				$type = $fdata['type'][$i];
				$tmpname =$fdata['tmp_name'][$i];
				$maxsize = 4000000000;
				$ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));	
				//$i = count (scandir("userimages/".$username));   
				$newname= date('m-d-h-i-s'); 
				$newname .= ""; 
				$newname .= md5($name);                             
				$location = "userimages/".$username."/".$newname.".".$ext;  
		
				if( $ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif'){
					if( $size < $maxsize ) {
						$result = move_uploaded_file($tmpname,$location);
							if($result){
								$message = "Successfully Uploaded";
							}
					 
					}
				
				}else {
					$message="cannot upload";	
					
					}
				
		
			$i++;	
			
		}
		header("Location:home.php");
						exit;
		
	
	
?>