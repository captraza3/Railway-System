<?php
	include "connect.php";
  session_start();
 if(isset($_SESSION["empid"]))
    {
        if($_SESSION["type"] != "Manager")
            header("Location:login.php");
    }
		$qry = "SELECT * FROM time";
		$res = $con->query($qry);
		$result = "";

		if ($res->num_rows>0) {
			$result .= "<table align='center'>";
			$result .= "<th>Ref_NO</th><th>Departure time</th><th>arrival Time</th>";
			while ($row = $res->fetch_assoc()) 
			{
				$result .= "<tr>
								<td>
									".$row['ref_no']."
								</td>
								<td>
									".$row['dep_time']."
								</td>
								<td>
									".$row['arrival_time']."
								</td>
							</tr>";
			}
			$result .= "</table>";
		echo $result;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Record</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<style>
        .bg {
	  background-image: url("new.jpg");
  	  top:80%;
	  height: 100%; 
	  background-position: center;
	  background-repeat: repeat;
	  /*background-size: cover;*/
          filter: blur(8px);
          -webkit-filter: blur(8px);

	}
	.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 2px solid #f1f1f1;
  position: absolute;
  top:70%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
}
        table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
  border: 1px solid black;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.set{
	color: #FFFFFF;
}

    </style>
</head>
<body>
	<div class="bg"></div>
	<form action="time_update_try.php" method="post" class="container-fluid">
		<div class="bg-text">
		<div class="form-group row">
			<div class="col-sm-6"></div>
		</div>
		<div class="form-group row">
			<div class="col-sm-6"></div>
		</div>
		<div class="form-group row">
			<div class="col-sm-6"></div>
		</div>
		<div class="form-group row">
            <div class="col-sm-4"></div>
            <h4 class="set">Enter Reference no of Train</h4>
            <div class="col-sm-4"></div>
		</div>
		<div class="form-group row">
            <div class="col-sm-4"></div>
				<input type="text" name="ref" class="form-control col-sm-4" placeholder="Ref No">
			<div class="col-sm-4"></div>
		</div>
		
		<div class="form-group row">
            <div class="col-sm-4"></div>
            <h4 class="set">Update Departure Time</h4>
            <div class="col-sm-4"></div>
		</div>

		<div class="form-group row">
            <div class="col-sm-4"></div>
				<input type="datetime" name="dep_time" class="form-control col-sm-4">
			<div class="col-sm-4"></div>
		</div>

		<div class="form-group row">
            <div class="col-sm-4"></div>
            <h4 class="set">Update Arrival Time</h4>
            <div class="col-sm-4"></div>
		</div>

		<div class="form-group row">
            <div class="col-sm-4"></div>
				<input type="datetime" name="dep_time" class="form-control col-sm-4">
			<div class="col-sm-4"></div>
		</div>


		 <div class="form-group row">
            <div class="col-sm-4"></div>
            	<input type="submit" name="arri_time" value="Update" class="btn btn-success col-sm-4">
            <div class="col-sm-4"></div>
        </div>
     </div>
	</form>
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
        <div class="col-sm-4"></div>
</body>
</html>