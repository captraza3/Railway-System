<?php
	include "connect.php";
    session_start();
    if(isset($_SESSION["empid"]))
    {
        if($_SESSION["type"] != "Assistant Manager")
            header("Location:login.php");
    }

    $tid = $_GET['tid'];
    $sid = $_GET['sid'];
    
    $qry = "DELETE FROM train_in_station  where train_id = '".$tid."' And station_id = '".$sid."'";
    if($con->query($qry)){
    	header("Location:train_in_station.php");
    }
?>