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
  height: 160vh; 
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
 	<form action="#" method="post" class="container bg-text">
        <div class="page-header mb-5" align="center">
 	<h3 class="set">Show Ticket</h3>

     <div class="form-group row">
			<a class="btn btn-success col-sm-1" href='worker.php'><-Back</a>
			<div class="col-sm-11"></div>
	</div>

<?php

            $id = $_SESSION["id"];
            
		    $qry = " SELECT * FROM ticket, customer, train_fare where status ='pending' ANd  customer.cust_id = ticket.cust_id And ticket_confirm = 'No' And ticket.ticket_num = train_fare.ticket_num ";
			//$qry1 = "SELECT * FROM train, time,station, train_time, train_in_station where city = '".$dst."' And time.station_id = station.station_id And train_time.ref_no = time.ref_no And train_time.train_id = train.train_id And train_in_station.station_id = station.station_id And train_in_station.train_id = train.train_id";
			$res = $con->query($qry);
						
			$result = "";
            $class = "set tblro";
            $flag = 1;

			if ($res->num_rows>0) {
                $result .= "<div class ='container'>";
				$result .= "<table align='center' class='table table-bordered'>";
				$result .= "<tr class='tblh'><th>Train Number</th></th><th>CNIC</th><th>Name</th><th>Source</th><th>Destination</th><th>Amount</th><th>Next</th></tr>";
				while ($row = $res->fetch_assoc()) 
				{
                    $result .= "<tr class ='".$class."'>
                                    <td>
                                        ".$row['train_id']."
                                    </td>

                                    <td>
                                        ".$row['cust_id']."
                                    </td>
                                    <td>
                                        ".$row['cust_name']."
									</td>
									<td>
										".$row['source']."
									</td>
									<td>
										".$row['destination']."
                                    </td>
                                    <td>
										".$row['fare']."
                                    </td>
                                    <td>
                                    "."<span><a class='btn btn-success' href='seat_ticket.php?tnum={$row['ticket_num']}&&tid={$row['train_id']}&&cid={$row['cust_id']}'>Next</a></span>" ."
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

 </body>
 </html>