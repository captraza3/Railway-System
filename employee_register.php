<?php
    session_start();
    
    if(isset($_SESSION["empid"]))
    {
        if($_SESSION["type"] != "Manager")
            header("Location:login.php");
    }
  
?>
<html>
<head>
	
	<title>Sign Up</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
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
		.set2{
    color: #FFFFFF;
}
body, html {
  height: 100%;
  margin: 0;
}
input[type=text]:focus {
  border: 3px solid #555;
}
body::modal-content {
  background-color: #938F90;
  margin: 5% auto 15% auto;
  border: 1px solid #888;
  width: 50%; /* Could be more or less, depending on screen size */
}
	</style>
</head>
<body>
	<div class="bg"></div>
	<form action="employee_register_try.php" method="post" class="container-fluid bg-text">
		<div class="page-header mb-5" align="center">
			<br><br><br><br>
            <h1 class="set2">Sign Up Employee</h1>
        </div>
			<div class="form-group row">
			<a class="btn btn-success col-sm-1" href="manager.php"><-Back</a>
			<div class="col-sm-11"></div>
		</div>
		<div class="form-group row">
					<div class="col-sm-1"></div>
				<input type="text" name="txtName" id="txtName" onblur="checkName()" class="form-control col-sm-4" placeholder = "Full Name" required>
					<div class="col-sm-1"></div>
				<input type="text" name="txtCnic" id="txtCnic" onblur="genEmail()" class="form-control col-sm-4" placeholder = "CNIC" required>
                <span id="nMsg" class= "col-sm-2 "></span>
		</div>

		<div class="form-group row">
			<div class="col-sm-1"></div>
				<input type="password" name="txtPass" id="txtPass" class="form-control col-sm-4" placeholder = "New Password" required>
					<div class="col-sm-1"></div>
					<input type="password" name="ctxtPass" id="ctxtPass" onblur="checkPassword()" class="form-control col-sm-4" placeholder = "Confirm Password" required>
				<span id="pMsg" class= "col-sm-2 "></span>
		</div>

		<div class="form-group row">
			<dir class="col-sm-1"></dir>
			<h5 class="set2"></>Select Gender</h5>
			<div class="col-sm-11"></div>
		</div>

		<div class="form-group row">
			<dir class="col-sm-1"></dir>
					<select name="sGender" class="form-control col-sm-4" required>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
			<div class="col-sm-1"></div>
			<input type="text" name="txtContact" class="form-control col-sm-4" placeholder = "Contact" required>
				<div class="col-sm-4"></div>
		</div>

		<div class="form-group row">
			<div class="col-sm-1"></div>
				<input type="text" name="txtEmail" id="txtEmail" class="form-control col-sm-4" placeholder = "Email" required>
			<div class="col-sm-1"></div>
			<input type="text" name="txttype" class="form-control col-sm-4" placeholder="Type">
			<div class="col-sm-2"></div>
		</div>

		<div class="form-group row">
			<dir class="col-sm-"></dir>
			<h5 class="set2 col-sm-2"></>Join Date</h5>
			<div class="col-sm-3"></div>
			<h5 class="set2 col-sm-2"></>Duty Shift</h5>
			<div class="col-sm-4"></div>
		</div>
</div>
		<div class="form-group row">
			<div class="col-sm-1"></div>
				<input type="date" name="txtDate" class="form-control col-sm-4"  required>
			<div class="col-sm-1"></div>
			<select name="dShift" class="form-control col-sm-4" required>
						<option value="Day">day</option>
						<option value="Night">night</option>
			</select>
			<div class="col-sm-2"></div>
		</div>
		
		<div class="form-group row">
			<div class="col-sm-1"></div>
				<input type="text" name="salary" class="form-control col-sm-4" placeholder="Salary">
			<div class="col-sm-1"></div>
			<textarea rows="2" cols="50" name="txtAddress" class="from-control col-sm-4" placeholder = "Address"  required></textarea>
			<div class="col-sm-2"></div>
		</div>
		
		<div class="form-group row">
			<div class="col-sm-1"></div>
				<input type="submit" value="Register" class="btn btn-success col-sm-3">
			<div class="col-sm-9"></div>
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

	</form>
</body>
<script type="text/javascript">
    function checkName()
    {
        var nameBox = document.getElementById("txtName");
        var name = nameBox.value;
        var nMsg = document.getElementById("nMsg");
		var flag = false;
		var i;
		for(i = 0; i < name.length; i++){
			if(name[i] >= '0' && name[i] <= '9'){
				flag = true;
			}
		}
        if(flag == true){
            nMsg.innerHTML = "Invalid Name";
            nameBox.value = "";
            nameBox.focus();
        }
        else{
			nMsg.innerHTML = "";
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
            pMsg.innerHTML = "Invalid Password";
			PasswordBox.value = "";
			cPasswordBox.value = "";
            PasswordBox.focus();
        }
        else{
			pMsg.innerHTML = "";
		}
            
    }

    function genEmail()
    {
        var name = document.getElementById("txtName").value;
		var cnic = document.getElementById("txtCnic").value;
        var emailBox = document.getElementById("txtEmail");
		var splitCnic = cnic.split("-");
		var num = splitCnic[1] % 1001;
		var count = 0;
		var i;
		for(i = 0; i < name.length; i++){
			if(name[i] == " "){
				count++;
			}
		}
		var email = "";
        var splitName = name.split(" ");
		for(i = 0; i <= count; i++){
			email += splitName[i];
		}
        email += num+"@railway.com";
        emailBox.value = email;
    }
</script>
</html>


