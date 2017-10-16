<?php
if(isset($data[0]->specifier)){
		$dataSpecifier = $data[0]->specifier;
		$dataSpecifier = filter_var($dataSpecifier, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	}

switch ($dataAction) {
	case 'all':
		$dbList = $db->listJoined("products");
		echo json_encode($dbList);
		break;

	case 'type':
		if(!empty($dataSpecifier) && isset($dataSpecifier)){
			$dbList = $db->listBycolumn("products","type","type",$dataSpecifier);
			echo json_encode($dbList);
		}
		else{
			echo "Specifier not set \n";
		}
		break;

	case 'id':
		if(!empty($dataSpecifier) && isset($dataSpecifier)){
			$dbList = $db->listBycolumn("products","type","id",$dataSpecifier);
			echo json_encode($dbList);
		}
		else{
			echo "Specifier not set \n";
		}
		break;

	case 'idWDescription':
		if(!empty($dataSpecifier) && isset($dataSpecifier)){
			$dbList = $db->listByColumnWithDescription("products","type","id",$dataSpecifier);
			echo json_encode($dbList);
		}
		else{
			echo "Specifier not set \n";
		}
		break;

	default:
		Echo "Invalid action type \n";
		break;
}
?>