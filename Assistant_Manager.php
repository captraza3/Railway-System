<?php 
include "connect.php";
  session_start();
 if(isset($_SESSION["emp_email"]))
    {
        if($_SESSION["type"] != "Assistant Manager")
            header("Location:login.php");
	}
	
	$_SESSION["back"] = "Assistant_Manager.php";
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Employee start</title>
 	<link href="css/bootstrap.min.css" rel="stylesheet">
 	<style>
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
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 1); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
}
        .clgr{
        	color: #000000;
        }
        .nave{
			background-color: #000000;
			color: #FFFFFF;
		}
		ul {
			  list-style-type: none;
			  margin: 0;
			  padding: 0;
			  overflow: hidden;
			  background-color: #333;
		}

		li {
  			float: left;
		}

		li a, .dropbtn {
  			display: inline-block;
  			color: white;
  			text-align: center;
  			padding: 14px 16px;
  			text-decoration: none;
		}


    </style>
 </head>
 <body>
 	<?php 
	 	echo "<ul class='nave page-header mb-5' align='center'>"."<li>"."<a>"."<h1>". "Welcome    " . $_SESSION["name"]."</h1>"."</a>"."</li>";
	 	echo "<li style='float:right'>"."<a class='active' href='logout.php'>"."<h5>"."Log Out"."</h5>"."</a>"."</li>"."</ul>";
	 ?>
	 <div class="bg"></div>
	 <div class="bg-text">
	<div class="form-group row col-sm-12"> </div>
	<div class="form-group row col-sm-12"> </div>

	<div class="form-group row">
 		<div class="col-sm-10" class="page-header mb-5" align="center">
 			<a href="emp_profile.php" class="clgr"><h3  class="form-control col-sm-3 btn btn-success" >Profile</h3></a>
		</div>
	</div>

	<div class="form-group row col-sm-12"> </div>

	<div class="form-group row">
 		<div class="col-sm-10" class="page-header mb-5" align="center">
 			<a href="update_station.php" class="clgr"><h3  class="form-control col-sm-3 btn btn-success" >Station</h3></a>
		</div>
	</div>
 	
	<div class="form-group row col-sm-12"> </div>

	<div class="form-group row">
 		<div class="col-sm-10" class="page-header mb-5" align="center">
 			<a href="update_train.php" class="clgr"><h3 class=" form-control col-sm-3 btn btn-success ">Train</h3></a>
 		</div>
	</div>

	<div class="form-group row col-sm-12"> </div>
	
	<div class="form-group row">
 		<div class="col-sm-10" class="page-header mb-5" align="center">
 			<a href="train_in_station.php" class="clgr"><h3 class=" form-control col-sm-3 btn btn-success ">Train in Station</h3></a>
 		</div>
	</div>

	<div class="form-group row col-sm-12"> </div>

	<div class="form-group row">
 		<div class="col-sm-10" class="page-header mb-5" align="center">
 			<a href="update_time.php" class="clgr"><h3 class=" form-control col-sm-3 btn btn-success ">Time</h3></a>
 		</div>
	</div>

	<div class="form-group row col-sm-12"> </div>
	
	<div class="form-group row">
 		<div class="col-sm-10" class="page-header mb-5" align="center">
 			<a href="update_train_time.php" class="clgr"><h3 class=" form-control col-sm-3 btn btn-success ">Train Time</h3></a>
 		</div>
	</div>

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
        <div class="col-sm-4"></div>
 </body>
 </html>