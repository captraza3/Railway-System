    <html>
<head>
	<title>Choose picture</title>
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
    </style>
</head>
<body>
    <div class="bg"></div>
	    <form action="select_pic_try.php" method="post" enctype="multipart/form-data" class="bg-text">

        <div class='form-group row col sm-12'></div>

        <div class='form-group row'>
            <a class="col sm-1 btn btn-success" href="emp_profile.php"><-Back</a>
            <div class="col-sm-3"></div>
            <div class="col-sm-2"><h4>Upload Photo</h4></div>
            <div class='col-sm-6'></div>
        </div>

        <div>
            <input type="hidden" name="size" value="100000">
        </div>
        <div class="form-group row">
            <div class="col-sm-4"></div>
                <input type="file" class="btn btn-success col-sm-2" name="image" >
                <div class="col-sm-6"></div>    
        </div>

        <div class="form-group row">
            <div class="col-sm-4"></div>
                <input type="submit" name="upload" class="btn btn-success col-sm-2" value="upload image" >
            <div class="col-sm-6"></div>
        </div>

        <?php
            if (isset($_GET["Message"])){
                    echo "<div class='form-group row'>";
                    echo "<div class=col-sm-4> </div>";
                    echo "<div class='alert alert-danger col-sm-4' align='center'>";
                    echo $_GET["Message"];
                    echo "<div class=col-sm-4> </div>";
                    echo "</div>";
                    echo "</div>";
                }
        ?>
		
	</form>
</body>
</html>
