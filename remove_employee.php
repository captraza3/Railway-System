<?php
	include "connect.php";
    session_start();
    if(isset($_SESSION["empid"]))
    {
        if($_SESSION["type"] != "Manager")
            header("Location:login.php");
    }

    $cnic = $_GET['cnic'];

    $qry = "DELETE FROM employee  where emp_id = '".$cnic."'";
    echo $qry;
    if($con->query($qry)){
    	header("Location:update_employee.php");
    }
?>