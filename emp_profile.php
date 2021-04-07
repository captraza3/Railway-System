<?php
    include "connect.php";
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
.tblre{
        font-size: 12px;
        background: #E9E8E8;
    }
.tblpxl{
    border-radius: 10px;
    padding: 4px;
    height:  150px;
    width: 150px;
  }
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}

.bg {
  background-image: url("new.jpg");
  height: 100%; 
  background-position: center;
  background-repeat: repeat;
  background-size: cover;
  /*filter: blur(8px);*/
  /*-webkit-filter: blur(8px);*/
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
.set{
    color: #FFFFFF;
}
.set2{
    background-color: #000000;
}
    </style>
</head>
<body class="bg">
    <div class="container-fluid">
    <div class='form-group row set2'>
    <a class="col sm-1 btn btn-success" href="<?php echo $_SESSION["back"]; ?>">Back</a>
    <div class='col-sm-9'></div>
    <div class="dropdown col-sm-2">
      <button class="btn btn-success dropdown-toggle"><-<-<-Setting->->-></button>
              <div class="dropdown-content">
                    <a class="dropdown-item" href="select_pic.php">Change Profile Pic</a>
                    <a class="dropdown-item" href="change_pass.php">Change Password</a>
                    <a class="dropdown-item" href="logout.php">Logout </a>
              </div>
        </div>
        <div class='col-sm-1'></div>
    </div>

    <?php
            $qry = "";
            $qry = "SELECT * FROM employee where emp_id = '".$_SESSION["id"]."'";
            $res = $con->query($qry);

      if ($res->num_rows>0) {
                $row = $res->fetch_assoc();
                echo "<div class='form-group row'>";
          echo "<div class='col-sm-8'></div>";
          echo "<img src='".$row["pic_name"]."' class='tblpxl' class=' form control col-sm-2'  />";
          echo "<div class='col-sm-2'></div>";
          echo "</div>";
                // echo "<div class='bg-text'>";
                echo "<div class='form-group row set'><div class='col-sm-1'></div><h5 class='col-sm-1'><strong>CNIC:</strong> </h5> <div class='col-sm-1'></div> <h5>".$row['emp_id']."</h5> <div class='col-sm-9'></div></div>";
                echo "<div class='form-group row col-sm-12'></div>";
                echo "<div class='form-group row set'><div class='col-sm-1'></div><h5 class='col-sm-1'><strong>Full Name:</strong> </h5> <div class='col-sm-1'></div><h5> ".$row['emp_name']."</h5> <div class='col-sm-9'></div></div>";
                echo "<div class='form-group row col-sm-12'></div>";
                echo "<div class='form-group row set'><div class='col-sm-1'></div><h5 class='col-sm-1'><strong>Gender:</strong> </h5> <div class='col-sm-1'></div> <h5>".$row['gender']."</h5> <div class='col-sm-9'></div></div>";
                echo "<div class='form-group row col-sm-12'></div>";
                echo "<div class='form-group row set'><div class='col-sm-1'></div><h5 class='col-sm-1'><strong>Email:</strong> </h5> <div class='col-sm-1'></div> <h5>".$row['email']."</h5> <div class='col-sm-9'></div></div>";
                echo "<div class='form-group row col-sm-12'></div>";
                echo "<div class='form-group row set'><div class='col-sm-1'></div><h5 class='col-sm-1'><strong>Address:</strong> </h5> <div class='col-sm-1'></div> <h5>".$row['address']."</h5> <div class='col-sm-9'></div></div>";
                echo "<div class='form-group row col-sm-12'></div>";
                echo "<div class='form-group row set'><div class='col-sm-1'></div><h5 class='col-sm-1'><strong>Duty Shift:</strong> </h5> <div class='col-sm-1'></div> <h5>".$row['duty_shift']."</h5> <div class='col-sm-9'></div></div>";
                echo "<div class='form-group row col-sm-12'></div>";
                echo "<div class='form-group row set'><div class='col-sm-1'></div><h5 class='col-sm-1'><strong>Contact:</strong> </h5> <div class='col-sm-1'></div> <h5>".$row['phone_no']."</h5> <div class='col-sm-9'></div></div>";
                // echo "</div>";
      } 
  ?>
</div>
    </div>
</body>
</html>