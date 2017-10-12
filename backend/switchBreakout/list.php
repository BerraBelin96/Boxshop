<?php
switch ($splitColumn) {
	case 'all':
		$dbList = $db->list("products");
		echo json_encode($dbList);
		break;

	case 'type':
		if(!empty($splitSpecifier) && isset($splitSpecifier)){
			$dbList = $db->listBycolumn("products","type",$splitColumn,$splitSpecifier);
			echo json_encode($dbList);
		}
		else{
			echo "Specifier not set \n";
		}
		break;

	case 'id':
		if(!empty($splitSpecifier) && isset($splitSpecifier)){
			$dbList = $db->listBycolumn("products","type",$splitColumn,$splitSpecifier);
			echo json_encode($dbList);
		}
		else{
			echo "Specifier not set \n";
		}
		break;

	case 'idWDescription':
		if(!empty($splitSpecifier) && isset($splitSpecifier)){
			$dbList = $db->listByColumnWithDescription("products","type","id",$splitSpecifier);
			echo json_encode($dbList);
		}
		else{
			echo "Specifier not set \n";
		}
		break;

	default:
		Echo "Invalid column type \n";
		break;
}
?>