<?php
    include "connect.php";
    session_start();

    $email = $_POST["emp_email"];
    $pass = $_POST["txtPass"];
    
    $qry = "SELECT * FROM employee WHERE email = '".$email."'";
    //echo $qry;
    $res = $con->query($qry);

    $msg = "";
    if($res->num_rows > 0)
    {
        //user exists
        $row = $res->fetch_assoc();
        if($row["password"] == $pass)
        {

            $_SESSION["emp_email"] = $user;
            $_SESSION["opass"] = $row["password"];
            $_SESSION["id"] = $row["emp_id"];
            $_SESSION["type"] = $row["type"];
            $_SESSION["name"] = $row["emp_name"];
            
            if($row["type"] == "Manager"){
                header("Location:Manager.php");
            }
            else if($row["type"] == "Assistant Manager"){
                header("Location:Assistant_Manager.php");
            }
            else{
                header("Location:worker.php");
            }
        }
        else
        {            
            $msg = "Invalid password";
            header("Location:login.php?Message=$msg");
        }
    }
    else
    {
        $msg = "The Email does not exist!";
        header("Location:login.php?Message=$msg");
    }
?>