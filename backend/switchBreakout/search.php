<?php
//$search = "låda";

switch ($dataAction) {
	case 'searchAll':
        
        
        $testvar = "lå";
        
        
		$dbList = $db->listJoined("products");
        //echo json_encode($dbList[0]['id']);
        
        $arrayLength = count($dbList);

        $searchResult = array();
        $x = 0;
        while($x < $arrayLength){
            if (strpos($dbList[$x]['name'], $testvar) !==false || strpos($dbList[$x]['type'], $testvar) !==false) {
                array_push($searchResult, $dbList[$x]);
            }
            
            $x++;
        }
        
        if (!empty($searchResult)){
            echo json_encode($searchResult);
        }
        else {
            echo json_encode("Hittade inga resultat för " . $testvar);
        }
		break;
        
    default:
		echo "Invalid column type \n";
		break;
}
?>