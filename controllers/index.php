<?php

use \models\Task;

$task = new Task;

$data = $task->getTable();

require 'views/index.view.php';