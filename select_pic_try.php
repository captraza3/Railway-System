
<?php
    include "connect.php";
    session_start();

    if(isset($_POST["upload"])){
        $file_name= md5(rand()).$_FILES["image"]["name"];
        $temp_name=$_FILES["image"]["tmp_name"];
        $target_path = "image/".$file_name;
        session_start();
        $id = $_SESSION["id"];
        $f_type=$_FILES['image']['type'];

        if ($f_type== "image/gif" OR $f_type== "image/JPG" OR $f_type== "image/png" OR $f_type== "image/jpeg" OR $f_type== "image/JPEG" OR $f_type== "image/PNG" OR $f_type== "image/GIF"){
            $error=False;
        }
        else{
            $error=True;
        }
        $query_upload = "UPDATE employee SET pic_name = '".$target_path."' where emp_id = '".$_SESSION["id"]."'";
        
        if($error == False){
            if(move_uploaded_file($temp_name, $target_path)){
                $con->query($query_upload);
                $msg = "Image is successfully uploaded";
            }
            else{
                $msg = "Image is not uploaded";
            }
            header("Location:emp_profile.php?Message=$msg");
        }
        else{
            $msg = "It is not image. Please select the image";
            header("Location:select_pic.php?Message=$msg");
        }
          
    }
   

?>