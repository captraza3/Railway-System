<!DOCTYPE html>
<html>
<head>
	<title>Customer Registor</title>
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
.clg{
  background-color: #FFFFFF;
  text-decoration-color: #000000;
}
    .set2{
    color: #FFFFFF;
}

.set{
    color: red;
}

body, html {
  height: 100%;
  margin: 0;
}
input[type=text]:focus {
  border: 3px solid #555;
}

  </style>
</head>
<body>
  <div class="bg"></div>
	<form action="customer_registor_try.php" method="post" class="container-fluid bg-text">
		<div class="page-header mb-5" align="center">
            <h1 style="color: #FFFFFF">Customer's Registration</h1>
      </div>

    <div class="form-group row">
			  <a class="btn btn-success col-sm-1" href="worker.php"><-Back</a>
			  <div class="col-sm-11"></div>
		</div>
		
    <div class="form-group row" align="center">
            <div class="col-sm-4"></div>
            <input type="text" name="cust_id" class="form-control col-sm-4" placeholder="Customer CNIC" required>
            <div class="col-sm-4"></div>
    </div>

    

		<div class="form-group row" align="center">
            <div class="col-sm-4"></div>
            <input type="text" name="cust_name" id="cust_name" class="form-control col-sm-4" onblur="checkName()" placeholder="Customer Name" required>
            <div class="col-sm-4"></div>
    </div>

    <div class="form-group row">
			<div class="col-sm-4"></div>
			<span id="nMsg" class= "set col-sm-2 "></span>
			<div class="col-sm-8"></div>
		</div>


<div class="form-group row">
      <dir class="col-sm-4"></dir>
      <h5 class="set2"></>Select Gender</h5>
      <div class="col-sm-11"></div>
    </div>
    <div class="form-group row" align="center">
            <div class="col-sm-4"></div>
               	     	<select name="cusgender" required class="form-control col-sm-4">
                    	<option value="Male">Male</option>
                    	<option value="Female">Female</option>
                    	</select> 
            <div class="col-sm-4"></div>
    </div>
           
    <div class="form-group row" align="center">
            <div class="col-sm-4"></div>
            <input type="text" name="phone_no" class="form-control col-sm-4" placeholder="Phone no" required>
            <div class="col-sm-4"></div>
    </div>

    <div class="form-group row">
        <dir class="col-sm-4"></dir>
          <h5 class="set2"></>Date & Time</h5>
        <div class="col-sm-11"></div>
    </div>

    <div class="form-group row" align="center">
            <div class="col-sm-4"></div>
            <input type="datetime-local" name="ctime" class="form-control col-sm-4" required>
            <div class="col-sm-4"></div>
    </div>

    <div class="form-group row">
            <div class="col-sm-4"></div>
            <input type="submit" value="Next" class="btn btn-success col-sm-4" >
            <div class="col-sm-4"></div>
    </div>
          <div class="form-group row">
            <div class="col-sm-4"></div>
                <?php
                  if(isset ($_GET["Message"]))
                     echo $_GET["Message"];
                ?>
          </div>
	</form>
</body>

<script type="text/javascript">
    function checkName()
    {
        var nameBox = document.getElementById("cust_name");
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
</script>
</html>