<?php
	include "connect.php";
    session_start();
    if(isset($_SESSION["empid"]))
    {
        if($_SESSION["type"] != "Assistant Manager")
            header("Location:login.php");
    }

    $tid = $_GET['tid'];
    $qry = "DELETE FROM train  where train_id = '".$tid."'";
    if($con->query($qry)){
    	header("Location:update_train.php");
    }
    else{
        $msg = "The Train in Schedule";
        header("Location:update_train.php?Message=$msg");
    }
?>