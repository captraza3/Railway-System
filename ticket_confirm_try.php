<?php 
    include "connect.php";
    session_start();
  
    $tid = $_GET["tid"];
    $source = $_GET["source"];
    $dest = $_GET["dest"];
    $cls = $_GET["clss"];
    $seats = $_GET["seat"];
    $fares = $_GET["fare"];
    $cid = $_SESSION["Cust_id"];
    $dtime = $_GET["dtime"];
    $atime = $_GET["atime"];

    $count = 1;
    $qry = "INSERT into class (class_name,no_of_seats,train_id) values('".$cls."','".$seats."','".$tid."')";
    if($con->query($qry)){
        while($count <= $seats){
            $qry1 = "SELECT MAX(class_id) AS max_no from class";
            $res1 = $con->query($qry1);
            $row1 = $res1->fetch_assoc();
            $clss = $row1['max_no'];
            $qry = "INSERT into ticket (source,destination,class_id,cust_id,train_id,ticket_confirm) values('".$source."','".$dest."','".$row1['max_no']."','".$cid."','".$tid."','No')";
            if($con->query($qry)){
                $qry1 = "SELECT MAX(ticket_num) AS max_val from ticket";
                $res1 = $con->query($qry1);
                $row1 = $res1->fetch_assoc();
                $tnum = $row1['max_val'];
                $qry = "INSERT into train_fare (ticket_num,train_id,fare) values('".$row1['max_val']."','".$tid."','".$fares."')";
                if($con->query($qry)){
                    $qry = "INSERT into customer_train_time values('".$row1['max_val']."','".$cid."','".$tid."','".$dtime."','".$atime."')";
                    if($con->query($qry)){
                        if($count == $seats){
                            $msg = "Data Register";
                            header("Location:seat.php?tnum=$tnum && trainid=$tid && classid=$clss");

                        }
                    }
                
                }
                
            }
            $count = $count + 1;
                       
        }
    }
    

?>