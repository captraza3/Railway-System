<?php
	include "connect.php";
    session_start();
    if(isset($_SESSION["empid"]))
    {
        if($_SESSION["type"] != "Worker")
            header("Location:login.php");
    }

    $tnum = $_SESSION["ticket_num"];
    $qry = "UPDATE ticket set ticket_confirm = 'Yes' where ticket_num = '".$tnum."'";
    if($con->query($qry)){
        $qry = "SELECT cust_id from customer where status = 'pending' And
                                        cust_id in (SELECT cust_id from ticket where ticket_confirm = 'Yes' And
                                                                            ticket_confirm  = all (SELECT a.ticket_confirm from ticket a, ticket b where
                                                                                                             a.cust_id = b.cust_id And a.ticket_num != b.ticket_num))";
        $res = $con->query($qry);
        $row = $res->fetch_assoc();
        $cid = $row['cust_id'];
        $qry = "UPDATE customer set status = 'approved' where cust_id = '".$cid."'";
        if($con->query($qry)){
            header("Location:show_ticket.php");
        }
    }
    
?>