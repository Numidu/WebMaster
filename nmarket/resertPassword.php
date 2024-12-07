<?php
include "connection.php";

$npw=$_POST["n"];
$cpw=$_POST["c"];
$vscode=$_POST["v"];

if(empty($npw)){
    echo("please Enter Your New password");

}else if(empty($cpw)){
    echo("please Enter Your confirm password");
}else if(empty($vcode)){
    echo("please Enter Your verification code");
}else{
    if($npw==$cpw){
        Database::search("SELECT * FROM `user` WHERE `vcode`='".$vcode."' AND `emai`='".$email."'");
        $num=$rs->num_rows;

        if($num==1){
           Database::iud("UPDATE `user`SET `password='".$npw."' WHERE `email`='".$email."'");
           echo("Sucess");
        }else{
            echo("Invalid user");
        }
    }else{
        echo("password does not match");
    }
}
?>