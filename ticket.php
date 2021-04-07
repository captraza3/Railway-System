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
 	<form action="ticket_try.php" method="post" class="container-fluid bg-text">
		<div class="page-header mb-5" align="center">
            <br><br>
            <h1 class="set2">Ticket Details</h1>
      	</div>

      <div class="form-group row">
		<a class="btn btn-success col-sm-1" href="customer_registor.php"><-Back</a>
		<div class="col-sm-11"></div>
	</div>

        <div class="form-group row">
            <dir class="col-sm-1"></dir>
            <h3 class="set2 col-sm-1"></>Source</h3>
            <div class="col-sm-5"></div>
            <h3 class="set2 col-sm-1"></>Destination</h3>
            <div class="col-sm-4"></div>
        </div>

 <div class="form-group row" align="center">
        <div class="col-sm-1"></div>
    <select name="source" id="source" class="form-control col-sm-4" required >
            <option>Lahore</option>
            <option>Islamabad</option>
            <option>Multan</option>
            <option>Quetta</option>
            <option>Peshawar</option>
            <option>Karachi</option>
    </select>
        <div class="col-sm-2"></div>
        <select name="dest" id="dest" onblur = checkDistance() class="form-control col-sm-4" required >
            <option>Islamabad</option>
            <option>Lahore</option>
            <option>Multan</option>
            <option>Quetta</option>
            <option>Peshawar</option>
            <option>Karachi</option>
            
    </select>
            <div class="col-sm-2"></div>

</div>
                <div class="form-group row">
			<div class="col-sm-4"></div>
			<span id="nMsg" class= "set1 col-sm-4 "></span>
			<div class="col-sm-4"></div>
		</div>

        <div class="form-group row">
            <dir class="col-sm-3"></dir>
            <h3 class="set2 col-sm-3"></>Class Name</h3>
            <div class="col-sm-6"></div>
        </div>

 <div class="form-group row" align="center">
            <div class="col-sm-4"></div>
    <select name="className" id = "className" onblur = genFare() class="form-control col-sm-4" required >
            <option>Sleeper</option>
            <option>Economy</option>
            <option>Business</option>
    </select>
            
        <div class="col-sm-4"></div>
</div>

        <div class="form-group row col-sm-12"></div>

    <div class="form-group row" align="center">
            <div class="col-sm-4"></div>
            <input type="text" name="noseats" class="form-control col-sm-4" placeholder="Enter No of Seats" required>
            <div class="col-sm-4"></div>
    </div>

        

    <div class="form-group row" align="center">
            <div class="col-sm-4"></div>
            <input type="text" name="fare" id ="fare" class="form-control col-sm-4" placeholder="Fare per seat" required>
            <div class="col-sm-4"></div>
    </div>
    
    <div class="form-group row">
            <div class="col-sm-8"></div>
            <input type="submit" value="Register" class="btn btn-success col-sm-3">
            <div class="col-sm-1"></div>
    </div>

 </body>
 <script type="text/javascript">

        function checkDistance(){
                var source = document.getElementById("source").value;
                var destBox = document.getElementById("dest");
                var dest = destBox.value;
                var nMsg = document.getElementById("nMsg");
                if(source == dest){
                        nMsg.innerHTML = "Invalid Distance";
                        destBox.value = "";
                        destBox.focus();
                }
                else{
	                nMsg.innerHTML = "";
                }
        }

    function genFare()
    {
        var source = document.getElementById("source").value;
	var dest = document.getElementById("dest").value;
        var cls = document.getElementById("className").value;
        var fares = document.getElementById("fare");

        var price = 0;
        if(source == "Lahore" && dest == "Islamabad" || dest == "Lahore" && source == "Islamabad" ){
                price = 500;

        }
        else if(source == "Lahore" && dest == "Peshawar" || dest == "Lahore" && source == "Peshawar" ){
                price = 800;
        }
        else if(source == "Lahore" && dest == "Multan" || dest == "Lahore" && source == "Multan" ){
                price = 500;
        }
        else if(source == "Lahore" && dest == "Quetta" || dest == "Lahore" && source == "Quetta" ){
                price = 1000;
        }
        else if(source == "Lahore" && dest == "Karachi" || dest == "Lahore" && source == "Karachi" ){
                price = 1500;
        }

        else if(source == "Karachi" && dest == "Islamabad" || dest == "Karachi" && source == "Islamabad" ){
                price = 2000;
        }
        else if(source == "Karachi" && dest == "Peshawar" || dest == "Lahore" && source == "Peshawar" ){
                price = 2300;
        }       
        else if(source == "Karachi" && dest == "Multan" || dest == "Lahore" && source == "Multan" ){
                price = 1000;
        }
        else if(source == "Karachi" && dest == "Quetta" || dest == "Lahore" && source == "Quetta" ){
                price = 600;
        }
        else if(source == "Quetta" && dest == "Islamabad" || dest == "Quetta" && source == "Islamabad" ){
                price = 1500;
        }
        else if(source == "Quetta" && dest == "Peshawar" || dest == "Quetta" && source == "Peshawar" ){
                price = 1800;
        }
        else if(source == "Quetta" && dest == "Multan" || dest == "Quetta" && source == "Multan" ){
                price = 600;
        }
        else if(source == "Multan" && dest == "Islamabad" || dest == "Multan" && source == "Islamabad" ){
                price = 1000;
        }
        else if(source == "Multan" && dest == "Peshawar" || dest == "Multan" && source == "Peshawar" ){
                price = 1300;
        }
        else if(source == "Peshawar" && dest == "Islamabad" || dest == "Peshawar" && source == "Islamabad" ){
                price = 300;
        }



        if(cls == "Sleeper"){
                price += 700;
        }
        else if(cls == "Business"){
                price += 400;
        }

        fares.value = price;
    }

</script>
 </html>