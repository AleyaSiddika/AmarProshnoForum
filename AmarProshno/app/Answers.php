<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    protected $fillable = ['user_id','que_id','description','rate','showUp','showDown'];
}
