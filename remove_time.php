<?php
	include "connect.php";
    session_start();
    if(isset($_SESSION["empid"]))
    {
        if($_SESSION["type"] != "Assistant Manager")
            header("Location:login.php");
    }
    else{
        $no = $_GET['no'];

        $qry = "DELETE from time where ref_no = '".$no."'";

        if($con->query($qry)){
           header("Location:update_time.php");
        }
        else{
            $msg = "The time in Schedule";
            header("Location:update_time.php?Message=$msg");
        }

    }
?>