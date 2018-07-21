<?php

$app = [];
$app['config'] = require 'config.php';

require 'core/Request.php';
require 'core/Router.php';
require 'core/database/Database.php';
require 'core/database/QueryBuilder.php';

$app['database'] =  new QueryBuilder(
	Database::connect($app['config']['database'])
);