<?php 
include "connect.php";
    session_start();
$id = $_POST["ref"];
$dtime = $_POST["dep_time"];
$atime = $_POST["arri_time"];
$qry = "update time
		set dep_time = '".$dtime."' , arrival_time = '".$atime."' WHERE emp_id = '".$id."'";
    //echo $qry;
    $res = $con->query($qry);
    $msg = "";
    if($res->num_rows > 0)
    {
    	$row = $res->fetch_assoc();
    	$msg = "Record Updated successfully";
    	//header("Location:manager.php?Message=$msg");
    }
    else{
    	$msg = "Ref NO: ".$id." does not exist!";
    	//header("Location:time_update.php?Message=$msg");
    }
 ?>