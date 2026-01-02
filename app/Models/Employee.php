<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['user_id'];

    public function roleNumber(){
        if($this->tipo=='common') return 0;
        if($this->tipo=='admin') return 1;
    }
}
