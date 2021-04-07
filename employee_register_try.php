<?php
	include "connect.php";
	session_start();
	//echo "You are here, you have a quiz?";

	$id = $_POST["txtCnic"];
	$name = $_POST["txtName"];
	$pass = $_POST["txtPass"];
	$gender = $_POST["sGender"]; 
	$email = $_POST["txtEmail"];
	$address = $_POST["txtAddress"];
	$contact = $_POST["txtContact"];
	$djoin = $_POST["txtDate"];
	$dshift = $_POST["dShift"];
	$type = $_POST["txttype"];
	$sal = $_POST["salary"];
	
	$qry = "INSERT INTO employee VALUES('".$id."','".$name."', '".$pass."', '".$gender."', '".$email."','".$address."','".$type."', '".$contact."','".$djoin."','".$dshift."','image/abc.png','".$sal."')";

	//echo $qry;
	//$con->query($qry);
    
  if ($con->query($qry)){
		$msg = "Employee Registered";
	}
	else
		$msg = "Error!";

    //echo $msg;
        
	header("Location:employee_register.php?Message=$msg");
    
?>
