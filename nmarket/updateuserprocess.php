<?php
include "connection.php";
session_start();

$address=$_POST["a"];
$mobille=$_POST["m"];

if(empty($address)){
    echo("Please enter address");
}else if(empty($mobille)){
    echo("Please enter mobile");
}else if(!strlen($mobille)==10){
    echo("invalid mobile numeber");
}else{
    Database::iud("UPDATE `user` SET `address`='".$address."',`mobile`='".$mobille."' WHERE `email`='".$_SESSION["u"]["email"]."'");
    echo("Sucess");
}
?>