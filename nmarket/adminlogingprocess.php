<?php
include "connection.php";
session_start();
$email=$_POST["e"];
$password=$_POST["p"];

if(empty($email)){
    echo("Enter your email");
}else if(empty($password)){
    echo("Enter password");
}else{
    $rs=Database::search("SELECT * from `admin` WHERE `email`='".$email."'");
    $num=$rs->num_rows;

    if($num==1){
        $data=$rs->fetch_assoc();
        $_SESSION["a"]=$data;

        echo("sucess");
    }else{
        echo("Invalid user name or Password");
    }
}

?>