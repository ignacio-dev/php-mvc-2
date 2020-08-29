<?php

namespace app\libs;

class Database {

	private $host;
	private $user;
	private $pass;
	private $name;
	private $port;

	private $dbh;
	private $stmt;

	public function __construct() {
		$this->dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->name}";
		$this->options = array(
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);

		try {
			$this->dbh = new PDO(
				$this->dsn,
				$this->user,
				$this->pass,
				$this->options
			);
		}
		catch(PDOException $e) {
			throw new Exception($e->getMessage(), 1);
		}
	}

	public function query($sql) {
		$this->stmt = $this->dbh->prepare($sql);

	}

	public function bind($param, $val, $type = null) {
		if (is_null($type)) {
			switch (true) {
				case is_int($val):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($val):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($val):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
			}
		}
		$this->stmt->bindValue($param, $val, $type);
	}

	public function execute() {
		return $this->stmt->execute();
	}

	public function get_result_set() {
		$this->execute();
		return $this->stmt->fetchAll(
			PDO::FETCH_OBJ
		);
	}

	public function get_result_single() {
		$this->execute();
		return $this->stmt->fetch(
			PDO::FETCH_OBJ
		);
	}

	public function get_row_count() {
		return $this->stmt->rowCount();
	}

}