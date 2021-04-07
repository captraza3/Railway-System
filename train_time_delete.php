<?php
	include "connect.php";
    session_start();
    if(isset($_SESSION["empid"]))
    {
        if($_SESSION["type"] != "Assistant Manager")
            header("Location:login.php");
    }
    else{
        $num = $_GET['num'];
        $no = $_GET['no'];
        $qry = "DELETE from train_time where train_id = '".$num."' And ref_no = '".$no."'";

        if($con->query($qry)){
           header("Location:update_train_time.php");
        }

    }
?>