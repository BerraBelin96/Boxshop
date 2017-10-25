<?php

if(isset($_POST['cart'])){
	$cart = json_decode($_POST['cart']);
}

if(isset($_POST['userinfo'])){
	$userInfo = json_decode($_POST['userinfo']);
}

$email = $userInfo->email;
$firstName = $userInfo->firstname;
$surname = $userInfo->surname;
$address = $userInfo->address;
$zipCode = $userInfo->zipcode;
$city = $userInfo->city;
$status = "obetald";

$dbUserResult = $db->addUserInfo($email, $firstName, $surname, $address, $zipCode, $city, $status);

$userId = $dbUserResult['id'];

$arrlength = count($cart);

$fullPrice = 0;

for($x = 0; $x < $arrlength; $x++) {
    $dbList[$x] = $db->listBycolumn("products","type","id",$cart[$x]->id);
    $cartWInfo[$x] = $dbList[$x][0];
    $cartWInfo[$x]["count"] = $cart[$x]->count;
    $fullPrice += $cartWInfo[$x]["price"]*$cartWInfo[$x]["count"];
    
    $product = $cartWInfo[$x]["id"];
    $amount = $cartWInfo[$x]["count"];
    $dbResult = $db->addOrderInfo($userId, $product, $amount);
}

echo json_encode("Order info added");
?>