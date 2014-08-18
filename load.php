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
			$u = $_POST['id'];
			$q = $_POST['inc'];
	 $entries = scandir("userimages/".$username);
		 rsort($entries );
		 for($i = $u+1; $i < $u+$q+1 ; $i++){ 
		 	if($i <= count($entries)-3){
			   $img=$entries[$i];
			   if($img !== "." && $img !== ".." && $img !== "bg"){
				   		$img2 = "'".$img."'";
						$username2 = "'".$username."'";
						$i2 = "'".$i."'";
					echo'
						<div class="images" id="'.$i.'">          
						<img src="userimages/'.$username.'/'.$img.' " max-width="100%" height="100%">
						<div class="expand"  onMouseDown="javascript: popup('.$img2.','.$username2.'); "></div>
						<span class="del">
						<a onMouseDown="javascript: deleteajax('.$img2.','.$i2.'); " >
					  	delete</a>
						</span>
						</div>';
			   }
			}
			
		  }
		  
		  if($q = count($entries)-3){
			  echo '<script>
		  		viewmore(0);
			  </script>';
		  
		  }
		  else {
			  echo '<script>
		  		viewmore(1);
			  </script>';
		  }
		  
		  


?>

