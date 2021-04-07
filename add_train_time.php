<?php 
    include "connect.php";
    session_start();
    if(isset($_SESSION["empid"]))
    {
        if($_SESSION["type"] != "Assistant Manager"){
            header("Location:login.php");
        }
    }
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>add train</title>
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
 	<h3 class="set">Add Train</h3>

     <div class="form-group row">
			<a class="btn btn-success col-sm-1" href="update_train_time.php"><-Back</a>
			<div class="col-sm-11"></div>
	</div>

    <div class="form-group row">
			<dir class="col-sm-4"></dir>
					<select name="strain" class="form-control col-sm-4" required>
						<option value="Ahmed Express">Ahmed Express</option>
						<option value="Muneeb Express">Muneeb Express</option>
                        <option value="Wajahat Express">Wajahat Express</option>
						<option value="Saood Express">Saood Express</option>
                        <option value="Hafeez Express">Hafeez Express</option>
						<option value="Tashfeen Express">Tashfeen Express</option>
					</select>
			<div class="col-sm-4"></div>
	</div>

    <div class="form-group row">
			<div class="col-sm-6"></div>
				<input type="submit" value="Register" class="btn btn-success col-sm-2">
			<div class="col-sm-4"></div>
	</div>

    <div class="form-group row">
            <div class="col-sm-4"></div>
                <?php
                    if (isset($_GET["Message"])) {
                        echo "<div class='col-sm-4 alert alert-danger' align='center'>";
                        echo $_GET["Message"];
                        echo "</div>";
                    }
                ?>
    </div>

    <?php
        if (isset($_POST["strain"])) {
                $train = $_POST["strain"];
                $no = $_GET["no"];

                $qry1 = "SELECT * FROM train where train_name = '".$train."' ";
                $qry2 = "SELECT * FROM station where station_name = '".$station."' ";
                $res1 = $con->query($qry1);
                $row1 = $res1->fetch_assoc();
                $qry1 = "INSERT into train_time Values('".$row1["train_id"]."','".$no."')";
                if($con->query($qry1)){
                   header("Location:update_train_time.php");
                }
                else{
                    $msg = "Already Register";
                    header("Location:add_train_time.php?Message=$msg");
                }
        
        }
		
	?>

 </body>
 </html>




