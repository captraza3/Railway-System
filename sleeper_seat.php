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
 	<title></title>
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
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
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

.set2{
    color: #FFFFFF;
}
.set1{
    color: red;
}
.set {
  padding: 16px;
}
body, html {
  height: 100%;
  margin: 0;
}
input[type=text]:focus {
  border: 3px solid #555;
}
.modal-content {
  background-color: #938F90;
  margin: 5% auto 15% auto;  5% from the top, 15% from the bottom and centered 
  border: 1px solid #888;
  width: 50%; /* Could be more or less, depending on screen size */
}
      </style>
 </head>
 <body>
    <div class="bg"></div>
 	<form action="#" method="post" class="container-fluid bg-text">
		<div class="page-header mb-5" align="center">
            <br><br>
            <h1 class="set2">Select Seat</h1>
      	</div>

    <div class="form-group row col-sm-12"></div>
    <div class="form-group row">
            <div class="col-sm-4"></div>
                <?php
                    if (isset($_GET["Message"])) {
                        $msg =$_GET["Message"];
                        if($msg == "Seat Book"){
                            echo "<div class='col-sm-4 alert alert-success' align='center'>";
                            echo $_GET["Message"];
                            echo "</div>";
                        }
                        else{
                            echo "<div class='col-sm-4 alert alert-danger' align='center'>";
                            echo $_GET["Message"];
                            echo "</div>";
                        }
                    }
                ?>
    </div>
        <div class="col-sm-4"></div>


    <div class="form-group row col-sm-12"> </div>
        <div class="form-group row">
            <dir class="col-sm-3"></dir>
            <h3 class="set2 col-sm-3"></>Date</h3>
            <div class="col-sm-6"></div>
        </div>


<div class="form-group row" align="center">
        <div class="col-sm-4"></div>
        <input type="date" name="tdate" class="form-control col-sm-4" required>
        <div class="col-sm-4"></div>
</div>
<div class="form-group row col-sm-12"> </div>
        <div class="form-group row">
            <dir class="col-sm-3"></dir>
            <h3 class="set2 col-sm-3"></>Select Train Box</h3>
            <div class="col-sm-6"></div>
        </div>

 <div class="form-group row" align="center">
            <div class="col-sm-4"></div>
    <select name="box"  class="form-control col-sm-4" required >
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
    </select>
        <div class="col-sm-4"></div>
</div>

<div class="form-group row col-sm-12"> </div>
<div class="form-group row col-sm-12"> </div>
<div class="form-group row col-sm-12"> </div>
<div class="form-group row col-sm-12"> </div>

<div class="form-group row">
            <dir class="col-sm-3"></dir>
            <h3 class="set2 col-sm-3"></>Select Seat No</h3>
            <div class="col-sm-6"></div>
        </div>

 <div class="form-group row" align="center">
            <div class="col-sm-4"></div>
    <select name="seat"  class="form-control col-sm-4" required >
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
            <option>11</option>
            <option>12</option>   
    </select>
        <div class="col-sm-4"></div>
</div>
        
    
    <div class="form-group row">
            <div class="col-sm-8"></div>
            <input type="submit" value="Register" class="btn btn-success col-sm-3">
            <div class="col-sm-1"></div>
    </div>
<?php
    ob_start();
    $tid = $_GET['tid'];
    $cid = $_GET['cid'];
    $count = $_GET['count'];
    $tnum = $_GET['tnum'];
    $qry1 = "SELECT * from class where class_id = '".$cid."' ";
    $res1 = $con->query($qry1);
    $row1 = $res1->fetch_assoc();
    $Noofseats = $row1["no_of_seats"];
    if($count >= $Noofseats){
        echo "<span><a class='btn btn-success' href='worker.php'><----Back</a></span>";
        
    }
    if (isset($_POST["tdate"])) {
        $box = $_POST["box"];
        $seat = $_POST["seat"];
        $date = $_POST["tdate"];

        
        if($count < $Noofseats){
            $qry = "INSERT into train_seats values('".$box."','".$seat."','".$date."','".$tid."','".$cid."','".$tnum."')";
            if($con->query($qry)){
                $count = $count + 1;
                $tnum = $tnum - 1;
                $msg = "Seat Book";
                header("Location:sleeper_seat.php?Message=$msg && tnum=$tnum && tid=$tid && cid=$cid && count=$count"); 
            }
            else{
                $msg = "Seat Already Book";
                header("Location:sleeper_seat.php?Message=$msg && tnum=$tnum && tid=$tid && cid=$cid && count=$count");
            }
        }
    }
?>

</body>

</html>