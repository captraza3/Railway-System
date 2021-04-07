<?php
	include "connect.php";
    session_start();
    if(isset($_SESSION["empid"]))
    {
        if($_SESSION["type"] != "Worker")
            header("Location:login.php");
    }

    $tid = $_GET['tid'];
    $cid = $_GET['cid'];
    $qry = "SELECT MAX(time) AS dtime from customer where cust_id = '".$cid."'";
    $res = $con->query($qry);
    $row = $res->fetch_assoc();
    $ctime = $row["dtime"];

    $qry = "SELECT * from ticket where ticket_num = '".$tid."'";
    $res = $con->query($qry);
    $row = $res->fetch_assoc();
    $qry1 = "SELECT * from class where class_id = '".$row["class_id"]."'";
    $res1 = $con->query($qry1);
    $row1 = $res1->fetch_assoc();
    $seat = $row1["no_of_seats"];
    if(1 < $seat){
        $seat = $seat - 1;
        $qry = "UPDATE class set no_of_seats = '".$seat."' where class_id = '".$row["class_id"]."'";
        if($con->query($qry)){
            $qry = "DELETE FROM ticket  where ticket_num = '".$tid."'";
            if($con->query($qry)){
                header("Location:show_ticket.php");
            }
        }
    }
    else{
        $qry = "DELETE FROM ticket  where ticket_num = '".$tid."'";
        echo $qry;
            if($con->query($qry)){
                $qry = "DELETE FROM class  where class_id = '".$row["class_id"]."'";
                echo $qry;
                if($con->query($qry)){
                    $qry1 = "UPDATE customer set status = 'cancel' where status = 'pending'
                                    And cust_id not in (SELECT cust_id from ticket where ticket_confirm != 'Yes' And ticket_confirm != 'No')";
                    $con->query($qry1);
                    header("Location:show_ticket.php");
                }
            }
    }

    
?>