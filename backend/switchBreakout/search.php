<?php
//$search = "låda";

switch ($dataAction) {
	case 'searchAll':
        
        
        $testvar = "låda";
        
        
		$dbList = $db->listJoined("products");
        //echo json_encode($dbList[0]['id']);
        
        $arrayLength = count($dbList);
        
        $searchResult = array();
        $x = 0;
        while($x < $arrayLength){
            if (in_array($testvar, $dbList[$x])) {
                array_push($searchResult, $dbList[$x]);
            }
            $x++;
        }
        
        echo json_encode($searchResult);
        
		break;
        
    default:
		Echo "Invalid column type \n";
		break;
}
?>