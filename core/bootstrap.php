<?php

$app = [];
$app['config'] = require 'config.php';

$app['database'] =  new QueryBuilder(
	Database::connect($app['config']['database'])
);