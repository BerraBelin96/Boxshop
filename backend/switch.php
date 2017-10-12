<?php
include_once("class/db.php");
$db = new DB();

header('Content-type:application/json;charset=utf-8');

if(isset($_POST['data'])){
	//$data = filter_input(INPUT_POST, "data", FILTER_SANITIZE_SPECIAL_CHARS);
	$data = json_decode($_POST['data']);
	$splits = explode("//", $data);

	$splitComand = $splits[0];
	$splitComand = trim($splitComand);

	$splitColumn = "";
	if(isset($splits[1])){
		$splitColumn = $splits[1];
		$splitColumn = trim($splitColumn);
	}

	if(isset($splits[2])){
		$splitSpecifier = $splits[2];
		$splitSpecifier = trim($splitSpecifier);
	}

	switch ($splitComand) {
		case 'list':

			require 'switchBreakout/list.php';

			break;
            
        case 'email':

			require 'switchBreakout/email.php';

			break;
            
        case 'search':

			require 'switchBreakout/search.php';

			break;
		
		default:
			Echo "Invalid command \n";
			break;
	}

if(!isset($splits[1])){
	echo "Column not set \n";
}

}
else{
	echo "Invalid syntax";
}
?>