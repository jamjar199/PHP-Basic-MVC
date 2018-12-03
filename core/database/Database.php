<?php

class Database{
	
	public static function connect($config){

		try {
			return new PDO(
				$config['connection'].':host='.$config['host'].';dbname='.$config['dbname'],
				$config['user'], 
				$config['password'],
				$config['options']
			);
		} catch (PDOException $e) {
			die("Database failed: " . $e->getMessage());
		}

	}

}