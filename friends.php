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
	
	$query= "SELECT * FROM userlykdata" ;
	
	$result = mysql_query($query);
	
	while( $array = mysql_fetch_array($result)){
		
		$name = $array['username'];
		$name2 = "'".$name."'";
		echo '
	 <div class="friends" onclick="javascript:notification('.$name2.')">'.
       		$name
       .'</div>';
	
	}
	
	
	
	
	
	
	

?>