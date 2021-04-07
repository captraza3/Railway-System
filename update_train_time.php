<?php 
include "connect.php";
  session_start();
 if(isset($_SESSION["empid"]))
    {
        if($_SESSION["type"] != "Assistant Manager")
            header("Location:login.php");
    }
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>upadate train time</title>
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
  height: 200vh; 
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
  height: 100%;
  padding: 40px;
  text-align: center;
}
    </style>
 </head>
 <body>
    <div class="bg"></div>
 	<form action="#" method="post" class="container bg-text">
        <div class="page-header mb-5" align="center">
 	<h3 class="set">Update Train Time</h3>

     <div class="form-group row">
			<a class="btn btn-success col-sm-1" href="Assistant_Manager.php"><-Back</a>
			<div class="col-sm-11"></div>
	</div>

     <?php
            
            $qry = "SELECT * FROM time ";
            $res = $con->query($qry);
			$result = "";
            $class = "set tblro";
            $flag = 1;

			if ($res->num_rows>0) {
                $result .= "<div class ='container'>";
				$result .= "<table align='center' class='table table-bordered'>";
				$result .= "<tr class='tblh'><th>Arrival Time</th><th>Departure Time</th><th>Add Train</th></th></tr>";
				while ($row = $res->fetch_assoc()) 
				{
					//one row
                    $result .= "<tr class ='".$class."'>

                                    <td>
                                        ".$row['arrival_time']."
                                    </td>
									<td>
										".$row['dep_time']."
									</td>
					
                                    <td>
                                    "."<span><a class='btn btn-success' href='add_train_time.php?no={$row['ref_no']}'>Add Train</a></span>" ."
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
        <h3 class="set">Train Time</h3>

<?php
            
            $qry = "SELECT * FROM train, time, train_time where train_time.ref_no = time.ref_no And train_time.train_id = train.train_id";
            $res = $con->query($qry);
			$result = "";
            $class = "set tblro";
            $flag = 1;

			if ($res->num_rows>0) {
                $result .= "<div class ='container'>";
				$result .= "<table align='center' class='table table-bordered'>";
				$result .= "<tr class='tblh'><th>Train Number</th><th>Train Name</th><th>Arrival Time</th><th>Departure Time</th></th><th>Remove Record</th></tr>";
				while ($row = $res->fetch_assoc()) 
				{
					//one row
                    $result .= "<tr class ='".$class."'>
                                    <td>
                                        ".$row['train_id']."
                                    </td>
                                    <td>
                                        ".$row['train_name']."
                                    </td>
									
									<td>
										".$row['arrival_time']."
                                    </td>
                                    <td>
										".$row['dep_time']."
									</td>
                                    
                                    <td>
                                    "."<span><a class='btn btn-success' href='train_time_delete.php?no={$row['ref_no']}&&num={$row['train_id']}'>Delete</a></span>" ."
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




