<?php
//$search = "låda";

switch ($dataAction) {
        
        

        
        
	case 'searchAll':
        
    if(isset($data[0]->search)){
		$dataSearch = $data[0]->search;
		$dataSearch = filter_var($dataSearch, FILTER_SANITIZE_STRIPPED, FILTER_FLAG_STRIP_LOW  );
	}
    
        
		$dbList = $db->listJoined("products");
        //echo json_encode($dbList[0]['id']);
        
        $arrayLength = count($dbList);

        $searchResult = array();
        $x = 0;
        while($x < $arrayLength){
            if (strpos($dbList[$x]['name'], $dataSearch) !==false || strpos($dbList[$x]['type'], $dataSearch) !==false) {
                array_push($searchResult, $dbList[$x]);
            }
            
            $x++;
        }
        
        if (!empty($searchResult)){
            echo json_encode($searchResult);
        }
        else {
            echo json_encode("Hittade inga resultat för " . $dataSearch);
        }
		break;
        
    default:
		echo "Invalid column type \n";
		break;
}
?>