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

	public function insertValue($valuesArray, $fieldsArray, $tableName){
		/**
		*inserts value(s) into database
		*
		*param 1 ($valuesArray) is an array of the values
		*param 2 ($fieldsArray) is an array of the fields, position must match values in param 1
		*param 3 ($tableName) is the table name
		*/

		//check data is set 
		if ( (!is_array($valuesArray)) || (!is_array($fieldsArray) || (!isset($tableName)) ) ) {
			return false;
		}

		//check each value has a field
		if( count($valuesArray) != count($fieldsArray) ){
			return false;
		}

		//converts array into comma separated string
		$fields = implode (", ", $fieldsArray);

		//creates a string of comma separated field names that the values get binded to
		$valueBind = implode(", :", $fieldsArray);

		//adds : to beginning of values to be binded 
		$valueBind = ':' . $valueBind;

		$stmt = $this->pdo->prepare(
			"INSERT INTO {$tableName} ({$fields}) VALUES ({$valueBind})"
		);

		$inserted = $stmt->execute(array_combine($fieldsArray, $valuesArray));

		return $inserted;
	}
}