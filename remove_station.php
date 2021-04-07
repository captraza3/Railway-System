<?php
	include "connect.php";
    session_start();
    if(isset($_SESSION["empid"]))
    {
        if($_SESSION["type"] != "Assistant Manager")
            header("Location:login.php");
    }

    $sid = $_GET['sid'];
    $qry = "DELETE FROM station  where station_id = '".$sid."'";
    if($con->query($qry)){
    	header("Location:update_station.php");
    }
    else{
        $msg = "The Station in Schedule";
        header("Location:update_station.php?Message=$msg");
    }
?>