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
			echo json_encode("Specifier not set");
		}
		break;

	case 'id':
		if(!empty($dataSpecifier) && isset($dataSpecifier)){
			$dbList = $db->listBycolumn("products","type","id",$dataSpecifier);
			echo json_encode($dbList);
		}
		else{
			echo json_encode("Specifier not set");
		}
		break;

	case 'idWDescription':
		if(!empty($dataSpecifier) && isset($dataSpecifier)){
			$dbList = $db->listByColumnWithDescription("products","type","id",$dataSpecifier);
			echo json_encode($dbList);
		}
		else{
			echo json_encode("Specifier not set");
		}
		break;

	default:
		echo json_encode("Invalid action type");
		break;
}
?>