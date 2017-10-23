<?php

if(isset($_POST['cart'])){
	$cart = json_decode($_POST['cart']);
}

if(isset($_POST['userInfo'])){
	$userInfo = json_decode($_POST['userInfo']);
}

$email = $userInfo[0]->email;
$firstName = $userInfo[0]->firstname;
$surname = $userInfo[0]->surname;
$address = $userInfo[0]->address;
$zipCode = $userInfo[0]->zipcode;
$city = $userInfo[0]->city;
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