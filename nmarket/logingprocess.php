<?php
 include "connection.php";
session_start();

$email=$_POST["e"];
$password=$_POST["p"];
$remember=$_POST["r"];

if(empty($email)){
    echo("Enter your email");
}else if(empty($password)){
    echo("Enter password");
}else{
   $rs=Database::search("SELECT * FROM `user` WHERE `email` ='".$email."' AND `password`='".$password."'");
   $num=$rs->num_rows;
   if($num==1){
   $data= $rs->fetch_assoc();
   $_SESSION["u"]=$data;
   echo("success");

   if($remember=="true"){
    setcookie("email",$email,time()+(60*60*24*30));
    setcookie("password",$password,time()+(60*60*24*30));

   }

   }else{
    echo("Invalid user name or password");
   }
}
 
?>