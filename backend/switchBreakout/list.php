<?php
if(isset($data[0]->specifier)){
		$dataSpecifier = $data[0]->specifier;
		$dataSpecifier = filter_var($dataSpecifier, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	}

switch ($dataAction) {
	case 'all': //Case "all" skickar namnet på den databastabell vi vill ha information från till "listJoined" funktionen i db.php. "listJoined" skickar sedan tillbaka all data från den specificerade tabellen. 
		$dbList = $db->listJoined("products");
		echo json_encode($dbList);
		break;

	case 'type': //Case "type" skickar numret av en typ till "listBycolumn" funktionen i db.php. "listBycolumn" skickar sedan tillbaka alla rader  i "products" tabellen som innehåller den specificerade typen. 
		if(!empty($dataSpecifier) && isset($dataSpecifier)){
			$dbList = $db->listBycolumn("products","type","type",$dataSpecifier);
			echo json_encode($dbList);
		}
		else{
			echo json_encode("Specifier not set");
		}
		break;

	case 'id': //Case "id" skickar numret av ett id till "listBycolumn" funktionen i db.php. "listBycolumn" skickar sedan tillbaka alla rader  i "products" tabellen som innehåller det specificerade id:t. 
		if(!empty($dataSpecifier) && isset($dataSpecifier)){
			$dbList = $db->listBycolumn("products","type","id",$dataSpecifier);
			echo json_encode($dbList);
		}
		else{
			echo json_encode("Specifier not set");
		}
		break;

	case 'idWDescription': //Case "idWDescription" skickar numret av ett id till "listBycolumn" funktionen i db.php. "listBycolumn" skickar sedan tillbaka alla rader  i "products" tabellen som innehåller det specificerade id:t och den långa produkt beskrivningen som hör till det id:t. 
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