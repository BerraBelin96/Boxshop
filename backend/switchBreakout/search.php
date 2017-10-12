<?php
$search = "låda";

switch ($splitColumn) {
	case 'searchAll':
		$dbList = $db->list("products");
		echo json_encode($dbList);
		break;

}


?>