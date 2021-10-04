<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    const STATUSES = array(0 => 'created', 1 => 'success', 2 => 'fail');
    const STATUS_SUCCESS = 1;
    const STATUS_FAIL = 2;

    protected $fillable = ['name', 'status'];
    
}
