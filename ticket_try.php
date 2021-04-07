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
  width: 150%;
  height: 150%
  padding: 40px;
  text-align: center;
}
    </style>
 </head>
 <body>
    <div class="bg"></div>
 	<form action="#" method="post" class="container bg-text">
        <div class="page-header mb-5" align="center">
 	<h3 class="set">Ticket Confirm</h3>

     <div class="form-group row">
			<a class="btn btn-success col-sm-1" href="ticket.php"><-Back</a>
			<div class="col-sm-11"></div>
	</div>

<?php

$src = $_POST["source"];
$dst = $_POST["dest"];
$cls = $_POST["className"];
$seats = $_POST["noseats"];
$fr = $_POST["fare"];
            
						$qry = "SELECT * FROM train, time,station, train_time, train_in_station where city = '".$src."' And time.station_id = station.station_id And train_time.ref_no = time.ref_no And train_time.train_id = train.train_id And train_in_station.station_id = station.station_id And train_in_station.train_id = train.train_id";
						$qry1 = "SELECT * FROM train, time,station, train_time, train_in_station where city = '".$dst."' And time.station_id = station.station_id And train_time.ref_no = time.ref_no And train_time.train_id = train.train_id And train_in_station.station_id = station.station_id And train_in_station.train_id = train.train_id";
						$res = $con->query($qry);
						$res1 = $con->query($qry1);
						
						$result = "";
            $class = "set tblro";
            $flag = 1;

			if ($res->num_rows>0) {
                $result .= "<div class ='container'>";
				$result .= "<table align='center' class='table table-bordered'>";
				$result .= "<tr class='tblh'><th>Train Name</th></th><th>Source</th><th>Destination</th><th>Departure Time</th><th>Arrival Time</th></th><th>Ticket Confirm</th><th>Ticket Cancel</th></tr>";
				while ($row = $res->fetch_assoc() ) 
				{
                    $row1 = $res1->fetch_assoc();

					if($row['train_id'] == $row1['train_id']){
                        $result .= "<tr class ='".$class."'>
                                    <td>
                                        ".$row['train_name']."
                                    </td>
                                    <td>
                                        ".$row['city']."
																		</td>
																		<td>
                                        ".$row1['city']."
																		</td>
																		<td>
																				".$row['dep_time']."
																		</td>

																		<td>
																				".$row1['arrival_time']."
                                    </td>
                                    
                                    <td>
                                    "."<span><a class='btn btn-success' href='ticket_confirm_try.php?dtime={$row['dep_time']}&&atime={$row1['arrival_time']}&&tid={$row['train_id']}&&dest={$dst}&&source={$src}&&clss={$cls}&&seat={$seats}&&fare={$fr}'>Next</a></span>" ."
                                    </td>

                                    <td>
                                    "."<span><a class='btn btn-success' href='worker.php'>Cancel</a></span>" ."
                                    </td>
                                
									</tr>";
                    
                    $flag++;
         
                    if(($flag)%2==0)
                        $class = "tblre";
                    else
												$class = "set tblro";
					}
				}
	
				$result .= "</table></div>";
			}
			echo $result;
	?>

 </body>
 </html>
