<?php

// http://www.phptherightway.com/#database
// mysqli to be removed, mysql deprecated and removed

// PDO + MySQL
class DB
{
	// props 
	private $link;

	public function __construct()
	{
		require '../../../logins.php';
		$database = "webbshop_boxshop";

		$this->link = new PDO(
		    'mysql:host='.$host.';dbname='.$database.';charset=utf8mb4',
		    $user,
		    $pass,
		    array(
		        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		        PDO::ATTR_PERSISTENT => false
		    )
		);
	}

	public function getById($table, $id)
	{
		$stmt = $this->link->prepare("SELECT * FROM {$table} WHERE id = :id");
		$id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function list($table)
	{
		$stmt = $this->link->query("SELECT * FROM {$table}");
		$result;
		while($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{		
			 $result[] = $row;
		}

		return $result;
	}

	public function listJoined($table)
	{
		$stmt = $this->link->query("SELECT {$table}.`id`, {$table}.`price`, {$table}.`name`, {$table}.`ammount`, 
			type.`type`, type.`typeid`,
			product_description.`short_desc` 
			FROM {$table}
			JOIN type ON {$table}.type = type.typeid
			JOIN product_description ON {$table}.description = product_description.id_desc");
		$result;
		while($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{		
			 $result[] = $row;
		}

		return $result;
	}

	public function listByColumn($table,$joinTable,$column,$specifier)
	{
		$stmt = $this->link->prepare("SELECT {$table}.`id`, {$table}.`price`, {$table}.`name`, {$table}.`ammount`, 
			{$joinTable}.`type`, {$joinTable}.`typeid`,
			product_description.`short_desc`
			FROM {$table}
			JOIN {$joinTable} ON {$table}.type = {$joinTable}.typeid
			JOIN product_description ON {$table}.description = product_description.id_desc
			WHERE {$table}.{$column} = :specifier");
		$specifier = filter_var($specifier, FILTER_SANITIZE_NUMBER_INT);
		$stmt->bindParam(':specifier', $specifier, PDO::PARAM_INT);
		$stmt->execute();

		while($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{		
			 $result[] = $row;
		}
		if(!isset($result)){
			$result = $column.": ".$specifier." does not exist";
		}
		return $result;
	}

	public function listByColumnWithDescription($table,$joinTable,$column,$specifier)
	{
		$stmt = $this->link->prepare("SELECT {$table}.`id`, {$table}.`price`, {$table}.`name`, {$table}.`ammount`, 
			{$joinTable}.`type`, {$joinTable}.`typeid`,
			product_description.`short_desc`, product_description.`long_desc`
			FROM {$table}
			JOIN {$joinTable} ON {$table}.type = {$joinTable}.typeid
			JOIN product_description ON {$table}.description = product_description.id_desc
			WHERE {$table}.{$column} = :specifier");
		$specifier = filter_var($specifier, FILTER_SANITIZE_NUMBER_INT);
		$stmt->bindParam(':specifier', $specifier, PDO::PARAM_INT);
		$stmt->execute();

		while($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{		
			 $result[] = $row;
		}
		if(!isset($result)){
			$result = $column.": ".$specifier." does not exist";
		}
		return $result;
	}

	public function fetch($table)
	{
		$stmt = $this->link->query("SELECT * FROM {$table}");
		$result;
		while($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{		
			 $result[] = $row;
		}

		return $result;
	}

	public function add($sql)
	{

	}

	public function getCon()
	{
		return $this->link;
	}

	public function countId($table)
	{
		$stmt = $this->link->query("SELECT * FROM {$table}");
		$result;
		while($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{		
			 $result[] = $row['id'];
		}
		$idCount=count($result);

		return $idCount;
	}

	public function fetchType($table,$typeTable,$id)
	{
		$stmt = $this->link->prepare("SELECT * 
			FROM {$table}
			JOIN {$typeTable} ON {$table}.type = {$typeTable}.typeid
			WHERE {$table}.id = :id");
		$id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
		//$id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_ASSOC);
		/*while($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			echo "<pre>" . print_r($row,1) . "</pre>";
		}*/

		/*while($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{		
			 $result[] = $row;
		}

		return $result;*/
	}

	public function fetchTyp2($table,$typeTable,$column,$specifier)
	{
		$stmt = $this->link->prepare("SELECT * 
			FROM {$table}
			JOIN {$typeTable} ON {$table}.type = {$typeTable}.typeid
			WHERE {$table}.{$column} = :specifier");
		$specifier = filter_var($specifier, FILTER_SANITIZE_NUMBER_INT);
		$stmt->bindParam(':specifier', $specifier, PDO::PARAM_INT);
		$stmt->execute();

		while($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{		
			 $result[] = $row;
		}

		return $result;
	}
}


/*
$statement = $pdo->query("SELECT some_field FROM some_table");
$row = $statement->fetch(PDO::FETCH_ASSOC);
echo htmlentities($row['some_field']);

*/