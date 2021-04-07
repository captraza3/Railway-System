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
	<title>time</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="all">
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
 	            <h3 class="set">Add Time</h3>
        
        <div class="form-group row">
			<a class="btn btn-success col-sm-1" href="update_time.php"><-Back</a>
			<div class="col-sm-11"></div>
	    </div>

        <div class="form-group row">
            <div class="col-sm-4"></div>
                <label class="set">Arrival Time</label>
            <div class="col-sm-8"></div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4"></div>
                <input type="time" name="atime" class="col-sm-4"  class="form-control" required>
            <div class="col-sm-4"></div>
        </div>
          
        <div class="form-group row">
            <div class="col-sm-4"></div>
                <label class="set ">Departure Time</label>
            <div class="col-sm-8"></div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4"></div>
                <input type="time" name="dtime" class="col-sm-4"  class="form-control" required>
            <div class="col-sm-4"></div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4"></div>
                <label class="set ">Station</label>
            <div class="col-sm-8"></div>
        </div>

        <div class="form-group row">
		<div class="col-sm-4"></div>
            <select name="sstation" class="form-control col-sm-4" required>
						<option value="Lahore Qalander Station">Lahore Qalander Station</option>
						<option value="Peshawar Zalmi Station">Peshawar Zalmi Station</option>
                        <option value="Quetta Gladiators Station">Quetta Gladiators Station</option>
						<option value="Islamabad United Station	">Islamabad United Station	</option>
                        <option value="Multan Sultan Station">Multan Sultan Station</option>
						<option value="Karachi Kings Station">Karachi Kings Station</option>
					</select>
			<div class="col-sm-4"></div>
	    </div>


        <div class="form-group row">
            <div class="col-sm-4"></div>
                <input type="submit" value="Update" class="btn btn-success col-sm-4 btn-block">
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

	</form>
<?php
    if (isset($_POST["atime"])) {
        $d = $_POST["dtime"];
        $a = $_POST["atime"];
        $s = $_POST["sstation"];
        
        $qry = "SELECT * from station where station_name = '".$s."'";
        $res = $con->query($qry);
        $row = $res->fetch_assoc();
        $id = $row["station_id"];
        

        $qry = "INSERT into time(dep_time,arrival_time,station_id) Values('".$d."','".$a."','".$id."')";

        if($con->query($qry)){
           header("Location:update_time.php");
        }
        else{
            $msg = "Already Register";
            header("Location:add_time.php?Message=$msg");
        }

    }
?>
</body>
</html>