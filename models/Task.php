<?php

namespace models;

class Task extends BaseModel
{
	public function __construct(){
	    $this->table = get_class($this);
    }

    public function getTable(){
	    $table = explode('\\', $this->table);
	    return $table[1];
    }
}