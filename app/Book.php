<?php 
namespace App;
use PDO;
class Book
{
	private $table = 'books';
	private $conn;

	// 
	public function __construct($db)
	{
		$this->conn = $db;
	}

	/**
	* query
	* @return stdClass Object
	* @param SQL query
	**/
	public function search(Array $cond)
	{
		$column = $cond[0];
		$value 	= $cond[1];

		// if the query is empty then return empty array
		if ($value == '') {
			return array();
		}
		$sql = "SELECT a.name as author,
		b.id,
		b.title
		FROM books b 
		LEFT JOIN authors a ON a.id = b.author_id
		WHERE :column LIKE :value
		LIMIT 5";

		// stmt
		$stmt = $this->conn->prepare($sql);

		$stmt->bindValue(":column", $column); 
		$stmt->bindValue(':value', "%{$value}%");

		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);	
	}
}