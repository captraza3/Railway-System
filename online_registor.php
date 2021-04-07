<?php 
include "connect.php";
  session_start();
  
$sid = $_POST["cust_id"];
$sname = $_POST["cust_name"];
$gender = $_POST["cusgender"];
$phone = $_POST["phone_no"];

$cnic = $_POST["cnic"];
$ctime = $_POST["ctime"];

$qry = "INSERT into customer values('".$sid."','".$sname."','".$gender."','".$phone."','".$cusemp."','".$cnic."','".$ctime."')";

if($con->query($qry)){
        $msg = "Customer data Register";
    	header("Location:ticket.php");
    }
    else{
        $msg = "Error! Customer not Register";
    }
    header("Location:customer_registor.php?Message=$msg");
 ?>
