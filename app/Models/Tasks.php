<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tasks extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'tasks';
    protected $primaryKey = 'task_id';

    function setHeadingAttribute($value){
        $this->attributes['heading'] = ucwords($value);
    }
    
    function getupdatedAtAttribute($value){
       return date('d-m-Y H:i:s', strtotime($value));
    }
}
