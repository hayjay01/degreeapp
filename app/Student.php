<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'matric_number', 'department', 'session', 'email', 'phone_number'];
}
