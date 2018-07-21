<?php

/**
 * 
 */

class QueryBuilder 
{

	protected $pdo;

	public function __construct(PDO $pdo){

		$this->pdo = $pdo;

	}

	public function selectAll($tableName){

		$stmt = $this->pdo->prepare("SELECT * FROM {$tableName}");

		$stmt->execute();
		
		return $stmt->fetchAll(PDO::FETCH_CLASS);
	
	}
}