<?php 
include "connect.php";
  session_start();
  
$sid = $_POST["cust_id"];
$sname = $_POST["cust_name"];
$gender = $_POST["cusgender"];
$phone = $_POST["phone_no"];
$cusemp = $_SESSION["id"];
$ctime = $_POST["ctime"];
$_SESSION["Cust_id"] = $sid;


$qry = "INSERT into customer values('".$sid."','".$sname."','".$gender."','".$phone."','".$cusemp."','".$ctime."','pending')";

if($con->query($qry)){
      $msg = "Customer data Register";
    	header("Location:ticket.php?Message=$msg");
}
else{
      $msg = "Error! Customer not Register";
      header("Location:customer_registor.php?Message=$msg");
}

?>
