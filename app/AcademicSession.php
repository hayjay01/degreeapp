<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicSession extends Model
{
    protected $fillable = ['name'];

    public function student()
    {
        return $this->hasMany(Student::class);
    }
}
