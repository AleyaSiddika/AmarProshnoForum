<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $fillable = ['user_id','top','title','description','html','css','php','oop','mysql','javascript','ajax','jquery','rate'];
}
