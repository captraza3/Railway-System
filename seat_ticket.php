<?php 
include "connect.php";
  session_start();
 if(isset($_SESSION["empid"]))
    {
        if($_SESSION["type"] != "Worker")
            header("Location:login.php");
    }
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>ticket confirm</title>
 	 <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>

        .tblh{
            background: #616060;
            font-size: 14px;
            color: white;
        }
        .tblro{
            font-size: 12px;
        }
        .tblre{
            font-size: 12px;
            background: #E9E8E8;
        }

        .bg {
  background-image: url("new.jpg"); 
  height: 100%; 
  width: 100%;
  background-position: center;
  background-repeat: repeat;
  background-size: cover;
    filter: blur(8px);
  -webkit-filter: blur(8px);
}
body, html {
  height: 100%;
  margin: 0;
}
.set{
    color: #FFFFFF;
}

.bg-text {
  background-color: rgb(0,0,0); Fallback color
  background-color: rgba(0,0,0, 1); Black w/opacity/see-through
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 100%;
  height: 80%;
  padding: 40px;
  text-align: center;
}
    </style>
 </head>
 <body>
    <div class="bg"></div>
 	<form action="Ticket_set.php" method="post" class="container bg-text">
        <div class="page-header mb-5" align="center">
 	<h3 class="set">Show Ticket</h3>

     <div class="form-group row">
			<a class="btn btn-success col-sm-1" href='show_ticket.php'><-Back</a>
			<div class="col-sm-11"></div>
	</div>

<?php

            $id = $_SESSION["id"];
            $tid = $_GET['tid'];
            $cid = $_GET['cid'];
            $tnum = $_GET['tnum'];
            $_SESSION["ticket_num"] = $tnum;
            
            $qry = " SELECT *  FROM class, train_seats, ticket,train, customer_train_time where class.class_id = train_seats.class_id And
             train.train_id = class.train_id And train.train_id = train_seats.train_id  And train.train_id = customer_train_time.train_id  And 
             class.class_id = ticket.class_id And class.class_id = train_seats.class_id And ticket.ticket_num = customer_train_time.ticket_num  And
             ticket.ticket_num = train_seats.ticket_num 
             And train.train_id  = '".$tid."' And ticket.cust_id = '".$cid."'  And ticket.ticket_num = '".$tnum."' ";

			$res = $con->query($qry);
						
			$result = "";
            $class = "set tblro";
            $flag = 1;

			if ($res->num_rows>0) {
                $result .= "<div class ='container'>";
				$result .= "<table align='center' class='table table-bordered'>";
				$result .= "<tr class='tblh'><th>Train Number</th></th><th>Train Name</th><th>Departure Time</th><th>Arrival Time</th><th>Train Box</th><th>Seat Number</th><th>Cancel</th></tr>";
				while ($row = $res->fetch_assoc()) 
				{
                    $result .= "<tr class ='".$class."'>
                                    <td>
                                        ".$row['train_id']."
                                    </td>

                                    <td>
                                        ".$row['train_name']."
									</td>
									<td>
										".$row['dep_tme']."
									</td>
									<td>
										".$row['arrival_tme']."
                                    </td>
                                    <td>
										".$row['box_no']."
                                    </td>
                                    <td>
                                        ".$row['seat_no']."
                                    </td>
                                    <td>
                                    "."<span><a class='btn btn-success' href='remove_ticket.php?tid={$row['ticket_num']}&&cid={$row['cust_id']}'>Cancel</a></span>" ."
                                    </td>
                                    
                                    
                                
                                
						</tr>";
                    
                    $flag++;
         
                    if(($flag)%2==0)
                        $class = "tblre";
                    else
						$class = "set tblro";
					
				
			}
				$result .= "</table></div>";
			}
			echo $result;
	?>
    <div class="form-group row">
			<div class="col-sm-8"></div>
				<input type="submit" value="Print Ticket" class="btn btn-success col-sm-3">
			<div class="col-sm-1"></div>
		</div>

 </body>
 </html>