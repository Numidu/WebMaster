<?php
include "connection.php";
session_start();

if (isset($_SESSION["u"])) {
    $u_rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $_SESSION["u"]["id"] . "'");
    $u_data = $u_rs->fetch_assoc();

    $rs = Database::search("SELECT * FROM `cart` WHERE `user_id` = '" . $_SESSION["u"]["id"] . "'");
    $num = $rs->num_rows;

    $total = 0;
    $dcost = 0;

    for ($x = 0; $x < $num; $x++) {
        $data = $rs->fetch_assoc();
        $p_rs = Database::search("SELECT * FROM `product` WHERE `Id`='" . $data["product_id"] . "'");
        $p_data = $p_rs->fetch_assoc();

        $total += $p_data["price"] * $data["quentity"];
        $dcost += $p_data["dcost"];
    }

    if (!empty($u_data["mobile"]) && !empty($u_data["address"])) {
        $fname = $_SESSION["u"]["name"];
        $lname = $_SESSION["u"]["name"];
        $email = $_SESSION["u"]["email"];
        $address = $u_data["address"];
        $mobile = $u_data["mobile"];
        $city = 'colombo';
        $country = "Sri Lanka";
        $order_id = uniqid();
        $currency = "LKR";

        $item = $num > 1 ? "All products" : $p_data["title"];
        $amount = $total + $dcost;
        $merchant_id = "1228683";
        $merchant_secret = "MzI1Mjg5MjY5NTIxMjA2OTYxMDUxNDYwNTE2Mjg2MzE0Nzc1MjI0Mw==";

        $hash = strtoupper(
            md5(
                $merchant_id .
                $order_id .
                number_format($amount, 2, '.', '') .
                $currency .
                strtoupper(md5($merchant_secret))
            )
        );

        $array = [
            "id" => $order_id,
            "fname" => $fname,
            "lname" => $lname,
            "mobile" => $mobile,
            "address" => $address,
            "city" => $city,
            "country" => $country,
            "currency" => $currency,
            "item" => $item,
            "amount" => $amount,
            "m_id" => $merchant_id,
            "m_secret" => $merchant_secret,
            "hash" => $hash,
            "email" => $email
        ];

        echo json_encode($array);
    } else {
        echo "1"; // Missing mobile or address
    }
} else {
    echo "2"; // User not logged in
}
?>
