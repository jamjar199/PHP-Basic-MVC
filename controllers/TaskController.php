<?php

namespace controllers;

use \models\TaskModel;

class TaskController extends BaseController
{
    public function index(){
        $task = new TaskModel;

        $data = $task->getTable();

        require 'views/index.view.php';
    }
}