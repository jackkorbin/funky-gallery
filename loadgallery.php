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
    $entries = scandir("userimages/".$username);
		 rsort($entries );
		 for($i=1;$i<21;$i++){
			 if($i <= count($entries)-3){
				 $img=$entries[$i];
				 if($img !== "." && $img !== ".." && $img !== "bg"){
					 //$ext = pathinfo($img, PATHINFO_EXTENSION);
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
	
    	echo '
    		<div id="gif" onMouseDown="javascript:loadimages(5,1);">
            View More
    		</div>
			';	
            
       

?>