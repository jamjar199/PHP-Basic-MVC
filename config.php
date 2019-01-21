<?php

return [
	'database' => [
		'dbname' => 'todo',
		'user' => 'test',
		'password' => 'password',
		'host' => '192.168.0.12',
		'connection' => 'mysql',
		'options' => [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		]
	]
];