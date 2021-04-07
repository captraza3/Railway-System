<?php
	include "connect.php";
    session_start();
    if(isset($_SESSION["empid"]))
    {
        if($_SESSION["type"] != "Worker")
            header("Location:login.php");
    }

    $tid = $_GET['trainid'];
    $cid = $_GET['classid'];
    $tnum = $_GET['tnum'];
    $count = 0;

    $qry1 = "SELECT * from class where class_id = $cid ";
    $res1 = $con->query($qry1);
    $row1 = $res1->fetch_assoc();
    $cls_name = $row1["class_name"];
    if($cls_name == "Sleeper"){
        header("Location:sleeper_seat.php?tnum=$tnum && tid=$tid && cid=$cid && count=$count");

    }
    else if($cls_name == "Business"){
        header("Location:business_seat.php?tid=$tid && tnum=$tnum && count=$count && cid=$cid");

    }
    else if($cls_name == "Economy"){
        header("Location:economy_seat.php?cid=$cid && tnum=$tnum && count=$count && tid=$tid");
    }

?>