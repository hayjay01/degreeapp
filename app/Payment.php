<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['student_id', 'matric_number', 'name', 'reference_code', 'status', 'amount', 'payment_reference'];

    public function student()
    {
        return $this->hasMany(Student::class);
    }
}
