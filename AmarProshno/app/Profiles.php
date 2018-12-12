<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    protected $fillable = ['user_id','first_name', 'last_name', 'gender', 'dob', 'hobby', 'interest', 'image'];

}
