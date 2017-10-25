<?php
include_once("class/db.php");
$db = new DB();

header('Content-type:application/json;charset=utf-8');

if(isset($_POST['data'])){
	$data = json_decode($_POST['data']);
	
	$dataComand = $data[0]->comand;
	$dataComand = filter_var($dataComand, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	
	if(isset($data[0]->action)){
		$dataAction = $data[0]->action;
		$dataAction = filter_var($dataAction, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	}

	//Denna switch case används till att specificera vilken kod som ska användas till de olika kommandona från frontend sidan. 
	switch ($dataComand) {
		case 'list':

			require 'switchBreakout/list.php';

			break;

		case 'cart':

			require 'switchBreakout/cart.php';

			break;
            
        case 'email':

			require 'switchBreakout/email.php';

			break;
            
        case 'search':

			require 'switchBreakout/search.php';

			break;
		
		default:
			echo json_encode("Invalid command");
			break;
	}

}
else{
	echo json_encode("Invalid syntax");
}
?>

