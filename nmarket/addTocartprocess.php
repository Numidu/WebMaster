<?php
include "connection.php";
session_start();
if(isset($_SESSION["u"])){
    $pid=$_GET["id"];
    
    $rs= Database::search("SELECT * from `cart` WHERE `product_id`='".$pid."' AND `user_id`='".$_SESSION["u"]["id"]."'");
    $num=$rs->num_rows;

    if($num >0){
        $data=$rs->fetch_assoc();
        $new_qty=$data["quentity"]+1;

        Database::iud("UPDATE `cart` SET `quentity` ='".$new_qty."' WHERE `product_id`='".$pid."' AND  `user_id`= '".$_SESSION["u"]["id"]."'");
        echo("addedd");

    }else{
        Database::iud("INSERT INTO `cart` (`product_id`,`user_id`,`quentity`) VALUES('".$pid."','".$_SESSION["u"]["id"]."','1')");
        echo("added");
    }


}else{
    echo("please loging first");
}


?>