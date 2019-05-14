<?php 
namespace Config;
use PDO;
class DB
{
	private $db_name = 'test';
	private $host = 'localhost';
	private $username = 'root';
	private $password = '';
	private $conn;
	public function connect()
	{
		$this->conn = null;

		try {
			$this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $error) {
			echo "Connection Error : {$error->getMessage()}";
		}

		return $this->conn;
	}
}