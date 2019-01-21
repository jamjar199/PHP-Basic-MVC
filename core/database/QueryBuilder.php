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

    public function select($tableName, $fieldsArray = ['*'], $where = 1, $limit = false){

        //converts array into comma separated string
        $fields = implode (", ", $fieldsArray);

        //assemble query
        $query = "SELECT {$fields} FROM {$tableName} WHERE {$where}";

        //if query has a limit it is set
        $query = $this->setLimits($query, $limit);

        return $this->execute($query, true);

    }

	public function insert($tableName, $fieldsArray, $valuesArray){

		/**
		*inserts value(s) into database
         *param 1 ($tableName) is the table name
         *param 2 ($fieldsArray) is an array of the fields, position must match values in param 1
         *param 3 ($valuesArray) is an array of the values
         * return boolean
		*/

		//check data is set 
		if ((!is_array($valuesArray)) || (!is_array($fieldsArray)) || (!isset($tableName))) {
			return false;
		}

		//check each value has a field
		if( count($valuesArray) != count($fieldsArray) ){
			return false;
		}

		//converts array into comma separated string
		$fields = implode(", ", $fieldsArray);

		//creates a string of comma separated field names that the values get bound to
		$values = implode(", :", $valuesArray);

        return $this->executeQuery("INSERT INTO {$tableName} ({$fields}) VALUES ({$values})");

	}

	public function update($tableName, $fieldsArray, $valuesArray, $where = 1, $limit = false){

	    //declare values string
        $values = "";

        //loop through each field and add the field and value to the values string
	    foreach ($fieldsArray as $key => $field){
	        $values .= $field . ' = ' . $valuesArray[$key] . ', ';
        }

	    //assemble query string
        $query = "UPDATE {$tableName} SET {$values} WHERE {$where}";

	    //if query has a limit it is set
        $query = $this->setLimits($query, $limit);

        return $this->executeQuery($query);
    }

    public function delete($tableName, $where = 1, $limit = false){

	    //assemble query
	    $query = "DELETE FROM {$tableName} WHERE {$where}";

	    //if query has a limit it is set
	    $query = $this->setLimits($query, $limit);

	    return $this->executeQuery($query);
    }

    public function execute($query, $fetchResults = false){

        return $this->executeQuery($query, $fetchResults);

    }

    private function setLimits($query, $limit){

        if ($limit != false){
            return $query ." LIMIT {$limit}";
        }
        return $query;
    }

    private function executeQuery($query, $fetchAll = false){

	    if ($fetchAll == true) {

            //prepares the query into a PDO statement and executes it (bool return)
            return $this->pdo->prepare($query)->execute();
        }

        //prepares the query into a PDO statement and executes it
        $stmt = $this->pdo->prepare($query);
	    $response = $stmt->execute();

	    if ($response == true) {
            //return the data retrieved
            return $stmt->fetchAll(PDO::FETCH_CLASS);
        }

	    return false;

    }
}