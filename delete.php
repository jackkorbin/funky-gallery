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
		if(isset($_POST['del'])){
		
				$nam = $_POST['del'];
		
				$res = unlink('userimages/'.$username.'/'.$nam);
				
				if($res){
					echo "deleted!";
				}
				else {
					echo "Cannot delete";
				}
		
				//header('Location:home.php');
				//exit;
		}
		
		if( isset($_POST['delall']) ){
			if( $_POST['delall']==1 ){
					$entries = scandir("userimages/".$username);
					for($i=1;$i<count($entries);$i++){
						$img=$entries[$i];
							   if($img !== "." && $img !== ".." && $img !== "bg"){
								  $res= unlink('userimages/'.$username.'/'.$img);
								  
						}
					}
						if($res){
							echo "All deleted!";
						}
						else {
							echo "Cannot delete";
						}
							  
			}
			
		}
		
		if( isset($_POST['delbg']) ){
			if( $_POST['delbg']==2 ){
				$res = unlink('userimages/'.$username.'/bg/bg.jpg');
					if($res){
					echo "background deleted!";
					}
					else {
					echo "Cannot delete";
				}		  
			}
			
		}
	
?>