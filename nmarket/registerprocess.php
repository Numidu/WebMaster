<?php

 include "connection.php";

  $name=$_POST["n"];
  $email=$_POST["e"];
  $pasword=$_POST["p"];

if(empty($name)){
    echo("Enter Name");
}else if(empty($email)){
    echo("Enter your emil");
}else if(empty($pasword)){
    echo("Enter password");
}else{
  $u_rs = Database::serch("SELECT * FROM  `user` WHERE `email` ='".$email."' ");
  $u_num=$u_rs->num_rows;

  if($u_num==0){
    Database::iud("INSERT INTO `user` (`name`, `email`, `password`) VALUES ('".$name."', '".$email."', '".$pasword."')");
    echo("success");
  }else{
    echo("This emil alredy used");
  }
}
?>