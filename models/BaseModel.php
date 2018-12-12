<?php

namespace models;

class BaseModel
{
    /**
     * The table associated with the model.
     */
    protected $table;

    public function __construct(){
        $this->table = get_class($this);
    }

    public function getTable(){
        $table = explode('\\', $this->table);
        return preg_replace('/Model$/', '',  $table[1]);
    }

}