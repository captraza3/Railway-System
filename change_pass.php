<?php
    include "connect.php";
    session_start();
    $qry = "SELECT password from employee where emp_id = '".$_SESSION["id"]."'";
    $res = $con->query($qry);
    $row = $res->fetch_assoc();
    $pass = $row["password"];
?>
<html>
<head>
	<title>Change Pass</title>
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
.set{
    color: red;
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
	</style>
</head>
<body>
	<div class="bg"></div>
	<form action="change_pass_try.php" method="post" class="bg-text">

    <div class='form-group row'>
    	<!-- <div class='col-sm-1'></div> -->
    	<div class="col-sm-4"></div>
    	<h1>Change Password</h1>
    	<div class='col-sm-8'></div>
    </div>

		<div class="form-group row">
			<a class="btn btn-success col-sm-1" href="emp_profile.php"><-Back</a>
			<div class="col-sm-11"></div>
		</div>

        <div class="form-group row">
			<div class="col-sm-4"></div>
				<input type="password" name="otxtPass" id="otxtPass" onblur="old_match_Password()" class="form-control col-sm-4" placeholder = "Old Password" required>
			<div class="col-sm-4"></div>
			
		</div>

		<div class="form-group row">
			<div class="col-sm-4"></div>
			<span id="opMsg" class="set col-sm-4"></span>
			<div class="col-sm-4"></div>
		</div>

		<div class="form-group row">
			<div class="col-sm-4"></div>
				<input type="password" name="txtPass" id="txtPass" class="form-control col-sm-4" placeholder = "New Password" required>
			<div class="col-sm-4"></div>
		</div>

		<div class="form-group row">
			<div class="col-sm-4"></div>
				<input type="password" name="ctxtPass" id="ctxtPass" onblur="checkPassword()" class="form-control col-sm-4" placeholder = "Confirm Password" required>
			<div class="col-sm-4"></div>
		</div>

		<div class="form-group row">
			<div class="col-sm-4"></div>
			<span id="pMsg" class="set col-sm-4"></span>
			<div class="col-sm-4"></div>
		</div>

		<div class="form-group row">
			<div class="col-sm-4"></div>
				<input type="submit" value="Change Password" class="btn btn-success col-sm-4">
			<div class="col-sm-4"></div>
		</div>

		<div class="form-group row">
			<div class="col-sm-4"></div>
				<?php
					if (isset($_GET["Message"])) {
						echo "<div class='alert alert-success col-sm-4' align='center'>";
						echo $_GET["Message"];
						echo "</div>";
					}
				?>
			<div class="col-sm-4"></div>
		</div>
        <p id="demo"></p>
        

	</form>
</body>
<script type="text/javascript">

    function old_match_Password()
    {
        var oPasswordBox = document.getElementById("otxtPass");
		var ocpass = "<?php echo $pass ?>";
        var opass = oPasswordBox.value;
        var opMsg = document.getElementById("opMsg");
        if(opass != ocpass){
            opMsg.innerHTML = "Invalid Old Password";
			oPasswordBox.value = "";
			ocPasswordBox.value = "";
            oPasswordBox.focus();
        }
        else{
			opMsg.innerHTML = "";
		}
            
    }

	function checkPassword()
    {
        var PasswordBox = document.getElementById("txtPass");
		var cPasswordBox = document.getElementById("ctxtPass");
        var pass = PasswordBox.value;
		var cpass = cPasswordBox.value;
        var pMsg = document.getElementById("pMsg");
        if(pass != cpass){
            pMsg.innerHTML = "Invalid Confirm Password";
			PasswordBox.value = "";
			cPasswordBox.value = "";
            PasswordBox.focus();
        }
        else{
			pMsg.innerHTML = "";
		}
            
    }

</script>
</html>
