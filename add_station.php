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
	<title>station</title>
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
height: 150vh; 
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
 	            <h3 class="set">Add Station</h3>
        
        <div class="form-group row">
			<a class="btn btn-success col-sm-1" href="update_station.php"><-Back</a>
			<div class="col-sm-11"></div>
	    </div>

          
        <div class="form-group row">
            <div class="col-sm-4"></div>
                <input type="text" name="txtid" class="col-sm-4" placeholder="Enter Station ID" class="form-control" required>
            <div class="col-sm-4"></div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4"></div>
                <input type="text" name="txtname" class="col-sm-4" placeholder="Enter Station Name" class="form-control" required>
            <div class="col-sm-4"></div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4"></div>
                <input type="text" name="txtnol" class="col-sm-4" placeholder="Enter Number of Lines" class="form-control" required>
            <div class="col-sm-4"></div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4"></div>
                <input type="text" name="txtnop" class="col-sm-4" placeholder="Enter No of Platforms" class="form-control" required>
            <div class="col-sm-4"></div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4"></div>
                <input type="text" name="txtcity" class="col-sm-4" placeholder="Enter City" class="form-control" required>
            <div class="col-sm-4"></div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4"></div>
                <input type="submit" value="Update" class="btn btn-success col-sm-4 btn-block">
            <div class="col-sm-4"></div>
        </div>				
	</form>
<?php
    if (isset($_POST["txtid"])) {
        $id = $_POST["txtid"];
        $name = $_POST["txtname"];
        $nol = $_POST["txtnol"];
        $nop = $_POST["txtnop"];
        $city = $_POST["txtcity"];
        

        $qry = "INSERT into station Values('".$id."','".$name."','".$nol."','".$nop."', '".$city."')";

        if($con->query($qry)){
           header("Location:update_station.php");
        }

    }
?>
</body>
</html>