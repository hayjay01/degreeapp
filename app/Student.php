<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'matric_number', 'department_id', 'session_id', 'email', 'phone_number'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function session()
    {
        return $this->belongsTo(AcademicSession::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
