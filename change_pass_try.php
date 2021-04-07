<?php
	include "connect.php";
	session_start();
	//echo "You are here, you have a quiz?";

	$id = $_SESSION["id"];
	$pass = $_POST["txtPass"];
	
	
	$qry = "UPDATE employee SET password = '".$pass."' where emp_id = '".$id."'" ;

	//echo $qry;
	//$con->query($qry);
    
    if ($con->query($qry)){
		$msg = "Password Changed";
	}
	else{
		$msg = "Password not Changed";
	}

    //echo $msg;
        
	header("Location:change_pass.php?Message=$msg");
    
?>