<?php 
namespace Icomp\DB;
class Sql {
	const HOSTNAME = "127.0.0.1";
	const USERNAME = "root";
	const PASSWORD = "root";
	const DBNAME = "banco_comandos";
	private $conn;
	public function __construct()
	{
		$this->conn = new \PDO(
			"mysql:dbname=".Sql::DBNAME.";host=".Sql::HOSTNAME, 
			Sql::USERNAME,
			Sql::PASSWORD,
			array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
		);
		$this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	}
	private function setParams($statement, $parameters = array())
	{
		foreach ($parameters as $key => $value) {
			
			$this->bindParam($statement, $key, $value);
		}
	}
	private function bindParam($statement, $key, $value)
	{
		$statement->bindParam($key, $value);
	}
	public function query($rawQuery, $params = array())
	{
		$stmt = $this->conn->prepare($rawQuery);
		$this->setParams($stmt, $params);
		$stmt->execute();
	}
	public function select($rawQuery, $params = array()):array
	{
		try{
			$stmt = $this->conn->prepare($rawQuery);
			$this->setParams($stmt, $params);
			$stmt->execute();
			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return json_enconde(array(
				"erro:" => $e
			));
		}
	
	}
}
?>
